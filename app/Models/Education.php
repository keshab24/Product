<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{

    protected $fillable = [
        'info_id',
        'educational_inst',
        'level',
        'percentage',
        

    ];
    use HasFactory;
}
