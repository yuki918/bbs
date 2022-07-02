<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white mt-8 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <form method="get" action="{{route('user.thread.index')}}">
            <div class="flex flex-wrap justify-between md:justify-end items-end">
                <div class="w-48/100 md:w-auto mb-4 md:mb-0 text-center md:mr-4">
                  <p>カテゴリーを選ぶ</p>
                  <select class="fomrAction w-full md:w-auto" name="category" id="category">
                    <option value="0" @if(\Request::get('category') === '0') selected @endif>全て</option>
                    @foreach(config('category.category_name') as $key => $value)
                      <option value="{{$key}}" @if(\Request::get('category') === $value) selected @endif>{{$value}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="w-48/100 md:w-auto mb-4 md:mb-0 text-center md:mr-4">
                  <p>表示順</p>
                  <select class="fomrAction w-full md:w-auto" name="sort" id="sort">
                    <option value="{{ \Constants::SORT_ORDER['later'] }}"
                      @if(\Request::get('sort') == \Constants::SORT_ORDER['later']) selected @endif>
                      新しい
                    </option>
                    <option value="{{ \Constants::SORT_ORDER['older'] }}"
                      @if(\Request::get('sort') == \Constants::SORT_ORDER['older']) selected @endif>
                      古い
                    </option>
                  </select>
                </div>
                <div class="w-48/100 md:w-auto mb-4 md:mb-0 text-center md:mr-4">
                  <p>表示件数</p>
                  <select class="fomrAction w-full md:w-auto" name="pagination" id="pagination">
                    <option value="10" @if(\Request::get('pagination') === '10') selected @endif>
                      10件
                    </option>
                    <option value="20" @if(\Request::get('pagination') === '20') selected @endif>
                      20件
                    </option>
                    <option value="50" @if(\Request::get('pagination') === '50') selected @endif>
                      50件
                    </option>
                    <option value="100" @if(\Request::get('pagination') === '100') selected @endif>
                      100件
                    </option>
                  </select>
                </div>
                <div class="keywordSerch w-full md:w-48/100 md:w-auto mb-4 md:mb-0 text-center">
                  <p class="text-left md:text-center">キーワードで検索する</p>
                  <div class="flex">
                    <input name="keyword" class="flex-grow md:w-auto border border-gray-500 py-2 px-4" placeholder="キーワード">
                    <button class="w-auto text-white bg-indigo-500 border-0 py-1 px-2 focus:outline-none hover:bg-indigo-600">検索</button>
                  </div>
                </div>
            </div>
          </form>
        </div>
        <div class="p-6 bg-white border-b border-gray-200">
          <div>
            @if(count($threads) > 0)
              @foreach($threads as $thread)
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
              <p>条件に合うスレッドはありませんでした。</p>
            @endif
          </div>
          <div class="pagination-wrapper mt-6">
            {{ $threads->appends([
              'category' => \Request::get('category'),
              'sort' => \Request::get('sort'),
              'pagination' => \Request::get('pagination'),
              'keyword' => \Request::get('keyword'),
            ])->onEachSide(5)->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
<script>
  const sort = document.getElementById('sort');
  const pagination = document.getElementById('pagination');
  const category = document.getElementById('category');
  sort.addEventListener('change', function(){
      this.form.submit();
  });
  pagination.addEventListener('change', function(){
      this.form.submit();
  });
  category.addEventListener('change', function(){
      this.form.submit();
  });
</script>
</x-app-layout>