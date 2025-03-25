<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use File;

trait FileUpload {
    public function uploadFile(UploadedFile $file, string $directory = 'uploads') : string {
        $filename = 'educore_'.uniqid().'.'.$file->getClientOriginalExtension();
        $file->storeAs($directory, $filename, 'public');

        return '/'.$directory.'/'.$filename;
    }

    public function deleteFile(string $path) : bool {
        if(File::exists(public_path($path))) {
            File::delete(public_path($path));
            return true;
        }
        return false;
    }
}