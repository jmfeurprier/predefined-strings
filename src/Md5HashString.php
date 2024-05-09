<?php

namespace Jmf\PredefinedStrings;

use Override;
use Stringable;

/**
 * MD5 hash string.
 */
readonly class Md5HashString extends PredefinedStringBase
{
    private const string REGEX = '/^[\da-fA-F]{32}$/D';

    #[Override]
    public static function isValid(
        string | Stringable $string,
        array $parameters = [],
    ): bool {
        return (1 === preg_match(self::REGEX, $string));
    }
}
