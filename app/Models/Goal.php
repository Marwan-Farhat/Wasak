<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory , Uuids;
    protected $table = 'goals';
    protected $fillable = [
        'addedBy',
        'description',
        'ar_description',
        'status'
    ];
}
