<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
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
    protected $guarded;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role()
    {
        return   $this->belongsTo(Role::class, 'role_id', 'id', 'roles');
    }

    public function permissions()
    {
        return   $this->role->belongsToMany(Permission::class, 'role_permissions', 'role_id', 'permission_id');
    }

    public function department()
    {
        return   $this->belongsTo(Department::class);
    }

    public function attendances()
    {
        return   $this->hasMany(Attendance::class);
    }


    public function leaves()
    {
        return   $this->hasMany(Leave::class);
    }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
