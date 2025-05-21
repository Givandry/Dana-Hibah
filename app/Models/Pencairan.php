<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pencairan extends Model
{
    use HasFactory;
    protected $table = 'pencairan';
    protected $primaryKey = 'nomor_pengajuan';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nomor_pengajuan',
        'catatan',
        'waktu',
        'dana_hibah_disetujui',
        'disposisi_walikota',
        'disposisi_sekda',
        'disposisi_assisten',
        'disposisi_kabag',
        'sk_penetapan_walikota',
        'nphd'
    ];
     public function pengajuanProposal()
    {
        return $this->belongsTo(PengajuanProposal::class, 'nomor_pengajuan', 'nomor_pengajuan');
    }
}
