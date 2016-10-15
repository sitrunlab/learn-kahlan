<?php

namespace App\Spec;

use App\Baz;

describe('Baz', function () {
    given('baz', function() {
        return new Baz();
    });
    
    describe('->partOf', function () {

        it('passed if value is part of array', function () {
            $value = 1;
            $array = [1, 2, 3];

            $result = $this->baz->listValues($array);
            
            expect($value)->toBeOneOf($result);
        });
        
        it('fails if value is not part of array', function () {
            $value = 0;
            $array = [1, 2, 3];

            $result = $this->baz->listValues($value, $array);
            
            expect($value)->not->toBeOneOf($result);
        });

    });
});
