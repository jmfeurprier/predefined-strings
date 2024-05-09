<?php

namespace Jmf\PredefinedStrings;

use Override;
use Stringable;

/**
 * Date and time string (YYYY-MM-DD HH:MM:SS).
 */
readonly class DateTimeString extends PredefinedStringBase
{
    private const string REGEX = '/^(\d+)-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]) ([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/D';

    #[Override]
    public static function isValid(
        string | Stringable $string,
        array $parameters = [],
    ): bool {
        $matches = null;

        return ((1 === preg_match(self::REGEX, $string, $matches)) &&
            checkdate($matches[2], $matches[3], $matches[1]));
    }
}
