@auth
  <figure class="w-12 h-12 rounded-full border border-black border-solid"><img class='object-cover w-full h-full rounded-full' src="/storage/img/profile/{{Auth::user()->img}}" alt="プロフィール画像"></figure>
@endauth
@guest
  <figure class="w-12 h-12 rounded-full border border-black border-solid"><img class='object-cover w-full h-full rounded-full' src="{{asset('img/profile-img.png')}}" alt="プロフィール画像"></figure>
@endguest