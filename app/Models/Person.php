<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Person extends Model
{
    use HasFactory;
    protected $table = "persons";
    protected $primaryKey = "id";

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function company(): BelongsTo{
        return $this->belongsTo(Company::class);
    }

    protected $fillable = [
        'full_name',
        'gender',
        'birthdate',
        'phone_number',
        'address',
        'company_id',
    ];
}
