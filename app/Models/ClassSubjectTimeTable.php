<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSubjectTimeTable extends Model
{
    use HasFactory;

    protected $fillable = ['classe_id', 'subject_id', 'week_id', 'start_time', 'end_time', 'room_number'];


    public function week()
    {
        return $this->hasOne(Week::class);
    }
}
