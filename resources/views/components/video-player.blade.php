<!-- resources/views/components/youtube-player.blade.php -->

@props(['videos' => []]) <!-- Definisikan prop `videos` dengan default array kosong -->

<div x-data="youtubePlayer()" class="w-full h-[60vh] overflow-hidden relative px-4 md:px-10 my-5">
    <!-- Container Utama -->
    <div class="w-full h-full flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-6">
        <!-- Video Utama -->
        <div class="flex-1 h-full">
            <iframe 
                :src="mainVideoUrl" 
                class="w-full h-full rounded-lg shadow-lg" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
            </iframe>
        </div>

        <!-- Daftar Video Samping (Desktop) -->
        <div class="md:w-1/5 h-full overflow-y-auto space-y-4 hidden md:block">
            <template x-for="(video, index) in videos" :key="index">
                <div 
                    @click="changeMainVideo(video.url)" 
                    class="cursor-pointer hover:bg-gray-100 p-2 rounded-lg transition-all duration-200"
                >
                    <!-- Thumbnail Kotak Padat -->
                    <div class="w-full aspect-square overflow-hidden rounded-lg">
                        <img 
                            :src="getThumbnail(video.url)" 
                            alt="Thumbnail" 
                            class="w-full h-full object-cover"
                        >
                    </div>
                    <!-- Judul Video -->
                    <p x-text="video.alt" class="mt-2 text-sm font-medium text-gray-700"></p>
                </div>
            </template>
        </div>

        <!-- Daftar Video Bawah (Mobile) -->
        <div class="w-full h-1/4 md:hidden overflow-x-auto flex space-x-1">
            <template x-for="(video, index) in videos" :key="index">
                <div 
                    @click="changeMainVideo(video.url)" 
                    class="cursor-pointer hover:bg-gray-100 p-2 rounded-lg transition-all duration-200 flex-shrink-0"
                >
                    <!-- Thumbnail Kotak Padat -->
                    <div class="w-24 h-24 overflow-hidden rounded-lg">
                        <img 
                            :src="getThumbnail(video.url)" 
                            alt="Thumbnail" 
                            class="w-full h-full object-cover"
                        >
                    </div>
                    <!-- Judul Video -->
                    <p x-text="video.title" class="text-xs font-medium text-gray-700 text-center"></p>
                </div>
            </template>
        </div>
    </div>
</div>

<script>
    function youtubePlayer() {
        return {
            videos: @json($videos), <!-- Gunakan data yang dipassing dari prop -->
            mainVideoUrl: @json($videos[0]['url'] ?? ''), <!-- Default URL video utama -->

            changeMainVideo(url) {
                this.mainVideoUrl = url;
            },

            getThumbnail(url) {
                const videoId = url.split('/embed/')[1];
                return `https://img.youtube.com/vi/${videoId}/0.jpg`;
            }
        }
    }
</script>