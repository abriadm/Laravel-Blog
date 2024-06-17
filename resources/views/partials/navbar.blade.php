<header class="bg-[#FFF6E9]">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="#" class="-m-1.5 p-1.5">
                <span class="sr-only">Your Company</span>
                <img class="h-8 w-auto" src="/assets/favicon-1.png" alt="">
            </a>
        </div>
        <div class="flex flex-1 gap-x-12">
            <a href="/"
                class="text-sm font-semibold leading-6 text-gray-900 {{ $active === 'home' ? 'bg-gray-600 text-white px-2 rounded-lg' : '' }}">Home</a>
            <a href="/posts"
                class="text-sm font-semibold leading-6 text-gray-900 {{ $active === 'posts' ? 'bg-gray-600 text-white px-2 rounded-lg' : '' }}">Blog</a>
            <a href="/about"
                class="text-sm font-semibold leading-6 text-gray-900 {{ $active === 'about' ? 'bg-gray-600 text-white px-2 rounded-lg' : '' }}">About</a>
            <a href="/categories"
                class="text-sm font-semibold leading-6 text-gray-900 {{ $active === 'categories' ? 'bg-gray-600 text-white px-2 rounded-lg' : '' }}">Categories</a>
        </div>
        <div class="flex flex-2">
            @auth
                <div class="relative inline-block text-left">
                    <button type="button"
                        class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none"
                        id="menu-button" aria-expanded="false" aria-haspopup="true">
                        {{ Auth::user()->name }}
                        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden"
                        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="py-1" role="none">
                            <a href="/dashboard" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100"
                                role="menuitem" tabindex="-1" id="menu-item-0">Dashboard</a>
                            <form method="POST" action="#">
                                @csrf
                                <button type="submit"
                                    class="text-gray-700 block w-full text-left px-4 py-2 text-sm hover:bg-gray-100"
                                    role="menuitem" tabindex="-1" id="menu-item-1">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <a class="text-sm font-semibold hover:text-blue-700" href="/login">Login</a>
            @endauth
        </div>
    </nav>
</header>

<script>
    document.addEventListener('click', function(event) {
        var dropdown = document.querySelector('.relative.inline-block.text-left');
        var button = document.querySelector('#menu-button');
        var menu = document.querySelector(
            '.origin-top-right.absolute.right-0.mt-2.w-56.rounded-md.shadow-lg.bg-white.ring-1.ring-black.ring-opacity-5.focus\\:outline-none'
            );

        if (button && button.contains(event.target)) {
            menu.classList.toggle('hidden');
        } else if (!dropdown.contains(event.target)) {
            menu.classList.add('hidden');
        }
    });
</script>
