<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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
        if(Auth::check()){
            $data = [
                'agenda'=>$this->AgendaModel->getAllAgenda()
            ];
        }else{
            date_default_timezone_set("Asia/Makassar");
            $current_time = date("h:i");
            $current_date = date("Y-m-d");
            $data = [
                'agenda'=>$this->AgendaModel->getUpComingAgenda($current_date, $current_time)
            ];
        }

        if($request->status == "success"){
            return redirect()->route('jadwal')->with('success','Data Berhasil Dihapus!!!');
        }
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
        $waktu_mulai = $request->waktu_mulai;
        $waktu_akhir = $request->waktu_akhir;
        $ruang = $request->ruang;

        if($waktu_mulai > $waktu_akhir){
            return back()->with('error','Waktu Mulai Tidak Boleh Lebih dari Waktu Akhir!!!');
        }

        $check = $this->AgendaModel->checkAgendaInsert($tanggal_agenda,$waktu_mulai,$waktu_akhir,$ruang);
        if(($check->jumlah > 0) and ($request->via != "Online") and $request->status != "Sudah Berlangsung"){
            return back()->with('error','Ruangan Telah Dipakai!!!');
        }
        Request()->validate([
            'nama_agenda'=>'required',
            'tanggal_agenda'=>'required',
            'waktu_mulai'=>'required',
            'waktu_akhir'=>'required',
            'penanggung_jawab'=>'required',
            'via'=>'required',
            'ruang'=>'required',
            'mengundang_pak_kanwil'=>'required',
            'status'=>'required'
        ],[
            'nama_agenda.required'=>'Wajib Diisi!!!',
            'tanggal_agenda.required'=>'Wajib Diisi!!!',
            'waktu_mulai.required'=>'Wajib Diisi!!!',
            'waktu_akhir.required'=>'Wajib Diisi!!!',
            'penanggung_jawab.required'=>'Wajib Diisi!!!',
            'via.required'=>'Wajib Diisi!!!',
            'ruang.required'=>'Wajib Diisi!!!',
            'mengundang_pak_kanwil.required'=>'Wajib Diisi!!!',
            'status.required'=>'Wajib Diisi!!!'
        ]);

        try {
            $startTime = Carbon::parse($tanggal_agenda.' ' . $waktu_mulai,'Asia/Makassar');
            $endTime = Carbon::parse($tanggal_agenda.' ' . $waktu_akhir,'Asia/Makassar');

            $event = new Event();
            $event->name = $request->nama_agenda;
            $event->startDateTime = $startTime;
            $event->endDateTime = $endTime;

            $newEvent = $event->save();

            $data = [
                'nama_agenda'=>$request->nama_agenda,
                'tanggal_agenda'=>$request->tanggal_agenda,
                'waktu_mulai'=>$request->waktu_mulai,
                'waktu_akhir'=>$request->waktu_akhir,
                'penanggung_jawab'=>$request->penanggung_jawab,
                'via'=>$request->via,
                'ruang'=>$request->ruang,
                'mengundang_pak_kanwil'=>$request->mengundang_pak_kanwil,
                'status'=>$request->status,
                'event_id'=>$newEvent->id
            ];

            $this->AgendaModel->insertAgenda($data);

            return redirect()->route('jadwal')->with('success','Data Berhasil Ditambahkan!!!');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->route('jadwal')->with('error','Data Gagal Ditambahkan!!!');
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
        $waktu_mulai = $request->waktu_mulai;
        $waktu_akhir = $request->waktu_akhir;
        $ruang = $request->ruang;
        $event_id = $request->event_id;

        if($waktu_mulai > $waktu_akhir){
            return back()->with('error','Waktu Mulai Tidak Boleh Lebih dari Waktu Akhir!!!');
        }

        $check = $this->AgendaModel->checkAgendaUpdate($tanggal_agenda,$waktu_mulai,$waktu_akhir,$ruang,$id_agenda);
        if(($check->jumlah > 0) and ($request->via != "Online") and $request->status != "Sudah Berlangsung"){
            return back()->with('error','Ruangan Telah Dipakai!!!');
        }

        Request()->validate([
            'nama_agenda'=>'required',
            'tanggal_agenda'=>'required',
            'waktu_mulai'=>'required',
            'waktu_akhir'=>'required',
            'penanggung_jawab'=>'required',
            'via'=>'required',
            'ruang'=>'required',
            'mengundang_pak_kanwil'=>'required',
            'status'=>'required'
        ],[
            'nama_agenda.required'=>'Wajib Diisi!!!',
            'tanggal_agenda.required'=>'Wajib Diisi!!!',
            'waktu_mulai.required'=>'Wajib Diisi!!!',
            'waktu_akhir.required'=>'Wajib Diisi!!!',
            'penanggung_jawab.required'=>'Wajib Diisi!!!',
            'via.required'=>'Wajib Diisi!!!',
            'ruang.required'=>'Wajib Diisi!!!',
            'mengundang_pak_kanwil.required'=>'Wajib Diisi!!!',
            'status.required'=>'Wajib Diisi!!!'
        ]);
        try {
            $startTime = Carbon::parse($tanggal_agenda.' ' . $waktu_mulai,'Asia/Makassar');
            $endTime = Carbon::parse($tanggal_agenda.' ' . $waktu_akhir,'Asia/Makassar');
            $event = Event::find($event_id);

            $event->update([
                'name'=>$request->nama_agenda,
                'startDateTime'=>$startTime,
                'endDateTime'=>$endTime
            ]);

            $data = [
                'nama_agenda'=>$request->nama_agenda,
                'tanggal_agenda'=>$request->tanggal_agenda,
                'waktu_mulai'=>$request->waktu_mulai,
                'waktu_akhir'=>$request->waktu_akhir,
                'penanggung_jawab'=>$request->penanggung_jawab,
                'via'=>$request->via,
                'ruang'=>$request->ruang,
                'mengundang_pak_kanwil'=>$request->mengundang_pak_kanwil,
                'status'=>$request->status,
            ];
    
            $this->AgendaModel->updateAgenda($id_agenda,$data);
            return redirect()->route('jadwal')->with('success','Data Berhasil Diperbarui!!!');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->route('jadwal')->with('error','Data Gagal Diperbarui!!!');
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
            'pesan'=>'Data Berhasil Diperbarui!!!',
            'id_agenda'=>$id_agenda,
            'event_id'=>$request->event_id
        ]);
    }
}
