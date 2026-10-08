<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class User extends Authenticatable { use HasApiTokens,HasFactory,Notifiable; protected $fillable=['name','email','phone','password','status']; protected $hidden=['password','remember_token']; protected function casts():array{return ['password'=>'hashed'];} public function roles(){return $this->belongsToMany(Role::class);} public function hasRole(string $role):bool{return $this->roles()->where('slug',$role)->exists();} public function hasPermission(string $permission):bool{return $this->roles()->whereHas('permissions',fn($q)=>$q->where('slug',$permission))->exists();} }
