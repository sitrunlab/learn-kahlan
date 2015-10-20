<?php

namespace App;

class Dependency implements DependencyInterface
{
    public function __construct($a)
    {
    }

    public function process($param)
    {
        return $param.' processed';
    }
}
