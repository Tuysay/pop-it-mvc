<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'img_photo'
    ];

    public function disciplines(): BelongsToMany
    {
        return $this->belongsToMany(Disciplines::class, 'emp_disciplines', 'id_employees', 'disciplines_id');
    }


}