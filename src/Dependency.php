<?php

namespace App;

class Dependency implements
    DependencyInterface,
    AnotherInterface
{
    use ProcessTrait;

    public function __construct($a)
    {
    }
}
