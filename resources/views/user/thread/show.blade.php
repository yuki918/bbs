<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 py-4 bg-gray-200">
                    <h1 class="font-bold text-xl mb-1">{{$thread->title}}</h1>
                    <div class="flex mt-1 flex-wrap md:flex-nowrap">
                      <span class="w-full md:mr-4 md:w-auto">カテゴリー：{{$thread->category_name}}</span>
                      <span class="mt-1 md:mt-0">作成日時：{{$thread->created_at->format('Y年n月j日 H時i分s秒')}}</span>
                    </div>
                    <div class="flex items-center mt-1">
                      <figure class="mr-4 w-12 h-12 rounded-full border border-black border-solid"><img class='object-cover w-full h-full rounded-full' src="{{asset('storage/img/profile/' . $thread->user->img)}}" alt="プロフィール画像"></figure>
                      <span>{{$thread->user->name}}さん</span>
                    </div>
                    <p class="mt-1">{{$thread->first_comment}}</p>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                  @if(count($thread->comment) > 0)
                    @foreach($thread->comment as $key => $comment)
                      <div class="p-4">
                        <div class="flex items-center mt-1">
                          <figure class="mr-4 w-12 h-12 rounded-full border border-black border-solid"><img class='object-cover w-full h-full rounded-full' src="{{asset('storage/img/profile/' . $comment->user->img)}}" alt="プロフィール画像"></figure>
                          <span class="mr-4">{{$comment->user->name}}さん</span>
                          <span class="mr-4">投稿日時：{{$comment->created_at->format('Y年n月j日 H時i分s秒')}}</span>
                        </div>
                        <p class="mt-4">{{$comment->comment}}</p>
                      </div>
                    @endforeach
                  @else
                    <p>まだコメントがありません。</p>
                  @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
