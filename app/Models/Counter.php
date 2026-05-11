<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    use HasFactory, Uuids;
    protected $table = 'counters';
    protected $fillable = [
        'addedBy',
        'customerImage',
        'customerImageName',
        'customerTitle',
        'ar_customerTitle',
        'numberofCustomer',
        'visitorImage',
        'visitorImageName',
        'visitorTitle',
        'ar_visitorTitle',
        'numberofVisitor',
        'status',
    ];
}
