<section class="bg-gray-100 py-4">
    <a href="{{ route('news.index') }}" class="text-5xl font-ssprobold px-10 text-[#091B8C] hover:underline">NEWS</a>
  
    <div class="grid md:grid-cols-3 gap-8 mx-auto px-10 py-8">
        <!-- News Grid with auto-height rows -->
        <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-8 auto-rows-min">
            {{ $newsGrid }}
        </div>
  
        <!-- Sidebar that matches grid height -->
        <div class="md:col-span-1 grid content-start gap-y-8">
            <!-- Categories -->
            <div class="space-y-2">
                <h3 class="text-xl font-bold text-blue-800">Categories</h3>
                <div class="bg-white rounded-lg shadow-md p-6">
                    {{ $categories }}
                </div>
            </div>
  
            <!-- Comments -->
            <div class="space-y-2 h-full">
                <h3 class="text-xl font-bold text-blue-800">Recent Comments</h3>
                <div class="bg-white rounded-lg shadow-md p-6 flex flex-col max-h-[calc(100vh-24rem)] overflow-y-auto">
                    {{ $comments }}
                </div>
            </div>
        </div>
    </div>
  
    <!-- Slot untuk Pagination -->
    <div class="flex justify-start px-12 pb-8">
        {{ $pagination }}
    </div>
  </section>
  