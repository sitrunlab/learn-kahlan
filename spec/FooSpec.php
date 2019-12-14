<?php

namespace App\Spec;

use App\AnotherInterface;
use App\DependencyInterface;
use App\Dependency;
use App\Foo;
use App\ProcessTrait;
use Kahlan\QuitException;
use Kahlan\Plugin\Double;
use Kahlan\Plugin\Quit;

describe('Foo', function () {
    given('dependency', function() {
        $dependency =  Double::instance([
            // if we want to use exact class, we can use
            'extends' => Dependency::class,
            'methods' => ['__construct'],
            // if we want to pass instance implements interface
            'implements' => [DependencyInterface::class, AnotherInterface::class],
            // if we want to use Trait
            'uses' => [ProcessTrait::class],
        ]);

		allow($dependency)->toReceive('isExplicitVoidMethod');

        return $dependency;
    });

    given('foo', function() {
        return new Foo($this->dependency);
    });

    describe('instance of check', function () {
        it('return "Foo" instance', function () {
            expect($this->foo)->toBeAnInstanceOf(Foo::class);
        });
    });

    describe('->process', function () {

        it('return "$param processed" string', function () {
            $param = 'foo';
            $expected = $param.' processed';

            allow($this->dependency)->toReceive('process')
                                    ->with($param)
                                    ->andReturn($expected);

            $result = $this->foo->process($param);
            expect($result)->toBe($expected);

            expect($this->dependency)->toReceive('process')->with($param)->once();
        });

    });

    describe('->fooString', function () {

        it('return "foo" string', function () {
            $expected = 'foo';
            $result = $this->foo->fooString();

            expect($result)->toBe($expected);
        });

        it('Quit from the execution', function () {
            Quit::disable();

            $closure = function () {
                $this->foo->fooString(false);
            };

            expect($closure)->toThrow(new QuitException());
        });

    });

    describe('->callDie()', function () {

        it('Quit from the execution', function () {
            Quit::disable();

            $closure = function () {
                $this->foo->callDie();
            };

            expect($closure)->toThrow(new QuitException());
        });

    });

    describe('->callImplicitVoidMethod()', function () {

        it ('does like implicit void methods', function () {
            // stub
            allow($this->dependency)->toReceive('isImplicitVoidMethod');

            $this->foo->callImplicitVoidMethod();

            // spy
            expect($this->dependency)
                ->toReceive('isImplicitVoidMethod')
                ->once();
        });

    });

    describe('->callExplicitVoidMethod()', function () {

        it ('does like type-checked void methods', function () {
            // stub
            allow($this->dependency)->toReceive('isExplicitVoidMethod');

            $this->foo->callExplicitVoidMethod();

            // spy
            expect($this->dependency)
                ->toReceive('isExplicitVoidMethod')
                ->once();
        });
    });

});
