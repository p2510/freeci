<div class="col-xl-4 col-lg-4 col-md-12">
    <h3><i class="icon-feather-mail"></i> Inscrivez-vous à une newsletter</h3>
    <p>Dernières nouvelles hebdomadaires, analyses et conseils de pointe sur la recherche
        d'emploi.</p>
    <x-input-error :messages="$errors->get('email')" class="mt-2" />

    <form wire:submit.prevent='submit' method="post" class="newsletter">
        @csrf
        @method('post')
        <input type="text" wire:model="email" placeholder="Votre E-mail">
        <button type="submit"><i class="icon-feather-arrow-right"></i></button>
    </form>
    @if ($status_newsletter == 1)
   
        <div class="alert ">
            <x-alert-success message="Vous êtes désormais abonné!!" />
        </div>
    @endif
</div>

<style>
    .alert {
        margin-top: 5px;
        animation-name: Invisible;
        animation-duration: 1s;
        animation-fill-mode: forwards;
        animation-iteration-count: 1;
        animation-delay: 1s;
    }

    @keyframes Invisible {

        from {
            opacity: 1;
        }

        to {
            opacity: 0;
            display: none;
        }
    }
</style>
