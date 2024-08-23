<?php
namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait ImagesTrait
{
    //  "imgs_autosmotos" -> S3
    protected $storage_path = 'wipersite';

    //  "s3"
    //  "public"
    protected $disk = 's3';


    public function storeImage( $image, $path )
    {
        if( $image ){
            $paths3 = Storage::disk( $this->disk )->put( $image, $path );
            $paths3 = Storage::disk('s3')->url($path);
            
            if( $paths3 )
                return $fileUrl;
        }

        return FALSE;
    }

    public function updateImage($model, $image)
    {
        if( $image ){
            
            $imagePath = $model->getRawOriginal()['picture'];
            $exploding= explode('/',$imagePath);
            
            $imageStored = Image::make( Storage::disk( $this->disk )->get( $imagePath ) );
            
            $originalHeight = $imageStored->height();

            //$this->destroyStoredImage( $imagePath );
            
            $imgFile = Image::make( $image->getRealPath() );

            if( $imgFile->height() > $originalHeight )
                $imgFile->heighten( $originalHeight );

            $imgFile->orientate();
            $imgFile->encode('jpg');
            $hashedFile = hash_file( 'md5', $image->getRealPath() );

            $fileUrl = $this->getStoreUrl( "{$exploding[1]}/{$model->id}-{$hashedFile}.jpg" );
            
            $imageStored = Storage::disk( $this->disk )->put( $fileUrl, $imgFile );
            
            if( $imageStored )
                return $fileUrl;
        }

        return FALSE;
    }

    public function destroyImage( $model )
    {
        if( $model->image ){
        	$model->image->delete();
            return TRUE;
        }

        return FALSE;
    }

    public function destroyStoredImage( $image )
    {   
        $file_path = $this->parseFileUrl( $image );

        if( $image )
            return Storage::disk( $this->disk )->delete( $file_path );

        return FALSE;
    }

    public function getStorageUrl($path) {
        $s3 = Storage::disk('s3')->getAdapter()->getClient();
        return $s3->getObjectUrl(env('AWS_BUCKET'), $path);
    }


    public function getStoreUrl( $filePath ) {
            
        $fileUrl;
        
        $fileUrl = $this->disk !== 'public'
                        ? "{$this->storage_path}/{$filePath}"
                        : $filePath;

        return $fileUrl;
    }
}
