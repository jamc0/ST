<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Image;
class ImageController extends Controller
{
    //
    public function index()
    {
    	return view('adminlte::image.image');
    }

    public function UploadImage(Request $request)
    {
    	$data = $request->all();
    	$file = $data['image'];
    	$random = str_random(10);
    	$nombre = $random.'-'.$file->getClientOriginalName();
    	$path = public_path('img/'.$nombre);
    	$url = '/img/'.$nombre;
    	$image = Image::make($file->getRealPath());
    	$image->save($path);
    	return '<img src="'.$url.'"/>';
    }

    public static function GuardarImagen($imagen, $nombre)
    {
    	$random = str_random(10);
    	$path = 'img/personas/'.$random.$nombre;
    	
    	$image = Image::make($imagen->getRealPath());
        $image->resize(90, 90);
    	$image->save($path);
    	return $random.$nombre;
    }
    public static function GuardarImagenProducto($imagen, $nombre)
    {
        $random = str_random(10);
        $path = 'img/productos/'.$random.$nombre;
        
        $image = Image::make($imagen->getRealPath());
        $image->resize(90, 90);
        $image->save($path);
        return $random.$nombre;
    }

    public static function GuardarImagen150($imagen, $nombre)
    {
        $random = str_random(10);
        $path = 'img/personas/'.$random.$nombre;
        
        $image = Image::make($imagen->getRealPath());
        $image->resize(150, 150);
        $image->save($path);
        return $random.$nombre;
    }
}
