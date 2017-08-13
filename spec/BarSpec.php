<?php

namespace App\Spec;

use App\Dependency;
use App\Bar;

skipIf(PHP_MAJOR_VERSION < 7);

describe('Bar', function () {
    given('bar', function() {
        return new Bar();
    });

    describe('instance', function () {
        it('return "Bar" instance', function () {
            expect($this->bar)->toBeAnInstanceOf(Bar::class);
        });
    });

    describe('->process', function () {

        it('return "$param processed" string', function () {
            $param = 'foo';
            $expected = $param.' processed';

            allow(Dependency::class)->toReceive('process')
                                    ->with($param)
                                    ->andReturn($expected);

            $result = $this->bar->process($param);
            expect($result)->toBe($expected);
        });

    });
});
