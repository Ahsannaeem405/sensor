<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use App\Models\Sensor_detail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminController extends Controller
{

    function index(){
        return view('Admin_asstes.index');
    }
    function addadmin(){
        return view('Admin_asstes.addadmin');
    }
    function edituser($id){
        $user=User::find($id);
        return view('Admin_asstes.editusershow',['admin'=>$user]);
    }
    function updateuser(Request $request){
        $user=User::find($request->id);
        if ($request->password!=$user->password2) {
            if ($request->password==$request->Cpassword) {
                $user->password2=$request->password;
                $pass=$request->password;
               $user->password= Hash::make($pass);
            }
            else{

        return redirect()->back()->with('error', 'Confirm Password Does Not Match');
            }
        }
        if ($request->addsensor=="on") {
            $user->addsensor="1";
        }
        else {
            $user->addsensor="0";
        }

        if ($request->deletesensor=="on") {
            $user->deletesensor="1";
        }
        else {
            $user->deletesensor="0";
        }
        if ($request->updatesensor=="on") {
            $user->updatesensor="1";
        }
        else {
            $user->updatesensor="0";
        }
        if ($request->graph=="on") {
            $user->graph="1";
        }
        else {
            $user->graph="0";
        }

        if ($request->search=="on") {
            $user->search="1";
        }
        else {
            $user->search="0";
        }
        if ($request->changechart=="on") {
            $user->changechart="1";
        }
        else {
            $user->changechart="0";
        }
        if ($request->sp=="on") {
            $user->sp="1";
        }
        else {
            $user->sp="0";
        }

        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->save();
        return redirect()->back()->with('success', 'Successfully User Updated');

    }
    function adduser_form(Request $request){
        $validated = $request->validate([
            'email' => 'required|unique:users|max:255',

        ]);
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->role="user";
        $user->admin_id=Auth::user()->id;
        $user->activation_code="activated";
        if ($request->addsensor=="on") {
            $user->addsensor="1";
        }
        else {
            $user->addsensor="0";
        }

        if ($request->deletesensor=="on") {
            $user->deletesensor="1";
        }
        else {
            $user->deletesensor="0";
        }
        if ($request->updatesensor=="on") {
            $user->updatesensor="1";
        }
        else {
            $user->updatesensor="0";
        }
        if ($request->graph=="on") {
            $user->graph="1";
        }
        else {
            $user->graph="0";
        }

        if ($request->search=="on") {
            $user->search="1";
        }
        else {
            $user->search="0";
        }
        if ($request->changechart=="on") {
            $user->changechart="1";
        }
        else {
            $user->changechart="0";
        }
        if ($request->sp=="on") {
            $user->sp="1";
        }
        else {
            $user->sp="0";
        }







        if ($request->password==$request->Cpassword) {
            $user->password2=$request->password;
            $pass=$request->password;
           $user->password= Hash::make($pass);
        }
        else{

    return redirect()->back()->with('error', 'Confirm Password Does Not Match');
        }

        $user->save();

        return redirect()->back()->with('success', 'Successfully Added');
    }
    function addadmin_form(Request $request){
        $validated = $request->validate([
            'email' => 'required|unique:users|max:255',

        ]);
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->role="admin";
        $user->admin_id=Auth::user()->id;
        $user->activation_code="activated";

        if ($request->password==$request->Cpassword) {
            $user->password2=$request->password;
            $pass=$request->password;
           $user->password= Hash::make($pass);
        }
        else{

    return redirect()->back()->with('error', 'Confirm Password Does Not Match');
        }

        $user->save();

        return redirect()->back()->with('success', 'Successfully Added');

    }
    function adminlist(){
        $user=User::where('role','admin')->get();
        return view('Admin_asstes.listadmin',['admins'=>$user]);

    }
    function deleteadmin($id){
        $user=User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'Successfully Deleted');

    }
    function editadmin($id){
        $user=User::find($id);
        return view('Admin_asstes.editadminshow',['admin'=>$user]);
    }
    function updateadmin(Request $request){
        $user=User::find($request->id);
        if ($request->password!=$user->password2) {
            if ($request->password==$request->Cpassword) {
                $user->password2=$request->password;
                $pass=$request->password;
               $user->password= Hash::make($pass);
            }
            else{

        return redirect()->back()->with('error', 'Confirm Password Does Not Match');
            }
        }
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->save();
        return redirect()->back()->with('success', 'Successfully Updated');

    }
    function profile(){
        $user=User::find(Auth::user()->id);
        return view('Admin_asstes.profile',['user'=>$user]);
    }
    function updateprofile(Request $request){
        $user=User::find(Auth::user()->id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        if ($request->oldpassword!=null) {

            if( Hash::check($request->oldpassword, $user->password)){
                if ($request->newpassword!=null) {
                    if ($request->newpassword==$request->confirmpassword) {
                        $user->password2=$request->newpassword;
                        $pass=$request->newpassword;
                       $user->password= Hash::make($pass);
                    }
                    else{

                return redirect()->back()->with('error', 'Confirm Password Does Not Match');
                    }
                }
            }
            else {
                return redirect()->back()->with('error', 'Incorrect Old Password');

            }
        }
        $user->save();
        return redirect()->back()->with('success', 'Successfully Updated');
    }
    function adduser(){
        return view('Admin_asstes.adduser');
    }
    function userlist(){
        $user=User::where('role','user')->get();
        return view('Admin_asstes.listuser',['admins'=>$user]);
    }
    function deleteuser($id){
        $user=User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'Successfully Deleted');

    }
    function addSensor(){
        $user=User::where('role','admin')->get();
        return view('Admin_asstes.addsensor',['users'=>$user]);
    }
