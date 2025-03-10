<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Regulasi extends Model
{
    use HasFactory;
    protected $table = 'regulasi';

    protected $fillable = [
        'judul',
        'file',
        'aktif'
    ];
}
