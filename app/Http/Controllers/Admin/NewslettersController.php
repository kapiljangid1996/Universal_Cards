<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsletter;

class NewslettersController extends Controller
{
    public function submitNewsletter(Request $request)
    {
        $request->validate([
            'email_address' => 'email|required|min:2|unique:newsletters,email_address',
        ]);

        $newsletters = Newsletter::create([
            'email_address' => $request->email_address,
        ]);

        return redirect()->back()->with('success', 'We Have Recieved Your Subscription Request. Thank You!');
    }
}
