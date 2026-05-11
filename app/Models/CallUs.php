<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallUs extends Model
{
    use HasFactory, Uuids;
    protected $table = 'call_us';
    protected $fillable = [
        'addedBy',
        'email',
        'phone',
        'workDays',
        'workHours',
        'en_workDays',
        'en_workHours',
        'long',
        'lat',
    ];
}
