<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Morilog\Jalali\Jalalian;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    const LOCK_ACCOUNT = 0;
    const UNLOCK_ACCOUNT = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status'
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
    ];

    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = Jalalian::now();
    }

    public function setUpdatedAtAttribute($value)
    {
        $this->attributes['updated_at'] = Jalalian::now();
    }

    public static function checkUserAccountStatus($email)
    {
        return (bool) User::where('email',$email)->first()->status;
    }

    public static function isSuperAdmin($userId)
    {
        return (bool) User::find($userId)->hasRole('super_admin');
    }
}
