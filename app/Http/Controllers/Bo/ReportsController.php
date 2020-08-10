<?php

namespace App\Http\Controllers\Bo;

use App\Employee;
use App\EmployeeInputs;
use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function index()
    {
        $avg = EmployeeInputs::average();

        $inputs = EmployeeInputs::textInput();

        $totalProjects = Project::count();

        $totalProjectsByClient = Project::countByClient();

        $avgByClient = DB::table('employee_inputs')
                         ->leftJoin('employees', 'employee_inputs.employee_id', '=', 'employees.id')
                         ->leftjoin('projects', 'employees.project_id', '=', 'projects.id')
                         ->leftJoin('clients', 'projects.client_id', '=', 'clients.id')
                         ->whereIn('employee_inputs.question_id', function ($query) {
                             $query->select('id')->from('questions')->where('type', 'range');
                         })
                         ->groupBy('clients.id')
                         ->groupBy('clients.name')
                         ->select('clients.name as name', DB::raw('avg(answer) as average'))
                         ->get();

        return view('bo.report.index', get_defined_vars());
    }
}
