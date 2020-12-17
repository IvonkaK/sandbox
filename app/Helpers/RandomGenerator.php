<?php

namespace App\Helpers;

class RandomGenerator
{
    public function generateRandomString()
    {
        return substr(md5(time()), 0, 6);
    }
}
