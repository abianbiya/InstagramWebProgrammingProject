<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Myapp\models\mymodel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $model;

    public function __construct()
    {
        $this->middleware('auth');
        $this->model = new mymodel;
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

    //Show
    public function menu()
    {
        $data['menu'] = $this->model->getMenu();
        return view ('authentication.menu', $data);
    }

    public function grupMenu()
    {
        $data['menu'] = $this->model->getGroupMenu();
        return view ('authentication.grup-menu', $data);
    }

    public function user()
    {
        $data['user'] = $this->model->getUserList();
        return view ('authentication.user', $data);
    }

    public function peran()
    {
        $data['peran'] = $this->model->getPeran();
        return view ('authentication.peran', $data);
    }

    //Insert - Form

    public function menuInsert()
    {
        $data['grupmenu'] = $this->model->getGroupMenu();
        return view ('authentication.menu-insert', $data);
    }

    public function grupMenuInsert()
    {
        return view ('authentication.grup-menu-insert');
    }

    public function peranInsert()
    {
        return view ('authentication.peran-insert');
    }

    //Insert - Proccess

    public function menuInsertProcess(Request $request)
    {
        $data['id_menu'] = $request->input('id_menu');
        $data['nm_menu'] = $request->input('nm_menu');
        $data['route'] = $request->input('route');
        $data['id_group_menu'] = $request->input('id_group_menu');

        $this->model->insertMenu($data);
        return redirect(route('menu'));
    }

    public function grupMenuInsertProcess(Request $request)
    {
        $data['id_group_menu'] = $request->input('id_group_menu');
        $data['nm_group_menu'] = $request->input('nm_group_menu');

        $this->model->insertGroupMenu($data);
        return redirect(route('grup-menu'));
    }

    public function peranInsertProcess(Request $request)
    {
        $data['id_peran'] = $request->input('id_peran');
        $data['nm_peran'] = $request->input('nm_peran');

        $this->model->insertPeran($data);
        return redirect(route('peran'));
    }

    public function userPeran($id)
    {
        $data['user'] = $this->model->getUserDetail($id);
        $data['peran'] = $this->model->getPeran();
        return view('authentication.user-peran', $data);
    }

    public function userPeranProcess(Request $request)
    {
        $data['id_user'] = $request->input('id_user');
        $data['id_peran'] = $request->input('peran');

        if (empty($this->model->cekUserPeran($request->input('id_user')))) {
            $this->model->insertUserPeran($data);
        }else{
            $this->model->updateUserPeran($data);
        }

        return redirect(route('user'));
    }

    public function menuKewenangan($id)
    {
        $data['peran'] = $this->model->getPeran();
        $data['menu'] = $this->model->getDetailMenu($id);
        return view('authentication.menu-kewenangan-insert', $data);
    }

    public function menuKewenanganProcess(Request $request)
    {
        $data['id_menu'] = $request->input('id_menu');
        $data['id_peran'] = $request->input('id_peran');
        $data['is_create'] = $request->input('create');
        $data['is_read'] = $request->input('read');
        $data['is_update'] = $request->input('update');
        $data['is_delete'] = $request->input('delete');

        if (empty($this->model->cekMenuKewenangan($request->input('id_menu'), $request->input('id_peran')))) {
            $this->model->insertMenuKewenangan($data);
        }else{
            $this->model->updateMenuKewenangan($data);
        }

        return redirect(route('menu'));
    }

    //Delete

    public function deleteMenu($id)
    {
        $this->model->deleteMenu($id);
        return redirect(route('menu'));
    }

    public function deleteGrupMenu($id)
    {
        $this->model->deleteGroupMenu($id);
        return redirect(route('grup-menu'));
    }

    public function deletePeran($id)
    {
        $this->model->deletePeran($id);
        return redirect(route('peran'));
    }



    //Menu List

    public function menuAdminRead()
    {
        return view('home')->with('message', 'Halaman Read Admin!`');
    }

    public function menuAdminCreate()
    {
        return view('home')->with('message', 'Halaman Create Admin!');
    }

    public function menuAdminUpdate()
    {
        return view('home')->with('message', 'Halaman Update Admin!');
    }

    public function menuAdminDelete()
    {
        return view('home')->with('message', 'Halaman Delete Admin!');
    }



    public function menuRootRead()
    {
        return view('home')->with('message', 'Halaman Read Root!`');
    }

    public function menuRootCreate()
    {
        return view('home')->with('message', 'Halaman Create Root!`');
    }

    public function menuRootUpdate()
    {
        return view('home')->with('message', 'Halaman Update Root!`');
    }

    public function menuRootDelete()
    {
        return view('home')->with('message', 'Halaman Delete Root!`');
    }
}
