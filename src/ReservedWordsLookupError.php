<?php

declare(strict_types=1);

namespace sspat\ReservedWords;

use RuntimeException;

final class ReservedWordsLookupError extends RuntimeException
{
    public static function invalidPhpVersion(string $phpVersion, string $correctFormat): self
    {
        /** @psalm-suppress DeprecatedFunction */
        return new self('Invalid PHP version: ' . $phpVersion . ', the correct format is: ' . $correctFormat);
    }
}
