<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory , Uuids;
    protected $table = 'partners';
    protected $fillable = [
        'addedBy',
        'image',
        'imageName',
        'title',
        'ar_title',
        'status',
    ];
}
