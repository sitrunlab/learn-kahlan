<?php

namespace App\Spec;

use App\Dependency;
use App\Foo;
use kahlan\QuitException;
use kahlan\plugin\Stub;
use kahlan\plugin\Quit;

describe('Foo', function() {

    before(function() {
        $this->dependency = Stub::create(['class' => Dependency::class]);
        $this->object = new Foo($this->dependency);
    });

    describe('->process', function() {

        it('return "processed" string', function() {
            $param = 'foo';
            $expected = $param . ' processed';

            Stub::on($this->dependency)->method('process')
                                       ->with($param)
                                       ->andReturn($expected);

            $result = $this->object->process($param);
            expect($result)->toBe($expected);
        });

    });

    describe('->fooString', function() {

        it('return "foo" string', function() use ($d) {
            $expected = 'foo';
            $result = $this->object->fooString();

            expect($result)->toBe($expected);
        });

        it('Quit from the execution', function() use ($d) {
            Quit::disable();

            $closure = function() use ($d) {
                $this->object->fooString(false);
            };

            expect($closure)->toThrow(new QuitException());
        });

    });
});
