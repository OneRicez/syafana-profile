@extends('layouts.app')

@section('title','Syafana Islamic School')

@section('content')
<div x-data="newsFilter()" class="container mx-auto p-4">
  <!-- Filter and Sort -->
  <div class="flex justify-between items-center mb-4">
    <!-- Category Filter -->
    <select x-model="category" @change="filterNews" class="border px-4 py-2 rounded">
      <option value="all">All Categories</option>
      <option value="tech">Tech</option>
      <option value="sports">Sports</option>
      <option value="entertainment">Entertainment</option>
    </select>

    <!-- Sort -->
    <div class="flex items-center space-x-2">
      <label for="sort" class="font-medium">Sort By:</label>
      <select x-model="sort" @change="filterNews" id="sort" class="border px-4 py-2 rounded">
        <option value="title">Title</option>
        <option value="created_at">Date</option>
      </select>

      <select x-model="direction" @change="filterNews" class="border px-4 py-2 rounded">
        <option value="asc">Ascending</option>
        <option value="desc">Descending</option>
      </select>
    </div>
  </div>

    <!-- News Grid -->

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 p-6">
      @foreach ($news as $article)
          <x-news-item 
          :title="$article->title"
          :author="$article->author"
          :image="$article->image"
          :date="$article->updated_at->format('d M Y')"
          :url="'/news/' . $article['slug']"
      />
      @endforeach
  </div>
  


  <!-- Pagination -->
  <div class="mt-4">
    <button x-show="prevPage" @click="fetchNews(prevPage)" class="px-4 py-2 bg-gray-300 rounded">
      Previous
    </button>
    <button x-show="nextPage" @click="fetchNews(nextPage)" class="px-4 py-2 bg-gray-300 rounded">
      Next
    </button>
  </div>
</div>

<script>
    function newsFilter() {
        return {
            news: [],
            category: 'all',
            sort: 'title',
            direction: 'asc',
            prevPage: null,
            nextPage: null,
            fetchNews(url = '{{ route('news.index') }}') {
                fetch(url + `?category=${this.category}&sort=${this.sort}&direction=${this.direction}`)
                    .then(res => res.json())
                    .then(data => {
                        this.news = data.data;
                        this.prevPage = data.prev_page_url;
                        this.nextPage = data.next_page_url;
                    });
            },
            filterNews() {
                this.fetchNews();
            },
            init() {
                this.fetchNews();
            }
        }
    }
</script>
@endsection
