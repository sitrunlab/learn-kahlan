<?php

namespace App\Spec;

use App\Dependency;
use App\DependencyInterface;

describe('Dependency', function () {

    beforeAll(function () {
        $this->object = new Dependency(1);
    });

    describe('DependencyInterface instance', function () {
        it('instanceof DependencyInterface', function () {
            expect($this->object)->toBeAnInstanceOf(DependencyInterface::class);
        });
    });

    describe('->process', function () {

        it('return "$param processed" string', function () {
            $param = 'foo';
            $expected = $param.' processed';

            $result = $this->object->process($param);
            expect($result)->toBe($expected);
        });

    });
});
