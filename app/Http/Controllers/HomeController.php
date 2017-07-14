<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\MasterModel;
use App\CustomModel;

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
        $this->c = new CustomModel;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = $this->c->getPosts();
        return view('home', $data);
    }

	public function explore()
    {
        return view('pages/explore');
    }

	public function profileByName($username)
    {
      	$id = $this->m->getItem('users', 'username', $username)->id;
      	$data['data'] = $this->m->getItem('users', 'id', $id);
      	$data['post'] = $this->m->getItemsById('posts', 'user_id', $id);
      	$data['follower'] = $this->m->getItemsById('followers', 'user_followed_id', $id);
      	$data['following'] = $this->m->getItemsById('followers', 'user_following_id', $id);

        $data['isfollowing'] = $this->c->getIsFollowing($id);
        return view('pages/profile_by_name', $data);
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

    public function follow(Request $request)
    {
        $data['user_following_id'] = Auth::user()->id;
        $data['user_followed_id'] = $request->id_target;
        $this->m->insertItem('followers', $data);

        return back();
    }

    public function unfollow(Request $request)
    {
      $data['user_following_id'] = Auth::user()->id;
      $data['user_followed_id'] = $request->id_target;

      $this->c->unFollow($data['user_following_id'], $data['user_followed_id']);

      return back();
    }

    public function followers($id)
    {
        $data['data'] = $this->c->getFollowers($id);
        //dd($data['data']);
        return view('pages.followers', $data);
    }

    public function following($id)
    {
        $data['data'] = $this->c->getFollowing($id);
        return view('pages.following', $data);
    }
}
