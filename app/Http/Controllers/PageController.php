<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function hospitals()
    {
        return view('pages.hospitals');
    }

    public function vaccines()
    {
        return view('pages.vaccines');
    }

    public function support($section = 'user-guide')
    {
        $allowed = ['user-guide', 'security-awareness', 'contact-us', 'locate-us'];
        if (!in_array($section, $allowed)) {
            $section = 'user-guide';
        }
        return view('pages.support', compact('section'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function sendContact(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Send email to admin Gmail
        \Illuminate\Support\Facades\Mail::send([], [], function ($mail) use ($request) {
            $mail->to(config('mail.from.address'))
                ->subject('Contact Form: ' . $request->subject)
                ->html('
                    <div style="font-family:Arial,sans-serif;max-width:600px;margin:0 auto;padding:20px;border:1px solid #e5e7eb;border-radius:12px;">
                        <h2 style="color:#1a56db;margin-bottom:20px;">New Contact Message</h2>
                        <table style="width:100%;border-collapse:collapse;">
                            <tr style="background:#f1f5f9;">
                                <td style="padding:10px 14px;font-weight:bold;color:#374151;width:100px;border-radius:6px;">Name</td>
                                <td style="padding:10px 14px;color:#1e293b;">' . e($request->name) . '</td>
                            </tr>
                            <tr>
                                <td style="padding:10px 14px;font-weight:bold;color:#374151;">Email</td>
                                <td style="padding:10px 14px;color:#1e293b;"><a href="mailto:' . e($request->email) . '" style="color:#1a56db;">' . e($request->email) . '</a></td>
                            </tr>
                            <tr style="background:#f1f5f9;">
                                <td style="padding:10px 14px;font-weight:bold;color:#374151;">Subject</td>
                                <td style="padding:10px 14px;color:#1e293b;">' . e($request->subject) . '</td>
                            </tr>
                            <tr>
                                <td style="padding:10px 14px;font-weight:bold;color:#374151;vertical-align:top;">Message</td>
                                <td style="padding:10px 14px;color:#1e293b;line-height:1.7;">' . nl2br(e($request->message)) . '</td>
                            </tr>
                        </table>
                        <hr style="margin:20px 0;border:none;border-top:1px solid #e5e7eb;">
                        <p style="color:#94a3b8;font-size:12px;text-align:center;">Covid Vaccination Portal — Pakistan</p>
                    </div>
                ')
                ->replyTo($request->email, $request->name);
        });

        return back()->with('contact_sent', true);
    }
}
