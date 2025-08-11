<?php

namespace App\Models\Catalogs;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'c_departments';
    protected $fillable  = ['name', 'status'];
    protected $hidden = ['id', 'created_at', 'updated_at'];

    public function employee() {
        return $this->hasMany(Employee::class);
    }
}
