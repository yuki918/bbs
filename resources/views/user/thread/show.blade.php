<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="px-6 py-4 bg-gray-200">
          @if (session('flash_message'))
            <div class="max-w-7xl mx-auto mb-2 bg-blue-100 border border-blue-500 text-blue-700 px-4 py-3 rounded" role="alert">
              <p class="text-sm">{{ session('flash_message') }}</p>
            </div>
          @endif
          <h1 class="font-bold text-xl mb-1">{{$thread->title}}</h1>
          <div class="flex mt-1 flex-wrap md:flex-nowrap">
            <span class="w-full md:mr-4 md:w-auto">カテゴリー：{{$thread->category_name}}</span>
            <span class="mt-1 md:mt-0">作成日時：{{$thread->created_at->format('Y年n月j日 H時i分s秒')}}</span>
          </div>
          <div class="flex items-center mt-4">
            <figure class="mr-4 w-12 h-12 rounded-full border border-black border-solid"><img class='object-cover w-full h-full rounded-full' src="{{asset('storage/img/profile/' . $thread->user->img)}}" alt="プロフィール画像"></figure>
            <span>{{$thread->user->name}}さん</span>
          </div>
          <p class="mt-4">{!! nl2br(htmlspecialchars($thread->first_comment)) !!}</p>
          @if($thread->user->id === Auth::id())
            <div class="text-right">
              <a href="{{route('user.thread.edit', ['thread' => $thread->id])}}" class="inline-block mt-4 text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">編集する</a>
            </div>
          @endif
        </div>
        <div class="p-6 bg-white border-b border-gray-200">
          @if(count($thread->comment) > 0)
            @foreach($thread->comment as $key => $comment)
              <div class="md:p-4">
                <div class="flex items-center flex-wrap md:flex-nowrap mt-1">
                  <figure class="mr-4 w-12 h-12 rounded-full border border-black border-solid"><img class='object-cover w-full h-full rounded-full' src="{{asset('storage/img/profile/' . $comment->user->img)}}" alt="プロフィール画像"></figure>
                  <span class="mr-4">{{$comment->user->name}}さん</span>
                  <span class="mt-2 md:mr-4 md:mt-0">投稿日時：{{$comment->created_at->format('Y年n月j日 H時i分s秒')}}</span>
                </div>
                <p class="mt-4">{!! nl2br(htmlspecialchars($comment->comment)) !!}</p>
              </div>
            @endforeach
          @else
            <p>まだコメントがありません。</p>
          @endif
        </div>
        <hr>
        <div class="p-6 bg-white border-b border-gray-200">
          @if (session('flash_message02'))
            <div class="max-w-7xl mx-auto mb-2 bg-blue-100 border border-blue-500 text-blue-700 px-4 py-3 rounded" role="alert">
              <p class="text-sm">{{ session('flash_message02') }}</p>
            </div>
          @endif
          <form action="{{ route('user.comment.store', ['thread' => $thread->id]) }}" method="POST">
            @csrf
            <div class="mt-4">
              <x-label for="comment" :value="('スレッドのコメント')" />
              <textarea type="text" id="comment" name="comment" rows="10" required class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"></textarea>
            </div>
            <div class="text-right">
              <button type="submit" onclick="" class="mt-4 text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">コメントする</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
