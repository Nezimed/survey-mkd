<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];

    public function inputs()
    {
        return $this->hasMany(EmployeeInputs::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
