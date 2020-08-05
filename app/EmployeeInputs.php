<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeInputs extends Model
{
    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }

    public static function average()
    {
        return self::whereIn('question_id', function ($query) {
            $query->select('id')->from('questions')->where('type', 'range');
        })->avg('answer');
    }

    public static function textInput()
    {
        return self::with('employee')->with('question')->whereIn('question_id', function ($query) {
            $query->select('id')->from('questions')->where('type', 'free');
        })->orderBy('employee_id')->orderBy('question_id')->get();
    }
}
