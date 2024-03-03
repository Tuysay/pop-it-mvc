<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'firt_name',
        'last_name',
        'patronymic',
        'gender',
        'address',
        'post_id',
        'department_id',
        'birthday',
        'disciplines_id'
    ];
}