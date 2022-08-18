
<div style="text-align:center;font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
    <div style="margin:50px auto;width:95%;padding:20px 0">
      <div style="border-bottom:1px solid #eee">
        <img width="90" src="{{ $message->embed(public_path() . '/images/dark-logo.png') }}" class="imge"/>

      </div>
      <p style="font-size:1.1em">Dear {{$ticket->passenger->first_name}}{{$ticket->passenger->last_name}}</p>
      <p>Your ticket's information: </p>
      <p> <b>Tickets number: </b>{{$ticket->ticket_no}}</p>
      <p><b>Flight number:</b> {{$ticket->flight->name}}</p>
      <p><b>Airline name: </b>{{$ticket->flight->airline->name}}</p>
      <p><b>From airport: </b> {{$ticket->flight->fromAirport->name}} <b class="ml-2"> To airport: </b>{{$ticket->flight->toAirport->name}}</p>
      <p><b>Flight Arrival Date: </b> {{$ticket->flight->arrival_time}} </p>
      <p><b class="ml-2"> Flight Depature Date: </b>{{$ticket->flight->depature_time}}</p>

      <p>Regards,<br />Flight Hub</p>
      <hr style="border:none;border-top:1px solid #eee" />
  </div>
</div>
