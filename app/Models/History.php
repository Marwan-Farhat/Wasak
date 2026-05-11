<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory , Uuids;
    protected $table = 'histories';
    protected $fillable = [
        'addedBy',
        'description',
        'ar_description',
        'status'
    ];
}
