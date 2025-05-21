<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LaporanPertanggungjawaban extends Model
{
    use HasFactory;
    protected $table = 'laporan_pertanggungjawaban';
    protected $primaryKey = 'nomor_pengajuan';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nomor_pengajuan',
        'waktu',
        'file',
        'check',
        'catatan'
    ];

    public function pengajuanProposal()
    {
        return $this->belongsTo(PengajuanProposal::class, 'nomor_pengajuan', 'nomor_pengajuan');
    }
}
