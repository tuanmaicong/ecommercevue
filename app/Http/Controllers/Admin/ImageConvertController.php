<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageConvertController extends Controller
{
    public function convertToWebP()
    {
        $imageDirectory = public_path('storage/avatar'); // Replace with the actual directory path where the images are located

        // Get all files from the image directory
        $files = File::files($imageDirectory);

        // Loop through each file
        foreach ($files as $file) {
            $filePath = $file->getPathname();
            if (File::isFile($filePath) && in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png'])) {
                $webpImagePath = $filePath . '.webp';

                // Load ảnh gốc
                $image = imagecreatefromstring(file_get_contents($filePath));

                // Tạo và lưu ảnh dưới định dạng WebP
                imagewebp($image, $webpImagePath, 100);

//                 Xóa ảnh gốc nếu muốn
                 unlink($filePath);
                return response()->json(['message' => 'Convert successfully']);
            }
        }
    }
}
