<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class BerkasPengajuan extends Model
{
    use HasFactory;

    protected $table = 'berkas_pengajuan';

    protected $fillable = [
        'nomor_pengajuan',
        'persyaratan_proposal_id',
        'nama_persyaratan',
        'file',
        'check'
    ];

    public function pengajuanProposal()
    {
        return $this->belongsTo(PengajuanProposal::class, 'nomor_pengajuan', 'nomor_pengajuan');
    }

    public function persyaratanProposal()
    {
        return $this->belongsTo(PersyaratanProposal::class, 'persyaratan_proposal_id', 'id');
    }
}
