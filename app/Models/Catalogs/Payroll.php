<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    //
    use HasFactory;

    protected $table = 'c_payrolls';
    protected $fillable = ['name', 'days', 'status'];
    protected $hidden = ['id', 'created_at', 'updated_at'];
}
