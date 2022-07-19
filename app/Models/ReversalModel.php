<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReversalModel extends Model
{
    use HasFactory;
    protected $table='awaitingreversal';
    protected $primaryKey='reversal_id';
    protected $fillable=['reversal_amount','event_id','created_at','updated_at','is_deleted'];
}
