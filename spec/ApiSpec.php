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
            $api->get('a');
            $api->get('b');

            expect(Api::class)->toReceive('get')->times(\count($gets));

        });

    });

});