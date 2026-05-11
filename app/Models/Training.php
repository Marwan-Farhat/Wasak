<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory, Uuids;
    protected $table = 'trainings';
    protected $fillable = [
        'orderType',
        'ar_orderType',
        'name',
        'ar_name',
        'email',
        'phone',
        'qualification',
        'specialization',
        'image',
        'imageName',
        'status'
    ];
}
