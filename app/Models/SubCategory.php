<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table ='sub_category';

    Static public function getRecord(){
        return self::select('sub_category.*','users.name as created_by_name','category.name as category.name')
        ->join('category','category_id','=','sub_category.category_id')
        ->join('users','users_id','=','sub_category.created_by')
        ->where('sub_category.is_delete','=',0)
        ->orderBy('sub_category.id', 'desc')
        ->paginate(20);
        
    }
    public function Category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

}
