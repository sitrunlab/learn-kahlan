<?php

namespace App\Spec;

use App\Dependency;
use App\Bar;

describe('Bar', function () {

    describe('__construct', function () {
        it('return "Bar" instance', function () {
            expect(new Bar())->toBeAnInstanceOf(Bar::class);
        });
    });

    describe('->process', function () {

        it('return "$param processed" string', function () {
            $param = 'foo';
            $expected = $param.' processed';

            allow(Dependency::class)->toReceive('process')
                                    ->with($param)
                                    ->andReturn($expected);
            
            $object = new Bar();
            $result = $object->process($param);
            expect($result)->toBe($expected);
        });

    });
});
