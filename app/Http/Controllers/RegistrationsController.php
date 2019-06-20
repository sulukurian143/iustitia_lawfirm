<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Registration;
use App\LawyerDetail;
use DB;
//use App\Http\Controllers\Crypt;
use Crypt;
class RegistrationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registrations.create');//folder name.blade file
    }
    public function create1()
    {
        return view('lawyer.lawyer_dtls');
    }
    // public function create2()
    // {
    //     return view('lawyer.lawyer_home');
    // }
    public function lhome()
    {
        return view('lawyer.lawyer_home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function lawyer_details_get(Request $request) //lawyer details
    {
    //  
    $value = session('email');
    $a = Registration::where('email', $value)->get();
    return view('lawyer.lawyer_dtls',['a'=>$a]);
      // dd(Session::get('email'));
    }
    public function lawyer_details(Request $request)
    {
     
     }
    
    public function store(Request $request)
    {
        
       $file = $request->file('proof');
        $destinationPath = public_path('/ankitha');
        
      $file->move($destinationPath,$file->getClientOriginalName());
        //  $proof_id=$request->proof->getClientOriginalName();
        // // return($proof_id);
        //  $request->proof->storeAs('public/ankitha',$proof_id);
        $email=$request->input('email');
       // $category_id=$request->input('p_category');
        $check=DB::table('registrations')->where(['email'=>$email])->get();
        if(count($check)==0)
        {
        $registration=new Registration([                //Registration is model name
            'cid'=>$request->get('cid'),
            'fname'=>$request->get('fname'),
            'lname'=>$request->get('lname'),
            'address'=>$request->get('address'),
            'type'=>$request->get('type'),

            'proof'=> $file->getClientOriginalName(),
            'gender'=>$request->get('gender'),
            'country'=>$request->get('country'),
            'state'=>$request->get('state'),
            'city'=>$request->get('city'),
            'email'=>$request->get('email'),
            
            'password'=>Crypt::encrypt($request->get('password')),

            //'password'=>Hash::make($request->get('password')),
            'phone'=>$request->get('phone'),
            'status'=>'unblock',
            'approve'=>'0'
            // 'remember_token'=>$request->get('remember_token')
           
        ]);
      // print_r($request->get());exit;
        $registration->save();
        return redirect('/logins')->with('alert', 'Registered Sucessfully');
        exit;
    }
    else
    {
        return redirect('/registrations/create')->with('alert', ' Email id already exist!!Try another');;
    }
       // return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$email)
    {
        $email=$request->input('email');
       // return $email;
        // $check=DB::table('registrations')->where(['email'=>$email])->get();
        // if(count($check)==0)
        // {
        $details=new LawyerDetail([
            'email'=>$request->get('email'),
            'category'=>$request->get('category'),
            'office'=>$request->get('office')
      
           ]);
           $details->save();
           $insertedId=LawyerDetail::max('id');
       
        $detail = Registration::where('email', $email)->first();
        $detail->cid = $insertedId;
        $detail->fname = $request->get('fname');
        $detail->lname = $request->get('lname');
        $detail->address = $request->get('address');
        $detail->type = $request->get('type');
        $detail->proof = $request->get('proof');
        $detail->gender = $request->get('gender');
        $detail->email = $request->get('email');
        $detail->password =$request->get('password');
        $detail->phone = $request->get('phone');
        $detail->save();
           return redirect('/lhome');
        // }
        // else
        // return redirect('/lhome')->with('alert', 'U have already entered ur details');
           //exit;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
