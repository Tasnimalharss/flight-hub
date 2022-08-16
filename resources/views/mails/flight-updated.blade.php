
<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
    <div style="margin:50px auto;width:95%;padding:20px 0">
      <div style="border-bottom:1px solid #eee">
        <img width="90" src="{{ $message->embed(public_path() . '/images/dark-logo.png') }}" class="imge"/>

      </div>
      <p style="font-size:1.1em">Dears,</p>
      <p>Your flight {{$data['flight_number']}} dates have been updated</p>
      <p>Departure date {{$data['depature_time']}}   Arrival date {{$data['arrival_time']}}</p>
      <p>Regards,<br />Flight Hub</p>
      <hr style="border:none;border-top:1px solid #eee" />
  </div>
</div>
