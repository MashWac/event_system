<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $table='content';
    protected $primaryKey='content_id';
    protected $fillable=['artist','contenttype_id', 'created_at','updated_at','is_deleted'];
}
