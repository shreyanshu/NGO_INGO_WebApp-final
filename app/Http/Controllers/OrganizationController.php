<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;
use App\Donor;
class OrganizationController extends Controller
{
 	public function index()
 	{
 		$orgs = Organization::get();
 		$donors=Donor::get();
 		return view('NGO_INGO', compact('orgs','donors'));
 		return Organization::all();

 		
 	}   

 	public function destroy(Organization $organization)
 	{
 		// dd($organization->id);
 	// 	$donor->project()->detach();
 	// 	$donor->organization->detach();
 	// 	$donor->forceDelete();

 		$organization->donor()->detach($organization->id);
 		$organization->forceDelete();

 		
 		$orgs = Organization::get();
 		return view('NGO_INGO', compact('orgs'));
 	
 	}

 	public function store(Request $request)
 	{
 		$organization = new Organization;
 		$organization->swc_no = $request->swcNumber;
 		$organization->name = $request->name;
 		$organization->address = $request->address;
 		$organization->contactperson = $request->contact;
 		$organization->phone = $request->phone;
 		$organization->email = $request->email;
 		$organization->website = $request->website;
 		$organization->description = $request->description;
 		$organization->affiliation = $request->affilation;
 		$organization->category = $request->role;

 		$organization->logo_id = 1; // needs to be changed
 		$organization->estab_date = "2017-8-05"; // needs ro be changed
 		$organization->district_id = 1; // needs to be changed 
 		$organization->tags = "";// needs to be changed
 		$organization->approved_date = "2017-8-09"; 
 		$organization->sponsor_id = 1;

 		$organization->save();
 		/*dd($organization->poject());*/
 		$organization->project()->attach($request->project);	

		return redirect('/NGO_INGO'); 
 	}  
}
