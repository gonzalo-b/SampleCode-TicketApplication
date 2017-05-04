<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

use App\Http\Requests;

class ContactsController extends Controller
{
    /**
     * Display a listing of the contacts.
     *
     */
    public function index()
    {
        return view('contacts.index');
    }

    /**
     * Show the form for creating a new contact.
     *
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Display the specified contact.
     *
     */
    public function show(Contact $contact)
    {
        $data['contact'] = $contact;

        return view('contacts.show', $data);
    }

    /**
     * Store a newly created contact in storage.
     *
     */
    public function store(ContactRequest $request)
    {
        $contact = new Contact($request->all());
        $contact->save();

        session()->put('success', 'Contact was successfully created.');
        return redirect('contacts');
    }

    /**
     * Show the form for editing the specified contact.
     *
     */
    public function edit(Contact $contact)
    {
        $data['contact'] = $contact;
        
        return view('contacts.edit', $data);
    }

    /**
     * Update the specified contact in storage.
     *
     */
    public function update(ContactRequest $request, Contact $contact)
    {
        $contact->update($request->all());
        $contact->save();

        session()->put('success', 'Contact was successfully updated.');
        return redirect('contacts');
    }

    /**
     * Remove the specified contact from storage.
     *
     */
    public function destroy(Contact $contact)
    {
        $contact = Contact::find($contact->id);
        $contact->delete();

        session()->put('success', 'Contact was successfully deleted.');
        return view('contacts.index');
    }
}
