@extends('layouts.app')

@section('title', $news->title)

@section('content')
<div class="relative bg-cover bg-center h-96" style="background-image: url('{{ asset('storage/' . $news->image) }}');">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative z-10 container mx-auto text-white py-64">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl font-bold">{{ $news->title }}</h1>
            {{-- <p class="mt-4 text-lg">{{ $news->excerpt }}</p> --}}
        </div>
    </div>
</div>

<div class="container mx-auto py-8 flex flex-col lg:flex-row">
    <!-- Main News Section -->
    <div class="w-full lg:w-3/4 lg:pr-4 pr-1">
      <div class="bg-white p-6 rounded-lg shadow-lg">
        <p class="text-sm text-gray-600">By <span class="font-bold">{{ $news->author }}</span> in 
          <span class="text-blue-500">{{ $news->category }}</span> 
          <span>{{ $news->created_at->diffForHumans() }}</span>
        </p>
        <div class="mt-6">
          <div class="text-md lg:text-xl leading-relaxed text-gray-800">
            {!! $news->content !!}
          </div>
        </div>
      </div>

      <!-- Comments Section -->
      <div class="mt-8">
        <h2 class="text-2xl font-semibold mb-4">Comments</h2>
        <div id="comments-section">
          <div id="comments-list">
            @foreach($news->comments()->approved()->get() as $comment)
                <div class="border-b pb-4 mb-4">
                    <div class="flex items-center">
                        <div class="ml-3">
                            <p class="font-bold">{{ $comment->name }} <span class="text-sm text-gray-500">- {{ $comment->created_at->diffForHumans() }}</span></p>
                            <p class="mt-2 text-gray-700">{{ $comment->content }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
          </div>
        
        

            <!-- Comment Form -->
            <div class="mt-8">
              <h2 class="text-lg">Leave a Comment</h2>
              <h2 class="text-base mb-4">Your email address will not be published. Required fields are marked *</h2>
                <form id="comment-form">
                    @csrf
                    <div class="mb-4">
                      <textarea id="content" name="content" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" placeholder="Add your comment..."  > {{old('content')}}</textarea>
                      @error('content')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="mb-4">
                      <label for="name" class="font-medium mb-2 inline-block">Name *</label>
                      <input name="name" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your name..."  value="{{ old('name') }}"></input>
                      @error('name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="mb-4">
                      <label for="email" class="font-medium mb-2 inline-block">Email *</label>
                      <input name="email" type="email" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your email..."  value="{{ old('email') }}"></input>
                      @error('email')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="mb-4">
                      <label for="website" class="font-medium mb-2 inline-block">Website</label>
                      <input name="website" type="website" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your website..." value="{{ old('website') }}"></input>
                      @error('website')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                      @enderror
                    </div>
                        
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-full hover:bg-blue-600 transition duration-300">Post Comment</button>
                </form>
            </div>
            
        </div>
      </div>
    </div>

    <!-- Sidebar Section -->
    <div class="w-full lg:w-1/4 px-4 mt-8 lg:mt-0">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-semibold">Categories</h3>
            <ul class="mt-4">
                @foreach($categories as $category)
                    <li class="mb-2">
                        <a href="{{ route('category.news', $category->slug) }}" class="text-blue-500 hover:text-blue-700">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg mt-4">
            <h3 class="text-xl font-semibold">Recent Comments</h3>
            <ul class="mt-4">
                @foreach ($recent_comments as $comment)
                    <li class="mb-2">
                        <div class="flex items-center">
                            <div class="ml-2">
                                <p class="text-sm font-semibold">{{ $comment->name }}</p>
                                <p class="text-sm text-gray-600">{{ Str::limit($comment->content, 50) }}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
  document.getElementById('comment-form').addEventListener('submit', function (e) {
      e.preventDefault(); // Mencegah reload halaman
      
      const form = this;
      const formData = new FormData(form);

      // Hapus pesan error sebelumnya
      document.querySelectorAll('.text-red-500').forEach(el => el.remove());

      // Pastikan kita pakai slug, bukan ID
      axios.post('{{ route('comments.store', ['news' => $news->slug]) }}', formData)
          .then(response => {
              const comment = response.data.comment;
              const commentsList = document.getElementById('comments-list');

              // Buat elemen komentar baru
              const newComment = document.createElement('div');
              newComment.className = 'border-b pb-4 mb-4';
              newComment.innerHTML = `
                  <div class="flex items-center">
                      <div class="ml-3">
                          <p class="font-bold">${comment.name} <span class="text-sm text-gray-500">- Baru saja</span></p>
                          <p class="mt-2 text-gray-700">${comment.content}</p>
                      </div>
                  </div>
              `;

              // Tambahkan komentar baru ke daftar komentar
              commentsList.prepend(newComment);

              // Reset form
              form.reset();
          })
          .catch(error => {
              if (error.response && error.response.status === 422) {
                  const errors = error.response.data.errors;
                  for (const field in errors) {
                      const errorMessage = errors[field][0];
                      const errorElement = document.createElement('p');
                      errorElement.className = 'text-sm text-red-500';
                      errorElement.textContent = errorMessage;
                      document.querySelector(`[name="${field}"]`).insertAdjacentElement('afterend', errorElement);
                  }
              }
          });
  });
</script>

@endsection



