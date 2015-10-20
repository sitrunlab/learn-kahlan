<?php

namespace App\Spec;

use App\Dependency;
use kahlan\plugin\Stub;

describe('Dependency', function() {

    describe('->process', function() {

        before(function() {
            $this->object = Stub::create([
                'extends' => Dependency::class,
                'params' => [1]
            ]);
        });

        it('return "$param processed" string', function() {
            $param = 'foo';
            $expected = $param . ' processed';

            $result = $this->object->process($param);
            expect($result)->toBe($expected);
        });

    });
});
