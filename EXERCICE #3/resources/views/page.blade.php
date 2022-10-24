
 @include('layout.head')

    <body class="bg-light">

      <div class="container">
        <nav class="navbar navbar-primary bg-primary ">
          <a class="navbar-brand text-white btn btn-primary ml-5" href="{{route('deconnexion')}}">
            Deconnexion
          </a>
        </nav>
      </div>
      

        <div class="container">
          <main>
            {{-- Appel de la composante qui s'occupe des données à enregistrer  --}}
            @livewire('manage-data')
            
          </main>
        </div>
        
      
@include('layout.footer')