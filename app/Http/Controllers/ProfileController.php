<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use App\Http\Utils\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\FreelancerInformation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('pages.freelancer.auth.edit', [
            'user' => $request->user(),
            'freelancer_information' => FreelancerInformation::find(Auth::user()->id),
            'domain'=>Listing::Domain()
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        
        $request->user()->fill($request->validated());
        

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
     
        $user=$request->validate([
            'name'=>['required'],
             'email'=>['required'],
             'profil_photo'=>['required','image']
        ]);
        // delete last image 
        $getLastImage=Auth::user()->profil_photo;
        Storage::delete('public/profil_photo/'.$getLastImage); 
        // update user 
        $user['profil_photo']=$request->file('profil_photo')->store('profil_photo','public');
        $data=User::find(Auth::user()->id);
        $fileName=explode('/',$user['profil_photo']);
        $data->profil_photo=$fileName[1];
        $data->save();
        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function edit_freelancer_information(Request $request)
    {
        $data=$request->validate([
            'tjm'=>['required','integer'],
            'job'=>['required','string','min:4'],
            'domain'=>['required','string','min:4'],
            'description'=>['required','string','min:12'],
            'skills'=>['string'],
            'cv'=>['file','mimes:pdf','max:1024']
        ]);
        $fileName='';
        
        if (!is_null($request->file('cv'))) {
            $data['cv']=$request->file('cv')->store('cv','public');
            $fileName=explode('/',$data['cv']);
            $data['cv']=$fileName[1];
        }

        $data['user_id']=Auth::user()->id;
        // delete last file 
        $getLastFile=FreelancerInformation::where('user_id',$data['user_id'])->get('cv');
        Storage::delete('public/cv/'.$getLastFile[0]->cv);    
        // insert or update 
        DB::table('freelancer_information')->upsert(
            $data,
            ['user_id'],
            ['tjm', 'job','domain','description','skills','cv','user_id'],
        );
       
        
       
        return Redirect::route('profile.edit')->with('status', 'profile-update-information-freelancer');
    }
    public function delete_cv(string $str)
    {
        
        $data=FreelancerInformation::where('cv',$str)->get();
        
        FreelancerInformation::where('cv',$str)->update([
            'cv'=>null ,
        ]);      
        Storage::delete('public/cv/'.$str);  
        
        return Redirect::route('profile.edit')->with('status', 'profile-update-information-freelancer');

          
        
    }
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}