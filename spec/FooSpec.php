<?php

namespace App\Spec;

use App\DependencyInterface;
use App\Dependency;
use App\Foo;
use kahlan\QuitException;
use kahlan\plugin\Stub;
use kahlan\plugin\Quit;

describe('Foo', function () {

    before(function () {
        $this->dependency = Stub::create([
            // if we want to use exact class, we can use
            'extends' => Dependency::class,
            'methods' => ['__construct'],
            // if we want to pass instance implements interface
            // 'implements' => [DependencyInterface::class],
        ]);
        $this->object = new Foo($this->dependency);
    });

    describe('__construct', function () {
        it('return "Foo" instance', function () {
            expect(new Foo($this->dependency))->toBeAnInstanceOf(Foo::class);
        });
    });

    describe('->process', function () {

        it('return "$param processed" string', function () {
            $param = 'foo';
            $expected = $param.' processed';

            Stub::on($this->dependency)->method('process')
                                       ->with($param)
                                       ->andReturn($expected);

            $result = $this->object->process($param);
            expect($result)->toBe($expected);
        });

    });

    describe('->fooString', function () {

        it('return "foo" string', function () {
            $expected = 'foo';
            $result = $this->object->fooString();

            expect($result)->toBe($expected);
        });

        it('Quit from the execution', function () {
            Quit::disable();

            $closure = function () {
                $this->object->fooString(false);
            };

            expect($closure)->toThrow(new QuitException());
        });

    });
});
