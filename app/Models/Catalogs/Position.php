<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = 'c_positions';
    protected $fillable  = ['name', 'status'];
    protected $hidden = ['id', 'created_at', 'updated_at'];
}
