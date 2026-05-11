<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory, Uuids;
    protected $table = 'service_requests';
    protected $fillable = [
        'serviceID',
        'name',
        'ar_name',
        'email',
        'phone',
        'nb',
        'ar_nb',
        'status'
    ];
    public function services()
    {
        return $this->hasOne(Service::class,'id','serviceID');
    }
}
