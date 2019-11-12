<?php

namespace App\Views;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ClassStat extends Model
{
    private static $where ="";

    public static function getCustom($dept=null)
    {
        self::$where = "";
        self::$where = $dept==null?'':'and d.id='.$dept;
        return self::fetchData();
    }

    public static function getAll()
    {
        self::$where = "";
        return self::fetchData();
    }

    private static function fetchData()
    {
        return DB::select('SELECT * FROM ((SELECT c.id, d.id as dept_id,  '.
                        'd.nom as departement,c.nom,c.description,c.photo, '.
                        'count(m.id) as matieres '.
                    'FROM '.
                        'classes c, departements d, matieres m '.
                    'WHERE c.id = m.classe and c.departement=d.id '.self::$where.' '.
                    'GROUP BY c.id, d.id, d.nom,c.nom,description,photo) '.
                    'UNION '.
                    '(SELECT c.id, d.id as dept_id, d.nom as departement,c.nom,c.description,c.photo, '.
                        '0 as matieres '.
                    'FROM '.
                        'classes c, departements d '.
                    'WHERE c.departement=d.id '.self::$where.' and c.id NOT IN (select distinct classe from matieres) '.
                    'GROUP BY c.id,d.id, d.nom,c.nom,description,photo) '.
                    ') AS transition2 order by id');
    }
}
