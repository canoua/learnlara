<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationsController;
use App\Models\Location;

class LocationsController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'location_name' => 'required'
        ]);
    	$location = new Location();
    	$location->location_name = $request->location_name;
        $location->user_id = auth()->user()->id;
    	$location->longitude = $request->longitude;
    	$location->latitude = $request->latitude;
        $location->save();
    	return redirect('/home'); 
    }

    public function edit(Location $location)
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
                'locations_name' => 'required'
            ]);
    		$location->location_name = $request->location_name;
	    	$location->save();
	    	return redirect('/home'); 
    	}    	
    }

   
}
/*public function index {
    $locationsForJS = '[';
    foreach(auth()=>user()=>locations as locations) {
        $locationsForJS = "["
    }

    $locationsForJS = ']';
}*/
