<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
    return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['last-name','first-name','gender','email','postcode','address','building_name','opinion']);
        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->only(['last-name','first-name','gender','email','postcode','address','building_name','opinion']);
        Contact::create($contact);
        return view('thanks');
    }

    public function find()
    {
        return view('find', ['input' => '']);
    }
    public function search(ContactRequest $request)
    {
        $item = Contact::where('name', 'LIKE',"%{$request->input}%")->first();
        $param = [
            'input' => $request->input,
            'item' => $item
        ];
        return view('find', $param);
    }

}