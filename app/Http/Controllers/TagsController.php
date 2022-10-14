<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Tags as MainModel;
use Session;
use Illuminate\Support\Str;

class TagsController extends Controller
{
    
    public function showTag(){
        $tag = MainModel::orderBy('id', 'DESC')->get();
        $html = '';
        foreach($tag as $key => $val){
            $html .= '<div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="">'.$val->tagname.'
                            </label>
                            <a href="javascript:removeTagAjax(\''.route('admin.tags.removeTag').'\', '.$val->id.')" class="btn btn-danger btn-xs">X</a>
                        </div>';
        }
        return $html;
    }

    public function addTag(REQUEST $request){
        MainModel::insert([
            'tagname' => $request->tagname,
            'slug' => Str::slug($request->tagname, '-')
        ]);
        return $this->showTag();
    }


    public function removeTag(REQUEST $request){
        $item = MainModel::where('id', $request->id);
        
        $postModel = $item->first();
        $item->delete();
        $postModel->posts()->detach();
        return $this->showTag();
    }

}
