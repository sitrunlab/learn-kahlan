<?php

namespace App;

class Foo
{
    /** @var DependencyInterface */
    private $d;

    public function __construct(DependencyInterface $d)
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

    public function callDie()
    {
        die;
    }

    public function callImplicitVoidMethod()
    {
        $this->d->isImplicitVoidMethod();
    }
    public function callExplicitVoidMethod()
    {
        $this->d->isExplicitVoidMethod();
    }
}
