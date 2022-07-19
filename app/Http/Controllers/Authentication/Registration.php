<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artists;
use App\Models\Attendee;
use App\Models\Organiser;
use App\Models\AttendeeWallet;
use App\Models\ArtistWallet;
use App\Models\OrganiserWallet;
use Carbon\Carbon;
use PHPUnit\Framework\Constraint\IsEmpty;


class Registration extends Controller
{

    public function storeuser(Request $request){
        $artist=new Artists();
        $attendee= new Attendee();
        $organiser=new Organiser();
        $artistwallet=new ArtistWallet();
        $attendeewallet= new AttendeeWallet();
        $organiserwallet=new OrganiserWallet();
        echo ($request->input('usertype'));
        if($request->input('usertype')=='artist'){
            $pass=$request->input('password');
            $pass_con=$request->input('password_confirmation');
            if($pass==$pass_con){
                $email=$request->input('email');
                $data=Artists::all()->where('email',$email);
                if(!($data->IsEmpty())){
                    return redirect('register')->with('status','Email already Exists.');
                }else{
                    if($request->hasFile('artistphoto')){
                        $file=$request->file('artistphoto');
                        $ext=$file->getClientOriginalExtension();
                        $filename= time().'.'.$ext;
                        $file->move('assets/uploads/artists/',$filename);

                        
                        $artist->first_name=$request->input('fname');
                        $artist->last_name=$request->input('lname');
                        $artist->email=$request->input('email');
                        $artist->stage_name=$request->input('stagename');
                        $artist->phone=$request->input('telephone');
                        $artist->skill=$request->input('skill');
                        $artist->artist_photo=$filename;
                        $artist->password=$request->input('password');
                        $artist->updated_at=Carbon::now(); 

                    if($artist->save()){
                        $artist_id=$artist->artist_id;
                        $artistwallet->artist_id= $artist_id;
                        $artistwallet->amount= 0;
                        $artistwallet->updated_at= Carbon::now();
                        $artistwallet->save();
                        return redirect('login')->with('status','User Created Successfully');

                    }
                    else{
                        return redirect('register')->with('status','Failed to create user.');
                    }
                    }

                }
            }else{
                return redirect('register')->with('status','Passwords do not match');
                }
            
        }elseif($request->input('usertype')=='attendee'){
            $pass=$request->input('password');
            $pass_con=$request->input('password_confirmation');
            if($pass==$pass_con){
                $email=$request->input('email');
                $data=Attendee::all()->where('email',$email);
                if(!($data->IsEmpty())){
                    return redirect('register')->with('status','Email already Exists.');
                }else{
                   $attendee->first_name=$request->input('fname');
                   $attendee->last_name=$request->input('lname');
                   $attendee->email=$request->input('email');
                   $attendee->age=$request->input('age');
                   $attendee->gender=$request->input('gender');
                   $attendee->updated_at=Carbon::now();
                   $attendee->password=$request->input('password');

                    if($attendee->save()){
                        $attendee_id=$attendee->user_id;
                        $attendeewallet->user_id= $attendee_id;
                        $attendeewallet->available_amount=0;
                        $attendeewallet->updated_at=Carbon::now();

                        $attendeewallet->save();
                        return redirect('login')->with('status','User Created Successfully');

                    }
                    else{
                        return redirect('register')->with('status','Failed to create user.');
                    }
                }
            }else{
                return redirect('register')->with('status','Passwords do not match');
            }

        }else{
            $pass=$request->input('password');
            $pass_con=$request->input('password_confirmation');
            if($pass==$pass_con){
                $email=$request->input('email');
                $data=Organiser::all()->where('email',$email);
                if(!($data->IsEmpty())){
                    return redirect('register')->with('status','Email already Exists.');
                }else{
                    if($request->hasFile('certimage')){
                        $file=$request->file('certimage');
                        $ext=$file->getClientOriginalExtension();
                        $filename= time().'.'.$ext;
                        $file->move('assets/uploads/products/',$filename);
                       
                        $organiser->name=$request->input('organisername');
                        $organiser->phone=$request->input('telephone');
                        $organiser->email=$request->input('email');
                        $organiser->admin_name=$request->input('adminname');
                        $organiser->certification=$filename;
                        $organiser->updated_at= Carbon::now();
                        $organiser->password=$request->input('password');

                        if($organiser->save()){
                            $organiser_id=$organiser->organiser_id;
                            $organiserwallet->organiser_id= $organiser_id;
                            $organiserwallet->amount_available=0;
                            $organiserwallet->updated_at=Carbon::now();
                            $organiserwallet->save();
                            return redirect('login')->with('status','User Created Successfully');
                        }
                        else{
                            return redirect('register')->with('status','Failed to create user.');
                        }
                    }
                }
            }else{
                return redirect('register')->with('status','Passwords do not match');
            }
        }
    }
    public function signin(Request $request)
    {
        session()->regenerate();
        $artist=new Artists();
        $attendee= new Attendee();
        $organiser=new Organiser();

        $email = $request->input('email');
        $password =$request->input('password');
        $data_artists = $artist->where('email', $email)->first();
        $data_attendee = $attendee->where('email', $email)->first();
        $data_organiser = $organiser->where('email', $email)->first();


        if ($data_artists && $data_artists['is_deleted']==0) {
            $pass = $data_artists['password'];

            if ($pass == $password) {

                $sessionData = [
                    'user_id' => $data_artists['artist_id'],
                    'email' => $data_artists['email'],
                    'name'  => $data_artists['first_name'],
                    'logged' => TRUE,
                     'purchase'=>false

                ];
           
                session($sessionData);
               
                return redirect('artisthome')->with('status','Logged In Successfully.');
            } else {
                return redirect('login')->with('status','Wrong password. Please enter correct password');
            }
        }elseif($data_attendee && $data_attendee['is_deleted']==0){
            $pass = $data_attendee['password'];

            if ($pass == $password) {

                $sessionData = [
                    'user_id' => $data_attendee['user_id'],
                    'email' => $data_attendee['email'],
                    'name'  => $data_attendee['last_name'],
                    'logged' => TRUE,
                    'purchase'=>false

                ];
           
                session($sessionData);
                return redirect('attendee')->with('status','Logged In Successfully.');

               
            } else {
                return redirect('login')->with('status','Wrong password. Please enter correct password');
            }

        }elseif($data_organiser && $data_organiser['is_deleted']==0){
            $pass = $data_organiser['password'];

            if ($pass == $password) {

                $sessionData = [
                    'user_id' => $data_organiser['organiser_id'],
                    'email' => $data_organiser['email'],
                    'name'  => $data_organiser['admin_name'],
                    'logged' => TRUE,
                    'purchase'=>false

                ];
           
                session($sessionData);
               
                return redirect('organisers')->with('status','Logged In Successfully.');
            } else {
                return redirect('login')->with('status','Wrong password. Please enter correct password');
            }

        } 
        else {
            return redirect('login')->with('status','Wrong Email. Please enter correct Email');

        }
    }
    public function logout()
    {

        session()->flush();

        return redirect('login');
    }

}
