<?php

namespace Viksj\Contact\Http\Controllers\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Viksj\Contact\Mail\ContactMailable;
use Viksj\Contact\Models\Contact\Contact;

class ContactController extends Controller
{
   public function index()
   {
        return view('contact::contact.index');
   }

   public function send(Request $request)
   {
        $contact = Contact::create($request->all());

        if ($contact)
        {
            $sendMail = Mail::to(config('contact.send_email_to'))->send(new ContactMailable($request->comment, $request->first_name, $request->last_name));
            if ($sendMail)
            {
                return redirect()->back();
            }
        }
   }
}
