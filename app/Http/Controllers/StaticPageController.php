<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    function pricing()  {
        return view('pages.user.static.pricing-plan');
    }

    function faq_freelancer()  {
        return view('pages.user.static.faq-freelancer');
    }
    
    function faq_recrutor()  {
        return view('pages.user.static.faq-recrutor');
    }
    
    
    function support()  {
        return view('pages.user.static.support');
    }
    
    function support_store(Request $request)   {
        $data=$request->validate([
            'name'=>['required','string','min:2'],
            'email'=>['required','email'],
            'subject'=>['required','string','min:4'],
            'message'=>['required','string','min:12'],
        ]);
        Contact::create($data);
       session()->flash('success','success');
        return view('pages.user.static.support');
    }
}