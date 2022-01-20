<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HeroesController extends Controller
{

    public function redirect_m()
    {
        return redirect()->route("heroes");
    }


    public function select()
    {
        $res = DB::select("SELECT * FROM heroes ORDER BY id");
        return view("main", [
            "name" => "Герои",
            'row_name' => ["ID", "Название героя", "Сила", "Ловкость",
                "Интеллект", "Основной атрибут", "Скорость передвижения", "Броня", "Cложность героя", "Тип атаки"],
            'data' => $res,
            'type' => ['number', 'text', 'number', 'number', 'number', 'number', 'number', 'number', 'number', 'number']
        ]);
    }

    public function insert(Request $request)
    {
        DB::insert("INSERT INTO heroes(name_hero, strength, agility, intelligence, main_attribute, move_speed,armor,complexity_hero,attack_type)
                            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)",
            [$request->name_hero, $request->strength, $request->agility,
                $request->intelligence, $request->main_attribute, $request->move_speed, $request->armor, $request->complexity_hero, $request->attack_type]);

        return $this->redirect_m();
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        foreach ($id as &$val) {
            $deleted = DB::delete("DELETE FROM heroes WHERE heroes.id = ?", [(int)$val]);

        }
        return $this->redirect_m();
    }

    public function update(Request $request)
    {
        if ($request->id == null) {
            dd('Для UPDATE нужен ID.');
        }

        $isFirst = true;
        foreach ($request->all() as $key => $el) {
            if ($el == null || $key == 'id' || $key == '_token') {
                $isFirst = false;
                continue;
            }
            DB::update("UPDATE heroes SET $key = ? WHERE id = ?", [$el, $request->id]);
        }
        return $this->redirect_m();
    }
}
