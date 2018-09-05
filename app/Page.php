<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //

    const TYPE_PRIVACY = "Privacy";
    const TYPE_TERMS = "Terms And Condition";
    const TYPE_About = "About Us";
    const TYPE_CONTACT = "Contact Us";
    protected $fillable = ['title', 'description', 'type_id', 'state_id'];

    public function getType()
    {

        return [
            self::TYPE_About => 'About us',
            self::TYPE_PRIVACY => 'Privacy',
            self::TYPE_TERMS => 'Terms And Condition',
            self::TYPE_CONTACT => 'Contact Us'


        ];
    }

    public static function getRoutesArray()
    {

        return [
            'pages.edit',
            'pages.index',
            'pages.create',

        ];
    }


}
