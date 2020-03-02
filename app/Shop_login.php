<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop_login extends Model
{
    protected $table = 'shop_login';
    protected $primaryKey = 'l_id';
    public $timestamps = false;
    //黑名单
    protected $guarded = [];
    //白名单
}
