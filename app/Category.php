<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    protected $table = 'categories';

    const TYPE_CUSTOME_GARMENTS = 1;
    const TYPE_NON_CUSTOME_GARMENT = 3;


    protected $fillable = ['title', 'description', 'slug', 'position'];


    public function subcategories()
    {
        return $this->hasMany('App\SubCategory', 'category_id');
    }


    public function products()
    {
        return $this->hasMany('App\Product', 'category_id');
    }

    public function garment_options()
    {
        return $this->hasMany('App\GarmentOption', 'category_id');
    }


    public function fabrics()
    {
        return $this->hasMany('App\Fabric', 'category_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            $category->subcategories()->delete();
            $category->products()->delete();
            $category->garment_options()->delete();
            $category->fabrics()->delete();
        });
    }


    public static function getType()
    {

        return [
            self::TYPE_CUSTOME_GARMENTS => 'Custom Garments',
            self::TYPE_NON_CUSTOME_GARMENT => 'Non Custom Garment'
        ];

    }


    public static function getRoutesArray()
    {
        return [
            'categories.create',
            'categories.edit',
            'categories.index'
        ];


    }


    public function addStyles()
    {

    }

    public function getImages()
    {
        return $this->hasOne('App\SystemFile', 'model_id', 'id')->where('model_type', 'App\Category');
    }

    public function getFebricVarient()
    {
        return $this->hasMany('App\FabricVariant', 'category_id');
    }


}
