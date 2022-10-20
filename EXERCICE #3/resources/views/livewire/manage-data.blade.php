<div>
  <div class="mt-5">

    {{-- Afficheur de message de succès--}}
    @if (session()->has('success'))
    <div class="alert alert-success text-center">
      {{ session('success') }}
    </div>
    @endif
    {{-- Afficheur de message de succès--}}


    {{-- Afficheur de message de d'érreur--}}
    @if (session()->has('error'))
    <div class="alert alert-danger text-center">
      {{ session('error') }}
    </div>
    @endif
    {{--Fin Afficheur de message de d'érreur--}}
  </div>

  @if (!$liste)
  <div class="py-5 ">
    <h2>Formulaire d'enregistrement</h2>
    <p class="lead">Entrer les différentes informations à enregistrer</p>
  </div>

  <div class="mb-3">
    <button class="btn btn-primary" wire:click="$set('liste',{{true}})">Cliquer pour la Liste des enregistrements</button>
  </div>


  <div class="row g-3">
    <div class="col-md-12 col-lg-8">

      {{-- Formulaire d'enregistrement --}}
      <form class="needs-validation" wire:submit.prevent='saveData()'>
        <div class="row g-3">
          <div class="col-sm-6">
            <label for="name" class="form-label">Nom <span class="text-muted">*</span></label>
            <input type="text" class="form-control" placeholder="Entrer votre nom" wire:model.lazy='information.nom'
              required>
            <div class="invalid-feedback">
              ce champ est requis
            </div>
          </div>

          <div class="col-6">
            <label for="email" class="form-label">Email <span class="text-muted">*</span></label>
            <input type="email" class="form-control" placeholder="you@example.com" wire:model.lazy='information.email'>
            <div class="invalid-feedback">
              S'il vous plaît entrer une adresse valide
            </div>
          </div>


          <hr class="my-4">

          <div class="c text-center">
            <button class="btn btn-primary btn-lg" type="submit" wire:loading.remove
              wire:target='saveData()'>Enregistrer</button>
            <button class="btn btn-primary btn-lg" type="button" wire:loading wire:target='saveData()'>Patientez un
              instant ...</button>
          </div>
      </form>
      {{-- Fin du Formulaire d'enregistrement --}}

    </div>
  </div>


  @else
  <div class="py-5 ">
    <h2>Liste des enregistrements</h2>
    <p class="lead">Parcourez dans cette liste les différentes personnes enregistrés dans votre formulaire.</p>
  </div>

  <div class="mb-3">
    <button class="btn btn-primary" wire:click="$set('liste',{{false}})">Cliquer pour un nouvel enregistrement</button>
  </div>

  {{-- Tableau du listing des données enregistrées --}}
  <table class="table">
    @if (sizeOf($this->allInformation)<=0) <tr>
      <td colspan="5">
        <h3>
          Aucun enregistrement pour le moment
        </h3>
      </td>
      </tr>
      @else
      <thead>
        <tr>
          <th scope="col">Numéro</th>
          <th scope="col">Nom</th>
          <th scope="col">Email</th>
          <th scope="col">Date de création</th>
          <th scope="col">Date de dernière modification</th>
          <th scope="col">Manipulation</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($this->allInformation as $key=>$item)
        <tr>
          <th scope="row">{{$key+1}}</th>
          <td>{{$item->nom}}</td>
          <td>{{$item->email}}</td>
          <td>{{$item->created_at}}</td>
          <td>{{$item->updated_at}}</td>
          <td>
            <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{$item->id}})"">Supprimer</button>
              <button type=" button" class="btn btn-primary btn-sm" wire:click="edit({{$item->id}})">Modifier</button>

          </td>
        </tr>
        @endforeach
        @endif
      </tbody>
  </table>

  {{-- Fin du Tableau du listing des données enregistrées --}}



  <div>
    {{$this->allInformation->links()}}
  </div>

  @endif


</div>