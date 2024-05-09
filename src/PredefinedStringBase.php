<?php

namespace Jmf\PredefinedStrings;

use InvalidArgumentException;
use Override;
use RuntimeException;
use Stringable;

/**
 * This abstract class and its children allow to handle and validate strings with a pre-defined format
 *   (like e-mail address, hexadecimal number, etc.)
 */
abstract readonly class PredefinedStringBase implements PredefinedStringInterface
{
    private string $string;

    /**
     * @param array<string, mixed> $parameters
     */
    public function __construct(
        string | Stringable $string,
        array $parameters = [],
    ) {
        $string = (string) $string;

        static::validate($string, $parameters);

        $this->string = $string;
    }

    /**
     * @param array<string, mixed> $parameters
     */
    public static function validate(
        string | Stringable $string,
        array $parameters = [],
    ): void {
        if (!static::isValid($string, $parameters)) {
            throw new InvalidArgumentException('Invalid string format.');
        }
    }

    /**
     * This is where the string format-specific validation has to be done.
     * This method must be overridden in every subclass.
     *
     * @param array<string, mixed> $parameters
     */
    public static function isValid(
        string | Stringable $string,
        array $parameters = [],
    ): bool {
        throw new RuntimeException('Not implemented.');
    }

    #[Override]
    public function __toString(): string
    {
        return $this->string;
    }
}
