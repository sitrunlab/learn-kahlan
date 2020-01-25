<?php

namespace App\Spec;

use App\FinalClass;
use Kahlan\Plugin\Double;

describe('FinalClass', function () {

    describe('do', function () {

        it('original', function () {

            expect((new FinalClass())->do())->toBe(1);

        });

        it('stub-able', function () {

            $finalStub = Double::instance(['extends' => FinalClass::class]);
            allow($finalStub)->toReceive('do')->andReturn(0);

            $obj = new class ($finalStub) {

                private $finalClass;

                public function __construct(FinalClass $finalClass)
                {
                    $this->finalClass = $finalClass;
                }

                public function execute() : int
                {
                    return $this->finalClass->do();
                }
            };

            expect($obj->execute())->toBe(0);

        });

    });

});