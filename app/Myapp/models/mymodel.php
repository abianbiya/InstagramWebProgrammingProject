<?php
namespace App\Myapp\models;

use DB;

/**
* 
*/
class mymodel
{

	public function getMenu()
	{
		return DB::table('menu')
			->leftJoin('group_menu', 'menu.id_group_menu', '=', 'group_menu.id_group_menu')
			->get();
	}

	public function getDetailMenu($id)
	{
		return DB::table('menu')
			->leftJoin('group_menu', 'menu.id_group_menu', '=', 'group_menu.id_group_menu')
			->where('menu.id_menu', $id)
			->first();
	}

	public function getGroupMenu()
	{
		return DB::table('group_menu')->get();
	}

	public function getUserList()
	{
		return DB::table('users')
			->leftJoin('kewenangan_user', 'users.id', '=', 'kewenangan_user.id_user')
			->leftJoin('peran', 'kewenangan_user.id_peran', '=', 'peran.id_peran')
			->get();
	}

	public function getUserDetail($id)
	{
		return DB::table('users')
			->where('id', $id)
			->first();
	}

	public function getPeran()
	{
		return DB::table('peran')->get();
	}

	public function insertMenu($data)
	{
		DB::table('menu')->insert($data);
	}

	public function insertGroupMenu($data)
	{
		DB::table('group_menu')->insert($data);
	}

	public function insertPeran($data)
	{
		DB::table('peran')->insert($data);
	}

	public function cekUserPeran($id)
	{
		return DB::table('kewenangan_user')
			->where('id_user', $id)
			->first();
	}

	public function cekMenuKewenangan($id_menu, $id_peran)
	{
		return DB::table('kewenangan_menu')
			->where('id_menu', $id_menu)
			->where('id_peran', $id_peran)
			->first();
	}

	public function insertUserPeran($data)
	{
		DB::table('kewenangan_user')->insert($data);
	}

	public function updateUserPeran($data)
	{
		DB::table('kewenangan_user')
			->where('id_user', $data['id_user'])
			->update($data);
	}

	public function insertMenuKewenangan($data)
	{
		DB::table('kewenangan_menu')->insert($data);
	}

	public function updateMenuKewenangan($data)
	{
		DB::table('kewenangan_menu')
			->where('id_menu', $data['id_menu'])
			->where('id_peran', $data['id_peran'])
			->update($data);
	}

	//Delete
	public function deleteMenu($id)
	{
		DB::table('menu')
			->where('id_menu', $id)
			->delete();
	}

	public function deleteGroupMenu($id)
	{
		DB::table('group_menu')
			->where('id_group_menu', $id)
			->delete();
	}

	public function deletePeran($id)
	{
		DB::table('peran')
			->where('id_peran', $id)
			->delete();
	}

}