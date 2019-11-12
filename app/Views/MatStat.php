<?php

namespace App\Views;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class MatStat extends Model
{
    private static $where ="";

    public static function getAll(){
        self::$where = "";
        return self::fetchData();
    }

    public static function getCustom($class=null, $semester=null){
            self::$where = "";
        if ($class==null&&$semester==null) {
            return self::fetchData();
        }

        if ($class!=null) {
            self::$where = self::$where.' and m.classe='.$class.' ';
        }

        if ($semester!=null) {
            self::$where = self::$where.'and m.semester='.$semester;
        }

        return self::fetchData();
    }

    private static function fetchData()
    {
        return DB::select('SELECT * FROM ((SELECT m.id, m.departement, dp.nom as nom_dept,  '.
                        'm.description, m.classe, c.nom as nom_clas, m.nom, m.semester, '.
                    'count(d.nom) as documents '.
                    'FROM matieres m, documents d, departements dp, classes c '.
                    'WHERE m.id = d.matiere and m.departement=dp.id and m.classe=c.id '. self::$where.' '.
                    'GROUP BY id, departement,nom_dept,classe,nom_clas,nom,description,semester '.
                    'order by nom '.
                    ') '.
                    'UNION '.
                    '(SELECT m.id, m.departement, dp.nom as nom_dept, m.description, m.classe, c.nom as nom_clas, m.nom, m.semester, '.
                        '0 as documents '.
                    'FROM matieres m, departements dp, classes c '.
                    'WHERE m.departement=dp.id and m.classe=c.id '.self::$where.' and m.id NOT IN (SELECT matiere '.
                        'from documents) '.
                    'GROUP BY id, departement,nom_dept,classe,nom_clas,nom,description,semester '.
                    'order by nom '.
                    ')) AS transition order by id');
    }
}
