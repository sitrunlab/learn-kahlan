<?php

namespace App\Spec;

use function App\getCurrentTime;

describe('UsageFunctions', function () {
    
    describe('getCurrentTime()', function () {
        
        it('returns expected current time', function () {

            $expected = 1477897159;
            allow('time')->toBeCalled()->andReturn($expected);
            
            $actual = getCurrentTime();
            expect($actual)->toBe($expected);
            
        });
        
    });

});
