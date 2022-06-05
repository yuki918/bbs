<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <h1 class="font-bold text-lg px-6 py-4 bg-gray-200">スレッドの編集</h1>
        <div class="p-6 bg-white border-b border-gray-200">
          <form action="{{ route('user.thread.update', ['thread' => $thread->id]) }}" method="POST">
            @csrf
            <div>
              <x-label for="title" :value="('スレッドのタイトル')" />
              <x-input value="{{$thread->title}}" id="title" type="text" name="title" required class="block mt-1 w-full" />
            </div>
            <div class="mt-4">
              <x-label for="category_name" :value="('スレッドのカテゴリー')" />
              <select name="category_name" id="category_name" required class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full">
                @foreach(config('category.category_name') as $key => $value)
                  @if($value === $thread->category_name)
                    <option value="{{$key}}" selected>{{$value}}</option>
                  @else
                    <option value="{{$key}}">{{$value}}</option>
                  @endif
                @endforeach
              </select>
            </div>
            <div class="mt-4">
              <x-label for="first_comment" :value="('スレッドのコメント')" />
              <textarea type="text" id="first_comment" name="first_comment" rows="10" required class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full">{{$thread->first_comment}}</textarea>
            </div>
            <div class="flex justify-end mt-4">
              <a href="{{route('user.thread.show', ['thread' => $thread->id])}}" class="mr-4 text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">戻る</a>
              <button type="submit" class="text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">編集</button>
            </div>
          </form>
          <form id="delete_{{$thread->id}}" method="POST" action="{{ route('user.thread.destroy', ['thread' => $thread->id]) }}">
            @csrf
            <div class="text-right mt-4">
              <a data-id="{{$thread->id}}" onclick="deletePost(this)" class="text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">削除</a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script>
      'use strict'
      function deletePost(e) {
        'use strict';
        if (confirm('スレッドとコメントが削除されます。本当に削除してもいいですか?')) {
          document.getElementById('delete_' + e.dataset.id).submit();
        }
      }
    </script>
  </div>
</x-app-layout>
