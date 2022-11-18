<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethodsModel extends Model
{
    use HasFactory;
    protected $table='payment_method';
    protected $primaryKey='method_id';
    protected $fillable=['method_name','description'];
}
