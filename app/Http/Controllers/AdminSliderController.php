<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\SilderAddRequest;

use App\Models\Slider;


use App\Traits\StrongeImageTrait;

class AdminSliderController extends Controller
{
    use StrongeImageTrait;
    private $slider;
    public function __construct(Slider $slider){
        $this->slider=$slider;
    }
    public function index(){
        $sliders = $this->slider->latest()->paginate(5);
        return view('admin.slider.index', compact('sliders'));
    }
    public function create(){
        return view('admin.slider.add');
    }
    public function store(SilderAddRequest $request){
        try{
            $dataInsert=[
                'name' => $request->name,
                'description' => $request->description
            ];
            $dataImageSilder = $this->strongeImageTrait($request,'image_path', 'slider');

            if(!empty($dataImageSilder)){
                $dataInsert['image_name'] = $dataImageSilder['file_name'];
                $dataInsert['image_path'] = $dataImageSilder['file_path'];
            }
            $this->slider->create($dataInsert);
            return redirect()->route('slider.index');
        }catch(\Exception $exception){
            Log::error('Lỗi: ' . $exception->getMessage() . '---Line: '. $exception->getLine());
        }
    }
    public function edit($id){
        $slider = $this->slider->find($id);
        // dd($slider);
        return view('admin.slider.edit', compact('slider'));
    }
    public function update(Request $request, $id){
        try{
            $dataUpdate=[
                'name' => $request->name,
                'description' => $request->description
            ];
            $dataImageSilder = $this->strongeImageTrait($request,'image_path', 'slider');

            if(!empty($dataImageSilder)){
                $dataUpdate['image_name'] = $dataImageSilder['file_name'];
                $dataUpdate['image_path'] = $dataImageSilder['file_path'];
            }
            $this->slider->find($id)->update($dataUpdate);
            return redirect()->route('slider.index');
        }catch(\Exception $exception){
            Log::error('Lỗi: ' . $exception->getMessage() . '---Line: '. $exception->getLine());
        }
    }
    public function delete($id){
        try{
            $this->slider->find($id)->delete();
            return response()->json([
                'code'=>200,
                'message'=>'Delete success'
            ],200);
        }catch(\Exception $exception){
            Log::error('Lỗi: ' . $exception->getMessage() . '---Line: '. $exception->getLine());
            return response()->json([
                'code'=>500,
                'message'=>'Delete fail'
            ],500);
        }
    }

}
