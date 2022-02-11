<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::id()){
            return redirect('home');
        } else {
            $data = Doctor::all();
            return view('user.home')->with([
                'doctors' => $data
            ]);
        }
    }

    public function home()
    {
        if(Auth::id()){
            if (Auth::user()->usertype == '1') {
                $data = Doctor::all();
                return view('user.home')->with([
                    'doctors' => $data
                ]);
            } else {
                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }

    }

    public function getAppointment(Request $request) {

        $request->validate([
            'name'       => ['required', 'max:255', 'string'],
            'email'      => ['max:255', 'string', 'email',],
            'appdate'      => ['max:255', 'string'],
            'doctor' => ['not_in:none', 'string'],
            'phone'      => ['max:255', 'string']
        ]);

        Appointment::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'appdate'    => $request->appdate,
            'doctor'     => $request->doctor,
            'phone'      => $request->phone,
            'message'    => $request->message,
            'app_status' => "In Progress",
            'user_id'    => Auth::user()->id
        ]);

        return redirect()->back()->with('appsuccess', "Appoinment Added!");

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
