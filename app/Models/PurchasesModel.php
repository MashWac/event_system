<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasesModel extends Model
{
    use HasFactory;
    protected $table='purchases';
    protected $primaryKey='order_id';
    protected $fillable=['order_amount','buyer_id','event_id','organiser_id','payment_method' ,'created_at','updated_at','is_deleted'];
}
