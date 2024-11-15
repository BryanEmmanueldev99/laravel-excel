<?php

namespace App\Imports;

use App\Models\Producto;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductosImport implements ToCollection, ToModel
{
    private $i;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //dd($collection);
    }

    public function model(array $row)
    {
        $this->i ++;
        if($this->i > 1):
            $producto = new Producto([
                'nombre' =>   $row[0],
                'sku'    =>   $row[1],
                'descripción' => $row[2],
                'precio'    =>   $row[3]
             ]);
            $producto->save();
        endif;
    }
}
