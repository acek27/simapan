<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    protected $appends = ['all_roles'];

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static $rulesCreate = [
        'name' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required',
    ];

    public static function rulesEdit(User $data)
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:users',
        ];
    }

    public function isHasRole($role)
    {
        foreach ($this->roles as $r) {
            if ($role == $r->name)
                return true;
        }
        return false;
    }

    public function getAllRolesAttribute()
    {
        $a = "";
        foreach ($this->roles as $role) {
            $a .= $role->name . ", ";
        }
        return ($a == "") ? "" : substr($a, 0, strlen($a) - 2);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($name)
    {
        foreach ($this->roles as $role) {
            if ($role->name == $name)
                return true;
        }
        return false;
    }
}
