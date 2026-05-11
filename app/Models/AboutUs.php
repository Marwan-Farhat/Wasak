<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutUs extends Model
{
    use HasFactory, Uuids;
    protected $table = 'about_us';
    protected $fillable = [
        'addedBy',
        'status',
        'description',
        'ar_description',
        'image',
        'imageName'
    ];
}
