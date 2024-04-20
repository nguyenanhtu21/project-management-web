<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    public function persons(){
        return $this->belongsToMany(Person::class,'project_person');
    }

    public function company():BelongsTo{
        return $this->belongsTo(Company::class);
    }
    
    protected $fillable = [
        'name',
        'code',
        'description',
        'company_id',
    ];
}
