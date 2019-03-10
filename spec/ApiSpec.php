<?php

namespace App\Spec;

use App\Api;

describe('Api', function () {

    describe('get', function () {

        it('ordered consecutive call', function () {

            $gets = ['a', 'b'];
            foreach ($gets as $row) {
                expect(Api::class)->toReceive('get')->with($row)->ordered;
            }

            $api = new Api();
            foreach ($gets as $get) {
                $api->get($get);
            }

            expect(Api::class)->toReceive('get')->times(\count($gets));

        });

    });

});