<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <form method="get" action="{{ route('user.items.index') }}">
          <div class="flex flex-wrap justify-between md:justify-end items-end mb-8">
            <div class="w-48/100 md:w-auto mb-4 md:mb-0 text-center md:mr-4">
              <p>カテゴリーを選ぶ</p>
              <select class="fomrAction w-full md:w-auto" name="category" id="category">
                <option value="0" selected @endif>全て</option>
                @foreach(config('category.category_name') as $key => $value)
                  <option value="{{$key}}">{{$value}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </form>
      </div> --}}
      <div class="bg-white mt-8 overflow-hidden shadow-sm sm:rounded-lg">
        <h1 class="font-bold text-lg px-6 py-4 bg-gray-200">作成したスレッド</h1>
        <div class="p-6 bg-white border-b border-gray-200">
          @if (session('flash_message'))
            <div class="max-w-7xl mx-auto mb-2 bg-blue-100 border border-blue-500 text-blue-700 px-4 py-3 rounded" role="alert">
              <p class="text-sm">{{ session('flash_message') }}</p>
            </div>
          @endif
          <div class="">
            @if(count($user->thread) > 0)
              @foreach($user->thread as $key => $userThread)
                @if($key > 9)
                  @break
                @endif
                <a href="{{route('user.thread.show', ['thread' => $userThread->id])}}" class="block px-2 py-4 border-b border-black hover:opacity-80 hover:bg-gray-100 transition-all">
                  <h2>{{$userThread->title}}</h2>
                  <div class="flex mt-1 flex-wrap md:flex-nowrap">
                    <span class="w-full md:mr-4 md:w-auto">カテゴリー：{{$userThread->category_name}}</span>
                    <span class="mt-1 md:mt-0">作成日時：{{$userThread->created_at->format('Y年n月j日 H時i分s秒')}}</span>
                  </div>
                  <p class="mt-1">{!! nl2br(htmlspecialchars($userThread->first_comment)) !!}</p>
                </a>
              @endforeach
            @else
              <p>まだ作成されたスレッドがありません。</p>
            @endif
          </div>
          <div class="text-right mt-4">
            <a href="{{ route('user.profile.mythread') }}" class="text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">もっと見る</a>
          </div>
        </div>
      </div>
      <div class="bg-white mt-8 overflow-hidden shadow-sm sm:rounded-lg">
        <h1 class="font-bold text-lg px-6 py-4 bg-gray-200">コメントしたスレッド</h1>
        <div class="p-6 bg-white border-b border-gray-200">
          <div>
            @if(count($comments) > 0)
              @foreach($comments as $key => $thread)
                @if($key > 9)
                  @break
                @endif
                <a href="{{route('user.thread.show', ['thread' => $thread->thread->id])}}" class="block px-2 py-4 border-b border-black hover:opacity-80 hover:bg-gray-100 transition-all">
                  <h2>{{$thread->thread->title}}</h2>
                  <div class="flex mt-1 flex-wrap md:flex-nowrap">
                    <span class="w-full md:mr-4 md:w-auto">カテゴリー：{{$thread->thread->category_name}}</span>
                    <span class="mt-1 md:mt-0">作成日時：{{$thread->thread->created_at->format('Y年n月j日 H時i分s秒')}}</span>
                  </div>
                  <div class="flex items-center mt-1">
                    <figure class="mr-4 w-12 h-12 rounded-full border border-black border-solid"><img class='object-cover w-full h-full rounded-full' src="{{asset('storage/img/profile/' . $thread->thread->user->img)}}" alt="プロフィール画像"></figure>
                    <span>{{$thread->thread->user->name}}さん</span>
                  </div>
                  <p class="mt-1">{!! nl2br(htmlspecialchars($thread->thread->first_comment)) !!}</p>
                </a>
              @endforeach
            @else
              <p>まだ作成されたスレッドがありません。</p>
            @endif
          </div>
        </div>
      </div>
      <div class="bg-white mt-8 overflow-hidden shadow-sm sm:rounded-lg">
        <h1 class="font-bold text-lg px-6 py-4 bg-gray-200">最新のスレッド</h1>
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="">
            @if(count($threads) > 0)
              @foreach($threads as $key => $thread)
                @if($key > 9)
                  @break
                @endif
                <a href="{{route('user.thread.show', ['thread' => $thread->id])}}" class="block px-2 py-4 border-b border-black hover:opacity-80 hover:bg-gray-100 transition-all">
                  <h2>{{$thread->title}}</h2>
                  <div class="flex mt-1 flex-wrap md:flex-nowrap">
                    <span class="w-full md:mr-4 md:w-auto">カテゴリー：{{$thread->category_name}}</span>
                    <span class="mt-1 md:mt-0">作成日時：{{$thread->created_at->format('Y年n月j日 H時i分s秒')}}</span>
                  </div>
                  <div class="flex items-center mt-1">
                    <figure class="mr-4 w-12 h-12 rounded-full border border-black border-solid"><img class='object-cover w-full h-full rounded-full' src="{{asset('storage/img/profile/' . $thread->user->img)}}" alt="プロフィール画像"></figure>
                    <span>{{$thread->user->name}}さん</span>
                  </div>
                  <p class="mt-1">{!! nl2br(htmlspecialchars($thread->first_comment)) !!}</p>
                </a>
              @endforeach
            @else
              <p>まだ作成されたスレッドがありません。</p>
            @endif
          </div>
          <div class="text-right mt-4">
            <a href="{{ route('user.thread.index') }}" class="text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">もっと見る</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
