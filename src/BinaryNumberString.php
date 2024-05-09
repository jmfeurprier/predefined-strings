<?php

namespace Jmf\PredefinedStrings;

use Override;
use Stringable;

/**
 * Binary number string (1000101010).
 */
readonly class BinaryNumberString extends PredefinedStringBase
{
    private const string REGEX = '/^[01]+$/D';

    #[Override]
    public static function isValid(
        string|Stringable $string,
        array $parameters = [],
    ): bool {
        return (1 === preg_match(self::REGEX, $string));
    }
}
