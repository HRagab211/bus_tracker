<?php

namespace App\Models;

use App\models\Driver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bus extends Model
{
    use HasFactory;

    function driver()
    {
        return $this->hasone(Driver::class);
    }
}
