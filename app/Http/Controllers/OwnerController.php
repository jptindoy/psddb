<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Owner;
use App\Sticker;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Owner::orderBy('surname', 'asc')->paginate(10);
        return view('pages.sticker-records')->with('records',$records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.add-records');
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
            'sticker_no' => 'required',
            'expiry_date' => 'required',
            'surname' => 'required',
            'firstname' => 'required',
            'midlename' => 'required',
            'or_number' => 'required',
            'address' => 'required',
            'contact_no1' => 'required',
            'model' => 'required',
            'color' => 'required',
            'type' => 'required',
            'plate_no' => 'required',
            'category' => 'required'
        ]);
        
        ///create post

        $owner = new Owner;
        $owner->surname = $request->input('surname');
        $owner->firstname = $request->input('firstname');
        $owner->midlename = $request->input('midlename');
        $owner->address = $request->input('address');
        $owner->contact_no1 = $request->input('contact_no1');
        $owner->contact_no2 = $request->input('contact_no2');
        $owner->model = $request->input('model');
        $owner->color = $request->input('color');
        $owner->type = $request->input('type');
        $owner->plate_number = $request->input('plate_no');
        $owner->applicant_category = $request->input('category');
        $owner->others = $request->input('others');
        $owner->parent = $request->input('parent');
        $owner->sticker_id = $request->input('sticker_id');
        $owner->save();

        $sticker = new Sticker;
        $sticker->sticker_no = $request->input('sticker_no');
        $sticker->sticker_color = $request->input('sticker_color');
        $sticker->expiry_date = $request->input('expiry_date');
        $sticker->or_number = $request->input('or_number');
        $sticker->date_issued = $request->input('date_issued');
        $sticker->status = $request->input('status');  
        $sticker->save();     

        return redirect('/add')->with('success', 'Record Added!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return the id
        $owner =  Owner::find($id);

        return view('pages.details')->with('owner', $owner);
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
