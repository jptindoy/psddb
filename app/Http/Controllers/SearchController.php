<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Owner;
use App\Sticker;
use App\Vehicle;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $id = $_GET['id'];

        $results = Owner::join('stickers', 'owners.id', '=', 'stickers.owner_id')->join('vehicles', 'owners.id', '=', 'vehicles.owner_id')
                            ->where('owners.surname', 'LIKE', '%' . $id . '%')
                            ->orWhere('stickers.sticker_no', 'LIKE', '%' . $id . '%')
                            ->orWhere('vehicles.plate_number', 'LIKE', '%' . $id . '%')
                            ->paginate(20);
        
        if($results->isEmpty()){
            if($user = Auth::check()){
                return '<h3 style="color:red;">No record found!</h3> <a href="/add" class="btn btn-success">Add new record</a>';
            } else {
                return '<h3 style="color:red;">No record found!</h3> <button class="btn btn-success" data-toggle="modal" data-target="#login">Add new record</button>';
            }
            
        } else {

            echo '<table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Sticker No.</th>
                        <th scope="col">Plate No.</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>';

                    foreach($results as $result){
                        echo '<tr>';
                            echo '<td>'.$result->surname.', '.$result->firstname.'</td>';
                            echo '<td>'.$result->sticker_no.'</td>'; 
                            echo '<td>'.$result->plate_number.'</td>'; 
                            echo '<td><a href="/owners/'.$result->owner_id.'" class="btn btn-success btn-sm">Show details...</a></td>';    
                        echo '<tr>';
                    }
            echo    '</tbody>
                </table>';           
            
           return;
        }
        
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
