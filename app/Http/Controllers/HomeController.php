<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\MasterModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $m;
    private $c;
    public function __construct()
    {
        $this->middleware('auth');
        $this->m = new MasterModel;
        //$this->custom = new CustomModel;
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
	
	public function explore()
    {
        return view('pages/explore');
    }
	
	public function profile()
    {
		$id = Auth::user()->id;
		$data['data'] = $this->m->getItem('users', 'id', $id);
		$data['post'] = $this->m->getItemsById('posts', 'user_id', $id);
		$data['follower'] = $this->m->getItemsById('followers', 'user_followed_id', $id);
		$data['following'] = $this->m->getItemsById('followers', 'user_following_id', $id);
		
        return view('pages/profile', $data);
    }
	
	public function detailPost($id_post)
    {
		$id = Auth::user()->id;
		$data['dota'] = $this->m->getItem('users', 'id', $id);
		$data['data'] = $this->m->getItem('posts', 'id', $id_post);
		
        return view('pages/detail_post', $data);
    }
}
