<?php

namespace App\Http\Controllers;

use App\Events\sendMessage;
use App\Events\senseorEvent;
use App\Models\For_sensor;
use App\Models\Sensor;
use App\Models\Sensor_detail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Carbon\Carbon;

class AdminController extends Controller
{

    function index()
    {
        // dd(12);
        return view('Admin_asstes.index');
    }

    function addadmin()
    {
        return view('Admin_asstes.addadmin');
    }

    function edituser($id)
    {
        $user = User::find($id);
        return view('Admin_asstes.editusershow', ['admin' => $user]);
    }

    function updateuser(Request $request)
    {
        $user = User::find($request->id);
        if ($request->password != $user->password2) {
            if ($request->password == $request->Cpassword) {
                $user->password2 = $request->password;
                $pass = $request->password;
                $user->password = Hash::make($pass);
            } else {

                return redirect()->back()->with('error', 'Confirm Password Does Not Match');
            }
        }
        if ($request->addsensor == "on") {
            $user->addsensor = "1";
        } else {
            $user->addsensor = "0";
        }

        if ($request->deletesensor == "on") {
            $user->deletesensor = "1";
        } else {
            $user->deletesensor = "0";
        }
        if ($request->updatesensor == "on") {
            $user->updatesensor = "1";
        } else {
            $user->updatesensor = "0";
        }
        if ($request->graph == "on") {
            $user->graph = "1";
        } else {
            $user->graph = "0";
        }

        if ($request->search == "on") {
            $user->search = "1";
        } else {
            $user->search = "0";
        }
        if ($request->changechart == "on") {
            $user->changechart = "1";
        } else {
            $user->changechart = "0";
        }
        if ($request->sp == "on") {
            $user->sp = "1";
        } else {
            $user->sp = "0";
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        return redirect()->back()->with('success', 'Successfully User Updated');
    }

    function adduser_form(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:users|max:255',

        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = "user";
        $user->admin_id = Auth::user()->id;
        $user->activation_code = "activated";
        if ($request->addsensor == "on") {
            $user->addsensor = "1";
        } else {
            $user->addsensor = "0";
        }

        if ($request->deletesensor == "on") {
            $user->deletesensor = "1";
        } else {
            $user->deletesensor = "0";
        }
        if ($request->updatesensor == "on") {
            $user->updatesensor = "1";
        } else {
            $user->updatesensor = "0";
        }
        if ($request->graph == "on") {
            $user->graph = "1";
        } else {
            $user->graph = "0";
        }

        if ($request->search == "on") {
            $user->search = "1";
        } else {
            $user->search = "0";
        }
        if ($request->changechart == "on") {
            $user->changechart = "1";
        } else {
            $user->changechart = "0";
        }
        if ($request->sp == "on") {
            $user->sp = "1";
        } else {
            $user->sp = "0";
        }


        if ($request->password == $request->Cpassword) {
            $user->password2 = $request->password;
            $pass = $request->password;
            $user->password = Hash::make($pass);
        } else {

            return redirect()->back()->with('error', 'Confirm Password Does Not Match');
        }

        $user->save();

        return redirect()->back()->with('success', 'Successfully Added');
    }

    function addadmin_form(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:users|max:255',

        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = "admin";
        $user->admin_id = Auth::user()->id;
        $user->activation_code = "activated";

        if ($request->password == $request->Cpassword) {
            $user->password2 = $request->password;
            $pass = $request->password;
            $user->password = Hash::make($pass);
        } else {

            return redirect()->back()->with('error', 'Confirm Password Does Not Match');
        }

        $user->save();

        return redirect()->back()->with('success', 'Successfully Added');
    }

    function adminlist()
    {
        $user = User::where('role', 'admin')->get();
        return view('Admin_asstes.listadmin', ['admins' => $user]);
    }

    function deleteadmin($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'Successfully Deleted');
    }

    function editadmin($id)
    {
        $user = User::find($id);
        return view('Admin_asstes.editadminshow', ['admin' => $user]);
    }

