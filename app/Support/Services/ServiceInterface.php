<?php

namespace App\Support\Services;

interface ServiceInterface
{
    /**
     * @return array|string|int|bool
     */
    public function handle();
}
