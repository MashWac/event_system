<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasesdetailsModel extends Model
{
    use HasFactory;
    protected $table='purchases_details';
    protected $primaryKey='purchasedetail_id';
    protected $fillable=['ticket_id','purchase_id','quantity','created_at','updated_at','is_deleted'];
}
