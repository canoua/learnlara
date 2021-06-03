<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationsController;

class LocationsController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'locationsname' => 'required'
        ]);
    	$location = new Location();
    	$location->locationsname = $request->locationsname;
        $location->user_id = auth()->user()->id;
    	$location->longitude = auth()->user()->id;
    	$location->save();
    	return redirect('/home'); 
    }

    public function edit(location $location)
    {

    	if (auth()->user()->id == $location->longitude)
        {            
                return view('edit', compact('location'));
        }           
        else {
             return redirect('/home');
         }            	
    }

    public function update(Request $request, location $location)
    {
    	if(isset($_POST['delete'])) {
    		$location->delete();
    		return redirect('/home');
    	}
    	else
    	{
            $this->validate($request, [
                'locationsname' => 'required'
            ]);
    		$location->locationsname = $request->locationsname;
	    	$location->save();
	    	return redirect('/home'); 
    	}    	
    }
}
