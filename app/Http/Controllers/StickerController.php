<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sticker;

class StickerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.add-sticker');
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
        //Validation
        $this->validate($request,[
            'sticker_color' => 'required',
            'sticker_no' => 'required',
            'expiry_date' => 'required',
            'date_issued' => 'required',
            'or_number' => 'required'
        ]);
        
        if(Sticker::where(['sticker_no' => $request->input('sticker_no'), 
                    'sticker_color' => $request->input('sticker_color'), 
                    'expiry_date' => $request->input('expiry_date'), 
                    'or_number' => $request->input('or_number'), 
                    'date_issued' => $request->input('date_issued')])->first()) {
            return redirect()->back()->with('error', 'Record already exist!'); 
        } else {
            // store in vehicles db
            $sticker = new Sticker;
            $sticker->owner_id = $request->owner_id;
            $sticker->vehicle_id = $request->input('vehicle_id');
            $sticker->sticker_no = $request->input('sticker_no');
            $sticker->sticker_color = $request->input('sticker_color');
            $sticker->expiry_date = $request->input('expiry_date');
            $sticker->or_number = $request->input('or_number');
            $sticker->date_issued = $request->input('date_issued');
            $sticker->status = $request->input('status');
            $sticker->save();

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
        $sticker_id = $_GET['id'];
        $info = Sticker::find($sticker_id);

        return view('pages.update-sticker')->with('info', $info);
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
            'sticker_no' => 'required',
            'expiry_date' => 'required',
            'date_issued' => 'required',
            'status' => 'required'
        ]);
        
        $sticker = Sticker::find($id);
        $sticker->vehicle_id = $request->input('vehicle_id');
        $sticker->sticker_no = $request->input('sticker_no');
        $sticker->sticker_color = $request->input('sticker_color');
        $sticker->expiry_date = $request->input('expiry_date');
        $sticker->or_number = $request->input('or_number');
        $sticker->date_issued = $request->input('date_issued');
        $sticker->status = $request->input('status');
        $sticker->save();

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
