<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Validator;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $auth_id = auth()->user()->id;
        $user_id = array($auth_id);
        $get_inactives = Service::whereNotIn('user_id', $user_id)->get();
        
        $get_actives = Service::where('user_id', $auth_id)->get();
        return view('home',compact('get_inactives', 'get_actives'));
    }
}
