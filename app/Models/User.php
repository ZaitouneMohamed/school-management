<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'admission_number',
        'role_number',
        'class_id',
        'gender',
        'date_of_birth',
        'caste',
        'religion',
        'mobile',
        'admission_date',
        'profile_pic',
        'blood_group',
        'height',
        'weight',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function scopeAdmin($query)
    {
        $query->where('role', 1);
    }

    static public function getData($role)
    {
        $data = self::select("users.*")
            ->where('role', $role);
        if (Request()->get('name')) {
            $data = $data->where('name', 'like', '%' . Request()->get('name') . '%');
        }
        if (Request()->get('email')) {
            $data = $data->where('email', 'like', '%' . Request()->get('email') . '%');
        }
        if (Request()->get('date')) {
            $data = $data->where('created_at', "=", Request()->get('date'));
        }
        if (Request()->get('status')) {
            $data = $data->where('status', Request()->get('status'));
        }
        return $data->latest()->paginate(10);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'class_id', 'id');
    }
    static public function MyStudent()
    {
        return Auth::user()->MyStudents()->latest()->paginate(10);
    }
    public function MyStudents()
    {
        return $this->hasMany(User::class, 'parent_id', 'id');
    }
    public function MySubjectAsStdent()
    {
        return Auth::user()->classe()->subjects();
    }
    static public function MySubjectAsStudent()
    {
        $data = Auth::user()->classe;
        // $data = $data->subjects;
        return $data->subjects;
    }

    static function MyStudentsSubjectsAsParent()
    {
        // $students = Auth::user()->stude
    }


}
