<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RumahIbadah extends Model
{
    use HasFactory;
    protected $table = 'rumah_ibadah';

    protected $fillable = [
        'nama_rumah_ibadah',
        'alamat',
        'kelurahan',
        'kecamnatan',
        'no_hp',
        'email',
        'jenis_id'
    ];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id');
    }
}