function addsensor_form(Request $request){
    $sensor=new Sensor();
    $sensor->Sensor_Location=$request->Sensor_Location;

    $sensor->Sensor_IP=$request->Sensor_IP;
    $sensor->Sensor_Subnet=$request->Sensor_Subnet;
    $sensor->Sensor_GW=$request->Sensor_GW;
    $sensor->Sensor_DNS1=$request->Sensor_DNS1;
    $sensor->Sensor_MAC=$request->Sensor_MAC;
    $sensor->Sensor_Status=$request->Sensor_Status;
    $sensor->Sensor_Restart=$request->Sensor_Restart;
    $sensor->user_id=$request->user_id;
    $sensor->save();
    return redirect()->back()->with('success', 'Successfully Sensor Added');


}
function showSensor(){
    $sensor=Sensor::all();
    return view('Admin_asstes.showsensor',['sensors'=>$sensor]);
}
function deletesensor($id){
    $sensor=Sensor::find($id);
    // dd("helloo");
    $sensor->delete();
    return redirect()->back()->with('success', 'Successfully Sensor Deleted');

}
function editsensor($id){
    $sensor=Sensor::find($id);
    $user=User::where('role','admin')->get();

    return view('Admin_asstes.editsensor',['sensor'=>$sensor,'users'=>$user]);
}
function updatesensor(Request $request){
    $sensor=Sensor::find($request->id);
    $sensor->Sensor_Location=$request->Sensor_Location;

    $sensor->Sensor_IP=$request->Sensor_IP;
    $sensor->Sensor_Subnet=$request->Sensor_Subnet;
    $sensor->Sensor_GW=$request->Sensor_GW;
    $sensor->Sensor_DNS1=$request->Sensor_DNS1;
    $sensor->Sensor_MAC=$request->Sensor_MAC;
    $sensor->Sensor_Status=$request->Sensor_Status;
    $sensor->Sensor_Restart=$request->Sensor_Restart;
    $sensor->user_id=$request->user_id;
    $sensor->save();
    return redirect()->back()->with('success', 'Successfully Sensor Updated');
}
function viewsensordetail($id){
    // dd($id);
    $sensor_detail=Sensor_detail::where('sensor_id',$id)->get();
    return view('Admin_asstes.viewsensordetail',['sensor_detail'=>$sensor_detail,'sensorid'=>$id]);
}
function addsensordetail($sensorid){
return view('Admin_asstes.addsensordetail',['sensorid'=>$sensorid]);
}
function addsensordetail_form(Request $request){
$sensor_detail=new Sensor_detail();
$sensor_detail->sensor_id=$request->sensor_id;
$sensor_detail->temp=$request->temp;
$date = Carbon::now();
// dd($date);
$sensor_detail->time=$date;
$sensor_detail->Date=$request->Date;
$sensor_detail->Clock=$request->Clock;
$sensor_detail->status=$request->status;
$sensor_detail->search_time=$request->search_time;

$sensor_detail->save();
return redirect()->back()->with('success', 'Successfully Sensor_Detail Added');



}
function deletesensor_detail($id){
    $sensor=Sensor_detail::find($id);
    $sensor->delete();
return redirect()->back()->with('success', 'Successfully Deleted');

}
function editsensor_detail($id){
    $sensor=Sensor_detail::find($id);
    return view('Admin_asstes.editsensor_detail',['sensor'=>$sensor]);
}
function updatesensordetail(Request $request){
    $sensor_detail=Sensor_detail::find($request->id);
    $sensor_detail->sensor_id=$request->sensor_id;
    $sensor_detail->temp=$request->temp;
    $date = Carbon::now();
    // dd($date);
    $sensor_detail->time=$date;
    $sensor_detail->Date=$request->Date;
    $sensor_detail->Clock=$request->Clock;
    $sensor_detail->status=$request->status;
    $sensor_detail->search_time=$request->search_time;

    $sensor_detail->save();
    return redirect()->back()->with('success', 'Successfully Updated');
}
function home_admin(){
    $userid=Auth::user()->id;
    $sensor=Sensor::where('user_id',$userid)->
    return view('Admin_asstes.home_admin');
}
}
