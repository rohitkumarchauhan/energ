<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{


    protected $table = 'cart_items';


    public function user()
    {
        return $this->belongsTo('App\Cart', 'cart_id', 'id');
    }


    public function fabric()
    {
        return $this->belongsTo('App\Fabric', 'fabric_id', 'id');
    }

    public function lining_material()
    {
        return $this->belongsTo('App\LiningMaterial', 'linining_material_id', 'id');
    }

    public function garments()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function getStyles()
    {

//        $styles=GarmentOptionAtrribute::

    }


}
