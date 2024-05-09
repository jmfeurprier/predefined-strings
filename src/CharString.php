<?php

namespace Jmf\PredefinedStrings;

use InvalidArgumentException;
use Override;
use Stringable;

/**
 * Single character string.
 */
readonly class CharString extends PredefinedStringBase
{
    private const string ENCODING_DEFAULT = 'UTF-8';

    public function __construct(
        string | Stringable $string,
        string $encoding = self::ENCODING_DEFAULT,
    ) {
        parent::__construct(
            $string,
            [
                'encoding' => $encoding,
            ],
        );
    }

    #[Override]
    public static function isValid(
        string | Stringable $string,
        array $parameters = [],
    ): bool {
        $encoding = $parameters['encoding'] ?? self::ENCODING_DEFAULT;

        if (!is_string($encoding)) {
            throw new InvalidArgumentException('Provided encoding is not valid.');
        }

        return (1 === mb_strlen($string, $encoding));
    }
}
