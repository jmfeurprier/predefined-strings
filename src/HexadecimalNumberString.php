<?php

namespace Jmf\PredefinedStrings;

use Stringable;

/**
 * Hexadecimal number string (123456789abcdef0).
 */
readonly class HexadecimalNumberString extends PredefinedStringBase
{
    private const string REGEX = '/^[\da-f]+$/Di';

    public static function isValid(
        string | Stringable $string,
        array $parameters = [],
    ): bool {
        return (1 === preg_match(self::REGEX, $string));
    }
}
