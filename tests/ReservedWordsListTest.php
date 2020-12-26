<?php

declare(strict_types=1);

namespace sspat\ReservedWords\Tests;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use sspat\ReservedWords\ReservedWords;
use sspat\ReservedWords\ReservedWordsList;

use function array_keys;
use function count;
use function is_array;
use function is_string;
use function Safe\preg_match;
use function Safe\sprintf;

class ReservedWordsListTest extends TestCase
{
    public function testReservedWordsList(): void
    {
        $errorMessage = 'Invalid reserved word configuration for %s';

        foreach (ReservedWordsList::PHP_RESERVED_WORDS as $reservedWord => $reservedWordConfig) {
            Assert::assertIsString($reservedWord);
            Assert::assertIsArray($reservedWordConfig);
            Assert::assertCount(4, $reservedWordConfig);
            Assert::assertArrayHasKey('constant', $reservedWordConfig);
            Assert::assertArrayHasKey('namespace', $reservedWordConfig);
            Assert::assertArrayHasKey('function', $reservedWordConfig);
            Assert::assertArrayHasKey('method', $reservedWordConfig);
            Assert::assertTrue(
                $this->isValidConstraint($reservedWordConfig['constant']),
                sprintf($errorMessage, $reservedWord)
            );
            Assert::assertTrue(
                $this->isValidConstraint($reservedWordConfig['namespace']),
                sprintf($errorMessage, $reservedWord)
            );
            Assert::assertTrue(
                $this->isValidConstraint($reservedWordConfig['function']),
                sprintf($errorMessage, $reservedWord)
            );
            Assert::assertTrue(
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
               (is_string($constraint) && preg_match(ReservedWords::PHP_VERSION_REGEXP, $constraint) === 1) ||
               (
                   is_array($constraint) &&
                   count($constraint) === 2 &&
                   array_keys($constraint) === [0, 1] &&
                   preg_match(ReservedWords::PHP_VERSION_REGEXP, $constraint[0]) === 1 &&
                   preg_match(ReservedWords::PHP_VERSION_REGEXP, $constraint[1]) === 1
               );
    }
}
