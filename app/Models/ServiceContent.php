<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceContent extends Model
{
    use HasFactory, Uuids;
    protected $table = 'service_contents';
    protected $fillable = [
        'addedBy',
        'image',
        'imageName',
        'description',
        'ar_description',
        'status'

    ];
}
