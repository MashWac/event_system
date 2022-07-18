<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingsModel extends Model
{
    use HasFactory;
    protected $table='bookings';
    protected $primaryKey='booking_id';
    protected $fillable=['event_id','artist_id','organiser_id','dateofbooking', 'pay_offer','approval_status','created_at','updated_at','is_deleted'];
}
