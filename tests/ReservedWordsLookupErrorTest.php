<?php

declare(strict_types=1);

namespace sspat\ReservedWords\Tests;

use PHPUnit\Framework\TestCase;
use sspat\ReservedWords\ReservedWordsLookupError;

/**
 * @covers \sspat\ReservedWords\ReservedWordsLookupError
 */
final class ReservedWordsLookupErrorTest extends TestCase
{
    public function testInvalidPhpVersion(): void
    {
        $this->expectExceptionMessage('Invalid PHP version: 7, the correct format is: /\d+/');

        throw ReservedWordsLookupError::invalidPhpVersion('7', '/\d+/');
    }
}
