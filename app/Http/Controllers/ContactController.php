<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function contact()
    {
        $contacts = Contact::latest()->paginate(5);
        return view('admin.contact.index', compact('contacts'));
    }

    public function add()
    {
        return view('admin.contact.create');
    }

    public function store(Request $request)
    {
        Contact::insert([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => Carbon::now(),
        ]);

        return redirect()
            ->route('admin.contact')
            ->with('success', 'Contact Created Successfully...!!');
    }

    public function index()
    {
        $contact = DB::table('contacts')->first();
        return view('contact', compact('contact'));
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contact.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        Contact::find($id)->update([
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return back()->with('success', 'Contact Updated Successfully..');
    }

    public function delete ($id) {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        
        return back()->with('success', 'Contact Deleted Successfully...!!!');
    }

    public function ContactForm(Request $request)
    {
        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('success', 'Message Sent Successfully...!!!');
    }

    public function message()
    {
        $messages = ContactForm::latest()->paginate(5);

        return view('admin.contact.message', compact('messages'));
    }

    public function deleteMessage($id) {
        $message = ContactForm::find($id);
        $message->delete();

        return back()->with('success', 'Message Deleted Successfully...!!!');

    }
}
