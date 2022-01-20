<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ComplexityController extends Controller
{

    public function redirect_m()
    {
        return redirect()->route("complexity");
    }


    public function select()
    {
        $res = DB::select("SELECT * FROM complexity ORDER BY id");
        return view("main", [
            "name" => "Сложность",
            'row_name' => ["ID", "type"],
            'data' => $res,
            'type' => ['number', 'text']
        ]);
    }

    public function insert(Request $request)
    {
        DB::insert("INSERT INTO complexity(id ,type)
                            VALUES(?, ?)",
            [$request->id,$request->type]);

        return $this->redirect_m();
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        foreach ($id as &$val) {
            $deleted = DB::delete("DELETE FROM complexity WHERE complexity.id = ?", [(int)$val]);

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
            DB::update("UPDATE complexity SET $key = ? WHERE id = ?", [$el, $request->id]);
        }
        return $this->redirect_m();
    }
}
