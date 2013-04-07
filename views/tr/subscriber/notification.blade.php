@layout('mailblade::templates.one-column')

@section('title')Yeni takipçiniz var!@endsection

@section('body')
<table width="600" class="w280" bgcolor="ffffff">
  {{-- MESSAGE --}}
  <tr>
  <td width="100%" align="left" style="padding:13.5px 27px;">
    <h1 style="color:#444444;font-weight:normal;font-size:27px;font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,sans-serif;">
      Yeni takipçiniz var!
    </h1>
    <p style="color:#666666;font-size:18px;font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,sans-serif;line-height:1.5em;">
      <span style="color:#444444;">{{ucfirst($name)}}</span> email listenizi (<span style="color:#444444;">{{$email}}</span>)email adresiyle takip etmeye başladı!

    </p>
    <p style="color:#666666;font-size:18px;font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,sans-serif;line-height:1.5em;">
      Tüm takipçi listenizi görmek için tıklayınız: {{ $subscriber_list }}
    </p>
    <p style="color:#666666;font-size:18px;font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,sans-serif;line-height:1.5em;">
      Selamlar,<br>
      <span style="color:#444444;">The team</span>
    </p>
  </td>
  </tr>
  {{-- MESSAGE --}}
</table>
@endsection