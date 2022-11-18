<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformanceModel extends Model
{
    use HasFactory;
    protected $table='event_performances';
    protected $primaryKey='performance_id';
    protected $fillable=['performer_id','event_id','review','organiser_id','created_at','updated_at','is_deleted'];
}
