<?php

namespace App\Spec;

use App\Baz;

describe('Baz', function () {
    given('baz', function() {
        return new Baz();
    });

    describe('->getRandomFromRange', function () {

        it('passed if value is part of array', function () {
            $expected = [1, 2, 3];

            $actual = $this->baz->getRandomFromRange(1, 3);
            expect($actual)->toBeOneOf($expected); // strict
            expect($actual)->toEqualOneOf($expected); // loose
        });

        it('fails if value is not part of array', function () {
            $expected = [10, 11, 12];

            $actual = $this->baz->getRandomFromRange(1, 3);
            expect($actual)->not->toBeOneOf($expected);
        });

    });

    describe('->getStringOfInteger', function () {

        it('passed if value is part of array', function () {
            $expected = [1, 2, 3];

            $actual = $this->baz->getStringOfInteger(1);
            expect($actual)->toEqualOneOf($expected);    // loose
            expect($actual)->not->toBeOneOf($expected); // strict
        });

        it('fails if value is not part of array', function () {
            $expected = [10, 11, 12];

            $actual = $this->baz->getStringOfInteger(1);
            expect($actual)->not->toEqualOneOf($expected);
        });

    });
});
