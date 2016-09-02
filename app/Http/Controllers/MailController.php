<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use Redirect;
use Request;
use Validator;

class MailController extends Controller
{
    public function showcontactform(){
        return view('pages.contact');
    }
    public function getContactUsForm(){
        //Get all the data and store it inside Store Variable
        $data = Request::all();
        $data['datetime'] = date("F j, Y, g:i a");
        $data['userip'] = Request::getClientIp();
        //Validation rules
        $rules = array (
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'textmessage' => 'required|min:5'
        );
        //Validate data
        $validator = Validator::make ($data, $rules);
        //If everything is correct than run passes.
        if ($validator->passes()){
            Mail::send('emails.contact', $data, function($message) use ($data)
            {
                //Send email from the email filled in by user
                //$message->from($data['email'], 'feedback contact form');
                //email 'To' field: cahnge this to emails that you want to be notified.
                $message->to('eddorules@gmail.com', 'Aomguides')->subject('Contact Form submissal:' . $data['subject']);
            });
            // Redirect to page
            return Redirect::route('contact_us')
                ->with('success', 'Your message has been sent. Thank You!');
            //return View::make('contact');
        }else{
            //return contact form with errors
            return Redirect::route('contact_us')
                ->with('error', 'Make sure that all the fields are filled out properly.');
        }
    }
}
