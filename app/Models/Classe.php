<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'created_by'
    ];


    static public function getData()
    {
        $data = self::select("classes.*");
        if (Request()->get('name')) {
            $data = $data->where('name', 'like', '%' . Request()->get('name') . '%');
        }
        if (Request()->get('date')) {
            $data = $data->where('created_at', "=", Request()->get('date'));
        }
        return $data->latest()->paginate(10);
    }

    public function subjects()
    {
        return $this->belongsToMany(
            Subject::class,
            'class_subjects',
            'classe_id',
            'subject_id'
        );
    }
}
