<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory, Uuids;
    protected $table = 'banners';
    protected $fillable = [
        'addedBy',
        'image',
        'imageName',
        'title',
        'subTitle',
        'ar_title',
        'ar_subTitle',
        'help',
        'ar_help'
    ];
}
