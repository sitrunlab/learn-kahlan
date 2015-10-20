<?php

namespace App;

class Foo
{
    public function __construct(Dependency $d)
    {
        $this->d = $d;
    }

    public function process($param)
    {
        return $this->d->process($param);
    }

    public function fooString($isFoo = true)
    {
        if ($isFoo) {
            return 'foo';
        }

        exit(0);
    }
}
