<?php

namespace App\Http\Controllers;



use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('pages.contact');
    }

    public function submit(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:120',
            'email'   => 'required|email',
            'phone'   => 'nullable|string|max:30',
            'subject' => 'nullable|string|max:150',
            'message' => 'required|string|max:2000',
            'service_required' => 'nullable|string|max:120',
        ]);

        $data['ip_address'] = $request->ip();

        ContactMessage::create($data);

        // Send notification to your email (configure MAIL_ in .env)
        Mail::raw("New enquiry from {$data['name']} ({$data['email']}):\n\n{$data['message']}", function ($msg) {
            $msg->to('fiiverivers786@gmail.com')
                ->subject('New Five Rivers website enquiry');
        });

        return back()->with('success','Thank you. We will contact you shortly.');
    }
}
