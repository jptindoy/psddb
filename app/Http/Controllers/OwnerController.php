<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Owner;
use App\Sticker;
use App\Vehicle;

class OwnerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index', 'show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Owner::join('stickers', 'owners.id', '=', 'stickers.owner_id')
                    ->join('vehicles', 'owners.id', '=', 'vehicles.owner_id')
                    ->orderBy('surname', 'asc')
                    ->paginate(10);
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
        if(Owner::where(['surname' => $request->input('surname'), 'firstname' => $request->input('firstname'), 'midlename' => $request->input('midlename')])->first()) {
            return redirect('/add')->with('error', 'Record already exist!'); 
        } else {
            // store in owners db
            $owner = new Owner;
            $owner->surname = $request->input('surname');
            $owner->firstname = $request->input('firstname');
            $owner->midlename = $request->input('midlename');
            $owner->address = $request->input('address');
            $owner->contact_no1 = $request->input('contact_no1');
            $owner->contact_no2 = $request->input('contact_no2');            
            $owner->applicant_category = $request->input('category');
            $owner->others = $request->input('others');
            $owner->parent = $request->input('parent');
            $owner->save();
            
            //geting the id of last owner record
            $owner_id = DB::table('owners')->orderBy('id','desc')->first();

            // store in vehicles db
            $vehicle = new Vehicle;
            $vehicle->owner_id = $owner_id->id;
            $vehicle->model = $request->input('model');
            $vehicle->color = $request->input('color');
            $vehicle->type = $request->input('type');
            $vehicle->plate_number = $request->input('plate_no');
            $vehicle->save();

            //geting the id of last vehilce record
            $vehicle_id = DB::table('vehicles')->orderBy('id','desc')->first();

            // store in stickers db
            $sticker = new Sticker;
            $sticker->owner_id = $owner_id->id;
            $sticker->vehicle_id = $vehicle_id->id;
            $sticker->sticker_no = $request->input('sticker_no');
            $sticker->sticker_color = $request->input('sticker_color');
            $sticker->expiry_date = $request->input('expiry_date');
            $sticker->or_number = $request->input('or_number');
            $sticker->date_issued = $request->input('date_issued');
            $sticker->status = $request->input('status');  
            $sticker->save();     

            return redirect('/add')->with('success', 'Record Added!'); 
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
        //edit the owner information
        $infos = Owner::find($id);

        return view('pages.update-info')->with('infos', $infos);

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
            'surname' => 'required',
            'firstname' => 'required',
            'address' => 'required',
            'contact_no1' => 'required',
            'category' => 'required'
        ]);
        
        $owner = Owner::find($id);
        $owner->surname = $request->input('surname');
        $owner->firstname = $request->input('firstname');
        $owner->midlename = $request->input('midlename');
        $owner->address = $request->input('address');
        $owner->contact_no1 = $request->input('contact_no1');
        $owner->contact_no2 = $request->input('contact_no2');            
        $owner->applicant_category = $request->input('category');
        $owner->others = $request->input('others');
        $owner->parent = $request->input('parent');
        $owner->save();

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
