<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{

    protected $fillable = ['title', 'description', 'slug', 'category_id', 'parent_id'];

    public function category()
    {
        return $this->belongsTo('app\Category', 'category_id', 'id');

    }


}
