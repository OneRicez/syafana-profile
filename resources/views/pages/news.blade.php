@extends('layouts.app')

@section('title','Syafana Islamic School')

@section('content')
<div x-data="newsFilter()" class="container mx-auto p-4">
  <!-- Filter and Sort -->
  <div class="flex justify-between items-center mb-4">
    <input 
    type="text" 
    x-model="search" 
    @input.debounce.500ms="filterNews()" 
    placeholder="Search news..." 
    class="border px-4 py-2 rounded w-1/3"
    />
    <!-- Category Filter -->
    <select x-model="category" class="border px-4 py-2 rounded" @change="filterNews()">
      <option value="all" {{ request('category') ? '' : 'selected' }}>All Categories</option>
      @foreach ($categories as $category)
          <option value="{{ $category->id }}" 
              {{ request('category') == $category->id ? 'selected' : '' }}>
              {{ ucfirst($category->name) }}
          </option>
      @endforeach
    </select>
    <!-- Sort -->
    <div class="flex items-center space-x-2">
      <label for="sort" class="font-medium">Sort By:</label>
      <select x-model="sort" @change="filterNews" id="sort" class="border px-4 py-2 rounded">
        <option value="updated_at">Date</option>
        <option value="title">Title</option>
      </select>

      <select x-model="direction" @change="filterNews" class="border px-4 py-2 rounded">
        <option value="desc">Descending</option>
        <option value="asc">Ascending</option>
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
<div class="mt-4 flex justify-center">
  {{ $news->appends(request()->query())->links('vendor.pagination.tailwind') }}
</div>



</div>


<script>
function newsFilter() {
    return {
        category: "{{ request('category', 'all') }}",
        sort: "{{ request('sort', 'updated_at') }}",
        direction: "{{ request('direction', 'desc') }}",
        search: "{{ request('search', '') }}",
        currentPage: {{ request('page', 1) }},

        filterNews() {
            const url = new URL('{{ route('news.index') }}', window.location.origin);

            if (this.category !== 'all') {
              url.searchParams.set('category', this.category); // Update key to `category_id`
            } else {
              url.searchParams.delete('category'); // Update key to `category_id`
            }

            url.searchParams.set('sort', this.sort);
            url.searchParams.set('direction', this.direction);
            url.searchParams.set('page', 1);

            if (this.search.trim() !== '') {
                url.searchParams.set('search', this.search);
            } else {
                url.searchParams.delete('search');
            }

            console.log("Navigating to:", url.toString());
            window.location.href = url.toString();
        }
    }
}

  </script>
  
  
  
@endsection
