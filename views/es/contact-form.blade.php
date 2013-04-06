@layout('mailblade::template')

@section('title')Nuevo mensaje desde el sitio web@endsection

@section('content')
<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="c9c9c9">

  <tr>
    <td>
      <table width="600" class="w280" align="center">
        <tr>
          <td width="100%" align="right">
            <p style="line-height:1em;font-size:12px;font-family:Helvetica,Arial,sans-serif;">
              Desde el sitio web...
            </p>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <!-- From the website -->

  <!-- Body -->
  <tr>
    <td width="100%" align="center">
      
      <table width="600" class="w280" bgcolor="ffffff">
        <!-- HEADER -->
        <tr>
          <td width="100%" align="left" style="padding:13.5px 27px;border-bottom:1px solid #c7c7c7;">
            <h1 style="color:#444444;font-weight:normal;font-size:27px;font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,sans-serif;">
              Tienes un nuevo mensaje
            </h1>
            <p style="color:#666666;font-size:18px;font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,sans-serif;line-height:1.5em;">
              Hemos recibido un nuevo mensaje desde el sitio web.<br>
              A continuación los detalles...
            </p>
          </td>
        </tr>
        <!-- HEADER -->

        <!-- MESSAGE -->
        <tr>
          <td width="100%" align="left" style="padding:7px 27px;border-bottom:1px solid #c7c7c7;">
            <h2 style="color:#444444;font-weight:normal;font-size:18px;font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,sans-serif;">
              Mensaje
            </h2>
            <p style="color:#666666;font-size:14px;font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,sans-serif;line-height:1.5em;">
              {{ $message }}
            </p>
          </td>
        </tr>
        <!-- MESSAGE -->

        <tr>
          <td width="100%" align="left" style="padding:7px 27px;">
            <h2 style="color:#444444;font-weight:normal;font-size:18px;font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,sans-serif;">
              Información
            </h2>
            <p style="color:#666666;font-size:14px;font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,sans-serif;line-height:1.5em;">
              Nombre: {{ $name }}<br>
              Correo electrónico: {{ $email }}<br>
              Teléfono: {{ $phone }}
            </p>
          </td>
        </tr>
      </table>

    </td>
  </tr>
  <!-- Body -->

  <tr>
    <td width:"100%" height="39"></td>
  </tr>

</table>
@endsection