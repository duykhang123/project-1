<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Image;
use Illuminate\Support\Str;
use File;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use HasRoles;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public $folderUpload = 'user';

    public $resize = [
        'thumb' => ['width' => 237],
        'stander' => ['width' => 100]
    ];
    public $search_fill = [
        'id',
        'name',
        'email'

    ];

    const CREATED_AT = 'updated_at';
    const UPDATED_AT = 'created_at';


    public function saveItem($param){
        $data = $param['form'];
        $pictureName = $this->upload($param['picture']);
        $data['picture'] = $pictureName;
        $data['email'] = $param['email'];
        $data['password'] = Hash::make($param['password']);
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['created_at'] = date('Y-m-d H:i:s');
        return $this->insertGetId($data);
        
    }

    public function listItem($param = null){
        $query = $this->select('*');
        if($param['fillter']['status'] != 'default'){
            $query->where('status', $param['fillter']['status'])->get();
        }
        if(!empty($param['search']['value'])){
            if($param['search']['fill'] != 'all'){
                $arr = in_array($param['search']['fill'], $this->search_fill) ? $param['search']['fill'] : 'id';
                $query->where($arr, 'LIKE', '%' . $param['search']['value'] . '%');
            }else{
                foreach($this->search_fill as $key => $val){
                    $query->orWhere($val, 'LIKE', '%' . $param['search']['value'] . '%')->get();
                }
                
            }
        }
        $query = $query->orderBy('id', 'DESC')->paginate(4);
        return $query;
    }

    public function getImg($option = ''){
        $src = asset('image/'.$this->folderUpload.'/'. $this->picture);
        if($option == 'thumb'){
            $src = asset('image/'.$this->folderUpload.'/thumb/'. $this->picture);
        }
        if($option == 'stander'){
            $src = asset('image/'.$this->folderUpload.'/stander/'. $this->picture);
        }
        return $src;
    }

    public function updateProfiles($param){
        $id = $param['id'];
        $data = $param['form'];
        if($param['picture'] != null);{
            $data['picture'] = $this->upload($param['picture']);
        }
        return $this->where('id',$id)->update($data);
    }

    public function upload($objImg){
        $img = Image::make($objImg);
        $random = Str::random(4). '.' . $objImg->getClientOriginalExtension();
        $img->save('image/'.$this->folderUpload.'/'.$random);
        if(isset($this->resize))
        foreach($this->resize as $key => $value){
            $img->resize($value['width'], null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save('image/'.$this->folderUpload.'/'.$key.'/'.$random);
        }
        return $random;
    }

    public function removeImg(){
        $path = public_path('image/'.$this->folderUpload.'/'. $this->picture);
        if(File::exists($path)) {
            File::delete($path);
        }
        if(isset($this->resize))
        foreach($this->resize as $key => $value){
            $path = public_path('image/'.$this->folderUpload.'/'.$key.'/'.$this->picture);
            if(File::exists($path)) {
                File::delete($path);
            }
        }
    }
}
