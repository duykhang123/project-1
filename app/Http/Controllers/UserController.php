<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User as MainModel;
use Session;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class UserController extends Controller
{
    public $path = 'user';
    public $controllerName = 'user.element';
    public function __construct()
    {
        view()->share('path', $this->path);
        view()->share('controllerName', $this->controllerName);
    }
    public function index(REQUEST $request){
        $param['fillter']['status'] = $request->input('fillter_status','default');

        

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
            'form.username' => ['required', 'min:3', 'max:100'],
            'email' => ['required', 'email','unique:users'],
            'form.status' => ['in:active,inactive'],
            'password' => ['required', 'confirmed','min:6']
        ],
        [
            'required' => ':attribute không được rỗng',
            'min' => ':attribute ít nhất :min kí tự',
            'mã' => ':attribute vượt quá :max kí tự',
            'in' => ':attribute chưa được chọn',
            'confirmed' => ':attribute không trùng khớp',
        ],
        [
            'form.name' => 'Tên',
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
        if(isset($request->id)){
            $item = MainModel::find($request->id);
            return view('admin.'.$this->path.'.formEdit')->with('item', $item);
        }
        return view('admin.'.$this->path.'.form');
    }

    public function changeProfile (REQUEST $request){
        $param = $request->all();
        $main = new MainModel;
        $item = $main->updateProfiles($param);

        return redirect()->route('admin.' .$this->path .'.index');
    }

    public function changePass(REQUEST $request){   
        $validatedData = $request->validate([
            'password' => ['required', 'confirmed','min:6']
        ],
        [
            'required' => ':attribute không được rỗng',
            'min' => ':attribute ít nhất :min kí tự',
            'mã' => ':attribute vượt quá :max kí tự',
            'in' => ':attribute chưa được chọn',
            'confirmed' => ':attribute không trùng khớp',
            'unique' => ':attribute đã tồn tại'
        ]);
        $password = Hash::make($request->password);
        MainModel::where('id', $request->id)->update(['password' => $password]);
        return redirect()->route('admin.' .$this->path .'.index');
    }

    public function show(){
        //$role = Role::create(['name' => 'publisher']);
        //$permission = Permission::create(['name' => 'delete banner']);

        $role = Role::find(4);
        $permission = Permission::find(8);

        $role->givePermissionTo($permission);
        //$permission->assignRole($role);
        //$user = MainModel::find(2);
        //$user->assignRole('editer');
        //auth()->user()->assignRole('editer');

        //auth()->user()->syncPermissions(['delete post','add post']);
        //$user = auth()->user()->getDirectPermissions();
        
        return view('admin.'.$this->path.'.show');
    }
}
