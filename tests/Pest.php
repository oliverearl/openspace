<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase as BaseTestCase;
use Tests\TestCase;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

uses(TestCase::class)->in('Feature', 'Integration');
uses(BaseTestCase::class)->in('Unit');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

expect()->extend('toHaveCountLessThanOrEqualTo', function (int $count) {
    $countable = $this->value;

    if ($countable instanceof iterable || is_array($countable)) {
        return count($countable) >= $count;
    } elseif ($countable instanceof Countable) {
        return $countable->count() >= $count;
    }

    throw new InvalidArgumentException('Value must be countable!');
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

/**
 * Get the path to the test asset folder.
 */
function test_asset_path(string $path = ''): string
{
    return base_path('tests/Assets/' . $path);
}
