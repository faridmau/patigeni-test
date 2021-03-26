<?php

namespace App\Exports;

use App\Models\Resident;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

class ResidentExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Resident::all();
    }
    public function headings(): array
    {
        return [
            'Id',
            'Nik',
            'Nama',
            'Alamat',
            'DOB',
            'Telepon',
            'Pekerjaan',
            'Gender',
            'Agama',
            'Status',
            'Foto URL',
            'Tanggal Dibuat',
            'Tanggal Diupdate',
        ];
    }
}
