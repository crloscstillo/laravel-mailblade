@layout('mailblade::templates.one-column')

@section('title')You have a new subscriber@endsection

@section('body')
<table width="600" class="w280" bgcolor="ffffff">
  {{-- MESSAGE --}}
  <tr>
  <td width="100%" align="left" style="padding:13.5px 27px;">
    <h1 style="color:#444444;font-weight:normal;font-size:27px;font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,sans-serif;">
      You&#8217;ve got a new subscriber
    </h1>
    <p style="color:#666666;font-size:18px;font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,sans-serif;line-height:1.5em;">
      <span style="color:#444444;">{{ucfirst($name)}}</span> just subscribed to your email list.<br>
      He left his email (<span style="color:#444444;">{{$email}}</span>), so be nice.
    </p>
    <p style="color:#666666;font-size:18px;font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,sans-serif;line-height:1.5em;">
      Want to see the whole list of subscribers?<br>
      Go to {{ $subscriber_list }}
    </p>
    <p style="color:#666666;font-size:18px;font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,sans-serif;line-height:1.5em;">
      Best regards,<br>
      <span style="color:#444444;">The team</span>
    </p>
  </td>
  </tr>
  {{-- MESSAGE --}}
</table>
@endsection