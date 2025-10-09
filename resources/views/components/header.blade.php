
    <nav class="bg-sky-600 text-white">
		<div class="container mx-auto px-4 md:flex items-center justify-between gap-6">
    <!-- Logo -->
    <div class="flex items-center justify-between md:w-auto w-full">
      <a href="{{ url('/') }}" class="py-5 px-2 text-white flex-1 font-bold">Espace de Jean-Michel</a>

      <!-- mobile menu icon -->
      <div class="md:hidden flex items-center">
        <button type="button" class="mobile-menu-button">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
          </svg>
        </button>
      </div>
    </div>

    <div class="hidden md:flex md:flex-row flex-col items-center justify-start md:space-x-1 pb-3 md:pb-0 navigation-menu">
      <a href="{{ url('/welcome') }}" class="py-2 px-3 block hover:bg-sky-800">Accueil</a>
      <!-- Dropdown menu -->
      <div class="">
        <button type="button" class="dropdown-toggle py-2 px-3 hover:bg-sky-800 flex items-center gap-2 rounded">
          <span class="pointer-events-none select-none ">Vie pratique</span>
          <svg class="w-3 h-3 pointer-events-none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
          </svg>
		 
        </button>
        <div class="dropdown-menu absolute hidden bg-sky-700 text-white rounded-b-lg pb-2 w-48">
          <a href="{{ url('/shoppinglists') }}" class="block px-6 py-2 hover:bg-sky-800">Courses</>
          <a href="{{ url('/todolists') }}" class="block px-6 py-2 hover:bg-sky-800">A faire</a>
          <a href="{{ url('/cookings') }}" class="block px-6 py-2 hover:bg-sky-800">Recettes</a>
		      <a href="{{ url('/notes') }}" class="block px-6 py-2 hover:bg-sky-800">Notes</a>
        </div>
      </div>
	  
	   <!-- Dropdown menu -->
      <div class="">
        <button  class="dropdown-toggle py-2 px-3 hover:bg-sky-800 flex items-center gap-2 rounded">
          <span class="pointer-events-none select-none">Vie intellectuelle</span>
          <svg class="w-3 h-3 pointer-events-none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
          </svg>
        </button>
        <div class="dropdown-menu absolute hidden bg-sky-700 text-white rounded-b-lg pb-2 w-48">
          <a href="{{ url('/daybooks') }}" class="block px-6 py-2 hover:bg-sky-800">Journal</a>
          <a href="{{ url('/thoughts') }}" class="block px-6 py-2 hover:bg-sky-800">Pensées</a>
          <a href="{{ url('/notes') }}" class="block px-6 py-2 hover:bg-sky-800">Notes</a>
        </div>
      </div>
      <a href="{{ url('/admin') }}" class="py-2 px-3 block hover:bg-sky-800">Administration</a>
    </div>
  </div>
</nav>
 @if(session()->has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">{{session('success')}}</div>
 @endif
@foreach($errors->all() as $error)
      <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">{{$error}}  
      </div>  
@endforeach


<script>
document.addEventListener("DOMContentLoaded", () => {
  // Select all dropdown toggle buttons
  const dropdownToggles = document.querySelectorAll(".dropdown-toggle");

  dropdownToggles.forEach((toggle) => {
    toggle.addEventListener("click", () => {
      // Find the next sibling element which is the dropdown menu
      const dropdownMenu = toggle.nextElementSibling;

      // Toggle the 'hidden' class to show or hide the dropdown menu
      if (dropdownMenu.classList.contains("hidden")) {
        // Hide any open dropdown menus before showing the new one
        document.querySelectorAll(".dropdown-menu").forEach((menu) => {
          menu.classList.add("hidden");
        });

        dropdownMenu.classList.remove("hidden");
      } else {
        dropdownMenu.classList.add("hidden");
      }
    });
  });

  // Clicking outside of an open dropdown menu closes it
  window.addEventListener("click", function (e) {
    if (!e.target.matches(".dropdown-toggle")) {
      document.querySelectorAll(".dropdown-menu").forEach((menu) => {
        if (!menu.contains(e.target)) {
          menu.classList.add("hidden");
        }
      });
    }
  });

  // Mobile menu toggle

  const mobileMenuButton = document.querySelector(".mobile-menu-button");
  const mobileMenu = document.querySelector(".navigation-menu");

  mobileMenuButton.addEventListener("click", () => {
    mobileMenu.classList.toggle("hidden");
  });
});

</script>
 