<?php

namespace App;

class Dependency implements
    DependencyInterface,
    AnotherInterface
{
    use ProcessTrait;
    private $a;

    public function __construct($a)
    {
        $this->a = $a;
    }
}
