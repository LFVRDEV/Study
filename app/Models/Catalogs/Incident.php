<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;

    protected $table = 'c_incidents';
    protected $fillable  = ['name', 'type', 'unit', 'amount', 'status'];
    protected $hidden = ['id', 'created_at', 'updated_at'];
}
