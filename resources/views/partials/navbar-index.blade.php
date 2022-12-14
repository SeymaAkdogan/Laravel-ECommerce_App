<header>
    <div class="bg-image bg-cover bg-center" style="background-image: url(image/bg.jpg);height: 600px;background-color: rgb(21, 21, 21);">
        <!-- NAVBAR -->
        <div class="w-full text-white bg-transparent pt-8  fixed-top" id="navbar">
            <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                <div class="p-4 flex flex-row items-center justify-between">
                    <a href="/" class="text-lg font-semibold tracking-widest text-white uppercase rounded-lg focus:outline-none focus:shadow-outline">Flowtrail
                        UI</a>
                    <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                            <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
                    <form method="GET" class="d-flex px-4" action="/products">
                        @if(isset($search))
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name='search' value="{{$search}}">
                        @else
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name='search' value="">
                        @endif
                        <button class="btn text-sm bg-white border-white" style="color: #f75e27;" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    <!-- PRODUCTS -->

                    <div class="relative pt-3">
                        <a href="/products" class="flex flex-row items-center w-full px-2 py-2 mt-2 text-md font-medium font-mono uppercase text-left bg-transparent rounded-lg md:w-auto md:inline md:mt-0 md:ml-4 menu hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            Products
                        </a>
                    </div>


                    <div class="relative pt-3">
                        <a href="/account/favorites" class="flex flex-row items-center w-full px-2 py-2 mt-2 text-md font-medium font-mono uppercase text-left bg-transparent rounded-lg md:w-auto md:inline md:mt-0 md:ml-4 menu hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            Favorites
                        </a>
                    </div>

                    <!-- ACCOUNT -->
                    <div @click.away="open = false" class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex flex-row items-center w-full px-2 py-2 mt-2 text-md font-medium font-mono uppercase text-left bg-transparent rounded-lg md:w-auto md:inline md:mt-0 md:ml-4 menu hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <span>Account</span>
                            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                            <div class="px-2 py-2 bg-gray-900 rounded-md shadow">
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg  md:mt-0 menu hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/cart">CART</a>
                                @auth
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg  md:mt-0 menu hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline uppercase" href="/profile">My Profile </a>
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg  md:mt-0 menu hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline uppercase" href="/logout">Logout , {{Auth::user()->username}}</a>
                                @endauth
                                @guest
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 menu hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline uppercase" href="/login">Login</a>
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 menu hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline uppercase" href="/register">Register</a>
                                @endguest
                            </div>
                        </div>
                    </div>
                    @auth
                    @if(Auth::user()->role == 'admin')
                    <!-- ADMIN -->
                    <div @click.away="open = false" class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex flex-row items-center w-full px-2 py-2 mt-2 text-md font-medium font-mono uppercase text-left bg-transparent rounded-lg md:w-auto md:inline md:mt-0 md:ml-4 menu hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <span>ADMIN</span>
                            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                            <div class="px-2 py-2 bg-gray-900 rounded-md shadow">
                                <a class="uppercase block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg  md:mt-0 menu hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/admin/users">Users</a>
                                <a class="uppercase block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg  md:mt-0 menu hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/admin/products">All Products</a>
                                <a class="uppercase block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg  md:mt-0 menu hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/admin/create-product">Create Product</a>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endauth
                </nav>
            </div>
        </div>
    </div>

</header>
