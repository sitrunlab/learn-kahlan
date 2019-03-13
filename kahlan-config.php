<?php

use Kahlan\Extra\Matcher\ExtraMatchers;
use Kahlan\Filter\Filters;
use Kahlan\Reporter\Coverage;
use Kahlan\Reporter\Coverage\Driver\Phpdbg;
use Kahlan\Reporter\Coverage\Driver\Xdebug;

ExtraMatchers::register();

Filters::apply($this, 'coverage', function($next) {
    if (! extension_loaded('xdebug') && PHP_SAPI !== 'phpdbg') {
        return;
    }

    $reporters = $this->reporters();
    $coverage = new Coverage([
        'verbosity' => $this->commandLine()->get('coverage'),
        'driver'    => PHP_SAPI === 'phpdbg' ? new Phpdbg() : new Xdebug(),
        'path'      => $this->commandLine()->get('src'),
        'exclude'   => [
            'src/ExcludedFromCoverage.php',
            /*
            for exclude all files inside specific directory, you can use *, eg:
                'src/Foo/Bar/*',
            */
        ],
        'colors'    => ! $this->commandLine()->get('no-colors')
    ]);
    $reporters->add('coverage', $coverage);
});