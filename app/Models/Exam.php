<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'note',
        'created_by',
    ];

    public function CreateBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
