<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use App\Models\AgendaModel;


class CalendarController extends Controller
{
    public function __construct()
    {
        $this->AgendaModel = new AgendaModel();
    }

    public function getCalendar()
    {
        return view('v_calendar');
    }

    public function getData()
    {
        $data = $this->AgendaModel->getAgenda();
        return response()->json($data);
    }
}
