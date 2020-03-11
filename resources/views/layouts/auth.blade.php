<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('inc.adminhead')
</head>
<body>
  </br></br></br></br></br></br></br></br></br></br></br></br>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
