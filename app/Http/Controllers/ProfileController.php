<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use App\Http\Requests\StoreprofileRequest;
use App\Http\Requests\UpdateprofileRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\profile;
use App\Models\country;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = country::all();
        $have_profile = profile::where('user_id',Auth::id())->first();
        // dd($get_profile);
         if(Auth::check()&$have_profile->exists())
        {    $countries = country::all();
            
            return view('profile.edit',['countries'=>$countries,'profile'=>$have_profile]);
            

        }
        else
        {
            return view('profile.create',['countries'=>$countries]);
   
           
        }
    
       
    }

    /**esponse
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreprofileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreprofileRequest $request)
    {   
        $have_profile = profile::where('user_id',Auth::id())->exists();
  
         if( !$have_profile)
        {
        $profile = new profile();
        $profile->fullname = $request->fullname;
        $dob = strtotime($request->dob);
        $profile->dob = date('y-m-d',$dob);
        // compute
       
        $age = Carbon::parse($dob)->age;

        // end compute
        $profile->age = $age;

        $profile->country_id = $request->country_id;
        $profile->job = $request->job;
        $profile->school = $request->school;
        $profile->description = $request->des;
        if(Auth::check())
        {        
            $profile->user_id =Auth::id();
        }
        $profile->save();
       return redirect('/profile');
    }
    else
    {
        abort(403);
    }

        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateprofileRequest  $request
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateprofileRequest $request)
    {
        // if(Auth::check()&Auth::id()===$profiles->user_id)
        // {
        $profile = profile::where('user_id',Auth::id())->first();
        $profile->fullname = $request->fullname;
        $dob = strtotime($request->dob);
        $profile->dob = date('y-m-d',$dob);
        // compute
       
         $age = Carbon::parse($dob)->age;
        // end compute
        $profile->age = $age;

        $profile->country_id = $request->country_id;
        $profile->job = $request->job;
        $profile->school = $request->school;
        $profile->description = $request->des;
        $profile->save();
       return redirect('/profile');
        // }
        // else
        // {
        //     abort(403);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(profile $profile)
    {
        //
    }
}

