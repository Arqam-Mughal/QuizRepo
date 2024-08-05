<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelController extends Controller
{
    public function export(){
        // $user = new User();
        // $users = new UsersExport('User');
        return Excel::download(new UsersExport('user'), 'users.xlsx');
        // return Excel::download(new UsersExport, 'users.csv');
        // return Excel::download(new UsersExport, 'users.tsv');
        // return Excel::download(new UsersExport, 'users.ods');
        // return Excel::download(new UsersExport, 'users.XLS');
        // return Excel::download(new UsersExport, 'users.HTML');

        // return Excel::download(new UsersExport, 'file.DOMPDF');
    }
}
