<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    use HasFactory;
    protected $table='users';
    protected $primaryKey='user_id';
    protected $fillable=['first_name','last_name','email','password','gender','age', 'created_at','updated_at','is_deleted'];
}
