<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportExcel implements ToCollection, ToModel
{
    private $num = 0;

    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //dd($collection);
    }

    public function model(array $row)
    {
        $this->num ++;
        if($this->num > 1):
              $user = new User();
              $user->name = $row[0];
              $user->email = $row[1];
              $user->password = Hash::make($row[2]);
              $user->save();
        endif;

        //dd($row);
    }
}
