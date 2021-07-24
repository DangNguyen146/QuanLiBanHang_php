<?php
namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait StrongeImageTrait{
    public function strongeImageTrait($request, $fieldName, $foderName){
        if($request->hasFile($fieldName)){
            $file =$request->$fieldName;
            $fileNameOrigin =  $file->getClientOriginalName();
            $fileNameHash = Str::random(20).'.'.$file->getClientOriginalExtension();
            $filePath = $request->file($fieldName)->storeAs('public/'. $foderName. '/' .auth()->id(), $fileNameHash);
            $dataUploadTrait =[
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath)
            ];
            return $dataUploadTrait;
        }
        return null;
    }
    //upload mulltifile
    public function strongeImageTraitMulltifile($file, $foderName)
    {
        $fileNameOrigin =  $file->getClientOriginalName();
        $fileNameHash = Str::random(20).'.'.$file->getClientOriginalExtension();
        $filePath = $file->storeAs('public/'. $foderName. '/' .auth()->id(), $fileNameHash);
        $dataUploadTrait =[
            'file_name' => $fileNameOrigin,
            'file_path' => Storage::url($filePath)
        ];
        return $dataUploadTrait;
    }
}
