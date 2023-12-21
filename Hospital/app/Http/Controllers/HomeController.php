<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function redirect(){
        if(Auth::id()){
            if(Auth::user()->usertype=='0'){
                $doctor = doctor::all();
                return view('user.home',compact('doctor'));
            } 
            else {
                return view('admin.home');
            }
        }
        else{
            return redirect()->back();
        }
    } 
    public function index(){
        if(Auth::id()){
            return redirect('home');
        }
        else {
            $doctor = doctor::all();
            return view('user.home', compact('doctor'));
        }
    }

    public function appointment(Request $request){
        $data = new Appointment();
        $data->name=$request-> name;
        $data->email=$request-> email;
        $data->phone=$request-> number;
        $data->doctor=$request-> doctor;
        $data->date=$request-> date;
        $data->message=$request-> message;
        $data->status='In progress';
        if(Auth::id()){
            $data->user_id=Auth::user()->id;
        }
        $data->save();
        return redirect()->back()->with('message', 'Appointment Request Successful . We will contact with you soon');
    }
    public function myappointment(){
        if(Auth::id()){
            $userid = Auth::user()->id;
            $appoint = Appointment::where('user_id', $userid)->get();
            return view('user.my_appointment', compact('appoint'));
        }
        return redirect()->back();
    }
    public function cancel_appoint($id){
        $data = Appointment::find($id);
        $data->delete();
        return redirect()->back();
    }
}