<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AgendaModel extends Model
{
    public function getAllAgenda()
    {
        return DB::table('tbl_agenda')
            ->get();
    }

    public function getDetailAgenda($id_agenda)
    {
        return DB::table('tbl_agenda')
            ->where('id_agenda',$id_agenda)
            ->first();
    }
}
