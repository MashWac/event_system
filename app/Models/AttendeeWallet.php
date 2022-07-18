<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendeeWallet extends Model
{
    use HasFactory;
    protected $table='user_wallet';
    protected $primaryKey='userwallet_id';
    protected $fillable=['user_id','available_amount', 'created_at','updated_at','is_deleted'];
}
