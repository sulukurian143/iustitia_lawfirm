<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Event;
use App\Event1;
use App\Registration;
use App\Document;

use App\Appointment;
use App\Payment;
use Auth;
use Crypt;
use DB;
use App\LawyerDetail;
use App\AppointmentApprove;
use App\Rating;
use Illuminate\Http\Response;

// use Faker\Provider\ro_MD\Payment;

class LoginsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('login.create');
    }
    public function admin()
    {
        return view('admin.admin_home');
    }
    public function creates()
    {
        $value=session('email');
        $s='0';
        $b='approved';
        $u=DB::table('appointments')->where('uemail',$value)->where('button',$b)->distinct()->pluck('email');
        $p=count($u);
        $userz = DB::table('appointments')
        ->join('registrations', 'appointments.email', '=', 'registrations.email')
        ->where('appointments.uemail', '=', $value)
        ->where('appointments.status', '=', $s)
        ->select('registrations.*', 'appointments.*')
        ->get();
        $c=count($userz);
        return view('user.user_home',compact('userz','c','p'));
    }
    public function create1()
    {
        return view('lawyer.lawyer_home');
    }
    public function create2()
    {
        return view('lawyer.change_pwd');
    }
    public function createus()
    {
        return view('user.changepwd');
    }
    public function create3()
    {
        return view('user.lawyer_search');
    }
    public function create4()
    {
        return view('lawyer.daily_schedule');
    }
    public function user_payment(Request $request)
    {
        $emailz=$request->get('doc_email');
        $title=$request->get('title');
        $date= date('Y-m-d');
        return view('user.user_payment',compact('emailz','title','date'));
    }
    public function payment_sel()
    {
        $value = session('email');
        $b='approved';
       // $a = Appointment::where('uemail', $value)->where('button', $val)->get();
       //return $a;
       $u = DB::table("appointments")->where('uemail',$value)->where('button',$b)->distinct()->pluck("email");
       $user = DB::table('appointments')->where('uemail',$value)->distinct()->get(['email'],['q1']);
       return view('user.payment_sel',compact('u','user'));
        
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)  //login form-fetching from registration table and login with crct email n pwd
    {
        // return "helloooo";
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        $email = $request->get('email'); //checking whether the given mail id z in db
        session(['email' => $email]);
        $value = session('email');
        $s='0';
        $b='approved';
        $password = $request->get('password');
        $a = Registration::where('email', $email)->get();
        foreach ($a as $object) {
                $pass = Crypt::decrypt($object->password);
                // return $pass;
                if ($pass == $password) {
                        if ($object->type == 'Lawyer') {
                                //return $value;
                                if ($object->status == 'unblock' and $object->approve == '1') {
                                        session_start();
                                        $request->session()->put('email', $request->input('email'));
                                        return view('lawyer.lawyer_home')->with('sess', $value);
                                    } else {
                                        return redirect('/logins')->with('alert', 'Sorry!!!Unauthorized user');
                                    }
                            } elseif ($object->type == 'User') {
                                if ($object->status == 'unblock' and $object->approve == '1') {
                                        session_start();
                                       
                                        $request->session()->put('email', $request->input('email'));
                            $u=DB::table('appointments')->where('uemail',$value)->where('button',$b)->distinct()->pluck('email')->toArray();
                                      // return $u;
                                        // foreach ($u as $ch) {
                                        //        print_r($ch);
                                        //         $m=DB::table('appointments')->where('uemail',$value)->where('email',$ch)->distinct()->pluck('q1')->toArray();
                                        //         return $m;} 
                                        $p=count($u);
                                        
                                        $userz = DB::table('appointments')
            ->join('registrations', 'appointments.email', '=', 'registrations.email')
            ->where('appointments.uemail', '=', $value)
            ->where('appointments.status', '=', $s)
            ->select('registrations.*', 'appointments.*')
            ->get();
            $c=count($userz);
            //return $c;
            //return $userz;
                                        return view('user.user_home',compact('userz','c','p'))->with('sess', $value);
                                    } else {
                                    return redirect('/logins');
                                }
                            } else {
                                session_start();
                                $request->session()->put('email', $request->input('email'));
                                return view('admin.admin_home');
                            }
                    } else {
                    return redirect('/logins')->with('alert', 'Invalid User name / Password !');
                }
            }
    }
    public function getCountryList()
    {


        //$countries = DB::table("countries")->pluck("name","id");
        $countries = DB::table("countries")->pluck("name", "id");
        //$departments = DB::table("departments")->pluck("name","id");
        return view('registrations.create', compact('countries'));



        //return view('admin.add_student',compact('departments'));
    }

    public function getStateList(Request $request)
    {
        $states = DB::table("states")
            ->where("country_id", $request->country_id)
            ->pluck("name", "id");
        return response()->json($states);
    }

    public function getCityList(Request $request)
    {
        $cities = DB::table("cities")
            ->where("state_id", $request->state_id)
            ->pluck("name", "id");
        return response()->json($cities);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_pwd(Request $request)
    {
        $cupass = $request->get('cupass');

        $e = $request->get('email');
        $value = DB::select("select * from registrations where email='$e'");

        //$cu_pass=Crypt::encrypt($cupass);
        $pass = $request->input('pass');
        //echo "Now" ,$cupass;
        $password = $request->input('conpass');
        $u_pass = Crypt::encrypt($pass);
        //return $cupass;
        foreach ($value as $object) {
                $pass1 = Crypt::decrypt($object->password);
                //echo "DB" ,$pass1;
                //return;
                if ($cupass == $pass1) {
                        if ($pass == $password) {
                                Registration::where('email', $e)
                                    ->update(['password' => $u_pass]);
                                return redirect('/logins')->with('alert', 'Password Updates Sucessfully');
                            } else {
                                return redirect('/create2')->with('alert', 'Passwords not matching');
                            }
                    } else {
                        return redirect('/create2')->with('alert', 'Current Password is incorrect');
                    }
            }
    }
    public function change_pwdusr(Request $request)
    {
        $cupass = $request->get('cupass');

        $e = $request->get('email');
        $value = DB::select("select * from registrations where email='$e'");

        //$cu_pass=Crypt::encrypt($cupass);
        $pass = $request->input('pass');
        //echo "Now" ,$cupass;
        $password = $request->input('conpass');
        $u_pass = Crypt::encrypt($pass);
        //return $cupass;
        foreach ($value as $object) {
                $pass1 = Crypt::decrypt($object->password);
                //echo "DB" ,$pass1;
                //return;
                if ($cupass == $pass1) {
                        if ($pass == $password) {
                                Registration::where('email', $e)
                                    ->update(['password' => $u_pass]);
                                return redirect('/logins')->with('alert', 'Password Updates Sucessfully');
                            } else {
                                return redirect('/creates')->with('alert', 'Passwords not matching');
                            }
                    } else {
                        return redirect('/creates')->with('alert', 'Current Password is incorrect');
                    }
            }
    }
    // return view('lawyer.change_pwd');


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $email) //profile edit updation of lawyer or user
    {
        $file = $request->file('proof');
        $destinationPath = public_path('/ankitha');

        $file->move($destinationPath, $file->getClientOriginalName());
        $detail = Registration::where('email', $email)->first();
        $detail->lname = $request->get('lname');
        $detail->fname = $request->get('fname');
        $detail->address = $request->get('address');
        $detail->type = $request->get('type');
        $detail->proof = $file->getClientOriginalName();
        $detail->gender = $request->get('gender');
        $detail->email = $request->get('email');
        //'password'=>Crypt::encrypt($request->get('password')),
        //$detail->password = $request->get('password');
        $detail->password = $request->get('password');
        $detail->phone = $request->get('phone');
        $detail->save();
        return redirect('/logins');
    }
    public function edit_profile() //user or lawyer home-edit profile
    {
        //$request->session()->put('email',$email); 
        $value = session('email');
        $a = Registration::where('email', $value)->get();

        // $edit = DB::table('registers')->where('reg_id', $reg_id);
        return view('lawyer.edit_profile', ['a' => $a]);
    }
    public function edit_user() //user or lawyer home-edit profile
    {
        //$request->session()->put('email',$email); 
        $value = session('email');
        $a = Registration::where('email', $value)->get();

        // $edit = DB::table('registers')->where('reg_id', $reg_id);
        return view('user.edit_user', ['a' => $a]);
    }
    public function user_pay_action(Request $request)
    {
        // $email=$request->input('email');
        // return $email;
        $payment = new Payment([
            'email' => $request->get('email'),
            'amount' => $request->get('amount'),
            'name' => $request->get('credit_name'),
            'cno' => $request->get('credit_no'),
            'cvv' => $request->get('cvv'),
            'expm' => $request->get('expm'),
            'expyr' => $request->get('expyr'),
            'law_email' => $request->get('emailz'),
            'title' => $request->get('title'),
            'date' => $request->get('date')
        ]);
        $payment->save();
        $value=session('email');
        $s='0';
        $b='approved';
        $u=DB::table('appointments')->where('uemail',$value)->where('button',$b)->distinct()->pluck('email');
        $p=count($u);
        $userz = DB::table('appointments')
        ->join('registrations', 'appointments.email', '=', 'registrations.email')
        ->where('appointments.uemail', '=', $value)
        ->where('appointments.status', '=', $s)
        ->select('registrations.*', 'appointments.*')
        ->get();
        $c=count($userz);
        return view('user.user_home',compact('userz','c','p'))->with('alert', 'Paid Sucessfully');;
    }
    public function user_mng(Request $request) //user manage by admin
    {
        $id = $request->get('id');
        return $id;
        $value = Registration::where('id', '=', $id)->get();
        // $st=DB::select("select * from tbl_regs,logins where u_type=1 and tbl_regs.r_id=".$value);
        foreach ($value as $object) {
                if (($object->status == 'block') && ($object->type == 'User')) {
                        Registration::where('id', $id)
                            ->update(['status' => 'unblock']);
                        return view('admin.admin_home');
                    } else if (($object->status == 'block') && ($object->type == 'Lawyer')) {
                        Registration::where('id', $id)
                            ->update(['status' => 'unblock']);
                        return view('admin.admin_home');
                    } else if (($object->status == 'unblock') && ($object->type == 'Lawyer')) {
                        Registration::where('id', $id)
                            ->update(['status' => 'block']);
                        return view('admin.admin_home');
                    } else {
                        Registration::where('id', $id)
                            ->update(['status' => 'block']);
                        return view('admin.admin_home');
                    }
            }
        //return view('admin.admin_user_mng');
        //return $user;

    }
    public function proof(Request $request)
    {
        $value = 'Lawyer';
        // $val='unblock';
        $id = $request->get('id');
        $a = Registration::where('type', $value)->where('id', $id)->get();
        return view('admin.proof', compact('a'));
    }
    public function man_user()
    {
        $value = 'User';
        $val = 'unblock';
        $a = Registration::where('type', $value)->where('status', $val)->get();
        //return $a;
        return view('admin.admin_user_mng', compact('a'));
    }
    public function man_lawyer(Request $request)
    {
        $value = 'Lawyer';
        $val = 'unblock';
        $a = Registration::where('type', $value)->where('status', $val)->get();
        //return $a;
        return view('admin.admin_lawyer_mng', compact('a'));
    }
    public function rating(Request $request)
    {
        $id = session('email');
        $rating = new Rating([
            'rating' => $request->get('example'),
            'email' => $request->get('email'),
            'uemail' => $id
        ]);

        $rating->save();
        $value=session('email');
        $s='0';
        $b='approved';
        $u=DB::table('appointments')->where('uemail',$value)->where('button',$b)->distinct()->pluck('email');
        $p=count($u);
        $userz = DB::table('appointments')
        ->join('registrations', 'appointments.email', '=', 'registrations.email')
        ->where('appointments.uemail', '=', $value)
        ->where('appointments.status', '=', $s)
        ->select('registrations.*', 'appointments.*')
        ->get();
        $c=count($userz);
        return view('user.user_home',compact('userz','c','p'));
    }
    public function man_bluser(Request $request)
    {
        $value = 'Lawyer';
        $val = 'block';
        $a = Registration::where('type', $value)->where('status', $val)->get();
        //return $a;
        return view('admin.admin_bluser_mng', compact('a'));
    }
    public function man_bllawyer(Request $request)
    {
        $value = 'Lawyer';
        $val = 'block';
        $a = Registration::where('type', $value)->where('status', $val)->get();
        //return $a;
        return view('admin.admin_bllawyer_mng', compact('a'));
    }
    public function app_approve(Request $request)
    {
        $value = session('email');
        $userz = DB::table('events')
            ->join('event1', 'events.id', '=', 'event1.eid')
            ->where('events.email', '=', $value)
            ->distinct()
            ->select('events.date')
            ->get();
        //return $userz;
        return view('lawyer.appointment', compact('userz'));
    }
    public function apptList(Request $request)
    {
     $value = session('email');
     $date=$request->date;
     $appt=$request->email;
    // return $b;
     $appt = DB::table('events')
     ->join('event1', 'events.id', '=', 'event1.eid')
     ->where('events.email', '=', $value)
     ->where('events.date', '=', $date)
     ->select( 'event1.*')
     ->get();
   return $appt;
return response()->json($appt);
    }
    public function user_approve(Request $request) //user approve by admin
    {
        $id = $request->get('id');
        // echo $id;
        $value = Registration::where('id', '=', $id)->get();
        // $st=DB::select("select * from tbl_regs,logins where u_type=1 and tbl_regs.r_id=".$value);
        foreach ($value as $object) {
                if ($object->approve == '0') {
                        Registration::where('id', $id)
                            ->update(['approve' => '1']);
                        return view('admin.admin_home');
                    } else {
                        Registration::where('id', $id)
                            ->update(['approve' => '0']);
                        return view('admin.admin_home');
                    }
            }
        // return View('/Admins/accordion');
        //return view('');


        //return $user;

    }
    public function usapprove()
    {
        $value = 'User';
        $val = '0';
        $a = Registration::where('type', $value)->where('approve', $val)->get();
        //return $a;
        return view('admin.admin_user_approve', compact('a'));
    }
    public function laapprove()
    {
        $value = 'Lawyer';
        $val = '0';
        $a = Registration::where('type', $value)->where('approve', $val)->get();
        //return $a;
        return view('admin.admin_user_approve', compact('a'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function lawyer_search(Request $request)
    {
        // $user = DB::select("select * from lawyer_details");
        $user = DB::table('lawyer_details')->distinct()->get(['category']);
        return view('user.lawyer_search', compact('user'));
    }
    public function  lawyer_search_get(Request $request)
    {
        $data = [];
        $cid = $request->input('user');
        $cat = $request->input('id');
        // return $cid;
        $check = DB::table('lawyer_details')->where(['category' => $cid])->select("id")->get()->toArray();
        foreach ($check as $ch) {
                // print_r($ch);
                $user = DB::table('lawyer_details')
                    ->join('registrations', 'registrations.cid', '=', 'lawyer_details.id')
                    ->where('lawyer_details.id', '=', $ch->id)
                    ->select('lawyer_details.*', 'registrations.*')
                    ->get();

                $rating = Rating::where('email', $user[0]->email)->get();
                $user[0]->rating = 0;
                if ($rating->count()) {
                    // print_r($rating);
                    $user[0]->rating = $rating[0]->rating;
                }


                // print_r($user[0]->email);
                array_push($data, $user);
            }
        //    return $data;
        return view('user.lawyer_list', compact('data'));
        //return $data;



        //  return response()->json($check);
    }
    public function  my_lawyer(Request $request)
    {
        $value = session('email');
        $val = 'approved';
        $a = Appointment::where('uemail', $value)->where('button', $val)->distinct()->get('email');
        // return $a;
        return view('user.my_lawyer', compact('a'));
    }
    public function  us_doc(Request $request)
    {
         $value = session('email');
         $b='approved';
        // $a = Appointment::where('uemail', $value)->where('button', $val)->get();
        //return $a;
        $u = DB::table("appointments")->where('uemail',$value)->where('button',$b)->distinct()->pluck("email");
        $user = DB::table('appointments')->where('uemail',$value)->distinct()->get(['email'],['q1']);
        return view('user.us_doc',compact('u','user'));
    }
    
    public function titleList(Request $request)
    {
     
        $value = session('email');
        $title = DB::table("appointments")
    ->where("email", $request->email)
    ->where("uemail", $value)
    ->pluck("q1");
   // return $title;
return response()->json($title);
    }
    public function  us_doc_get(Request $request)
    {
        $value = session('email');
        $val = $request->get('doc_email');
        $d=$request->get('title');
        // return $d;
        $doc = $request->file('doc');
        $destinationPath = public_path('/ankitha');
        //'proof'=> $file->getClientOriginalName(),
      $doc->move($destinationPath,$doc->getClientOriginalName());
      $document = new Document([
        'title' => $request->get('title'),
        'file'=> $doc->getClientOriginalName(),
        'uemail'=>$value,
        'email'=>$val,
        'document' => $request->get('document')
        
    ]);

    $document->save();
    //echo "hai";
    $s='0';
    $b='approved';
    $u=DB::table('appointments')->where('uemail',$value)->where('button',$b)->distinct()->pluck('email');
    $p=count($u);
    $userz = DB::table('appointments')
    ->join('registrations', 'appointments.email', '=', 'registrations.email')
    ->where('appointments.uemail', '=', $value)
    ->where('appointments.status', '=', $s)
    ->select('registrations.*', 'appointments.*')
    ->get();
    $c=count($userz);
    return view('user.user_home',compact('userz','c','p'))->with('alert','Success');
        
    }
    public function  lawyer_doc(Request $request)
    {
        $value = session('email');
         $b='approved';
        // $a = Appointment::where('uemail', $value)->where('button', $val)->get();
        //return $a;
        $u = DB::table("appointments")->where('email',$value)->where('button',$b)->distinct()->pluck("uemail");
        //  $user = DB::table('documents')->where('uemail',$value)->distinct()->get(['email'],['q1']);
        return view('lawyer.lawyer_doc',compact('u'));
    }
    public function  fees(Request $request)
    {
        $value = session('email');
         $b='approved';
        // $a = Appointment::where('uemail', $value)->where('button', $val)->get();
        //return $a;
        $u = DB::table("appointments")->where('email',$value)->where('button',$b)->distinct()->pluck("uemail");
        //  $user = DB::table('documents')->where('uemail',$value)->distinct()->get(['email'],['q1']);
        return view('lawyer.fees',compact('u'));
    }
    public function  fees_get(Request $request)
    {
        $value = session('email');
        $uemail=$request->get('doc_email');
        $title=$request->get('title');
        // $a = Appointment::where('uemail', $value)->where('button', $val)->get();
        //return $uemail;
        $u = DB::table("payments")->where('law_email',$value)->where('email',$uemail)->get();
        //return $u;
        //  $user = DB::table('documents')->where('uemail',$value)->distinct()->get(['email'],['q1']);
        return view('lawyer.fees_get',compact('u','uemail','title'));
    }
    // public function  download($file)
    // {
    //     $file_path=a;
    //     $headers=array(
    //         'Content-Type:application/pdf',
    //     );
    //     return Response::download($file,'info.pdf',$headers);
    // }
    public function titlelawList(Request $request)
    {
     
        $value = session('email');
        $title = DB::table("appointments")
    ->where("email",$value )
    ->where("uemail", $request->email)
    ->pluck("q1");
   // return $title;
return response()->json($title);
    }
    public function  lawyer_doc_get(Request $request)
    {
        $value = session('email');
        $val = $request->get('doc_email');
       
        // $a = Appointment::where('uemail', $value)->where('button', $val)->get();
        //return $a;
        $u = DB::table("documents")->where('email',$value)->where('uemail',$val)->get();
        //  $user = DB::table('documents')->where('uemail',$value)->distinct()->get(['email'],['q1']);
        //return $u;
        return view('lawyer.lawyer_doc_get',compact('u'));
    }
    
    
    public function  mylawyer_app_get(Request $request)
    {
        $value = session('email');
        $val = 'approved';
        $val1 = 'token';
        $user = Appointment::where('uemail', $value)->where('button', $val)->pluck('email');
        $user1 = Event::where('email', $user)->pluck('id');
        $user2 = Event1::where('eid', $user1)->pluck('eid');

        $a = DB::table('events')
            ->join('event1', 'events.id', '=', 'event1.eid')
            ->where('events.email', '=', $user)
            ->where('event1.token', '=', $val1)
            ->select('events.*', 'event1.*')
            ->get();

        //return $userz;

        $c = count($a);
        //return $c;
        if ($c != 0) {

                return view('user.my_lawyer', compact('a'));
            } else
            return ("rejected");
            $value=session('email');
        $s='0';
        $b='approved';
        $u=DB::table('appointments')->where('uemail',$value)->where('button',$b)->distinct()->pluck('email');
        $p=count($u);
        $userz = DB::table('appointments')
        ->join('registrations', 'appointments.email', '=', 'registrations.email')
        ->where('appointments.uemail', '=', $value)
        ->where('appointments.status', '=', $s)
        ->select('registrations.*', 'appointments.*')
        ->get();
        $c=count($userz);
        return view('user.user_home',compact('userz','c','p'));
    }
    public function  myclients(Request $request)
    {
        $value = session('email');
        $val = 'approved';
        $val1 = 'token';
        $user = Appointment::where('email', $value)->where('button', $val)->distinct('uemail')->get();
        return view('lawyer.myclient', compact('user'));
    }
    public function  emergency_lawyer(Request $request)
    {
        // $email=$request->get('email');
        // return $email;
        return view('lawyer.emergency_lawyer');
    }
    public function  emg_lawyer_set(Request $request)
    {
        
        return view('lawyer.emergency_lawyer');
    }
    public function  app_get($app_get)
    {
        $email= $app_get;
        return view('user.lawyer_appointment', compact('email'));
    }
    public function  us_home($us_home)
    {
        $value=session('email');
        $s='0';
        $id= $us_home;
        $b='approved';
        $u=DB::table('appointments')->where('uemail',$value)->where('button',$b)->distinct()->pluck('email');
        $p=count($u);
        Appointment::where('id', $id)
            ->update(['status' => '1']);
            $userz = DB::table('appointments')
            ->join('registrations', 'appointments.email', '=', 'registrations.email')
            ->where('appointments.uemail', '=', $value)
            ->where('appointments.status', '=', $s)
            ->select('registrations.*', 'appointments.*')
            ->get();
            $c=count($userz);
            //return $userz;
        return view('user.user_home', compact('userz','c','p'));
    }
    // public function  lawyer_appt(Request $request)
    // {
    //     $b1=$request->get('b');
    //     if(($b1=='Token1')||($b1=='Token2')||($b1=='Token3')||($b1=='Token4')||($b1=='Token5')||($b1=='Token6'))
    //     {
    //             return("hai");
    //     }
    //     else
    //     return("hello");
    // }
    public function appointment(Request $request)
    {
        $e=$request->get('email');

        $appointment = new Appointment([
            'email' => $request->get('email'),
            'uemail' => $request->get('uemail'),
            'q1' => $request->get('q1'),
            'q2' => $request->get('q2'),
            'button' => 'pending',
            'status'=>'0',
            'available'=>'1'
        ]);
        $appointment->save();
        $value=session('email');
        $s='0';
        $b='approved';
        $u=DB::table('appointments')->where('uemail',$value)->where('button',$b)->distinct()->pluck('email');
        $p=count($u);
        $userz = DB::table('appointments')
        ->join('registrations', 'appointments.email', '=', 'registrations.email')
        ->where('appointments.uemail', '=', $value)
        ->where('appointments.status', '=', $s)
        ->select('registrations.*', 'appointments.*')
        ->get();
        $c=count($userz);
        return view("user.user_home",compact('userz','c','p'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function schedule(Request $request)
    {
        //
        //$date = Input::get('date');
        return view('lawyer.daily_schedule');
    }
    public function notification(Request $request)
    {
        $value = session('email');
        $val = 'pending';

        $a = Appointment::where('email', $value)->where('button', $val)->get();
        //return $a;
        // $edit = DB::table('registers')->where('reg_id', $reg_id);
        return view('lawyer.notification', compact('a'));
    }
    public function user_rating()
    {
        $value = session('email');
        $val = 'approved';
        $user = Appointment::where('uemail', $value)->where('button', $val)->distinct()->get('email');
        return view('user.rating', compact('user'));
    }
    public function document(Request $request)
    {
        return view('hello');
    }
    public function user_noti(Request $request,$email)
    {
        $b=$request->get('button');
        $value = session('email');

        //$email = $request->get('email');
        //return $email;
                $data = [];
        
        
        $val = 'approved';
        $val1 = 'token';
        $cdate = date('Y-m-d');
        $user = Appointment::where('uemail', $value)->where('button', $val)->distinct('email')->pluck('email');
        
        // $user1=Event::where('email',$user)->pluck('id');
        // $user2=Event1::where('eid',$user1)->pluck('eid');
        //return $user;
        foreach ($user as $u) {
                $userz = DB::table('events')
                    ->join('event1', 'events.id', '=', 'event1.eid')
                    ->join('appointments','appointments.email','=','events.email')
                    ->where('appointments.uemail','=',$value)
                    ->where('appointments.button','=',$val)
                    ->where('events.email', '=', $u)
                    ->where('event1.token', '=', $val1)
                    ->where('events.date', '=', $cdate)
                    ->select('events.*', 'event1.*')->distinct('appointments.email')
                    ->get();
                
                    foreach($userz as $u){
                        array_push($data, $u);
                    }
                    
            }
            //return $data;
        $c = count($data);
          //return $c;
        if ($c != 0) {
           // return $data;
                return view('user.user_noti', compact('data','email'));
            } else
            {
                $s='0';
                $b='approved';
                $u=DB::table('appointments')->where('uemail',$value)->where('button',$b)->distinct()->pluck('email');
                $p=count($u);
            $userz = DB::table('appointments')
            ->join('registrations', 'appointments.email', '=', 'registrations.email')
            ->where('appointments.uemail', '=', $value)
            ->where('appointments.status', '=', $s)
            ->select('registrations.*', 'appointments.*')
            ->get();
            $c=count($userz);
            
            }

            return view('user.user_home',compact('userz','c','p'))->with('alert', 'No appointments');
              
        }
            


    public function noti_approve(Request $request)
    {

        $app = new AppointmentApprove([
            'email' => $request->get('email'),
            'uemail' => $request->get('uemail'),
            'qs1' => $request->get('qs1'),
            'qs2' => $request->get('qs2'),
            'button' => $request->get('button')
        ]);
        $app->save();
        // //     break;
        // //     case 'Reject' : $app=new AppointmentApprove([
        // //             'email'=>$request->get('email'),
        // //             'uemail'=>$request->get('uemail'),
        // //             'qs1'=>$request->get('qs1'),
        // //             'qs2'=>$request->get('qs2'),
        // //             'button'=>'reject'
        // //         ]);
        // //         $app->save();
        // //         break;
        // }
        return view('lawyer.lawyer_home');
    }
    public function scheduler(Request $request)
    {
        $d=$request->get('date');
        $events = new Event([
            'email' => $request->get('email'),
            'date' => $request->get('date')

        ]);
        $events->save();
        $insertedId = Event::max('id');
        $t=array();
        $t=$request->get('check');
      // return $t;
        $a=DB::table('event1')
        ->join('events', 'events.id', '=', 'event1.eid')
        ->where('events.date','=',$d)
        ->where('event1.stime','=',$t)
        ->get();
        $x=count($a);
        if($x==0)
        {
        foreach($t as $t1)
        {
        $event1 = new Event1([
            'eid' => $insertedId,
            'stime' => $t1,
            // 'etime' => $request->get('etime'),
            'token' => 'token',
            'uemail'=>'pending'
        ]);
        $event1->save();
    }}
    else
        return view('lawyer.lawyer_home')->with('alert','already selected');
    return view('lawyer.lawyer_home');
    }
    public function noti_update(Request $request)
    {
        $value=session('email');
       // return $value;
        $id = $request->id;
       //return $id;
        $t='Approved';
        $v='token';
        $d=$request->date;
        //return $d;
        $a=DB::table('event1')
        ->join('events', 'events.id', '=', 'event1.eid')
        ->where('event1.uemail','=',$value)
        ->where('event1.token','=',$t)
        ->where('events.date','=',$d)
        ->get();
        //return $a;
        $m=count($a);
        //return $m;
        if($m==0)
        {
        Event1::where('id', $id)
            ->update(['token' => 'Approved','uemail' => $value]);
         return $t;
    }
    else 
    {
        return $v;   
    }
    }
    public function notiList(Request $request)
    {
     $value = session('email');
     $date=$request->date;
     $b='token';
     $appt = DB::table('events')
     ->join('event1', 'events.id', '=', 'event1.eid')
     ->where('events.email', '=', $value)
     ->where('events.date', '=', $date)
     ->where('event1.token', '=', $b)
     ->select( 'event1.*')
     ->get();
   return $appt;
return response()->json($appt);
    }
    public function law_noti_update(Request $request)
    {

        $id = $request->id;
        //return $id;
        // $b=$request->button;
        $b = $request->text;
        // return $b;
        switch ($b) {
            case 'Accept':
                Appointment::where('id', $id)
                    ->update(['button' => 'approved']);
                return "Accepted";
                break;
            case 'Reject':
                Appointment::where('id', $id)
                    ->update(['button' => 'rejected']);
                return "Rejected";
                break;
        }
    }
    public function noti_update1(Request $request)
    {
        $id = $request->id;
        // $value = DB::select("select * from registrations where email='$e'");
        Event1::where('id', $id)
            ->select('token');
        // Event1::where('id', $id)
        // ->update(['token' => 'Approved']);
        return 1;
    }
    public function user_chat()
    {
        return view('user.user_chat');
    }
    public function logout(Request $request)
    {
        // session_start();
        // session_destroy();
        Session()->flush();
        Auth::logout();
        return redirect('/logins');
    }
}
