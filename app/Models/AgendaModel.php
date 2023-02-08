<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AgendaModel extends Model
{
    public function getAgenda()
    {
        return DB::table('tbl_agenda')
            ->get();
    }

    public function getAllAgenda()
    {
        return DB::table('tbl_agenda')
            ->orderBy('tanggal_agenda')
            ->paginate(5);
    }

    public function getDetailAgenda($id_agenda)
    {
        return DB::table('tbl_agenda')
            ->where('id_agenda',$id_agenda)
            ->first();
    }

    public function updateAgenda($id_agenda,$data)
    {
        DB::table('tbl_agenda')
            ->where('id_agenda',$id_agenda)
            ->update($data);
    }

    public function insertAgenda($data)
    {
        DB::table('tbl_agenda')
            ->insert($data);
    }

    public function deleteAgenda($id_agenda)
    {
        DB::table('tbl_agenda')
            ->where('id_agenda',$id_agenda)
            ->delete();
    }

    public function checkAgenda($tanggal_agenda,$waktu_agenda,$ruang)
    {
        return DB::table('tbl_agenda')
            ->select(DB::raw('count(nama_agenda) as jumlah'))
            ->where('tbl_agenda.status','<>','Sudah Berlangsung')
            ->where('tbl_agenda.via','<>','Online')
            ->where('tbl_agenda.tanggal_agenda',$tanggal_agenda)
            ->where('tbl_agenda.waktu_agenda',$waktu_agenda)
            ->where('tbl_agenda.ruang',$ruang)
            ->first();
    }
}
