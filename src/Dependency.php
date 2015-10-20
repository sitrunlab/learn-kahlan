<?php

namespace App;

class Dependency
{
    public function __construct($depA, $depB, $depC)
    {

    }

    public function process($param)
    {
        return $param . ' processed';
    }
}
