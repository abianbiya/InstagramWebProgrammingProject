<?php

namespace App;

use DB;

class MasterModel
{
    public function getData($table)
    {
        return  DB::table($table)->get();
    }

    public function getItem($table, $idname, $id)
    {
        return DB::table($table)->where($idname, $id)->first();
    }

    public function getItemsById($table, $idname, $id)
    {
        return DB::table($table)->where($idname, $id)->get();
    }

    public function insertItem($table, $data)
    {
        return DB::table($table)->insertGetId($data);
    }

    public function updateItem($table, $idname, $id, $data)
    {
        DB::table($table)->where($idname, $id)->update($data);
    }

    public function deleteItem($table, $idname, $id)
    {
        DB::table($table)->where($idname, $id)->delete();
    }
}
