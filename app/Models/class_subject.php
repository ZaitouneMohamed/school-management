<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class class_subject extends Model
{
    use HasFactory;

    protected $table = "class_subjects";

    static public function getData()
    {
        return self::with(["Classe","Subject"])->get();
    }

    public function Admin()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function Classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id', 'id');
    }

    public function Subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
}
