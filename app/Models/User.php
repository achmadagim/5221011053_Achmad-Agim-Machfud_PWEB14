<?php 

namespace App\Models; 

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Notifications\Notifiable; 
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable 
{ 
    use HasApiTokens, HasFactory, Notifiable; 
    protected $table = 'users'; // nama table pada database 
    protected $primaryKey = 'id'; // primary key 
    protected $guarded = ['id']; 
    public $timestamps = false; // true = btuh field created_at dan updated_at 
}