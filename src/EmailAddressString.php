<?php

namespace Jmf\PredefinedStrings;

use Override;
use Stringable;

/**
 * E-mail address string.
 */
readonly class EmailAddressString extends PredefinedStringBase
{
    private const string REGEX = '/^[a-z\'\d]+([._-][a-z\'\d]+)*@([a-z\d]+([._-][a-z\d]+))+$/Di';

    #[Override]
    public static function isValid(
        string | Stringable $string,
        array $parameters = [],
    ): bool {
        return (1 === preg_match(self::REGEX, $string));
    }
}
