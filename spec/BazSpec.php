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
            expect($actual)->toBeOneOf($expected);
        });
        
        it('fails if value is not part of array', function () {
            $value = 0;
            $expected = [10, 11, 12];
            
            $actual = $this->baz->getRandomFromRange(1, 3);
            expect($actual)->not->toBeOneOf($expected);
        });

    });
});
