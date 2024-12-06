<?php

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

if (!function_exists('handaleFileUpload')) {
    function handaleFileUpload(UploadedFile $file, $folder = 'default')
    {
        if (!$file->isValid()) {
            abort(422, 'Invalid file');
        }

        $extension = $file->getClientOriginalExtension();
        $folderType = in_array($extension, ['jpg', 'jpeg', 'png', 'gif']) ? 'images' : 'files';

        $path = Storage::disk('public')->putFile("$folderType/$folder", $file);

        if (!$path) {
            abort(500, 'Error occurred while moving the file');
        }

        // Return only the file path as a string
        return $path;
    }
}


if (!function_exists('newUpload')) {
    function newUpload(UploadedFile $mainFile, string $uploadPath, ?int $reqWidth = null, ?int $reqHeight = null): array
    {
        try {
            $originalName     = pathinfo($mainFile->getClientOriginalName(), PATHINFO_FILENAME);
            $fileExtention    = $mainFile->getClientOriginalExtension();
            $currentTime      = Str::random(10) . time();
            $name = Str::limit($originalName, 100);
            $fileName = $currentTime . '.' . $fileExtention ;
            $fullUploadPath  = "public/$uploadPath";

            // Ensure directory exists
            if (!Storage::exists($fullUploadPath)) {
                // Create directory
                $localPath = storage_path("app/$fullUploadPath");
                if (!mkdir($localPath, 0755, true)) {
                    abort(404, "Failed to create the directory: $fullUploadPath");
                }
                // Ensure directory permissions are set correctly
                chmod($localPath, 0755);
            }

            // Store the file
            try {
                $mainFile->storeAs($fullUploadPath, $fileName);
                $filePath = "$uploadPath/$fileName";
            } catch (\Exception $e) {
                abort(500, "Failed to store the file: " . $e->getMessage());
            }

            $output = [
                'status'         => 1,
                'file_name'      => $fileName,
                'file_extension' => $mainFile->getClientOriginalExtension(),
                'file_size'      => $mainFile->getSize(),
                'file_type'      => $mainFile->getMimeType(),
                'file_path'      => $filePath,
            ];

            return array_map('htmlspecialchars', $output);
        } catch (\Exception $e) {
            return [
                'status' => 0,
                'error_message' => $e->getMessage(),
            ];
        }
    }
}
