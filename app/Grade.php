<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'grade';

    protected $fillable = ['grade', 'gaji'];
    // protected $guarded= [];

    public function karyawan()
    {
        // return $this->belongsTo(Karyawan::class);
        return $this->hasMany(Karyawan::class);
    }
}