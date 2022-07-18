<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistWallet extends Model
{
    use HasFactory;
    protected $table='artist_wallet';
    protected $primaryKey='artistwallet_id';
    protected $fillable=['artist_id','amount','created_at','updated_at','is_deleted'];
}
