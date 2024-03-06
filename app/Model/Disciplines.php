<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Disciplines extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name'
    ];

    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class, 'emp_disciplines', 'disciplines_id', 'id_employees');
    }






}


