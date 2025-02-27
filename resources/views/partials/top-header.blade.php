<section class="bg-white shadow-sm" x-cloak>
  <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
    <!-- Logo Section -->
    <div class="w-full md:w-auto flex justify-center md:justify-start items-center pr-2">
      <!-- Logo or School Name -->
      <img src="{{asset('storage/'.$headerData['logo'])}}" alt="test" class="h-8 md:h-10 lg:h-12 w-auto" />
    </div>
  
    <!-- Contact Info Section -->
    <div class="w-full md:w-auto flex md:flex-row items-center justify-center md:justify-start md:space-y-0 md:space-x-6 ">
      <!-- Phone -->
      <div class="flex items-center space-x-2 md:px-5 px-2">
        <img src="{{ asset('icons/telephone.svg') }}" alt="Telephone Icon" class="h-6 w-6">
        <div>
          <p class="text-xs text-gray-600">Contact Number</p>
          <p class="font-semibold lg:text-xs md:text-[10px] text-[8px]">{{$headerData['main-contact']}}</p>
        </div>
      </div>
      <!-- Work Hours -->
      <div class="flex items-center space-x-2 md:px-5 px-2">
        <img src="{{ asset('icons/clock.svg') }}" alt="Clock Icon" class="h-6 w-6">
        <div>
          <p class="text-xs text-gray-600">Work Hours</p>
          <p class="font-semibold lg:text-xs md:text-[10px] text-[8px]">{{$headerData['work-hours']}}</p>
        </div>
      </div>
      <!-- Email -->
      <div class="flex items-center space-x-2 md:px-5 px-2">
        <img src="{{ asset('icons/mail.svg') }}" alt="Mail Icon" class="h-6 w-6">
        <div>
          <p class="text-xs text-gray-600">Email</p>
          <p class="font-semibold lg:text-xs md:text-[10px]  text-[8px]">{{$headerData['email']}}</p>
        </div>
      </div>
    </div>

    <!-- Button and Social Media Section -->
    <div class="w-full md:w-auto flex flex-col md:flex-row items-center justify-center md:justify-end space-y-3 md:space-y-0 md:space-x-4">
      <!-- Contact Us Button -->
      <a href="{{route('contact-us')}}" class="w-full md:w-auto px-3 py-1  text-black text-sm font-medium rounded-md text-center hover:text-blue-800 transition">
        More Contact
      </a>
      <!-- Social Media Icons -->
      <div class="flex justify-center space-x-2">
        <a href="{{$headerData['facebook']}}" target="_blank" rel="noopener noreferrer">
          <img src="{{ asset('icons/facebook-c.svg') }}" alt="Facebook" class="h-8 w-8">
        </a>
        <a href="{{$headerData['youtube']}}" target="_blank" rel="noopener noreferrer">
          <img src="{{ asset('icons/youtube-c.svg') }}" alt="YouTube" class="h-8 w-8">
        </a>
        <a href="{{$headerData['instagram']}}" target="_blank" rel="noopener noreferrer">
          <img src="{{ asset('icons/instagram-c.svg') }}" alt="Instagram" class="h-8 w-8">
        </a>
      </div>
    </div>
  </div>
</section>