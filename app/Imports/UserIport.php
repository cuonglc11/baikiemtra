<?php

namespace App\Imports;

use App\ex;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;


class UserIport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ex([
          

            'email' => $row[0],
            'price' =>  $row[1]
        ]);
    }
    // public function onError(Thorowable $eror)
}
