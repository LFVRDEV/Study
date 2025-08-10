<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $table = 'c_banks';
    protected $fillable  = ['name', 'status'];
    protected $hidden = ['id', 'created_at', 'updated_at'];
}
