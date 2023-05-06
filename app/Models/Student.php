<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'date_of_birth',
        'age',
        'name',
        'surname',
        'patronymic',
        'sex'
    ];

    public $timestamps = false;
}
