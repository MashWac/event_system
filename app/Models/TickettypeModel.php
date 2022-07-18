<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TickettypeModel extends Model
{
    use HasFactory;
    protected $table='ticket_types';
    protected $primaryKey='tickettype_id';
    protected $fillable=['ticket_type','ticket_price','status_open','event_id','ticket_quantity','created_at','updated_at','is_deleted'];
}
