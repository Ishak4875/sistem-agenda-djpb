<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use App\Models\AgendaModel;

class AgendaController extends Controller
{
    public function __construct()
    {
        $this->AgendaModel = new AgendaModel();
    }

    public function getAllData()
    {
        $data = [
            'agenda'=>$this->AgendaModel->getAllAgenda()
        ];
        return view('v_home',$data);
    }

    public function getAllDataJadwal()
    {
        $data = [
            'agenda'=>$this->AgendaModel->getAllAgenda()
        ];
        return view('v_jadwal',$data);
    }

    public function getDetailAgenda(Request $request)
    {
        $id_agenda = $request->id_agenda;
        $data = [
            'detail'=>$this->AgendaModel->getDetailAgenda($id_agenda)
        ];
        return view('v_detail',$data);
    }

    public function editDetailAgenda(Request $request)
    {
        $id_agenda = $request->id_agenda;
        $data = [
            'detail'=>$this->AgendaModel->getDetailAgenda($id_agenda)
        ];
        return view('v_edit',$data);
    }
}
