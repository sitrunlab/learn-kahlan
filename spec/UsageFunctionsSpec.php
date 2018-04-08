<?php

namespace App\Spec;

use App\UsageFunctions;

describe('UsageFunctions', function () {

    describe('getCurrentTime()', function () {

        it('returns expected current time', function () {

            $expected = 1477897159;
            allow('time')->toBeCalled()->andReturn($expected);

            $actual = (new UsageFunctions())->getCurrentTime();
            expect($actual)->toBe($expected);

        });

    });

});
