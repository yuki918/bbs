<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <h1 class="font-bold text-lg px-6 py-4 bg-gray-200">新規スレッド作成</h1>
        <div class="p-6 bg-white border-b border-gray-200">
          <form action="{{ route('user.thread.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
              <x-label for="title" :value="('スレッドのタイトル')" />
              <x-input id="title" type="text" name="title" required class="block mt-1 w-full" />
            </div>
            <div class="mt-4">
              <x-label for="category_name" :value="('スレッドのカテゴリー')" />
              <select name="category_name" id="category_name" required class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full">
                @foreach(config('category.category_name') as $key => $value)
                  <option value="{{$key}}">{{$value}}</option>
                @endforeach
              </select>
            </div>
            <div class="mt-4">
              <x-label for="first_comment" :value="('スレッドのコメント')" />
              <textarea type="text" id="first_comment" name="first_comment" rows="10" required class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"></textarea>
            </div>
            <button type="submit" onclick="" class="mt-4 text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">スレッドを作成する</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>