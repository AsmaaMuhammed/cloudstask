<?php

namespace App\Http\Controllers;

use App\Charges;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function payment()
    {
        return view('paymentform');
    }
    public function charge(Request $request)
    {
        $data = $request->all();
        //dd($data);
        $token = $data['stripeToken'];

        $amount = $data['payment_plan_value'];
        \Stripe\Stripe::setApiKey(config('services.stripe.secret-key'));

        $charge = \Stripe\Charge::create([
            'amount' => $amount,
            'currency' => 'usd',
            'description' => 'Example charge',
            'source' => $token,
        ]);

        $chargeId = $charge->id;
        if($chargeId) {

            $user = \Auth::user();
            Charges::create([
                'user_id'=>$user->id,
                'charge_id' => $chargeId
            ]);

            return redirect()->route('home')->with('success_message', 'payment completed successfullly');
        }
        else
            return redirect()->back();
    }
}
