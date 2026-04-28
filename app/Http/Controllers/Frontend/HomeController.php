<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOtpMail;
use App\Models\{Tournament, Payment};
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Razorpay\Api\Api;


class HomeController extends Controller
{

   public function index()
   {
      $tournaments = Tournament::latest()->get();

      // return $tournaments;
      return view('front.index', compact('tournaments'));
   }

   public function tournaments()
   {

      return view('front.tournaments');
   }

   public function register()
   {

      return view('front.user-registrations.user-register');
   }

   public function signup()
   {

      return view('front.user-registrations.sign-up');
   }

   public function otpverification()
   {

      return view('front.user-registrations.otp-verification');
   }

   public function setyourpassword()
   {

      return view('front.user-registrations.set-your-password');
   }

   public function letsgetstarted()
   {

      return view('front.user-registrations.lets-get-started');
   }
   public function yourcricketprofile()
   {

      return view('front.user-registrations.your-cricket-profile');
   }
   public function addyourprofilepic()
   {

      return view('front.user-registrations.add-your-profile-pic');
   }
   public function createyourteam()
   {

      return view('front.user-registrations.create-your-team');
   }
   public function allset()
   {

      return view('front.user-registrations.all-set');
   }

   public function signinotp()
   {

      return view('front.user-signin.otp-verification');
   }

   public function signin()
   {
      // return "madhu";
      return view('front.user_signin.sign-in');
   }


   public function forgetpassword()
   {

      return view('front.user-signin.forget-password');
   }

   public function setnewpassword()
   {

      return view('front.user-signin.set-new-password');
   }



public function teamcaptainmatches()
{
   return view('front.team-captain-dashboard.matches');
}

public function teamcaptaintournaments()
{
   return view('front.team-captain-dashboard.tournaments');
}

public function teamcaptainplayers()
{
   return view('front.team-captain-dashboard.team-players');
}

public function teamcaptainprofile()
{
   return view('front.team-captain-dashboard.profile');
}

   // ==================================================================================================================================
   public function pay($id)
   {
      if (!auth()->check()) {
         return redirect()->route('login')->with('error', 'Please login first');
      }

      $tournament = Tournament::findOrFail($id);

      // ✅ Check if already paid
      $existing = Payment::where('player_id', auth()->id())
         ->where('tournament_id', $id)
         ->where('status', 'success')
         ->first();

      if ($existing) {
         return redirect()->back()->with('error', 'You already registered for this tournament');
      }

      // ✅ Optional: check slots
      if ($tournament->slots <= 0) {
         return redirect()->back()->with('error', 'No slots available');
      }

      $api = new \Razorpay\Api\Api(
         config('services.razorpay.key'),
         config('services.razorpay.secret')
      );

      $order = $api->order->create([
         'receipt' => 'txn_' . time(),
         'amount' => $tournament->entry_fee * 100,
         'currency' => 'INR'
      ]);

      Payment::create([
         'player_id' => auth()->id(),
         'tournament_id' => $tournament->id,
         'razorpay_order_id' => $order['id'],
         'amount' => $tournament->entry_fee,
         'status' => 'pending'
      ]);

      return view('front.payment', compact('tournament', 'order'));
   }

   public function verifyPayment(Request $request)
   {
      $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

      try {
         $attributes = [
            'razorpay_order_id' => $request->razorpay_order_id,
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'razorpay_signature' => $request->razorpay_signature
         ];

         $api->utility->verifyPaymentSignature($attributes);

         // Update payment
         $payment = Payment::where('razorpay_order_id', $request->razorpay_order_id)->first();

         if ($payment) {
            $payment->update([
               'razorpay_payment_id' => $request->razorpay_payment_id,
               'razorpay_signature' => $request->razorpay_signature, 
               'status' => 'success'
            ]);
         }

         return response()->json(['success' => true]);
      } catch (\Exception $e) {

         return response()->json(['success' => false]);
      }
   }
}
