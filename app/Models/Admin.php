<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
 
class Admin extends Model
{
    use HasFactory;
    use HasRoles;
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_name',
        'status',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'role_name' => 'array', 
    ];
    public function assignRole($role)
    {
        $this->roles()->sync($role, false);
        $this->load('roles');
        return $this;
    }
    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class);
    // }

    // public function permissions()
    // {
    //     return $this->belongsToMany(Permission::class);
    // }
}