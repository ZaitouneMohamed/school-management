<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    use HasFactory;

    // protected $fillable = ['name'];

    protected $table = "weeks";
    public function ClassSubjectTimeTable()
    {
        return $this->hasMany(ClassSubjectTimeTable::class, 'week_id');
    }
}
