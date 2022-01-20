<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ArmorController extends Controller
{

    public function redirect_m()
    {
        return redirect()->route("armor");
    }


    public function select()
    {
        $res = DB::select("SELECT * FROM armor ORDER BY id");
        return view("main", [
            "name" => "Броня",
            'row_name' => ["ID", "number"],
            'data' => $res,
            'type' => ['number', 'real']
        ]);
    }

    public function insert(Request $request)
    {
        DB::insert("INSERT INTO armor(id ,number)
                            VALUES(?, ?)",
                            [$request->id,$request->number]);

        return $this->redirect_m();
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        foreach ($id as &$val) {
            $deleted = DB::delete("DELETE FROM armor WHERE armor.id = ?", [(int)$val]);

        }
        return $this->redirect_m();
    }

    public function update(Request $request)
    {
        if ($request->id == null)
        {
            dd('Для UPDATE нужен ID.');
        }

        $isFirst = true;
        foreach ($request->all() as $key => $el)
        {
            if ($el == null || $key == 'id' || $key == '_token')
            {
                $isFirst = false;
                continue;
            }
            DB::update("UPDATE armor SET $key = ? WHERE id = ?", [$el, $request->id]);
        }
        return $this->redirect_m();
    }
}
