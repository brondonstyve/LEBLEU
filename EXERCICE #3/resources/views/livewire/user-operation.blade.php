<div>
    <div>

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

    @if ($vueFormCreateUser)
    <form wire:submit.prevent="create" wire:key='1'>

        <h5 class="fw-normal  pb-3" style="letter-spacing: 1px;">Créer un compte</h5>

        <div class="form-outline mb-4">
        <label class="form-label" >Adresse Email</label>
        <input type="email" wire:model='email' class="form-control form-control-lg" required/>
        </div>

        <div class="form-outline mb-4">
        <label class="form-label" >Mot de passe</label>
        <input type="password" wire:model='password' class="form-control form-control-lg" required/>
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" >Confirmer votre mot de passe</label>
            <input type="password" wire:model='confirmPassword' class="form-control form-control-lg" required/>
        </div>

        @if ($password != $confirmPassword && $confirmPassword!=null)
        <div class="form-outline mb-4  text-center">
            <label class="form-label text-danger" >Les mots de passe ne correspondent pas</label>
        </div>
        @endif

        <div class="pt-1 mb-2">
            <button class="btn btn-dark btn-lg btn-block" type="submit" @if ($password != $confirmPassword && $confirmPassword!=null) disabled @endif>Enregistrer</button>
        </div>

        <p class="mb-2 pb-lg-2" style="color: #393f81;">Vous avez un compte? <a href="#!"
           wire:click="$set('vueFormCreateUser',false)" style="color: #393f81;">Cliquez ici</a></p>
        <a href="#!" class="small text-muted">Conditions d'utilisation.</a>
        <a href="#!" class="small text-muted">Politique de confidentialité.</a>
    </form>
    @else
    <form wire:submit.prevent="connection" wire:key='2'>
            
        <div class="d-flex align-items-center mb-3 pb-1">
        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
        <span class="h1 fw-bold mb-0">LEBLEU</span>
        </div>

        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Identifiez vous avant de continuer.</h5>

        <div class="form-outline mb-4">
        <label class="form-label" >Adresse Email</label>
        <input type="email" wire:model='email' class="form-control form-control-lg" />
        </div>

        <div class="form-outline mb-4">
        <label class="form-label">Mot de passe</label>
        <input type="password" wire:model='password' class="form-control form-control-lg" />
        </div>

        <div class="pt-1 mb-4">
        <button class="btn btn-dark btn-lg btn-block" type="submit">Connexion</button>
        </div>

        <p class="mb-5 pb-lg-2" style="color: #393f81;">Vous n'avez pas de compte? <a href="#!"
            wire:click="$set('vueFormCreateUser',true)" style="color: #393f81;">Cliquez ici</a></p>
        <a href="#!" class="small text-muted">Conditions d'utilisation.</a>
        <a href="#!" class="small text-muted">Politique de confidentialité.</a>
    </form>
    @endif

</div>
