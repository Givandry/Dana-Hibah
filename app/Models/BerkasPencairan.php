<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BerkasPencairan extends Model
{
    use HasFactory;
    protected $table = 'berkas_pencairan';

    protected $fillable = [
        'nomor_pengajuan', 
        'persyaratan_proposal_id', 
        'file',
        'check'
    ];

    public function pengajuanProposal()
    {
        return $this->belongsTo(PengajuanProposal::class, 'nomor_pengajuan', 'nomor_pengajuan');
    }

    public function persyaratanProposal()
    {
        return $this->belongsTo(PersyaratanProposal::class, 'persyaratan_proposal_id', 'persyaratan_proposal_id');
    }
}
