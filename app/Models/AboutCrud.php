<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutCrud extends Model
{
    use HasFactory, Uuids;
    protected $table = 'about_cruds';
    protected $fillable = [
        'image',
        'imageName',
        'title',
        'ar_title',
        'status',
        'description',
        'ar_description'
    ];
}
