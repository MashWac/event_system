<?php

namespace App\Http\Controllers;

use App\Models\EventModel;
use App\Models\Organiser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class EventController extends Controller
{
    public function search(Request $request)
    {
        $input = $request['searchitem'];
        $result = EventModel::where('event_name', 'LIKE', '%' . $input . '%')
            ->orWhere('location', 'LIKE', '%' . $input . '%')->get();

        $creator = Organiser::where('name', 'LIKE', '%' . $input . '%')->first();
        if($creator){
            $result = EventModel::where('event_creator', $creator->organiser_id)->get();
            return view('Attendee.event')->with(['result' => $result]);            
        }
            return view('Attendee.event')->with(['result' => $result]);
    }
}
// where('event_name', 'LIKE', '%' . $input . '%')