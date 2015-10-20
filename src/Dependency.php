<?php

namespace App;

class Dependency
{
    public function __construct($a)
    {

    }

    public function process($param)
    {
        return $param . ' processed';
    }
}
