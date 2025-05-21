<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengurus extends Model
{
    use hasFactory;
    protected $table = 'pengurus';

    protected $fillable = [
        'nama_lengkap',
        'alamat',
        'kelurahan',
        'kecamatan',
        'no_hp',
        'email',
        'jabatan',
        'rumah_ibadah_id',
        'password'
    ];

    public function rumahIbadah()
    {
        return $this->belongsTo(RumahIbadah::class, 'rumah_ibadah_id');
    }
}
