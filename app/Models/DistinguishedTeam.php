<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistinguishedTeam extends Model
{
    use HasFactory, Uuids;
    protected $table = 'distinguished_teams';
    protected $fillable = [
        'addedBy',
        'status',
        'description',
        'ar_description',
    ];
}
