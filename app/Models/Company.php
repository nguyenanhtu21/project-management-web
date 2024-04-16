<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'name',
        'code',
        'address',
    ];

    public function persons():HasMany{
        return $this->hasMany(Person::class, 'company_id');
    }

    public function departments():HasMany{
        return $this->hasMany(Department::class,'company_id');
    }
}
