<?php
  
namespace App\Imports;
  
use App\Models\Test;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
  
class Import implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Test([
            'name'     => $row[0],
            'email' => $row[1],
        ]);
    }
}