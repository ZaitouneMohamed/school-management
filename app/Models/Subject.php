<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'status',
        'created_by',
    ];

    public function Admin()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 0);
    }

    static public function getData()
    {
        $data = self::select("subjects.*");
        if (Request()->get('name')) {
            $data = $data->where('name', 'like', '%' . Request()->get('name') . '%');
        }
        if (Request()->get('date')) {
            $data = $data->where('created_at', "=", Request()->get('date'));
        }
        return $data->latest()->paginate(10);
    }

    public function classes()
    {
        return $this->belongsToMany(
            Classe::class,
            'class_subjects',
            'subject_id',
            'classe_id'
        );
    }
}
