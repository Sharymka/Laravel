<?php

namespace App\Services\Interfaces;

interface SaverFiles
{
    public function saveInStorage($file, $path): array;

}
