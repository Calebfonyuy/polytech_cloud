<?php

namespace App\Views;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class DeptStat extends Model
{
    private static $where="";

    public static function getAll(){
        self::$where = "";
        return self::fetchData();
    }

    private static function fetchData()
    {
        return DB::select('SELECT d.id, d.nom, d.description, d.photo, '.
                        'count(c.id) as classes, sum(distinct m.id) as matieres '.
                    'FROM departements d, classes c, matieres m '.
                    'WHERE d.id = c.departement and d.id = m.departement '.self::$where.' '.
                    'GROUP BY id,nom,description,photo');
    }
}
