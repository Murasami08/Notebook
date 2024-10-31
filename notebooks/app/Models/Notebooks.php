<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Notebooks extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'company',
        'phone',
        'email',
        'birth_date',
        'photo',
    ];
}
