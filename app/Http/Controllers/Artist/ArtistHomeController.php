<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArtistHomeController extends Controller
{
    public function index(){
        return view('Artists/index');
    }

    public function content(){
        return view('Artists/mycontent');
    }

    public function bookings(){
        return view('Artists/eventbookings');
    }

    public function feedback(){
        return view('Artists/contentfeedback');
    }

    public function logout(){
        return view('Artists/logout');
    }

    public function display(){
        return view('Artists/videodisplay');
    }

    public function display2(){
        return view('Artists/albumsdisplay');
    }
}
