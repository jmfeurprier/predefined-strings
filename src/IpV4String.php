<?php

namespace Jmf\PredefinedStrings;

use Override;
use Stringable;

/**
 * IP v4 string (192.168.0.1).
 */
readonly class IpV4String extends PredefinedStringBase
{
    #[Override]
    public static function isValid(
        string | Stringable $string,
        array $parameters = [],
    ): bool {
        return (long2ip(ip2long($string)) === $string);
    }
}
