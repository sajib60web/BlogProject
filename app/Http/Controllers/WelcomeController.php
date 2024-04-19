<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\ContactMessage;
use App\Models\Faq;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $data['page_name'] = 'Home';
        return view('frontend.index', $data);
    }

    public function about()
    {
        $data['page_name'] = 'About';
        $data['about'] = About::find(1);
        return view('frontend.about', $data);
    }

    public function contact()
    {
        $data['page_name'] = 'Contact';
        $data['faqs'] = Faq::all();
        return view('frontend.contact', $data);
    }

    public function contactForm(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'phone_number' => 'required|max:191',
            'message' => 'required'
        ]);

        $contact = new ContactMessage();
        $contact->name = $request->name;
        $contact->phone_number = $request->phone_number;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->love_to_read = implode(", ",$request->love_to_read);
        $contact->save();
        $notification = array(
            'message' => 'Contact Submitted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
