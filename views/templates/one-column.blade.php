@layout('mailblade::template')

@section('content')
<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="dadada">

  <tr>
    <td width="100%" height="40"></td>
  </tr>
  {{-- Space at the top --}}

  {{-- BODY --}}
  <tr>
    <td width="100%" align="center">
      @yield('body')
    <td>
  </tr>
  {{-- BODY --}}

  <tr>
    <td width="100%" height="40"></td>
  </tr>
  {{-- Space at the bottom --}}
</table>
@endsection