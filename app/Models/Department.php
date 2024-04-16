<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Department extends Model
{
    use HasFactory;

    public function company():BelongsTo{
        return $this->belongsTo(Company::class);
    }

    public function childs(){
        $childs = Department::where("parent_id", $this->id)->get();
        return $childs;
    }

    public function parent(){
        $parent = Department::where("id", $this->parent_id)->get();
        return $parent;
    }

    protected $fillable = [
        'code',
        'name',
        'company_id',
        'parent_id',
    ];
}
