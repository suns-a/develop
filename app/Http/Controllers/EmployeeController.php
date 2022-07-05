<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Exports\EmployeeExport;
use Excel;
use App\Imports\EmployeeImport;

class EmployeeController extends Controller
{
    public function addEmployee()
    {
        $employees = [
            ["name"=>"Alice" , "email"=>"alice@gmail.com","phone"=>"1234567890","salary"=>"20000","department"=>"Accounting"],
            ["name"=>"Andrew" , "email"=>"andrew@gmail.com","phone"=>"1234567891","salary"=>"21000","department"=>"Marketting"],
            ["name"=>"Mike" , "email"=>"mike@gmail.com","phone"=>"1234567892","salary"=>"22000","department"=>"Quality"],
            ["name"=>"Smith" , "email"=>"smith@gmail.com","phone"=>"1234567893","salary"=>"21000","department"=>"Accounting"],
            ["name"=>"Neo" , "email"=>"neo@gmail.com","phone"=>"1234567894","salary"=>"22000","department"=>"Marketting"]
        ];
        Employee::insert($employees);
        return "Records are inserted";
    }

    public function exportIntoExcel()
    {
        return Excel::download(new EmployeeExport, 'employeelist.xlsx');
    }

    public function exportIntoCSV()
    {
        return Excel::download(new EmployeeExport, 'employeelist.csv');
    }

    public function importForm()
    {
        return view('import-form');
    }

    public function import(Request $request)
    {
        Excel::import(new EmployeeImport, $request->file);
        return "Record are imported successfully!";
    }
}
