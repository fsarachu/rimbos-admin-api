<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;

class FileController extends AdminBaseController
{
    /**
     * Serve a non-public file.
     *
     * @param  string $file_path
     * @return \Illuminate\Http\Response
     */
    public function __invoke($file_path)
    {
        if (!Storage::disk('local')->exists($file_path)) {
            abort(404);
        }

        $local_path = config('filesystems.disks.local.root') . DIRECTORY_SEPARATOR . $file_path;

        return response()->file($local_path);
    }
}
