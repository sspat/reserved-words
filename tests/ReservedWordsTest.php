<?php

declare(strict_types=1);

namespace sspat\ReservedWords\Tests;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use sspat\ReservedWords\ReservedWords;
use sspat\ReservedWords\ReservedWordsLookupError;

use function strtoupper;

/**
 * @covers \sspat\ReservedWords\ReservedWords
 */
final class ReservedWordsTest extends TestCase
{
    public function testDefaultReservedWordsLoaded(): void
    {
        $reservedWord  = 'list';
        $reservedWords = new ReservedWords();

        Assert::assertTrue($reservedWords->isReserved($reservedWord));
    }

    public function testIsReserved(): void
    {
        $reservedWord  = 'reserved-word';
        $reservedWords = new ReservedWords([$reservedWord => []]);

        Assert::assertTrue($reservedWords->isReserved($reservedWord));
    }

    public function testIsNotReserved(): void
    {
        $notReservedWord = 'not-reserved-word';
        $reservedWords   = new ReservedWords([]);

        Assert::assertFalse($reservedWords->isReservedMethodName($notReservedWord));
    }

    public function testIsReservedCaseInsensitive(): void
    {
        $reservedWord  = 'reserved-word';
        $reservedWords = new ReservedWords([
            $reservedWord => [
                'constant' => '7.0',
                'namespace' => '7.0',
                'function' => '7.0',
                'method' => '7.0',
            ],
        ]);

        Assert::assertTrue($reservedWords->isReservedMethodName(strtoupper($reservedWord), '7.0'));
    }

    /**
     * @param array<string, string|bool|array<array-key, string>> $reservedWordParameters
     *
     * @dataProvider reservedWordsList
     */
    public function testConstantName(
        string $reservedWord,
        array $reservedWordParameters,
        string $phpVersion,
        bool $isReserved
    ): void {
        $reservedWords = new ReservedWords([$reservedWord => $reservedWordParameters]);

        Assert::assertEquals($isReserved, $reservedWords->isReservedConstantName($reservedWord, $phpVersion));
    }

    /**
     * @param array<string, string|bool|array<array-key, string>> $reservedWordParameters
     *
     * @dataProvider reservedWordsList
     */
    public function testNamespaceName(
        string $reservedWord,
        array $reservedWordParameters,
        string $phpVersion,
        bool $isReserved
    ): void {
        $reservedWords = new ReservedWords([$reservedWord => $reservedWordParameters]);

        Assert::assertEquals($isReserved, $reservedWords->isReservedNamespaceName($reservedWord, $phpVersion));
    }

    /**
     * @param array<string, string|bool|array<array-key, string>> $reservedWordParameters
     *
     * @dataProvider reservedWordsList
     */
    public function testClassName(
        string $reservedWord,
        array $reservedWordParameters,
        string $phpVersion,
        bool $isReserved
    ): void {
        $reservedWords = new ReservedWords([$reservedWord => $reservedWordParameters]);

        Assert::assertEquals($isReserved, $reservedWords->isReservedClassName($reservedWord, $phpVersion));
    }

    /**
     * @param array<string, string|bool|array<array-key, string>> $reservedWordParameters
     *
     * @dataProvider reservedWordsList
     */
    public function testFunctionName(
        string $reservedWord,
        array $reservedWordParameters,
        string $phpVersion,
        bool $isReserved
    ): void {
        $reservedWords = new ReservedWords([$reservedWord => $reservedWordParameters]);

        Assert::assertEquals($isReserved, $reservedWords->isReservedFunctionName($reservedWord, $phpVersion));
    }

    /**
     * @param array<string, string|bool|array<array-key, string>> $reservedWordParameters
     *
     * @dataProvider reservedWordsList
     */
    public function testMethodName(
        string $reservedWord,
        array $reservedWordParameters,
        string $phpVersion,
        bool $isReserved
    ): void {
        $reservedWords = new ReservedWords([$reservedWord => $reservedWordParameters]);

        Assert::assertEquals($isReserved, $reservedWords->isReservedMethodName($reservedWord, $phpVersion));
    }

