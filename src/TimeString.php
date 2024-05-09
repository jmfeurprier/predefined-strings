<?php

namespace Jmf\PredefinedStrings;

use Override;
use Stringable;

/**
 * Time string (HH:MM:SS).
 */
readonly class TimeString extends PredefinedStringBase
{
    private const string REGEX = '/^([01]\d|2[0-3]):([0-5]\d):([0-5]\d)$/D';

    #[Override]
    public static function isValid(
        string | Stringable $string,
        array $parameters = []
    ): bool {
        return (1 === preg_match(self::REGEX, $string));
    }
}
