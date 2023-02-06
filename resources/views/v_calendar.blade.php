@extends('layout.v_template')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('evo-calendar/css/evo-calendar.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('evo-calendar/css/evo-calendar.midnight-blue.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('evo-calendar/css/evo-calendar.orange-coral.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('evo-calendar/css/evo-calendar.royal-navy.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/calendar.css')}}">

    <div class="hero">
        <div id="calendar" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"></div>
    </div>


    <script>
    // initialize your calendar, once the page's DOM is ready
    $(document).ready(function(e) {
        var agendaArray = [];
        $.ajax({
            url: "/calendar",
            type:'GET',
            success: function(data){
                data.forEach(element => {
                    const dataObject = {
                        id: element.id_agenda.toString(),
                        name: element.nama_agenda,
                        date: "March/1/2023",
                        type: "event",
                        color: "#63d867"
                    };
                    agendaArray.push(dataObject)
                });
            },
            error: function(error){
                console.log(error);
            }
        })
        console.log(agendaArray);
        var data =             
        [
            {
                id: 'bHay68s', // Event's ID (required)
                name: "Agenda 1", // Event name (required)
                date: "March/1/2023", // Event date (required)
                type: "holiday", // Event type (required)
                everyYear: true // Same event every year (optional)
            },
            {
                id: 'bHay68s', // Event's ID (required)
                name: "Agenda 1", // Event name (required)
                date: "March/1/2023", // Event date (required)
                type: "holiday", // Event type (required)
                everyYear: true // Same event every year (optional)
            },
            {
                id: 'bHay68s', // Event's ID (required)
                name: "Agenda 1", // Event name (required)
                date: "March/1/2023", // Event date (required)
                type: "holiday", // Event type (required)
                everyYear: true // Same event every year (optional)
            },
            {
                id: 'bHay68s', // Event's ID (required)
                name: "Agenda 1", // Event name (required)
                date: "March/1/2023", // Event date (required)
                type: "holiday", // Event type (required)
                everyYear: true // Same event every year (optional)
            },
            {
                id: 'bHay68s', // Event's ID (required)
                name: "Agenda 1", // Event name (required)
                date: "March/1/2023", // Event date (required)
                type: "holiday", // Event type (required)
                everyYear: true // Same event every year (optional)
            },
            {
                id: 'bHay68s', // Event's ID (required)
                name: "Agenda 1", // Event name (required)
                date: "March/1/2023", // Event date (required)
                type: "holiday", // Event type (required)
                everyYear: true // Same event every year (optional)
            },
            {
                id: 'bHay68s', // Event's ID (required)
                name: "Agenda 1", // Event name (required)
                date: "March/1/2023", // Event date (required)
                type: "holiday", // Event type (required)
                everyYear: true // Same event every year (optional)
            },
            {
                id: 'bHay68s', // Event's ID (required)
                name: "Agenda 1", // Event name (required)
                date: "March/1/2023", // Event date (required)
                type: "holiday", // Event type (required)
                everyYear: true // Same event every year (optional)
            },
        ];
        console.log(data);
        $("#calendar").evoCalendar({
            theme:'Royal Navy',
            calendarEvents: data
        })
    })
    </script>
    <script src="{{asset('evo-calendar/js/evo-calendar.js')}}"></script>

@endsection