    public function testInvalidPhpVersion(): void
    {
        $reservedWord  = 'reserved-word';
        $reservedWords = new ReservedWords([$reservedWord => []]);

        $this->expectException(ReservedWordsLookupError::class);
        $this->expectErrorMessage('Invalid PHP version: 7, the correct format is: /^\d\.\d\.?\d*$/');
        $reservedWords->isReservedMethodName($reservedWord, '7');
    }

    /**
     * @return array<array-key, array<string, string|bool|array<string, string|bool|array<array-key, string>>>>
     */
    public function reservedWordsList(): array
    {
        return [
            [
                'reservedWord' => 'reserved-word',
                'reservedWordParameters' => [
                    'constant' => false,
                    'namespace' => false,
                    'class' => false,
                    'function' => false,
                    'method' => false,
                ],
                'phpVersion' => '4.0.0',
                'isReserved' => false,
            ],
            [
                'reservedWord' => 'reserved-word',
                'reservedWordParameters' => [
                    'constant' => '7.0',
                    'namespace' => '7.0',
                    'class' => '7.0',
                    'function' => '7.0',
                    'method' => '7.0',
                ],
                'phpVersion' => '7.0',
                'isReserved' => true,
            ],
            [
                'reservedWord' => 'reserved-word',
                'reservedWordParameters' => [
                    'constant' => '7.0',
                    'namespace' => '7.0',
                    'class' => '7.0',
                    'function' => '7.0',
                    'method' => '7.0',
                ],
                'phpVersion' => '7.0.0',
                'isReserved' => true,
            ],
            [
                'reservedWord' => 'reserved-word',
                'reservedWordParameters' => [
                    'constant' => '7.0',
                    'namespace' => '7.0',
                    'class' => '7.0',
                    'function' => '7.0',
                    'method' => '7.0',
                ],
                'phpVersion' => '7.0.1',
                'isReserved' => true,
            ],
            [
                'reservedWord' => 'reserved-word',
                'reservedWordParameters' => [
                    'constant' => '7.0',
                    'namespace' => '7.0',
                    'class' => '7.0',
                    'function' => '7.0',
                    'method' => '7.0',
                ],
                'phpVersion' => '5.6',
                'isReserved' => false,
            ],
            [
                'reservedWord' => 'reserved-word',
                'reservedWordParameters' => [
                    'constant' => ['5.0', '7.0'],
                    'namespace' => ['5.0', '7.0'],
                    'class' => ['5.0', '7.0'],
                    'function' => ['5.0', '7.0'],
                    'method' => ['5.0', '7.0'],
                ],
                'phpVersion' => '4.0',
                'isReserved' => false,
            ],
            [
                'reservedWord' => 'reserved-word',
                'reservedWordParameters' => [
                    'constant' => ['5.0', '7.0'],
                    'namespace' => ['5.0', '7.0'],
                    'class' => ['5.0', '7.0'],
                    'function' => ['5.0', '7.0'],
                    'method' => ['5.0', '7.0'],
                ],
                'phpVersion' => '5.0',
                'isReserved' => true,
            ],
            [
                'reservedWord' => 'reserved-word',
                'reservedWordParameters' => [
                    'constant' => ['5.0', '7.0'],
                    'namespace' => ['5.0', '7.0'],
                    'class' => ['5.0', '7.0'],
                    'function' => ['5.0', '7.0'],
                    'method' => ['5.0', '7.0'],
                ],
                'phpVersion' => '5.4',
                'isReserved' => true,
            ],
            [
                'reservedWord' => 'reserved-word',
                'reservedWordParameters' => [
                    'constant' => ['5.0', '7.0'],
                    'namespace' => ['5.0', '7.0'],
                    'class' => ['5.0', '7.0'],
                    'function' => ['5.0', '7.0'],
                    'method' => ['5.0', '7.0'],
                ],
                'phpVersion' => '7.0',
                'isReserved' => false,
            ],
            [
                'reservedWord' => 'reserved-word',
                'reservedWordParameters' => [
                    'constant' => ['5.0', '7.0'],
                    'namespace' => ['5.0', '7.0'],
                    'class' => ['5.0', '7.0'],
                    'function' => ['5.0', '7.0'],
                    'method' => ['5.0', '7.0'],
                ],
                'phpVersion' => '7.1',
                'isReserved' => false,
            ],
        ];
    }
}
