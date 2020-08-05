<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    protected $guarded = [];

    public static function findByUuid($uuid)
    {
        return self::where('uuid', $uuid)->first();
    }

    public static function countByClient()
    {
        return self::with('client')->groupBy('client_id')->select('client_id', DB::raw('count(*) as total'))->get();
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
