<section class="bg-white shadow-sm" x-cloak>
  <div class="container mx-auto px-0 py-0 flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
    <!-- Logo Section -->
    <div class="flex justify-center md:justify-start items-center space-x-0">
      {{-- Logo or School Name --}}
      <h1 class="text-blue-800 font-bold text-lg">Syafana Islamic School</h1>
    </div>

    <!-- Contact Info Section -->
    <div class="flex px-10 flex-col md:flex-row items-center text-center md:text-left space-y-4 md:space-y-0 md:space-x-10">
      <!-- Phone -->
      <div class="flex items-center space-x-2">
        <img src="{{ asset('icons/telephone.svg') }}" alt="Telephone Icon" class="h-6 w-6 m-2">
        <div>
          <p class="text-xs text-gray-600">Contact Number</p>
          <p class="font-semibold text-xs">+62 819-3043-7474</p>
          {{-- <p class="font-semibold text-xs">+62 819-3043-7479</p> --}}
        </div>
      </div>

      <!-- Work Hours -->
      <div class="flex items-center space-x-2">
        <img src="{{ asset('icons/clock.svg') }}" alt="Clock Icon" class="h-6 w-6 m-2">
        <div>
          <p class="text-xs text-gray-600">Work Hours</p>
          <p class="font-semibold text-xs">07:00 - 16:00 WIB</p>
        </div>
      </div>

      <!-- Email -->
      <div class="flex items-center space-x-2">
        <img src="{{ asset('icons/mail.svg') }}" alt="Mail Icon" class="h-6 w-6 m-2">
        <div>
          <p class="text-xs text-gray-600">Email</p>
          <p class="font-semibold text-xs">info@syafana.sch.id</p>
        </div>
      </div>
    </div>

    <!-- Button and Social Media Section -->
    <div class="flex ml-4 flex-col shrink-0 md:flex-row items-center space-y-2 md:space-y-1 md:space-x-4">
      <!-- Contact Us Button -->
      <a href="mailto:info@syafana.sch.id" class="px-3 py-0.5 bg-[#80ADA0] text-white text-lg font-medium rounded-md hover:bg-[#739c90] transition">
        Contact Us
      </a>

      <!-- Social Media Icons -->
      <div class="flex justify-center space-x-1 tablet:flex">
        <a href="https://facebook.com" target="_blank" rel="noopener noreferrer">
          <img src="{{ asset('icons/facebook-c.svg') }}" alt="Facebook" class="h-8 w-8">
        </a>
        <a href="https://youtube.com" target="_blank" rel="noopener noreferrer">
          <img src="{{ asset('icons/youtube-c.svg') }}" alt="YouTube" class="h-8 w-8">
        </a>
        <a href="https://instagram.com" target="_blank" rel="noopener noreferrer">
          <img src="{{ asset('icons/instagram-c.svg') }}" alt="Instagram" class="h-8 w-8">
        </a>
      </div>
    </div>
  </div>
</section>
