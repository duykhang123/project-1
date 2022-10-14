<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Product as MainModel;
use Session;

class ProductController extends Controller
{
    public $path = 'product';
    public $controllerName = 'product.element';
    public function __construct()
    {
        view()->share('path', $this->path);
        view()->share('controllerName', $this->controllerName);
    }
    public function index(REQUEST $request){
        $param['fillter']['status'] = $request->input('fillter_status','default');

        $param['fillter']['category'] = $request->input('fillter_category','all');
        $param['search']['fill'] = $request->input('search_fill','all');
        $param['search']['value'] = $request->input('search_value','');

        $main = new MainModel;
        $item = $main->listItem($param);
        return view('admin.'.$this->path.'.index')->with('item', $item)->with('param', $param);
    }

    public function delete(REQUEST $request){
        $item = $request->cid;
        if(count($item) > 0){
            foreach($item as $key => $id){
                $item = MainModel::find($id);
                $item->removeImg();
                $item->delete();
            }
            
        }
        Session::flash('success', 'Bạn đã xóa thành công');
        return redirect()->back();
    }

    public function changeStatus($status,REQUEST $request){
        $status = $status == 'active' ? 'inactive' : 'active';
        MainModel::where('id',$request->id)->update(['status' => $status]);
        $reponsie = [
            'link' => route('admin.'.$this->path.'.changeStatus', ['status' => $status]),
            'id' => $request->id,
            'status'=> $status
        ];
        return response($reponsie);
    }

    public function changeSpecial($special,REQUEST $request){
        $special = $special == 'yes' ? 'no' : 'yes';
        MainModel::where('id',$request->id)->update(['special' => $special]);
        $reponsie = [
            'link' => route('admin.'.$this->path.'.changeSpecial', ['special' => $special]),
            'id' => $request->id,
            'special'=> $special
        ];
        return response()->json($reponsie);
    }

    public function changePublic (REQUEST $request){
        $item = $request->cid;
        if(!empty($item)){
            foreach($item as $key => $id){
                MainModel::where('id',$id)->update(['status' => $request->status]);
            }
        }
        return redirect()->back();
    }


    public function changeOrdering(REQUEST $request){
        $item = $request->ord;
        if(!empty($item)){
            foreach($item as $key => $order){
                MainModel::where('id',$key)->update(['ordering' => $order]);
            }
        }
        return redirect()->back();
    }

    public function save(REQUEST $request){

        $validatedData = $request->validate([
            'form.name' => ['required', 'min:3', 'max:100'],
            'form.description' => ['required', 'min:3', 'max:255'],
            'form.status' => ['in:active,inactive']
        ],
        [
            'required' => ':attribute không được rỗng',
            'min' => ':attribute ít nhất :min kí tự',
            'mã' => ':attribute vượt quá :max kí tự',
            'in' => ':attribute chưa được chọn'
        ],
        [
            'form.name' => 'Tên',
            'form.description' => 'Mô tả',
            'form.status' => 'Trạng thái'
        ]);

        $param = $request->all();
        $main = new MainModel;
        $item = $main->saveItem($param);

        if($request->type=='new'){
            return redirect()->route('admin.'.$this->path.'.form');
        }
        if($request->type=='close'){
            return redirect()->route('admin.'.$this->path.'.index');
        }
        if($request->type=='save'){
            return redirect()->route('admin.'.$this->path.'.form', ['id' => $item]);
        }

    }

    public function form(REQUEST $request){
        $item = [];
        if(isset($request->id)){
            $item = MainModel::find($request->id);
        }
        return view('admin.'.$this->path.'.form')->with('item', $item);
    }
}