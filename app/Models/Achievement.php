<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory, Uuids;
    protected $table = 'achievements';
    protected $fillable = ['addedBy','description','ar_description','image','imageName','status'];
}
