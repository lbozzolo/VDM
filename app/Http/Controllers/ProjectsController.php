<?php

namespace Vdm\Http\Controllers;

use Illuminate\Http\Request;
use Vdm\Models\Customer;
use Vdm\Models\Phase;
use Vdm\User;

class ProjectsController extends Controller
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
        return view('index');
    }

    public function create()
    {
        $data['users'] = User::all()->pluck('full_name', 'id');
        $data['customers'] = Customer::all()->pluck('username', 'id');
        $data['phases'] = Phase::all()->pluck('name', 'id');
        return view('projects.create')->with($data);
    }
}
