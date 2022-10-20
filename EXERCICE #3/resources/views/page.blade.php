<!DOCTYPE html>
<html lang="Fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS  -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <!-- JavaScript -->
    <script src="{{asset('script/js.js')}}"></script>
    <title>Données</title>
    <!-- styles livewire  -->
    @livewireStyles
</head>
<body>
 
    <body class="bg-light">

      <div >
        <nav class="navbar navbar-primary bg-primary">
          <a class="navbar-brand " href="{{route('index')}}">
            <img src="https://equipelebleu.com/images/logo-dark.png" alt="">
          </a>
        </nav>
      </div>
      

        <div class="container">
          <main>
            {{-- Appel de la composante qui s'occupe des données à enregistrer  --}}
            @livewire('manage-data')
            
          </main>
        </div>
        
        
            <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
              <script src="form-validation.js"></script>
          
        
        </body>

</body>

<!-- scripts livewire  -->
@livewireScripts

</html>