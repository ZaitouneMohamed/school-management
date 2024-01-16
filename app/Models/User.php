<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
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
        'role'
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
                    ->where('role',$role);
                    if (Request()->get('name')) {
                        $data = $data->where('name', 'like', '%' . Request()->get('name') . '%');
                    }
                    if (Request()->get('email')) {
                        $data = $data->where('email', 'like', '%' . Request()->get('email') . '%');
                    }
                    if (Request()->get('date')) {
                        $data = $data->where('created_at',"=", Request()->get('date'));
                    }
        return $data->latest()->paginate(10);
    }
}
