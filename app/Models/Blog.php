<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory, Uuids;
    protected $table = 'blogs';
    protected $fillable = [
        'addedBy',
        'date',
        'image',
        'imageName',
        'title',
        'ar_title',
        'status',
        'description',
        'ar_description'
    ];

}
