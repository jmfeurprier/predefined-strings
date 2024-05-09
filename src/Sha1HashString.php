<?php

namespace Jmf\PredefinedStrings;

use Override;
use Stringable;

/**
 * SHA-1 hash string.
 */
readonly class Sha1HashString extends PredefinedStringBase
{
    private const string REGEX = '/^[0-9a-fA-F]{40}$/D';
    #[Override]
    public static function isValid(
        string | Stringable $string,
        array $parameters = []
    ): bool {
        return (1 === preg_match(self::REGEX, $string));
    }
}
