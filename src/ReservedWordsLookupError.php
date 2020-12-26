<?php

declare(strict_types=1);

namespace sspat\ReservedWords;

use RuntimeException;

use function sprintf;

class ReservedWordsLookupError extends RuntimeException
{
    public static function invalidPhpVersion(string $phpVersion, string $correctFormat): self
    {
        return new self(
            sprintf('Invalid PHP version: %s, the correct format is: %s', $phpVersion, $correctFormat)
        );
    }
}
