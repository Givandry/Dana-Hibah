<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersyaratanProposal extends Model
{
    use HasFactory;
    protected $table = 'persyaratan_proposal';
    protected $fillable = [
        'persyaratan', 
        'active' 
    ];
}
