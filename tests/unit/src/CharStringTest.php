<?php

namespace Jmf\PredefinedStrings\src;

use InvalidArgumentException;
use Jmf\PredefinedStrings\CharString;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\DoesNotPerformAssertions;
use PHPUnit\Framework\TestCase;

class CharStringTest extends TestCase
{
    /**
     * @return mixed[][]
     */
    public static function dataProviderValidStrings(): iterable
    {
        return [
            [
                'a',
                'UTF-8',
            ],
            [
                ' ',
                'UTF-8',
            ],
            [
                '0',
                'UTF-8',
            ],
            [
                '1',
                'UTF-8',
            ],
            [
                'é',
                'UTF-8',
            ],
        ];
    }

    #[DoesNotPerformAssertions]
    #[DataProvider('dataProviderValidStrings')]
    public function testWithValidString(
        string $string,
        string $encoding,
    ): void {
        new CharString($string, $encoding);
    }

    #[DoesNotPerformAssertions]
    public function testWithValidPredefinedString(): void
    {
        new CharString(new CharString('a'));
    }

    /**
     * @return mixed[][]
     */
    public static function dataProviderInvalidStrings(): iterable
    {
        return [
            [
                '',
                'UTF-8',
            ],
            [
                'ab',
                'UTF-8',
            ],
            [
                'abc',
                'UTF-8',
            ],
            [
                'é',
                'iso-8859-1',
            ],
        ];
    }

    #[DataProvider('dataProviderInvalidStrings')]
    public function testWithInvalidStrings(
        string $string,
        string $encoding,
    ): void {
        $this->expectException(InvalidArgumentException::class);

        new CharString($string, $encoding);
    }
}
