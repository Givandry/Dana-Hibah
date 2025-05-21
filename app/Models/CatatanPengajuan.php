<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CatatanPengajuan extends Model
{
    use HasFactory;
    protected $table = 'catatan_pengajuan';
    protected $primaryKey = 'nomor_pengajuan';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'nomor_pengajuan',
        'catatan',
        'waktu',
    ];
     public function pengajuanProposal()
    {
        return $this->belongsTo(PengajuanProposal::class, 'nomor_pengajuan', 'nomor_pengajuan');
    }
}
