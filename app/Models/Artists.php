<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artists extends Model
{
    use HasFactory;
    
    protected $table='artists';
    protected $primaryKey='artist_id';
    protected $fillable=['first_name','last_name','stage_name','skill','email','password','phone','artist_photo', 'created_at','updated_at','is_deleted'];
}
