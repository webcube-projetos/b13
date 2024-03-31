<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function storeImageBase64($image, $path)
    {
        if ($image) {

            $decodedImage = base64_decode($image);

            if (!Storage::exists('public/assets/img/' . $path)) {
                Storage::makeDirectory('public/assets/img/' . $path);
            }

            $nomeImagem = uniqid() . '.jpg';
            Storage::put('public/assets/img/' . $path . '/' . $nomeImagem, $decodedImage);

            return 'storage/assets/img/' . $path . '/' . $nomeImagem;
        }
    }
}
