<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Components\Recusive;



class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category){
        $this->category =$category;
    }

    public function create(){
        $htmlOption = $this->getCategory();

        return view( 'admin.category.add', compact('htmlOption'));

    }

    // //đệ quy
    // function categoryRecusive($id, $text=''){
    //     $data= Category::all();
    //     foreach($data as $value){
    //         if($value['parent_id'] ==  $id){
    //             $this->htmlSelect.= "<option>".$text. $value['name']. "</option>";
    //             $this->categoryRecusive($value['id'], $text.'-');
    //         }
    //     }
    //     return $this->htmlSelect;
    // }


    public function index(){
        $categories = $this->category->latest()->paginate(5); //số bản ghi trên 1 trang
        return view('admin.category.index', compact('categories'));
    }


    public function store(Request $request){
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug'=> str::slug($request->name)
        ]);

        return redirect()->route(route:'categories.index');
    }

    public function getCategory($parentId=''){
        $data= $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function update($id, Request $request){
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug'=> str::slug($request->name)
        ]);
        return redirect()->route(route:'categories.index');
    }

    public function edit($id){
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);

        return view('admin.category.edit', compact('category', 'htmlOption'));
    }
    public function delete($id){
        $this->category->find($id)->delete();
        return redirect()->route('categories.index');
    }
}
