<?php

namespace App\Imports;

use App\Penduduk;
use Maatwebsite\Excel\Concerns\ToModel;

class PendudukImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Penduduk([
            
            'provinsi'          => $row[1],
            'kabupaten'         => $row[2],
            'kecamatan'         => $row[3],
            'status'            => $row[4],
            'kode_pum'          => $row[5],
            'kelurahan'         => $row[6],
            'tanggal'           => $row[7],
            'tanggal_str'       => $row[8],
            'laki_laki'         => $row[9],
            'perempuan'         => $row[10],
            'jumlah_penduduk'   => $row[11],
            'jumlah_kk'         => $row[12],
            'kepadatan'         => $row[13],
        ]);
    }
}
