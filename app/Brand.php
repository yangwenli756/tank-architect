<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'shop_brand';
    protected $primaryKey = 'brand_id';
    public $timestamps = false;
    //黑名单
    protected $guarded=[];
}
