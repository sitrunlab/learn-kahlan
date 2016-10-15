<?php

namespace App\Spec;

use App\Baz;

describe('Baz', function () {
    given('baz', function() {
        return new Baz();
    });
    
    describe('->listValuesCheck', function () {

        it('passed if value is part of array', function () {
            $value = 1;
            $values = [1, 2, 3];

            $result = $this->baz->listValuesCheck($value, $values);
            
            expect($value)->toBeOneOf($values);
            expect($result)->toBe(true);
        });
        
        it('fails if value is not part of array', function () {
            $value = 0;
            $values = [1, 2, 3];

            $result = $this->baz->listValuesCheck($value, $values);
            
            expect($value)->not->toBeOneOf($values);
            expect($result)->toBe(false);
        });

    });
});
