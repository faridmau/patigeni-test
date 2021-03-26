<?php

namespace App\Imports;

use App\Models\Resident;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
class ResidentImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Resident([
            'id' => $row[0],
            'nik' => $row[1],
            'nama' => $row[2],
            'alamat' => $row[3],
            'DOB' => $row[4],
            'telepon' => $row[5],
            'pekerjaan' => $row[6],
            'gender' => $row[7],
            'agama' => $row[8],
            'status' => $row[9],
        ]);
    }
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }
}
