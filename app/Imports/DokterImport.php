<?php

namespace App\Imports;

use App\Models\Dokter;
use Illuminate\Support\Facades\Hash;
use App\Import\DokterImport;
use Maatwebsite\Excel\Concerns\ToModel;

class DokterImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Dokter([
            'nama'    => $row[0],
            'jabatan' => $row[1],
        ]);
    }
}
