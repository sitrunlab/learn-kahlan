<?php

namespace App;

class Baz
{
    public function getRandomFromRange($start, $end)
    {
        return mt_rand($start, $end);
    }
}
