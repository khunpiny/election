<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';
    protected $fillable = [
     'area_name', 'admin_id',
    ];
    protected $primaryKey = 'id';
}
