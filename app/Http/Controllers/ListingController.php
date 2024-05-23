<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Session\Session;

class ListingController extends Controller
{
    //in the controllers here is where we write methods
    
    // Show all listings
    public function index(){
        // dd(request('tag'));
        return view('listings.index', [
            'listings' => Listing::latest()->filter
            (request(['tag', 'search']))->paginate(4)
        ]);

    }
    //Show single listing
    public function show(Listing $listing){
        return view('listings.show', [
            'listing' => $listing
        ]);

    }
    // Show create form
    public function create(){
        return view('listings.create');
    }

    // Store listing data
    public function store(Request $request) {
        // dd($request->file('logo')->store());
        $formFields = $request->validate([
            'tittle' =>'required',
            'company' =>['required', Rule::unique('listings','company')],
            'location' =>'required',
            'website' =>'required',
            'email' =>['required', 'email'],
            'tags' =>'required',
            'desscription' =>'required'

        ]);
        // check if file(image) was uploaded
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }
//user/user id to be recorded in the database when a listing is created
        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);
        
        return redirect('/')->with('message', 'Listing created successfully!');

    }
    // Show edit form
    public function edit(Listing $listing) {
        // dd($listing->tittle); if you add the -> it meant you want only to view the tittle its only get the tile
        return view('listings.edit', ['listing' => $listing]);
    }

    // Update listing data
    public function update(Request $request, Listing $listing) {
        // dd($request->file('logo')->store());
        $formFields = $request->validate([
            'tittle' =>'required',
            'company' =>['required'],
            'location' =>'required',
            'website' =>'required',
            'email' =>['required', 'email'],
            'tags' =>'required',
            'desscription' =>'required'

        ]);
        // check if file(image) was uploaded
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }

        $listing->update($formFields);
        
        return back()->with('message', 'Listing updated successfully!');

    }
    // Delete Listing
    public function destroy(Listing $listing) {
        $listing->delete(); 
        return redirect('/')->with('message', 'Listing Deleted Successfully');
    }
    public function manage(){
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
}

}
