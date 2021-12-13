<?php

namespace App\Models;

use App\Models\Education;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Info extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'phone',
        'address',
        'nationality',
        'dob',
        'email',
       'mode_of_contact',

    ];

    public function educations() {
        return $this->hasMany(Education::class);
    }

    public function trainings() {
        return $this->hasMany(Training::class);
    }
}
