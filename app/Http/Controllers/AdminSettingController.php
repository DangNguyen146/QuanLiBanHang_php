<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Post;

use App\Http\Requests\AddSettingRequest;

use App\Models\Setting;

class AdminSettingController extends Controller
{
    private $setting;
    public function __construct(Setting $setting){
        $this->setting = $setting;
    }
    public function index(){
        $settings = $this->setting->latest()->paginate(5);
        return view('admin.setting.index', compact('settings'));
    }
    public function create(){
        return view('admin.setting.add');
    }
    public function store(AddSettingRequest $request){
        $this->setting->create([
            'config_key'=>$request->config_key,
            'config_value'=>$request->config_value,
        ]);
        return redirect()->route('settings.index');
    }
    public function edit($id){
        $settings = $this->setting->find($id);

    }
}
