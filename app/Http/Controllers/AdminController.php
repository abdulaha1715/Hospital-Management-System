<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
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

    public function all_doctors() {
        $doctors = Doctor::all();
        return view('admin.all-doctors')->with([
            'doctors' => $doctors
        ]);
    }

    public function add_doctor_view() {
        return view('admin.add-doctor');
    }

    public function all_appointments() {
        $appointments = Appointment::all();
        return view('admin.all-appointments')->with([
            'appointments' => $appointments
        ]);
    }

    public function add_appointment_view() {
        return view('admin.add-appointment');
    }

    public function appointment_approved($id) {
        $appoinment = Appointment::find($id);

        $appoinment->app_status = "Approved";

        $appoinment->save();

        return redirect()->back();
    }

    public function appointment_cancelled($id) {
        $appoinment = Appointment::find($id);

        $appoinment->app_status = "Cancelled";

        $appoinment->save();

        return redirect()->back();
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
    public function new_doctor_store(Request $request)
    {
        $request->validate([
            'name'       => ['required', 'max:255', 'string'],
            'specialist' => ['not_in:none', 'string'],
            'phone'      => ['max:255', 'string'],
            'email'      => ['max:255', 'string', 'email',],
            'room'       => ['max:255', 'string'],
            'docimage'   => ['image'],
        ]);

        $docimage = null;
        if (!empty($request->file('docimage'))) {
            $docimage = time() . '-' . $request->file('docimage')->getClientOriginalName();
            $request->file('docimage')->storeAs('public/uploads', $docimage);
        }

        Doctor::create([
            'name'       => $request->name,
            'specialist' => $request->specialist,
            'phone'      => $request->phone,
            'email'      => $request->email,
            'room'       => $request->room,
            'docimage'   => $docimage,
        ]);

        return redirect()->route('all-doctors')->with('success', "Doctor Added Successfully!");
    }


    public function edit_doctor_info($id) {
        $doctor = Doctor::find($id);
        return view('admin.edit-doctor')->with([
            'doctor' => $doctor
        ]);
    }

    public function update_doctor_info(Request $request, Doctor $doctor) {

        $request->validate([
            'name'       => ['required', 'max:255', 'string'],
            'phone'      => ['max:255', 'string'],
            'email'      => ['max:255', 'string', 'email',],
            'room'       => ['max:255', 'string'],
            'docimage'   => ['image'],
        ]);

        $image = $doctor->docimage;

        if ( !empty($request->file('docimage')) ) {

            Storage::delete('public/uploads/'.$image);

            $image = time() . '-' . $request->file('docimage')->getClientOriginalName();

            $request->file('docimage')->storeAs('public/uploads', $image);
        }

        Doctor::find($request->id)->update([
            'name'       => $request->name,
            'specialist' => $request->specialist,
            'phone'      => $request->phone,
            'email'      => $request->email,
            'room'       => $request->room,
            'docimage'   => $image,
        ]);

        return redirect()->route('all-doctors')->with('success', "Doctor Info Updated");
    }

    public function delete_doctor_info($id) {
        $doctor = Doctor::find($id);

        $doctor->delete();

        return redirect()->back()->with('success', "Doctor Deleted Successfully!");
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
    // public function update(Request $request, $id)
    // {
    //     //
    // }

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
