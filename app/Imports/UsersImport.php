<?php

namespace App\Imports;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class UsersImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        // dd($rows);
        foreach($rows as $row){
            User::create([
                'name' => $row['name'],  // Corresponde a la columna 1 en Excel
                'app' => $row['app'],  // Corresponde a la columna 2 en Excel
                'apm' => $row['apm'],  // Corresponde a la columna 3 en Excel
                'email' => $row['email'],  // Corresponde a la columna 4 en Excel
                'password' => $row['password'],  // Corresponde a la columna 5 en Excel
                'carrera' => $row['carrera'],  // Corresponde a la columna 6 en Excel
                'matricula' => $row['matricula'],  // Corresponde a la columna 7 en Excel
                'nss' => $row['nss'],  // Corresponde a la columna 8 en Excel
                'fecha_nac' => Carbon::instance(Date::excelToDateTimeObject($row['fecha_nac']))->format('Y-m-d'),  // Corresponde a la columna 9 en Excel
                'sexo' => $row['sexo'],  // Corresponde a la columna 10 en Excel
                'genero' => $row['genero'],  // Corresponde a la columna 11 en Excel
                'rol_id' => $row['rol'],  // Corresponde a la columna 12 en Excel
            ]);
        }
        
    }
}
