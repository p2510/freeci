<form wire:submit.prevent='submit' method="post">
    @csrf
    @method('post')
    <h3>Recommander</h3>
    <!-- Bookmark Button -->
    <input type="email" wire:model="email" required class="with-border margin-bottom-25" placeholder="Votre email">
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
    <input type="hidden" name="user_id" value={{$user_id}}>


    <button wire:click='submit' type="submit" class="bookmark-button margin-bottom-25"
        @if ($email == 0) disabled @endif>
        <span class="bookmark-icon"></span>
        <span class="bookmark-text">Recommander</span>
        <span class="bookmarked-text">Recommandé</span>
    </button>

    @error('email')

        <span>Désactivé (Entrez email)</span>
    @else
        @if ($email == 0)
        <span>Désactivé (Entrez email)</span>

        @else
            <span>Cliquer pour valider</span>
        @endif

    @enderror


</form>
