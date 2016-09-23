<?php

namespace App;

/** using hard Dependency */
class Bar
{
    public function process($param)
    {
        $d = new Dependency(1);
        return $d->process($param);
    }
}
