<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistsPaymentModel extends Model
{
    use HasFactory;
    protected $table='artist_payment';
    protected $primaryKey='payment_id';
    protected $fillable=['event_id','payer_id','recepient_id','amount', 'payment_method','accepted_booking','created_at','updated_at','is_deleted'];
}
