<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Image;
use Illuminate\Support\Str;
use File;
class Post extends Model
{
    use HasFactory;

    public $folderUpload = 'post';

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tags' , 'tag_post', 'post_id', 'tag_id');
    }

    

    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }

    protected $fillable = [
        'name',
        'description',
        'content','picture','status','meta_title','meta_description','meta_keyword','slug','ordering','categories_id','created_at','updated_at'
    ];
    
    public $resize = [
        'thumb' => ['width' => 237],
        'stander' => ['width' => 100]
    ];

    public $search_fill = [
        'id',
        'name',
        'description'

    ];

    const CREATED_AT = 'updated_at';
    const UPDATED_AT = 'created_at';


    public function saveItem($param){
        $data = $param['form'];
        if(!isset($param['id'])){
            $pictureName = $this->upload($param['picture']);
            $data['picture'] = $pictureName;
            $data['updated_at'] = date('Y-m-d H:i:s');
            $data['created_at'] = date('Y-m-d H:i:s');
            

            //$this->insertGetId($data);
            


            $post = $this->create($data);
            $post->tags()->attach($param['tagId']);
            
        }else{
            $item = $this->where('id',$param['id']);
            if(isset($param['picture'])){
                $pictureName = $this->upload($param['picture']);
                $data['picture'] = $pictureName;
                $this->where('id',$param['id'])->first()->removeImg();
            }
            
            $item->update($data);
            $postModel = $item->first();
            $postModel->tags()->sync($param['tagId']);
        }
        
    }

    public function listItem($param = null){
        $query = $this->select('*');
        if($param['fillter']['status'] != 'default'){
            $query->where('status', $param['fillter']['status'])->get();
        }
        if($param['fillter']['category'] != 'all'){
            $query->where('categories_id', $param['fillter']['category'])->get();
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
