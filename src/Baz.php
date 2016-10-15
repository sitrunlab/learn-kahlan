<?php

namespace App;

class Baz
{
    public function listValuesCheck($value, $values)
    {
        return in_array($value, $values);
    }
}
