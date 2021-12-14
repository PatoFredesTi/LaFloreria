
<header class="sticky top-0 z-50" x-data="dropdown()">
    <div class="container flex items-center h-16 justify-between md:justify-start">
        <a href="/" >
            <img src="{{ asset('img/logo.png') }}" alt="logo" class="h-16 w-auto ">
        </a>
        <a  :class="{'bg-teal-50 text-teal-800' : open}"
            x-on:click="show()"
            class="flex justify-center items-center px-6 mx-4 text-gray-400 cursor-pointer h-full font-semibold">
            <svg class=" h-10 w-10" stroke="#14b8a6" fill="none" viewBox="0 0 24 24">
                <path : class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span >Menú</span>
        </a>


        <div class="flex-1 hidden md:block">
            @livewire('search')
        </div>
        

        @auth   

            <div class="mx-6 relative hidden md:block">
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            </div>
        @else
            <div class="mx-6 relative">    
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <i class="fas fa-user-circle color_props text-2xl cursor-pointer"></i>
                    </x-slot>

                    <x-slot name="content">
                        <x-jet-dropdown-link href="{{ route('login') }}">
                            {{ __('Login') }}
                        </x-jet-dropdown-link>

                        <x-jet-dropdown-link href="{{ route('register') }}">
                            {{ __('Register') }}
                        </x-jet-dropdown-link>
                    </x-slot>
                </x-jet-dropdown>    
            </div>
        @endauth

        <div class="hidden md:block">
            @livewire('dropdown-cart')
        </div>
        
    </div>

    <nav id="navigation-menu" 
        x-show="open"
        class=" w-full absolute ">
        <div class="container h-full">
            <div
                x-on:click.away = "close()" 
                class="grid grid-cols-4 h-full relative">
                <ul id="bg-menu">
                    @foreach ($categories as $category)
                        <li class="navigation-link text-gray-900 hover:bg-teal-200 hover:text-teal-700 font-bold">
                            <a href="" class="py-2 px-4 text-sm flex items-center">
                                {{$category->name}}
                                
                                <span class="flex justify-center w-6">
                                    {!!$category->icon!!}
                                </span>
                            </a>

                            <div class="navigation-submenu bg-gray-100 absolute w-3/4 h-full top-0 right-0 hidden">
                                <x-navigation-subcategories :category="$category" />
                                
                            </div>
                        </li>
                    @endforeach

                </ul>
                <div class="col-span-3 bg-gray-100">
                    <x-navigation-subcategories :category="$categories->first()" />
                </div>
            </div>
        </div>
    </nav>
</header>

