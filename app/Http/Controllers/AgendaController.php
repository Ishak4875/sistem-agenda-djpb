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

    public function addAgenda()
    {
        
        return view('v_add');
    }

    public function insertAgenda(Request $request)
    {
        
        Request()->validate([
            'nama_agenda'=>'required',
            'tanggal_agenda'=>'required',
            'waktu_agenda'=>'required',
            'penanggung_jawab'=>'required',
            'via'=>'required',
            'ruang'=>'required',
            'mengundang_pak_kanwil'=>'required',
            'status'=>'required'
        ],[
            'nama_agenda.required'=>'Wajib Diisi!!!',
            'tanggal_agenda.required'=>'Wajib Diisi!!!',
            'waktu_agenda.required'=>'Wajib Diisi!!!',
            'penanggung_jawab.required'=>'Wajib Diisi!!!',
            'via.required'=>'Wajib Diisi!!!',
            'ruang.required'=>'Wajib Diisi!!!',
            'mengundang_pak_kanwil.required'=>'Wajib Diisi!!!',
            'status.required'=>'Wajib Diisi!!!'
        ]);
        $data = [
            'nama_agenda'=>$request->nama_agenda,
            'tanggal_agenda'=>$request->tanggal_agenda,
            'waktu_agenda'=>$request->waktu_agenda,
            'penanggung_jawab'=>$request->penanggung_jawab,
            'via'=>$request->via,
            'ruang'=>$request->ruang,
            'mengundang_pak_kanwil'=>$request->mengundang_pak_kanwil,
            'status'=>$request->status
        ];

        try {
            $this->AgendaModel->insertAgenda($data);
            return redirect()->route('jadwal')->with('success','Data Berhasil Di Update!!!');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->route('jadwal')->with('error','Data Gagal Di Update!!!');
        }
    }

    public function editDetailAgenda(Request $request)
    {
        
        $id_agenda = $request->id_agenda;
        $data = [
            'detail'=>$this->AgendaModel->getDetailAgenda($id_agenda)
        ];
        return view('v_edit',$data);
    }

    public function updateAgenda(Request $request)
    {
        
        $id_agenda = $request->id_agenda;
        Request()->validate([
            'nama_agenda'=>'required',
            'tanggal_agenda'=>'required',
            'waktu_agenda'=>'required',
            'penanggung_jawab'=>'required',
            'via'=>'required',
            'ruang'=>'required',
            'mengundang_pak_kanwil'=>'required',
            'status'=>'required'
        ],[
            'nama_agenda.required'=>'Wajib Diisi!!!',
            'tanggal_agenda.required'=>'Wajib Diisi!!!',
            'waktu_agenda.required'=>'Wajib Diisi!!!',
            'penanggung_jawab.required'=>'Wajib Diisi!!!',
            'via.required'=>'Wajib Diisi!!!',
            'ruang.required'=>'Wajib Diisi!!!',
            'mengundang_pak_kanwil.required'=>'Wajib Diisi!!!',
            'status.required'=>'Wajib Diisi!!!'
        ]);
        $data = [
            'nama_agenda'=>$request->nama_agenda,
            'tanggal_agenda'=>$request->tanggal_agenda,
            'waktu_agenda'=>$request->waktu_agenda,
            'penanggung_jawab'=>$request->penanggung_jawab,
            'via'=>$request->via,
            'ruang'=>$request->ruang,
            'mengundang_pak_kanwil'=>$request->mengundang_pak_kanwil,
            'status'=>$request->status
        ];

        try {
            $this->AgendaModel->updateAgenda($id_agenda,$data);
            return redirect()->route('jadwal')->with('success','Data Berhasil Di Update!!!');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->route('jadwal')->with('error','Data Gagal Di Update!!!');
        }
    }

    public function deleteAgenda(Request $request)
    {
        
        $id_agenda = $request->id_agenda;
        try {
            $this->AgendaModel->deleteAgenda($id_agenda);
            return redirect()->route('jadwal')->with('success','Data Berhasil Di Hapus!!!');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->route('jadwal')->with('error','Data Gagal Di Hapus!!!');
        }
    }
}
