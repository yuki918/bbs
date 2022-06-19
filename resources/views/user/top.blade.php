<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white mt-8 overflow-hidden shadow-sm sm:rounded-lg">
        <h1 class="font-bold text-lg px-6 py-4 bg-gray-200">最新のスレッド</h1>
        <div class="p-6 bg-white border-b border-gray-200">
          <div>
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