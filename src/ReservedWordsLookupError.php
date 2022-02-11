<?php

declare(strict_types=1);

namespace sspat\ReservedWords;

use RuntimeException;

use function Safe\sprintf;

final class ReservedWordsLookupError extends RuntimeException
{
    public static function invalidPhpVersion(string $phpVersion, string $correctFormat): self
    {
        /** @psalm-suppress DeprecatedFunction */
        return new self(
            sprintf('Invalid PHP version: %s, the correct format is: %s', $phpVersion, $correctFormat)
        );
    }
}
