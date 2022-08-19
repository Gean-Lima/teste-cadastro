<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peoples extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'zip_code',
        'street',
        'neighborhood',
        'city',
        'state'
    ];
}
