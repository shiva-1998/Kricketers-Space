<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOtpMail;
use App\Models\Player;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class UserController extends Controller
{

    public function saveRole(Request $request)
    {
        $request->validate([
            'role' => ['required', Rule::in(['player', 'team_captain'])], // adjust roles
        ]);
        Session::put('registration.role', $request->role);

        return redirect()->route('signup');
    }

    public function userSignup(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255|unique:players,email',
        ], [
            'email.unique' => 'This email is already registered. Please login instead.'
        ]);

        $user = Player::where('email', $request->email)->first();

        if ($user && $user->email_verified_at != null) {
            Session::put('registration.email', $request->email);

            return redirect()->route('setyourpassword'); // or next step
        }

        $otp = rand(1000, 9999);

        Session::put('registration.email', $request->email);
        Session::put('registration.otp', $otp);

        Mail::to($request->email)->send(new SendOtpMail($otp));

        return redirect()->route('otpverification');
    }


    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:4',
        ]);

        if ($request->otp == Session::get('registration.otp')) {

            // Update email_verified_at
            Player::updateOrCreate(
                ['email' => Session::get('registration.email')],
                ['email_verified_at' => now()]
            );

            return redirect()->route('setyourpassword');
        }

        return back()->with('error', 'Invalid OTP');
    }

    public function savePassword(Request $request)
    {
        $request->validate([
            'password' => [
                'required',
                'string',
                'min:8',
                'max:20',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).+$/'
            ]
        ], [
            'password.regex' => 'Password must include uppercase, lowercase, number and special character.',
            'password.confirmed' => 'Password and confirm password do not match.'
        ]);


        Session::put('registration.password', Hash::make($request->password));

        return redirect()->route('yourcricketprofile');
    }

    public function saveProfile(Request $request)
    {
        $request->validate([
            'your_role' => 'required',
            'batting_style' => 'required',
            'bowling_type' => 'required',
        ]);
        Session::put('registration.your_role', $request->your_role);
        Session::put('registration.batting_style', $request->batting_style);
        Session::put('registration.bowling_type', $request->bowling_type);

        return redirect()->route('addyourprofilepic');
    }

    public function saveProfilePic(Request $request)
    {

        $request->validate([
            'profile_pic' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $fileName = time() . '_profile.' . $file->extension();
            $file->move(public_path('uploads/profile_pic'), $fileName);
            Session::put('registration.profile_pic', 'uploads/profile_pic/' . $fileName);
        }

        // dd(Session::get('registration.profile_pic'));

        return redirect()->route('createyourteam');
    }

    public function saveTeam(Request $request)
    {
        $request->validate([
            'team_name' => 'required|string|max:100',
            'team_logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // store team name
        Session::put('registration.team_name', $request->team_name);
        if ($request->hasFile('team_logo')) {
            $file = $request->file('team_logo');
            $fileName = time() . '_team.' . $file->extension();
            $file->move(public_path('uploads/team_logo'), $fileName);
            Session::put('registration.team_logo', 'uploads/team_logo/' . $fileName);
        }

        $data = Session::get('registration');


        // return $data;

        Player::updateOrCreate(
            ['email' => $data['email']], // find by email
            [
                'role' => $data['role'] ?? null,
                'otp' => $data['otp'] ?? null,
                'password' => $data['password'] ?? null,
                'your_role' => $data['your_role'] ?? null,
                'batting_style' => $data['batting_style'] ?? null,
                'bowling_type' => $data['bowling_type'] ?? null,
                'profile_pic' => $data['profile_pic'] ?? null,
                'team_name' => $data['team_name'] ?? null,
                'team_logo' => $data['team_logo'] ?? null,
            ]
        );

        Session::forget('registration');

        return redirect()->route('allset');
    }
    // FINAL STEP: SAVE TO DATABASE
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = Player::where('email', $request->email)->first();
        if (!$user) {
            return back()->with('error', 'Invalid credentials');
        }
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Invalid credentials');
        }
        if (!$user->email_verified_at) {
            return back()->with('error', 'Please verify your email before login.');
        }
        Auth::login($user);

        return redirect()->route('team-captain-dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate session
        $request->session()->invalidate();

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        return redirect()->route('sign-in')->with('success', 'Logged out successfully');
    }

    public function teamcaptaindashboard()
    {
        return view('front.team-captain-dashboard.team-captain');
    }
}
