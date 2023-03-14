<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable =['name','phone','national_id','license_id','bus_id','image'];
    public $timestamps = false;


    public function bus()
    {
       return $this->belongsTo(Bus::class);
    }

}
