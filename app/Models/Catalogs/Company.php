<?php

namespace App\Models\Catalogs;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    use HasFactory;

    protected $table = 'c_companies';
    protected $fillable  = ['name', 'rfc', 'employer_id', 'address', 'status'];
    protected $hidden = ['id', 'created_at', 'updated_at'];

    public function employees() {
        return $this->hasMany(Employee::class);
    }
}
