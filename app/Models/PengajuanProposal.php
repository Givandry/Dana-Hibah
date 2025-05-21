<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PengajuanProposal extends Model
{
    use hasFactory;
    protected $table = 'pengajuan_proposal';
    protected $primaryKey = 'nomor_pengajuan';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nomor_pengajuan',
        'rumah_ibadah_id',
        'waktu',
        'judul',
        'deskripsi',
        'jumlah_dana_hibah',
        'status_pengajuan',
        'status_pencairan',
        'rekomendasi',
        'disposisi_walikota',
        'disposisi_sekda',
        'disposisi_assisten',
        'disposisi_kabag'
    ];

    public function rumahIbadah()
    {
        return $this->belongsTo(RumahIbadah::class);
    }
}
