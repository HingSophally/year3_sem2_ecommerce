<?php

namespace App\Http\Controllers;

use App\Mail\MarketingEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class EmailController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.marketing', compact('users'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'content' => 'required',
            'recipients' => 'required|array',
            'recipients.*' => 'email'
        ]);

        $subject = $request->subject;
        $content = $request->content;
        $recipients = $request->recipients;

        if ($request->action === 'preview') {
            return view('emails.marketing', compact('subject', 'content'));
        }

        foreach ($recipients as $recipient) {
            Mail::to($recipient)->send(new MarketingEmail($subject, $content));
        }

        return redirect()->back()->with('success', 'Emails sent successfully!');
    }
}
