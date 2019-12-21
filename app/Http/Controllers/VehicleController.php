<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;

class VehicleController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.add-vehicle');
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

        //Validation
        $this->validate($request,[
            'model' => 'required',
            'color' => 'required',
            'type' => 'required',
            'plate_no' => 'required'
        ]);
        
        if(Vehicle::where(['plate_number' => $request->input('plate_no')])->first()) {
            return redirect()->back()->with('error', 'Record already exist!'); 
        } else {
            // store in vehicles db
            $vehicle = new Vehicle;
            $vehicle->owner_id = $request->owner_id;
            $vehicle->model = $request->input('model');
            $vehicle->color = $request->input('color');
            $vehicle->type = $request->input('type');
            $vehicle->plate_number = $request->input('plate_no');
            $vehicle->save();

            return redirect()->back()->with('success', 'Vehilce added!'); 
        }
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
        $vehilce_id = $_GET['id'];
        $info = Vehicle::find($vehilce_id);

        return view('pages.update-vehicle')->with('info', $info);
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

        $this->validate($request,[
            'model' => 'required',
            'color' => 'required',
            'type' => 'required',
            'plate_no' => 'required'
        ]);
        
        $vehicle = Vehicle::find($id);
        $vehicle->model = $request->input('model');
        $vehicle->color = $request->input('color');
        $vehicle->type = $request->input('type');
        $vehicle->plate_number = $request->input('plate_no');
        $vehicle->save();

        return redirect()->back()->with('success', 'Record Updated!'); 

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
