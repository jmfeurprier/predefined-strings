<?php

namespace Jmf\PredefinedStrings;

use Override;
use Stringable;

/**
 * Octal number string (01234567).
 */
readonly class OctalNumberString extends PredefinedStringBase
{
    private const string REGEX = '/^[0-7]+$/D';

    #[Override]
    public static function isValid(
        string | Stringable $string,
        array $parameters = [],
    ): bool {
        return (1 === preg_match(self::REGEX, $string));
    }
}
