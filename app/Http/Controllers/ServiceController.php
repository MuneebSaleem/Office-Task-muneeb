<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Validator;
use Config;
use Session;
use Stripe;

class ServiceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        $auth_id = auth()->user()->id;
        $user_id = array($auth_id);
        $get_inactives = Service::whereNotIn('user_id', $user_id)->get();
        
        $get_actives = Service::where('user_id', $auth_id)->get();

        return view('services.index',compact('get_inactives', 'get_actives'));

    }

}
