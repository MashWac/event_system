<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventModel extends Model
{
    use HasFactory;
    protected $table='tbl_event';
    protected $primaryKey='event_id';
    protected $fillable=['event_name','event_creator','event_flyer','event_date', 'created_at','updated_at','is_deleted'];
}
