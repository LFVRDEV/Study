<?php

namespace App\Models\Catalogs;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    use HasFactory;

    protected $table = 'c_towns';
    protected $fillable  = ['name', 'state_id', 'status'];
    protected $hidden = ['id', 'created_at', 'updated_at'];

    public function employees() {
        return $this->hasMany(Employee::class);
    }
}
