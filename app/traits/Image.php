<?php

namespace App\traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

trait Image
{
    /**
     * Upload an image to the specified storage disk and path.
     *
     * @param UploadedFile $file
     * @param string $path
     * @param string $disk
     * @return string|null
     */
    public function uploadImage(UploadedFile $file, string $path = 'uploads', string $disk = 'public'): ?string
    {
        $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs($path, $filename, $disk);
        return $filePath ? Storage::disk($disk)->url($filePath) : null;
    }

    /**
     * Delete an image from the specified storage disk and path.
     *
     * @param string $filePath
     * @param string $disk
     * @return bool
     */
    public function deleteImage(string $filePath, string $disk = 'public'): bool
    {
        return Storage::disk($disk)->exists($filePath) && Storage::disk($disk)->delete($filePath);
    }
}
