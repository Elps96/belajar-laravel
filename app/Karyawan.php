<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Karyawan extends Authenticatable
{
    protected $table = ('karyawan');

    protected $guarded = [];

    //protected $fillable = ['nama', 'grade_id', 'email', 'jenis_kelamin', 'tanggal_lahir', 'tanggal_masuk', 'password', 'image'];

    public function grade()
    {
        //return $this->hasOne(Grade::class);
        return $this->belongsTo(Grade::class);
    }
    
    protected $hidden = [
        'password', 'remember_token'
    ];
    
    public function setPasswordAttribute($val)
    {
        return $this->attributes['password'] = bcrypt($val);
    }
}