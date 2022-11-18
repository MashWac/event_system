<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    use HasFactory;

    
    protected $table='albums';
    protected $primaryKey='album_id';
    protected $fillable=['album','content_id', 'created_at','updated_at','is_deleted'];
}
