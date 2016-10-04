<?php

namespace App\Spec;

use App\Dependency;
use App\DependencyInterface;

describe('Dependency', function () {
    given('dependency', function() {
        return new Dependency(1);
    });
    
    describe('injected parameter in __construct filled the $a property', function() {
        it('should return 1', function() {
            $r = new \ReflectionProperty($this->dependency, 'a');
            $r->setAccessible(true);
            expect($r->getValue($this->dependency))->toBe(1);
        });
    });

    describe('DependencyInterface instance', function () {
        it('instanceof DependencyInterface', function () {
            expect($this->dependency)->toBeAnInstanceOf(DependencyInterface::class);
        });
    });

    describe('->process', function () {

        it('return "$param processed" string', function () {
            $param = 'foo';
            $expected = $param.' processed';

            $result = $this->dependency->process($param);
            expect($result)->toBe($expected);
        });

    });
});
