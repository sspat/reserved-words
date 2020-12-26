<?php

declare(strict_types=1);

namespace sspat\ReservedWords\Tests;

use PHPUnit\Framework\TestCase;
use sspat\ReservedWords\ReservedWords;
use sspat\ReservedWords\ReservedWordsList;

use function array_keys;
use function count;
use function is_array;
use function is_string;
use function preg_match;
use function sprintf;

class ReservedWordsListTest extends TestCase
{
    public function testReservedWordsList(): void
    {
        $errorMessage = 'Invalid reserved word configuration for %s';

        foreach (ReservedWordsList::PHP_RESERVED_WORDS as $reservedWord => $reservedWordConfig) {
            $this->assertIsString($reservedWord);
            $this->assertIsArray($reservedWordConfig);
            $this->assertCount(4, $reservedWordConfig);
            $this->assertArrayHasKey('constant', $reservedWordConfig);
            $this->assertArrayHasKey('namespace', $reservedWordConfig);
            $this->assertArrayHasKey('function', $reservedWordConfig);
            $this->assertArrayHasKey('method', $reservedWordConfig);
            $this->assertTrue(
                $this->isValidConstraint($reservedWordConfig['constant']),
                sprintf($errorMessage, $reservedWord)
            );
            $this->assertTrue(
                $this->isValidConstraint($reservedWordConfig['namespace']),
                sprintf($errorMessage, $reservedWord)
            );
            $this->assertTrue(
                $this->isValidConstraint($reservedWordConfig['function']),
                sprintf($errorMessage, $reservedWord)
            );
            $this->assertTrue(
                $this->isValidConstraint($reservedWordConfig['method']),
                sprintf($errorMessage, $reservedWord)
            );
        }
    }

    /**
     * @param string|bool|array<int, string> $constraint
     */
    private function isValidConstraint($constraint): bool
    {
        return $constraint === false ||
               (is_string($constraint) && preg_match(ReservedWords::PHP_VERSION_REGEXP, $constraint)) ||
               (
                   is_array($constraint) &&
                   count($constraint) === 2 &&
                   array_keys($constraint) === [0, 1] &&
                   preg_match(ReservedWords::PHP_VERSION_REGEXP, $constraint[0]) &&
                   preg_match(ReservedWords::PHP_VERSION_REGEXP, $constraint[1])
               );
    }
}
