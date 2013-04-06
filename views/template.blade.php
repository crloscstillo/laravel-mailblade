<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>@yield('title')</title>
</head>

<body>
  
  <style>

    @media only screen and (max-width: 610px) {
      table[class=w280], td[class=w280], img[class=w280] {
        width: 90% !important; }
      table[class=w10], td[class=w10], img[class=w10] {
        width: 90% !important; }
    }
    
  </style>

  @yield('content')

</body>
</html>