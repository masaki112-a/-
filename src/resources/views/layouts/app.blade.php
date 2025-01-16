<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Atte</title>
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
  <link rel="stylesheet" href="{{ asset('css/common.css')}}">
  @yield('css')
</head>

<body>

<div class="wrapper">
  <header class="header">
      <h1 class="header__heading">Atte</h1>
    <div class="header__link">
      @yield('link')
    </div>
  </header>
  <div class="content">
    @yield('content')
  </div>
  <footer class="footer">
          <div class="footer__text">Atte,inc.</div>
  </footer>
</div>

</body>


</html>