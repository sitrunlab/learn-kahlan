<?php

namespace App\Spec;

use App\Outputter;

describe('Outputter', function() {

    it('writes a line', function() {

        $expected = 'hi' . PHP_EOL;
        $closure = function () {
            Outputter::writeLine('hi');
        };

        expect($closure)->toEcho($expected);

    });

});
