<?php
namespace procedural\spec;

use function prodecural\echoScript;

describe('procedural', function () {

    describe('->echoScript()', function () {

        it('echos input string inside a script tag', function () {
            $closure = function() { echoScript('baz'); };
            expect($closure)->toEcho('<script>baz</script>');
        });

    });

});
