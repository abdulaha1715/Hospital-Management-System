<?php

namespace App\Http\Controllers;

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

    public function add_doctor_view() {
        return view('admin.add-doctor');
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

        return redirect()->back()->with('success', "Doctor Added Successfully!");
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