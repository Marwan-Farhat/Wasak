<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Social extends Model
{
    use HasFactory, Uuids;
    protected $table = 'socials';
    protected $fillable = [
        'addedBy',
        'linkedIn',
        'twitter',
        'facebook',
        'instagram',
        'whatsapp',
        'tiktok',
        'whatsapp_url',
    ];
}
