<?php

namespace App\Exports;

// use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\FromArray;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

// class UsersExport implements FromCollection, WithCustomStartCell
class UsersExport implements FromView, WithCustomStartCell
{

    // protected  $model;

    public function __construct($model)
    {
        $this->model = $model;

    }

    public function startCell(): string
        {
                return 'd1';
        }

    public function view(): View
       {

        $model = 'App\\Models\\'.ucfirst($this->model);
        // dd($model);
            return view('excel', [
                'users' => $model::all()
            ]);
    }

    // public function collection()
    // {
    //     // return $this->model;
    //     // return User::all();
    //     // return $this->name;

        // $model = 'App\\Models\\'.ucfirst($this->model);
        // return $this->model->all();
    //     // return $data;
    // }


}

//     class UsersExport implements FromArray
// {
//     protected $users;

//     public function __construct(array $users)
//     {
//         $this->users = $users;
//     }

//     public function array(): array
//     {
//         return $this->users;
//     }
// }

