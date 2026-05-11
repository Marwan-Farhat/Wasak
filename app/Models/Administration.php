<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administration extends Model
{
    use HasFactory, Uuids;
    protected $table = 'administrations';
    protected $fillable = [
        'addedBy',
        'image',
        'imageName',
        'title',
        'ar_title',
        'status',
        'description',
        'ar_description',
        'ar_designation',
        'designation',
    ];
}
