<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Static_;

class Category extends Model
{
    use HasFactory;
    
    protected $table= 'categories';


    Static public function getSingle($id){
        return self::find($id);
    }

    Static public function getRecord(){
        return self::select('category.*','users.name as created_by_name')
        ->join('users','user_id','=','category.created_by')
        ->where('category.is_delete','=','0')
        ->orderBy('category.id', 'desc')
        ->get();
    }
    
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }



    
}
