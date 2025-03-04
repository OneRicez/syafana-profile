<div
    x-data="{
        slides: @js($slides),
        currentSlideIndex: 1,
        autoSlideInterval: null,

        previous() {
            this.currentSlideIndex = this.currentSlideIndex > 1 
                ? this.currentSlideIndex - 1 
                : this.slides.length;
        },

        next() {
            this.currentSlideIndex = this.currentSlideIndex < this.slides.length
                ? this.currentSlideIndex + 1 
                : 1;
        },

        startAutoSlide() {
            this.autoSlideInterval = setInterval(() => {
                this.next();
            }, 5000); 
        },

        stopAutoSlide() {
            clearInterval(this.autoSlideInterval);
        },

        init() {
            this.startAutoSlide();

            // Hentikan auto-slide saat pengguna menghover carousel
            $el.addEventListener('mouseenter', () => this.stopAutoSlide());
            $el.addEventListener('mouseleave', () => this.startAutoSlide());
        }
    }"
    class="relative w-full overflow-hidden mt-3"
>

    {{-- Previous button --}}
    <button
        type="button"
        class="absolute left-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-neutral-600 transition hover:bg-white/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0"
        aria-label="previous slide"
        x-on:click="previous()"
    >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="3" class="size-5 md:size-6 pr-0.5" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
        </svg>
    </button>

    {{-- Next button --}}
    <button
        type="button"
        class="absolute right-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-neutral-600 transition hover:bg-white/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0"
        aria-label="next slide"
        x-on:click="next()"
    >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="3" class="size-5 md:size-6 pl-0.5" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
    </button>

    {{-- Slides --}}
    <div class="relative min-h-[50svh] w-full">
        <template x-for="(slide, index) in slides" :key="index">
            <div
                x-show="currentSlideIndex == index + 1"
                class="absolute inset-0"
                x-transition.opacity.duration.1000ms
            >
            <img
                class="absolute w-full h-full inset-0 object-contain text-neutral-600"
                :src="'/storage/' + slide.img_path"
                :alt="slide.alt"
            />
            </div>
        </template>
    </div>

    {{-- Indicators --}}
    <div
        class="absolute rounded-md bottom-3 md:bottom-5 left-1/2 z-20 flex -translate-x-1/2 gap-4 md:gap-3 bg-white/75 px-1.5 py-1 md:px-2"
        role="group"
        aria-label="slides"
    >
        <template x-for="(slide, index) in slides" :key="index">
            <button
                class="size-2 cursor-pointer rounded-full transition"
                :class="[currentSlideIndex === index + 1 ? 'bg-neutral-600' : 'bg-neutral-600/50']"
                x-on:click="currentSlideIndex = index + 1"
                :aria-label="'slide ' + (index + 1)"
            ></button>
        </template>
    </div>
</div>