<?php

namespace Jmf\PredefinedStrings;

use Override;
use Stringable;

/**
 * Decimal number string (1234567890).
 */
readonly class DecimalNumberString extends PredefinedStringBase
{
    private const string REGEX = '/^[0-9]+$/D';

    #[Override]
    public static function isValid(
        string | Stringable $string,
        array $parameters = [],
    ): bool {
        return (1 === preg_match(self::REGEX, $string));
    }
}
