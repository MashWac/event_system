<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organiser extends Model
{
    use HasFactory;
    protected $table='event_organisers';
    protected $primaryKey='organiser_id';
    protected $fillable=['name','certification','admin_name','email','password','phone', 'created_at','updated_at','is_deleted'];
}
