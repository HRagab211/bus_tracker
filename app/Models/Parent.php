<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class parent extends Model
{
    public function driver()
    {
        return $this->hasOne(Driver::class);
    }
}
