<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use App\Models\AgendaModel;
use Carbon\Carbon;
use Spatie\GoogleCalendar\Event;

class AgendaController extends Controller
{
    public function __construct()
    {
        $this->AgendaModel = new AgendaModel();
    }

    public function getAllData()
    {
        $data = [
            'agenda'=>$this->AgendaModel->getAgenda()
        ];
        return view('v_home',$data);
    }

    public function getAllDataJadwal(Request $request)
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
        $tanggal_agenda = $request->tanggal_agenda;
        $waktu_agenda = $request->waktu_agenda;
        $ruang = $request->ruang;
        $check = $this->AgendaModel->checkAgenda($tanggal_agenda,$waktu_agenda,$ruang);
        if($check->jumlah > 0){
            return back()->with('error','Ruangan Telah Dipakai!!!');
        }
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

        try {
            $startTime = Carbon::parse($tanggal_agenda.' ' . $waktu_agenda,'Asia/Makassar');
            $endTime = (clone $startTime)->addHour();

            $event = new Event();
            $event->name = $request->nama_agenda;
            $event->startDateTime = $startTime;
            $event->endDateTime = $endTime;

            $newEvent = $event->save();

            $data = [
                'nama_agenda'=>$request->nama_agenda,
                'tanggal_agenda'=>$request->tanggal_agenda,
                'waktu_agenda'=>$request->waktu_agenda,
                'penanggung_jawab'=>$request->penanggung_jawab,
                'via'=>$request->via,
                'ruang'=>$request->ruang,
                'mengundang_pak_kanwil'=>$request->mengundang_pak_kanwil,
                'status'=>$request->status,
                'event_id'=>$newEvent->id
            ];

            $this->AgendaModel->insertAgenda($data);

            return redirect()->route('jadwal')->with('success','Data Berhasil Di Tambahkan!!!');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->route('jadwal')->with('error','Data Gagal Di Tambahkan!!!');
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
        $tanggal_agenda = $request->tanggal_agenda;
        $waktu_agenda = $request->waktu_agenda;
        $ruang = $request->ruang;
        $event_id = $request->event_id;

        $check = $this->AgendaModel->checkAgenda($tanggal_agenda,$waktu_agenda,$ruang);
        if($check->jumlah > 0){
            return back()->with('error','Ruangan Telah Dipakai!!!');
        }

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
        try {
            $startTime = Carbon::parse($tanggal_agenda.' ' . $waktu_agenda,'Asia/Makassar');
            $endTime = (clone $startTime)->addHour();
            $event = Event::find($event_id);

            $event->update([
                'name'=>$request->nama_agenda,
                'startDateTime'=>$startTime,
                'endDateTime'=>$endTime
            ]);

            $data = [
                'nama_agenda'=>$request->nama_agenda,
                'tanggal_agenda'=>$request->tanggal_agenda,
                'waktu_agenda'=>$request->waktu_agenda,
                'penanggung_jawab'=>$request->penanggung_jawab,
                'via'=>$request->via,
                'ruang'=>$request->ruang,
                'mengundang_pak_kanwil'=>$request->mengundang_pak_kanwil,
                'status'=>$request->status,
            ];
    
            $this->AgendaModel->updateAgenda($id_agenda,$data);
            return redirect()->route('jadwal')->with('success','Data Berhasil Di Update!!!');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->route('jadwal')->with('error','Data Gagal Di Update!!!');
        }

    }

    public function deleteAgenda(Request $request)
    {
        
        $id_agenda = $request->id_agenda;
        $event = Event::find($request->event_id);
        $event->delete();
        $this->AgendaModel->deleteAgenda($id_agenda);
        
        return response()->json([
            'success'=>true,
            'pesan'=>'Data Berhasil Diupdate!!!',
            'id_agenda'=>$id_agenda,
            'event_id'=>$request->event_id
        ]);
        // try {
            
        //     return redirect()->route('jadwal')->with('success','Data Berhasil Di Hapus!!!');
        // } catch (\Illuminate\Database\QueryException $ex) {
        //     return redirect()->route('jadwal')->with('error','Data Gagal Di Hapus!!!');
        // }
    }
}
