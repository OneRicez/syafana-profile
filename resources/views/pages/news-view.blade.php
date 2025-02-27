@extends('layouts.app')

@section('title', "$news->title - Syafana Islamic School")

@section('content')
<div class="relative">
    <img src="{{ asset('storage/' . $news->image) }}" class="w-full object-cover aspect-[16/9]" alt="{{ $news->title }}">

    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="absolute inset-0 flex items-center justify-center text-white">
        <h1 class="text-4xl font-bold">{{ $news->title }}</h1>
    </div>
</div>

<!-- Updated Breadcrumbs Section -->
<div class="container flex mx-auto items-center space-x-3 text-lg text-gray-600 py-6">
    <!-- News Link -->
    <a href="{{ route('news.index') }}" class="hover:text-blue-500 cursor-pointer font-medium">NEWS</a>
    <span class="text-gray-400">></span>

    <!-- Category Link -->
    <a 
        x-data="{ searchCategory(category) { window.location.href = `/news?category=${category}`; } }"
        @click="searchCategory('{{ $news->category->id }}')"
        class="hover:text-blue-500 cursor-pointer font-medium"
    >
        {{ $news->category->name }}
    </a>
    <span class="text-gray-400">></span>

    <!-- News Title -->
    <a href="{{ route('news.view', $news->id) }}" class="font-semibold text-gray-800">{{ $news->title }}</a>
</div>


<!-- Rest of your content -->
<div class="container mx-auto py-3 flex flex-col lg:flex-row">
    <!-- Main News Section -->
    <div class="w-full lg:w-3/4 lg:pr-4 pr-1">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <p class="text-sm text-gray-600">By <span class="font-bold">{{ $news->author }}</span> in 
                <span class="text-blue-500">{{ $news->category->name }}</span> 
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

                    <!-- Success Message -->
                    <div id="success-message" class="hidden p-4 mb-4 text-green-800 bg-green-100 border border-green-400 rounded-lg">
                        Your comment has been submitted and is awaiting approval.
                    </div>

                    <form id="comment-form">
                        @csrf
                        <div class="mb-4">
                            <textarea id="content" name="content" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" placeholder="Add your comment...">{{ old('content') }}</textarea>
                            @error('content')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="name" class="font-medium mb-2 inline-block">Name *</label>
                            <input name="name" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your name..." value="{{ old('name') }}">
                            @error('name')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="email" class="font-medium mb-2 inline-block">Email *</label>
                            <input name="email" type="email" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your email..." value="{{ old('email') }}">
                            @error('email')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="website" class="font-medium mb-2 inline-block">Website</label>
                            <input name="website" type="url" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your website..." value="{{ old('website') }}">
                            @error('website')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-full hover:bg-blue-600 transition duration-300">
                            Post Comment
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar Section -->
    <div class="md:col-span-1 grid content-start gap-y-8 z-10">
        <!-- Categories Section -->
        <div x-data="{ searchCategory(category) { window.location.href = `/news?category=${category}`; } }">
            <h3 class="text-xl font-bold text-blue-800">Categories</h3>
            <div class="bg-white rounded-lg shadow-md p-4">
                <div class="flex flex-wrap gap-2">
                    @foreach ($categories as $item)
                        <button class="bg-blue-100 text-blue-800 px-3 py-1 rounded-md text-sm hover:bg-blue-200 transition" @click="searchCategory('{{ $item->name }}')">
                            {{ $item->name }} ({{ $item->news_count }})
                        </button>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Recent Comments Section -->
        <div class="space-y-2 h-full">
            <h3 class="text-xl font-bold text-blue-800">Recent Comments</h3>
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col max-h-[300px] overflow-y-auto">
                @foreach ($comments as $comment)
                    <p class="text-sm border-b pb-2">
                        <span class="font-semibold">{{ $comment->name }}</span> 
                        on 
                        <a href="{{ url('/news/' . $comment->news->slug) }}" class="text-blue-600 hover:underline">
                            {{ $comment->news->title }}
                        </a>
                    </p>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('comment-form').addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent page reload

        const form = this;
        const formData = new FormData(form);
        const successMessage = document.getElementById('success-message');

        // Remove previous error messages
        document.querySelectorAll('.text-red-500').forEach(el => el.remove());

        axios.post('{{ route('comments.store', ['news' => $news->slug]) }}', formData)
            .then(response => {
                // Show success message
                successMessage.classList.remove('hidden');

                // Hide message after 5 seconds
                setTimeout(() => {
                    successMessage.classList.add('hidden');
                }, 5000);

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