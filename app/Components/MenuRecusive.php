<?php

namespace App\Components;

use App\Models\Menu;

class MenuRecusive{
    private $html;

    public function __contruct(){   //chạy khi new MenuRecusive
        $this->html='';
    }

    public function menuRecusiveAdd($parentId=0, $subMark=''){
        $data= Menu::where('parent_id', $parentId)->get();
        foreach($data as $value){
            $this->html.= '<option value="'. $value->id . '">'.$subMark. $value->name. '</option>';
            $this->menuRecusiveAdd($value->id, subMark: $subMark . '--');
        }
        return $this->html;
    }
    public function menuRecusiveEdit($menuIdEdit, $parentId=0, $subMark=''){
        $data= Menu::where('parent_id', $parentId)->get();
        foreach($data as $value){
            if ($menuIdEdit==$value->id) {
                $this->html.= '<option selected value="'. $value->id . '">'.$subMark. $value->name. '</option>';
            }
            else{
                $this->html.= '<option value="'. $value->id . '">'.$subMark. $value->name. '</option>';
            }
            $this->menuRecusiveEdit($menuIdEdit ,$value->id, $subMark . '--');
        }
        return $this->html;
    }
}
