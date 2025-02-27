<div id="news-container">
  @foreach ($news as $article)
      <x-news-item 
          :title="$article->title"
          :author="$article->author"
          :image="$article->image"
          :date="$article->updated_at->format('d M Y')"
          :url="'/news/' . $article->slug"
      />
  @endforeach
</div>

<div id="pagination-links">
  {{ $news->links('pagination::tailwind') }}
</div>