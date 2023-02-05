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
        $.ajax({
            url: "/calendar",
            type:'GET',
            success: function(data){
                data.forEach(element => {
                    var dataObject = {
                        id: element.id_agenda,
                        name: element.
                    }
                });
            },
            error: function(error){
                console.log(error);
            }
        })
        var agendaArray = [];
        $("#calendar").evoCalendar({
            theme:'Royal Navy',
            calendarEvents: [
            {
                id: 'bHay68s', // Event's ID (required)
                name: "Agenda 1", // Event name (required)
                date: "March/1/2023", // Event date (required)
                type: "holiday", // Event type (required)
                everyYear: true // Same event every year (optional)
            },
            {
                name: "Vacation Leave",
                badge: "02/13 - 02/15", // Event badge (optional)
                date: ["February/13/2020", "February/15/2020"], // Date range
                description: "Vacation leave for 3 days.", // Event description (optional)
                type: "event",
                color: "#63d867" // Event custom color (optional)
            }
        ]})
    })
    </script>
    <script src="{{asset('evo-calendar/js/evo-calendar.js')}}"></script>

@endsection