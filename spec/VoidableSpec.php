<?php

namespace App\Spec;

use App\Voidable;

describe('Voidable', function () {

    given('voidable', function () {
        return new Voidable();
    });

    describe('->helloWorld()', function () {

        it('echo-ed "Hello World!"', function () {

            $expected = 'Hello World!';
            $closure = function () {
                $this->voidable->helloWorld();
            };

            expect($closure)->toEcho($expected);

        });

    });

});
