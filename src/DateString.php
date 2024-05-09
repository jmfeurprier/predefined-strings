<?php

namespace Jmf\PredefinedStrings;

use Override;
use Stringable;

/**
 * Date string (YYYY-MM-DD).
 */
readonly class DateString extends PredefinedStringBase
{
    private const string REGEX = '/^(\d+)-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])$/D';

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
