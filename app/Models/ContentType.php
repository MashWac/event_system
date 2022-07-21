<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentType extends Model
{
    use HasFactory;
    protected $table='content_type';
    protected $primaryKey='contenttype_id';
    protected $fillable=['content','description', 'created_at','updated_at','is_deleted'];
}
