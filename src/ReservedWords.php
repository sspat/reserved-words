<?php

declare(strict_types=1);

namespace sspat\ReservedWords;

use function array_key_exists;
use function count;
use function is_array;
use function is_string;
use function phpversion;
use function Safe\preg_match;
use function strtolower;
use function version_compare;

class ReservedWords
{
    public const PHP_VERSION_REGEXP = '/^\d\.\d\.?\d*$/';

    /**
     * @var array<string, array<string, string|bool|array<array-key, string>>>
     * phpcs:disable SlevomatCodingStandard.TypeHints.PropertyTypeHint.MissingNativeTypeHint
     */
    private $reservedWords;

    /**
     * @param array<string, array<string, string|bool|array<array-key, string>>> $reservedWords
     */
    public function __construct(array $reservedWords = ReservedWordsList::PHP_RESERVED_WORDS)
    {
        $this->reservedWords = $reservedWords;
    }

    /**
     * Checks that the word is reserved in any PHP version.
     * It is still possible to use reserved words in php code in many places, but generally you should avoid it.
     * This method also returns true for words that are marked as "soft" reserved in the PHP docs and may
     * become reserved in future versions of the language.
     */
    public function isReserved(string $string): bool
    {
        return array_key_exists(strtolower($string), $this->reservedWords);
    }

    /**
     * Checks that the word cannot be used as a constant name
     */
    public function isReservedConstantName(string $string, ?string $phpVersion = null): bool
    {
        return $this->isReservedAs($string, 'constant', $phpVersion);
    }

    /**
     * Checks that the word cannot be used as a namespace part or class/interface/trait name
     */
    public function isReservedNamespaceName(string $string, ?string $phpVersion = null): bool
    {
        return $this->isReservedAs($string, 'namespace', $phpVersion);
    }

    /**
     * Checks that the word cannot be used as a function name
     */
    public function isReservedFunctionName(string $string, ?string $phpVersion = null): bool
    {
        return $this->isReservedAs($string, 'function', $phpVersion);
    }

    /**
     * Checks that the word cannot be used as a method name
     */
    public function isReservedMethodName(string $string, ?string $phpVersion = null): bool
    {
        return $this->isReservedAs($string, 'method', $phpVersion);
    }

    private function isReservedAs(string $string, string $checkKey, ?string $phpVersion = null): bool
    {
        if (! $this->isReserved($string)) {
            return false;
        }

        $targetPhpVersion = $this->getPhpVersion($phpVersion);
        $reservedVersion  = $this->reservedWords[strtolower($string)][$checkKey];

        if ($reservedVersion === false) {
            return false;
        }

        if (is_string($reservedVersion)) {
            return $this->firstVersionEqualsOrHigherThanSecond($targetPhpVersion, $reservedVersion);
        }

        if (is_array($reservedVersion) && count($reservedVersion) === 2) {
            return ! (
                $this->firstVersionLessThanSecond($targetPhpVersion, $reservedVersion[0]) ||
                $this->firstVersionEqualsOrHigherThanSecond($targetPhpVersion, $reservedVersion[1])
            );
        }

        return false;
    }

    private function firstVersionEqualsOrHigherThanSecond(string $firstVersion, string $secondVersion): bool
    {
        return version_compare($firstVersion, $secondVersion) >= 0;
    }

    private function firstVersionLessThanSecond(string $firstVersion, string $secondVersion): bool
    {
        return version_compare($firstVersion, $secondVersion) === -1;
    }

    private function getPhpVersion(?string $phpVersion = null): string
    {
        if ($phpVersion === null) {
            return (string) phpversion();
        }

        if (preg_match(self::PHP_VERSION_REGEXP, $phpVersion) === 1) {
            return $phpVersion;
        }

        throw ReservedWordsLookupError::invalidPhpVersion($phpVersion, self::PHP_VERSION_REGEXP);
    }
}
