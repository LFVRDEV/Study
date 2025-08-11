<?php

namespace App\Models;

use App\Models\Catalogs\Bank;
use App\Models\Catalogs\Branch;
use App\Models\Catalogs\Company;
use App\Models\Catalogs\Department;
use App\Models\Catalogs\Payroll;
use App\Models\Catalogs\Position;
use App\Models\Catalogs\State;
use App\Models\Catalogs\Town;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    use HasFactory;

    protected $table = 't_employees';
    protected $hidden = ['created_at', 'updated_at'];

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function payroll() {
        return $this->belongsTo(Payroll::class);
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function position() {
        return $this->belongsTo(Position::class);
    }

    public function branch() {
        return $this->belongsTo(Branch::class);
    }

    public function bank() {
        return $this->belongsTo(Bank::class);
    }

    public function state() {
        return $this->belongsTo(State::class);
    }

    public function town() {
        return $this->belongsTo(Town::class);
    }
}