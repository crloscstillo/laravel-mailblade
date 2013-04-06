@layout('mailblade::templates.one-column')

@section('title')Tienes un nuevo suscriptor@endsection

@section('body')
<table width="600" class="w280" bgcolor="ffffff">
  {{-- MESSAGE --}}
  <tr>
  <td width="100%" align="left" style="padding:13.5px 27px;">
    <h1 style="color:#444444;font-weight:normal;font-size:27px;font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,sans-serif;">
      Tienes un nuevo suscriptor en tu lista de correos
    </h1>
    <p style="color:#666666;font-size:18px;font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,sans-serif;line-height:1.5em;">
      <span style="color:#444444;">{{ucfirst($name)}}</span> se acaba de suscribir a tu lista de correos.<br>
      Te ha confiado con su correo personal (<span style="color:#444444;">{{$email}}</span>), así que sé prudente con su información.
    </p>
    <p style="color:#666666;font-size:18px;font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,sans-serif;line-height:1.5em;">
      ¿Quieres ver la lista completa de suscriptores?<br>
      Visita este link: {{$subscriber_list}}
    </p>
    <p style="color:#666666;font-size:18px;font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,sans-serif;line-height:1.5em;">
      Nuestros mejores deseos,<br>
      <span style="color:#444444;">El equipo</span>
    </p>
  </td>
  </tr>
  {{-- MESSAGE --}}
</table>
@endsection