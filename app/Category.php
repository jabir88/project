<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Category;

class Category extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'cate_id';

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'cate_name', 'cate_des', 'cate_img', 'parent_id',
    ];
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
