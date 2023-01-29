<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    public function getFullNameAttribute()
    {
        return $this->status_karyawan == 1 ? 'Aktif' : 'Tidak Aktif';
    }
}
