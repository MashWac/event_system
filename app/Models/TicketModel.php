<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketModel extends Model
{
    use HasFactory;
    protected $table='tickets';
    protected $primaryKey='ticket_id';
    protected $fillable=['ticket_number','event_id','purchase_date','qr_id' ,'created_at','updated_at','is_deleted'];
}
