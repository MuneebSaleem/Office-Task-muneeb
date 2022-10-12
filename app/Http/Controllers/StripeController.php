<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Validator;
use Config;
use Mail;
use App\Mail\serviceMail;

class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe(Request $request)
    {
        $auth_id = auth()->user()->id;
        $all_services = Config::get('app.services_name');
        $get_actives = Service::where('user_id', $auth_id)->pluck('name', 'name')->toArray();

        return view('stripe',compact('all_services', 'get_actives'));
    }
    
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);

        $service_create = Service::create([
            'name' => $request->name,
            'user_id' => auth()->user()->id,
            'payment_status' => 0,
        ]);

        $mailData = [
            'title' => 'Mail from Muneeb Task',
            'body' => 'Payment successful'
        ];
         
        Mail::to(Auth::user()->email)->send(new serviceMail($mailData));
      
        Session::flash('success', 'Payment successful!');

        return redirect()->route('services.index')
                        ->with('success','Payment successful!');
              
        // return back();
    }
}
