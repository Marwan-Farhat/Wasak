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
        'youtube',
        'twitter',
        'facebook',
        'instagram',
        'tiktok',
        'whatsapp_url',
        'snapchat',
    ];
}
