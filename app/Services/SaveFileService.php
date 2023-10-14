<?php

namespace App\Services;

use App\Services\Interfaces\SaverFiles;
use Illuminate\Support\Facades\Storage;

class SaveFileService implements SaverFiles
{

    public function saveInStorage($file, $path): array
    {
        $originName = $file->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $fileName = $fileName . '_' . time() . '.' . $extension;

        $file->storeAs($path, $fileName);
        $url = Storage::url($path . $fileName);

        return [
            'fileName' => $fileName,
            'url' => $url
        ];
    }
}
