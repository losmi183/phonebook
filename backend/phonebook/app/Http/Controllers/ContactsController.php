<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactsController extends Controller
{
    public function index() 
    {
        $contacts = Contact::all();

        return response()->json(['contacts' => $contacts], 200);
    }

    public function store(Request $request) 
    {
        $data = request()->validate([
            'name' => 'required',
            'address' => 'sometimes',
            'email' => 'sometimes',
            'phone' => 'required',
            'phone2' => 'sometimes',
            'status' => 'sometimes',
        ]);

        $contact = Contact::create($data);

        return response()->json(['message' => 'Contact Saved'], 200);
    }

    public function show($id)
    {
        $contact = Contact::find($id);

        return response()->json(['contact' => $contact], 200);
    }

    public function update(Request $request, $id) 
    {
        
        $data = request()->validate([
            'name' => 'required',
            'address' => 'sometimes',
            'email' => 'sometimes',
            'phone' => 'required',
            'phone2' => 'sometimes',
            'status' => 'sometimes',
            ]);            
            
        $contact = Contact::find($id);

        $contact->update($data);

        return response()->json(['message' => 'Update Success'], 200);
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);

        $contact->delete();

        return response()->json(['message' => 'Deleted'], 200);

    }

}
