<?php

namespace App\Service;

class NisGenerator
{
    public function generate(): string
    {
        return substr(str_shuffle(str_repeat('0123456789', 11)), 0, 11);
    }
}