<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AttackController extends Controller
{

    public function redirect_m()
    {
        return redirect()->route("attack");
    }


    public function select()
    {
        $res = DB::select("SELECT * FROM attacks ORDER BY id");
        return view("main", [
            "name" => "Урон",
            'row_name' => ["ID", "number"],
            'data' => $res,
            'type' => ['number', 'number']
        ]);
    }

    public function insert(Request $request)
    {
        DB::insert("INSERT INTO attacks(id ,number)
                            VALUES(?, ?)",
            [$request->id,$request->number]);

        return $this->redirect_m();
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        foreach ($id as &$val) {
            $deleted = DB::delete("DELETE FROM attacks WHERE attacks.id = ?", [(int)$val]);

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
            DB::update("UPDATE attacks SET $key = ? WHERE id = ?", [$el, $request->id]);
        }
        return $this->redirect_m();
    }
}
