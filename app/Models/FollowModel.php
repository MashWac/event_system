<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowModel extends Model
{
    use HasFactory;
    protected $table='followers';
    protected $primaryKey='follow_id';
    protected $fillable=['follower','following', 'created_at','updated_at','is_deleted'];
}
