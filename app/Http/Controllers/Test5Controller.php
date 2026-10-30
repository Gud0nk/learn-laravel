<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Test5Controller extends Controller
{
    public function show() {
        DB::enableQueryLog(); // включение лог запросов
        // методы работы с  бд
        // get() - получение всех данных
        // max(imya_polya) - нахождение и получение максимального значения по полю ( min, avg, count аналогично )
        // first() - получение первой строки данных
        // value('имя поля') - получение значения поля
        // pluck('имя поля') - получение коллекции значений по полю
        // select('название_полей', 'поле_2') - выборка определенных полей в таблице
        // where('имяполя','оператор', 'значение') - фильтрация данных конъюнкция
        // orwhere('имяполя','оператор', 'значение') - фильтрация данных дизъюнкция
        // whereBetween('имя поля', [начальное значение, конечное значение]) - фильтрация данных по указаному диапазону ( в диапазоне)
        // whereNotBetween('имя поля', [начальное значение, конечное значение]) - фильтрация данных по указаному диапазону ( вне диапазона)
        // whereIn('имяполя', [список значений]) - фильтрация данных по указанном диапазоне ( содержится в указаном списке )
        // whereIn('имяполя', [список значений]) - фильтрация данных по указанном диапазоне ( не содержится в указаном списке )
        // wheleNull('имя поля') - проверка что значения столбца равна NULL
        // wheleNotNull('имя поля') - проверка что значения столбца не равна NULL
        // orderBy('имяполя','направление сортировки') - сортировка данных asc desc
        // latest('имя поля') - сортировка по дате, стоблцу created_at по возрастанию
        // oldest('имя поля') - сортировка по дате, стоблцу created_at по возрастанию
        // inRandomOrder() - случайная сортировка
        // take('количество записей') - задает количество получаемых записей
        // skip('количество записей') - скипнуть записи при выборке
        /*  Массовая вставка данных
            $sql22 = DB::table('persons')->insertGetId([
            'name' => "сосалка",
            'age'  => 18,
            'salary' => 2000,
            'email' => 'doro1ga1ya_suchka@gmail.com'
        ]);

            Обновление данных
        DB::table('persons')->where('id', 6 )->update([
            'salary' => 1000,
            'name' => 'даньсос'
        ]);

        удаление данных
        DB::table('persons')->where('id', 6 )->delete();
        DB::table('persons')->where('id', 2 )->increment('age');
        DB::table('persons')->where('id', 2 )->decrement('salary');

          */

        $sql21 = DB::table('persons')->take(2)->get();




        $posts = DB::table('posts')->get();
        $persons = DB::table('persons')->select('name', 'age', 'salary', 'email')->
        where('salary', '<', '2200')->Where('salary', '>', '300')->
        orWhere('name', 'Лохун')->
        orWhere('id','2')->get();

        $sql1 = DB::table('persons')->select('name', 'age', 'salary', 'email')->
        where(function ($query) {
            $query->where('salary', '<', '2200');
            $query->where('salary', '>', '200');
            $query->orWhere('name', 'Лохун');
            $query->orWhere('id', '2');
        })->get();

        $sql2 = DB::table('persons')->orderBy('salary', 'desc')->get();
        $sql3 = DB::table('persons')->where('id', '2')->get();
        $sql4 = DB::table('persons')->select('salary')->max('salary');
        $sql5 = DB::table('persons')->pluck('salary');
        $sql6 = DB::table('persons')->whereBetween('salary', [10, 300])->get();
        $sql7 = DB::table('persons')->whereNotBetween('salary', [10, 300])->get();
        $sql8 = DB::table('persons')->whereIn('salary', [180, 190,2000,2200,2500])->get();
        $sql8 = DB::table('persons')->whereNotIn('salary', [180, 190,2000,2200,2500])->get();

        $post1 = DB::table('posts')->whereId(1)->get();
        //$post2 = DB::table('posts')->whereName('Как правильно дефаться')->get();
        //$post3 = DB::table('posts')->whereName('Как правильно уклонятся')->get();
        //$post4 = DB::table('posts')->whereIdAndName(2,'Лохун')->get();
        //$post5 = DB::table('posts')->WhereIdOrName(2,'Лохун')->get();

        $logs = DB::getQueryLog();
        //dump(DB::getQueryLog());    // Вывод дампа лога запросов
        return view('test5', ['posts' => $posts, 'persons' => $persons, 'logs' => $logs,
            'sql2' => $sql2, 'sql3' => $sql3, 'sql4' => $sql4,
            'sql5' => $sql5, 'sql6' => $sql6, 'sql7' => $sql7,
            'sql8' => $sql8, 'post1' => $post1,
            ]);

    }
}
