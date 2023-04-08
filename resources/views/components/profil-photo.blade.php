@if (Auth::user()->profil_photo!==null)
<img src="{{asset('storage/profil_photo/'.Auth::user()->profil_photo)}}"
    alt="Photo de profile de  {{ Auth::user()->name }} sur Freeci">
@else
<img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=2A41E8&color=fff"
    alt="Photo de profile de {{ Auth::user()->name }} sur Freeci">
@endif