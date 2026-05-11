<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory, Uuids;
    protected $table = 'services';
    protected $fillable = [
        'addedBy',
        'image',
        'imageName',
        'title',
        'ar_title',
        'status',
        'description',
        'ar_description',
        'typeID'
    ];
    public function serviceType()
    {
        return $this->hasOne(ServiceType::class,'id','typeID');
    }
}
