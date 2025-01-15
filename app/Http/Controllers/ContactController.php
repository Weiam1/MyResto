<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // Email content
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        // Use Mail::html to send an email with HTML content
        Mail::html(
            "<p><strong>Name:</strong> {$data['name']}</p>
            <p><strong>Email:</strong> {$data['email']}</p>
            <p><strong>Message:</strong><br>{$data['message']}</p>",
            function ($message) use ($data) {
                $message->to('weiamalmahnash@gmail.com') 
                    ->subject('New Contact Form Submission')
                    ->replyTo($data['email']);
            }
        );

        return redirect()->route('contact.index')->with('success', 'Your message has been sent successfully!');
    }
}