    function updateadmin(Request $request)
    {
        $user = User::find($request->id);
        if ($request->password != $user->password2) {
            if ($request->password == $request->Cpassword) {
                $user->password2 = $request->password;
                $pass = $request->password;
                $user->password = Hash::make($pass);
            } else {

                return redirect()->back()->with('error', 'Confirm Password Does Not Match');
            }
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        return redirect()->back()->with('success', 'Successfully Updated');
    }

    function profile()
    {
        $user = User::find(Auth::user()->id);
        return view('Admin_asstes.profile', ['user' => $user]);
    }

    function updateprofile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->oldpassword != null) {

            if (Hash::check($request->oldpassword, $user->password)) {
                if ($request->newpassword != null) {
                    if ($request->newpassword == $request->confirmpassword) {
                        $user->password2 = $request->newpassword;
                        $pass = $request->newpassword;
                        $user->password = Hash::make($pass);
                    } else {

                        return redirect()->back()->with('error', 'Confirm Password Does Not Match');
                    }
                }
            } else {
                return redirect()->back()->with('error', 'Incorrect Old Password');
            }
        }
        $user->save();
        return redirect()->back()->with('success', 'Successfully Updated');
    }

    function adduser()
    {
        return view('Admin_asstes.adduser');
    }

    function userlist()
    {
        $user = User::where('role', 'user')->get();
        return view('Admin_asstes.listuser', ['admins' => $user]);
    }

    function deleteuser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'Successfully Deleted');
    }

    function addSensor()
    {
        $user = User::where('role', 'admin')->get();
        return view('Admin_asstes.addsensor', ['users' => $user]);
    }

    function addsensor_form(Request $request)
    {
        $sensor = new Sensor();
        $sensor->Sensor_Location = $request->Sensor_Location;
        $sensor->point = $request->point;


        $sensor->Sensor_IP = $request->Sensor_IP;
        $sensor->Sensor_Subnet = $request->Sensor_Subnet;
        $sensor->Sensor_GW = $request->Sensor_GW;
        $sensor->Sensor_DNS1 = $request->Sensor_DNS1;
        $sensor->Sensor_MAC = $request->Sensor_MAC;
        $sensor->Sensor_Status = $request->Sensor_Status;
        $sensor->Sensor_Restart = $request->Sensor_Restart;
        $sensor->user_id = $request->user_id;
        $sensor->save();
        return redirect()->back()->with('success', 'Successfully Sensor Added');
    }

    function showSensor()
    {
        $sensor = Sensor::all();
        return view('Admin_asstes.showsensor', ['sensors' => $sensor]);
    }

    function deletesensor($id)
    {
        $sensor = Sensor::find($id);
        // dd("helloo");
        $sensor->delete();
        return redirect()->back()->with('success', 'Successfully Sensor Deleted');
    }

    function editsensor($id)
    {
        $sensor = Sensor::find($id);
        $user = User::where('role', 'admin')->get();

        return view('Admin_asstes.editsensor', ['sensor' => $sensor, 'users' => $user]);
    }

    function updatesensor(Request $request)
    {
        $sensor = Sensor::find($request->id);
        $sensor->Sensor_Location = $request->Sensor_Location;

        $sensor->Sensor_IP = $request->Sensor_IP;
        $sensor->Sensor_Subnet = $request->Sensor_Subnet;
        $sensor->Sensor_GW = $request->Sensor_GW;
        $sensor->Sensor_DNS1 = $request->Sensor_DNS1;
        $sensor->Sensor_MAC = $request->Sensor_MAC;
        $sensor->Sensor_Status = $request->Sensor_Status;
        $sensor->Sensor_Restart = $request->Sensor_Restart;
        $sensor->user_id = $request->user_id;
        $sensor->save();
        return redirect()->back()->with('success', 'Successfully Sensor Updated');
    }

    function viewsensordetail($id)
    {
        // dd($id);
        $sensor_detail = Sensor_detail::where('sensor_id', $id)->get();
        return view('Admin_asstes.viewsensordetail', ['sensor_detail' => $sensor_detail, 'sensorid' => $id]);
    }

    function addsensordetail($sensorid)
    {
        return view('Admin_asstes.addsensordetail', ['sensorid' => $sensorid]);
    }

    function addsensordetail_form(Request $request)
    {
        $sensor_detail = new Sensor_detail();
        $sensor_detail->sensor_id = $request->sensor_id;
        $sensor_detail->temp = $request->temp;
        $date = Carbon::now();
        // dd($date);
        $sensor_detail->time = $date;
        $sensor_detail->Date = $request->Date;
        $sensor_detail->Clock = $request->Clock;
        $sensor_detail->status = $request->status;
        $sensor_detail->search_time = $request->search_time;

        $sensor_detail->save();

        $sensor = Sensor::find($request->sensor_id);
        $event = event(new senseorEvent($sensor, $sensor_detail));

        return redirect()->back()->with('success', 'Successfully Sensor_Detail Added');
    }

    function deletesensor_detail($id)
    {
        $sensor = Sensor_detail::find($id);
        $sensor->delete();
        return redirect()->back()->with('success', 'Successfully Deleted');
    }

    function editsensor_detail($id)
    {
        $sensor = Sensor_detail::find($id);
        return view('Admin_asstes.editsensor_detail', ['sensor' => $sensor]);
    }

    function updatesensordetail(Request $request)
    {
        $sensor_detail = Sensor_detail::find($request->id);
        $sensor_detail->sensor_id = $request->sensor_id;
        $sensor_detail->temp = $request->temp;
        $date = Carbon::now();
        // dd($date);
        $sensor_detail->time = $date;
        $sensor_detail->Date = $request->Date;
        $sensor_detail->Clock = $request->Clock;
        $sensor_detail->status = $request->status;
        $sensor_detail->search_time = $request->search_time;

        $sensor_detail->save();
        return redirect()->back()->with('success', 'Successfully Updated');
    }

    public function get_all_senser($user_id){
        $all_sens = Sensor::where('user_id', $user_id)->get();


        $all_ses_detail=array();

        foreach ($all_sens as $each_senser) {

            $all_ses_detail[] =  array("y"=>intval($each_senser->sensorDetail2->temp), "lable"=> $each_senser->Sensor_Location);
        }




        return response()->json($all_ses_detail);
    }




    public function get_sensers($senser_id){
        
        
        $sensr = Sensor::where('id', $senser_id)->get();
        
        $sensors = Sensor::all();

        
        $sens = Sensor::where('user_id', auth::user()->id)->orWhere('user_id', auth::user()->admin_id)->get();

        $all_ses_detail=array();

        foreach ($sens as $sensor) {
            if (isset($sensor->Sensorr_chart))
                {

                    $all_ses_points=array();
          foreach ($sensor->sensorDetail3 as $sensors1)
            {


                $all_ses_points[] =  array(
                    "x"=>strtotime($sensors1->created_at), "y"=> intval($sensors1->temp)
                    );

                    }

                    $all_ses_detail[] =  array(
                        "name"=>$sensor->Sensor_Location,
                        "type"=>"spline",
                        "yValueFormatString"=>"#0.## °C",
                        "showInLegend"=>true,
                        "dataPoints" => $all_ses_points);



                }
        }


         return response()->json($all_ses_detail);
    }


















