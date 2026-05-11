<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vision extends Model
{
    use HasFactory , Uuids;
    protected $table = 'visions';
    protected $fillable = [
        'addedBy',
        'status',
        'description',
        'ar_description',
    ];

}
