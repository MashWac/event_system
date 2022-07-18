<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganiserWallet extends Model
{
    use HasFactory;
    protected $table='organiser_wallet';
    protected $primaryKey='organiserwallet_id';
    protected $fillable=['organiser_id','amount_available','created_at','updated_at','is_deleted'];
}
