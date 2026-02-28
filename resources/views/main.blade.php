<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo') - SIG ACAD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
<body>
    <!--principal-->
    <header>

    </header>

    <!--principal-->
    <main>
      <div class="container mt-4">
          <div class="row">
            @if($errors->any())
            <ul>
              @foreach ($errors ->all() as $errors)
              <li>{{$errors}}</li>
              @endforeach
            </ul>
            @endif
          </div>
          <div class="row">
            @yield('conteudo')
          </div>
      </div>
        
    </main>

    <!--principal-->
    <footer> 
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>