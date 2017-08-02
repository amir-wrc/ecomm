<?php

namespace App\Logic\Image;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use App\ProductGallery;


class ImageRepository
{
    public function upload( $form_data,$product_id )
    {


        $validator = Validator::make($form_data, ProductGallery::$rules, ProductGallery::$messages);

        if ($validator->fails()) {

            return Response::json([
                'error' => true,
                'message' => $validator->messages()->first(),
                'code' => 400
            ], 400);

        }

        $photo = $form_data['file'];

        $originalName = $photo->getClientOriginalName();
        $extension = $photo->getClientOriginalExtension();
        $originalNameWithoutExt = substr($originalName, 0, strlen($originalName) - strlen($extension) - 1);

        $filename = time().'_'.$this->sanitize($originalNameWithoutExt);
        $allowed_filename = time().'_'.$this->createUniqueFilename( $filename, $extension );


        $uploadSuccess2 = $this->icon( $photo, $allowed_filename );

        if( !$uploadSuccess2 ) {

            return Response::json([
                'error' => true,
                'message' => 'Server error while uploading',
                'code' => 500
            ], 500);

        }

        $sessionImage = new ProductGallery;
        $sessionImage->product_id = $product_id;
        $sessionImage->image      = $allowed_filename;
        $sessionImage->save();
        
        return Response::json([
            'error' => false,
            'code'  => 200
        ], 200);

    }

    public function createUniqueFilename( $filename, $extension )
    {
        $full_size_dir = public_path().'/uploads/product/gallery/';
        $full_image_path = $full_size_dir . $filename . '.' . $extension;

        if ( File::exists( $full_image_path ) )
        {
            // Generate token for image
            $imageToken = substr(sha1(mt_rand()), 0, 5);
            return $filename . '-' . $imageToken . '.' . $extension;
        }

        return $filename . '.' . $extension;
    }

    /**
     * Optimize Original Image
     */
    /**
     * Create Icon From Original
     */
    public function icon( $photo, $filename )
    {
        $manager = new ImageManager();
        $image = $manager->make( $photo )->resize(670, null, function ($constraint) {
            $constraint->aspectRatio();
            })
            ->save( public_path().'/uploads/product/gallery/'  . $filename );

        return $image;
    }

    /**
     * Delete Image From Session folder, based on original filename
     */
    public function delete( $originalFilename, $product_id)
    {

        $icon_size_dir = public_path().'/uploads/product/gallery/';

        $sessionImage = ProductGallery::where('image', 'like', $originalFilename)->first();
        

        if(empty($sessionImage))
        {
            return Response::json([
                'error' => true,
                'code'  => 400
            ], 400);

        }

        $full_path2 = $icon_size_dir . $sessionImage->image;

        

        if ( File::exists( $full_path2 ) )
        {
            File::delete( $full_path2 );
        }

        if( !empty($sessionImage))
        {
            $sessionImage->delete();
        }

        return Response::json([
            'error' => false,
            'code'  => 200
        ], 200);
    }

    function sanitize($string, $force_lowercase = true, $anal = false)
    {
        $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
            "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
            "â€”", "â€“", ",", "<", ".", ">", "/", "?");
        $clean = trim(str_replace($strip, "", strip_tags($string)));
        $clean = preg_replace('/\s+/', "-", $clean);
        $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;

        return ($force_lowercase) ?
            (function_exists('mb_strtolower')) ?
                mb_strtolower($clean, 'UTF-8') :
                strtolower($clean) :
            $clean;
    }
}