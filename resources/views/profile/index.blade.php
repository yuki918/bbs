<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <h1 class="font-bold text-lg px-6 py-4 bg-gray-200">プロフィール</h1>
        <div class="p-6 bg-white border-b border-gray-200">
          @if (session('flash_message'))
            <div class="max-w-7xl mx-auto  bg-blue-100 border border-blue-500 text-blue-700 px-4 py-3 rounded" role="alert">
              <p class="text-sm">{{ session('flash_message') }}</p>
            </div>
          @endif
          <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
              <x-label for="name" :value="('名前')" />
              <x-input id="name" type="text" name="name" value="{{ $user->name }}" class="block mt-1 w-full" />
            </div>
            <div class="mt-4">
              <x-label for="email" :value="('メールアドレス')" />
              <x-input id="email" type="email" name="email" value="{{ $user->email }}" class="block mt-1 w-full" />
            </div>
            {{-- <div class="mt-4">
              <x-label for="password" :value="__('Password')" />
              <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>
            <div class="mt-4">
              <x-label for="password_confirmation" :value="__('Confirm Password')" />
              <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            </div> --}}
            <div class="mt-4">
              <x-label for="image" :value="('プロフィール画像')" />
              <div class="flex items-center">
                @if(Auth::user()->img)
                  <figure class="w-36 mr-5"><img src="/storage/img/profile/{{Auth::user()->img}}" alt="プロフィール画像"></figure>
                @else
                  <figure class="w-36 mr-5"><img src="{{asset('img/profile-img.png')}}" alt="プロフィール画像"></figure>
                @endif
                <input class="mt-2" id="image" type="file" name="image">
              </div>
            </div>
            <div class="mt-4">
              <x-label for="introduce" :value="('自己紹介')" />
              <textarea type="text" id="introduce" name="introduce" rows="5" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full">{{$user->introduce}}</textarea>
            </div>
            <button type="submit" onclick="" class="mt-4 text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">更新する</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