public function getting_last_serser($senser_id)
{
    $sens = Sensor::where('id', $senser_id)->get();

return view('Admin_asstes.ajax_last_senser', compact('sens'));

}
    function home_admin()
    {

        $userid = Auth::user()->id;

        $sens = Sensor::where('user_id', $userid)->orWhere('user_id', auth::user()->admin_id)->get();


        return view('Admin_asstes.home_admin', compact('sens'));
    }

    function basictoday2()
    {

        $userid = Auth::user()->admin_id;

        $sens = Sensor::where('user_id', $userid)->orWhere('user_id', auth::user()->admin_id)->get();
        $sensor = Sensor::where('user_id', $userid)->get();

        return view('Admin_asstes.home_admin2', compact('sens'));
    }


    public function chart()
    {
        $sensors = Sensor::all();
        $sens = Sensor::where('user_id', auth::user()->id)->orWhere('user_id', auth::user()->admin_id)->get();
        return view('Admin_asstes.chart', compact('sensors', 'sens'));
    }

    public function view_temp(Request $request)
    {


        $sensor = For_sensor::where('userID', Auth::user()->id)->where('act', 'home')->get();
        foreach ($sensor as $sensors) {
            $sensors->delete();
        }

        if (isset($request->senID)) {


            for ($i = 0; $i < count($request->senID); $i++) {


                $sensor = new For_sensor();
                $sensor->sens_id = $request->senID[$i];
                $sensor->tick = 1;
                $sensor->userID = Auth::user()->id;
                $sensor->act = 'home';
                $sensor->save();
            }
        }

        return back()->with('success', 'Sensor Add Successfully');
    }

    function disablesensor($id)
    {

        $sensor = new For_sensor();
        $sensor->userID = Auth::user()->id;
        $sensor->sens_id = $id;
        $sensor->act = "disable";


        $sensor->save();
        return back()->with('success', 'Sensor Disabled Successfully');

    }

    function sensor_list()
    {
        $sensors = Sensor::where('user_id', Auth::user()->id)->get();
        return view('Admin_asstes.sensor_list', compact('sensors'));
    }

    function sensor_list_user()
    {
        $sensors = Sensor::where('user_id', Auth::user()->admin_id)->get();
        return view('Admin_asstes.sensor_list2', compact('sensors'));
    }

    function disabled_sensors()
    {
        $userid = Auth::user()->id;

        $sens = Sensor::where('user_id', $userid)->orWhere('user_id', auth::user()->admin_id)->get();
        return view('Admin_asstes.disabled_sensors', compact('sens'));
    }

    function ablesensor($id)
    {

        $sensor = For_sensor::find($id);


        $sensor->delete();
        return back()->with('success', 'Sensor Unabled Successfully');

    }

    function unable_sensor(Request $request)
    {
        $sensor = For_sensor::find($request->disable_sensor);
        $sensor->delete();
        return back()->with('success', 'Sensor Unabled Successfully');

    }

    function sensor_search()
    {
        $sensors = Sensor::all();

        return view('Admin_asstes.sensor_search', compact('sensors'));
    }

    function search_sensor(Request $request)
    {
        $sensors = Sensor::all();
        $start = $request->start_date;
        $end = $request->end_date;
        $sensor_list = Sensor_detail::where('created_at', '>=', $request->start_date)->where('created_at', '<=', $request->end_date)->where('sensor_id', $request->sensor)->get();
        return view('Admin_asstes.sensor_search', compact('sensor_list', 'sensors', 'start', 'end'));
    }

    function chart_search(Request $request)
    {
        $sensor = For_sensor::where('userID', Auth::user()->id)->where('act', 'chart')->get();
        if ($request->start_date == null && $request->end_date == null) {

            Session::forget('start_date');
            Session::forget('end_date');

        } else {
            $validated = $request->validate([
                'start_date' => 'required',
                'end_date' => 'required',
            ]);
            $request->session()->put('start', $request->start_date);
            $request->session()->put('end', $request->end_date);
        }


        foreach ($sensor as $sensors) {
            $sensors->delete();
        }

        if (isset($request->senID)) {


            for ($i = 0; $i < count($request->senID); $i++) {


                $sensor = new For_sensor();
                $sensor->sens_id = $request->senID[$i];
                $sensor->tick = 1;
                $sensor->userID = Auth::user()->id;
                $sensor->act = 'chart';
                $sensor->save();
            }
        }

        return back()->with('success', 'Sensor Add Successfully');
    }

    function dissable_chart($id)
    {
        $sensor = new For_sensor();
        $sensor->userID = Auth::user()->id;
        $sensor->sens_id = $id;
        $sensor->act = "disable2";


        $sensor->save();
        return back()->with('success', 'Sensor Disabled Successfully');
    }

    function sortby_minutes(Request $request)
    {
        $sensor_id = $request->rec_id;
        $number = $request->numb;
        // $request->session()->put('sensor_id', $sensor_id);
        $request->session()->put('number_' . $sensor_id . '', $number);
        return back()->with('success', 'Sorted Results');


    }
}
