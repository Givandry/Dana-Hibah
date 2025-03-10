<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Jenis extends Model
{
    use HasFactory;
    protected $table = 'jenis';

    protected $fillable = [
        'jenis_rumah_ibadah'
    ];

    public function rumahIbadah()
    {
        return $this->hasMany(RumahIbadah::class);
    }
}
