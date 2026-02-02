<!-- Static sidebar for desktop -->
<div class="hidden lg:flex lg:w-64 lg:flex-col lg:fixed lg:inset-y-0">
    <div class="flex-1 flex flex-col min-h-0 bg-admin-dark">
        <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
            <!-- Logo -->
            <div class="flex items-center flex-shrink-0 px-4">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-admin-primary rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm0 4a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1V8zm8 0a1 1 0 011-1h4a1 1 0 011 1v3a1 1 0 01-1 1h-4a1 1 0 01-1-1V8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <span class="ml-3 text-xl font-bold text-white">E-Shopper Admin</span>
                </div>
            </div>
            
            <!-- Navigation -->
            <nav class="mt-8 flex-1 px-2 space-y-1">
                <!-- Dashboard -->
                <a href="{{ url('/admin/dashboard') }}" 
                   class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->is('admin/dashboard') ? 'bg-admin-primary text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                    <svg class="mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    Dashboard
                </a>
                
                <!-- Products -->
                <div x-data="{ open: {{ request()->is('admin/*product*') ? 'true' : 'false' }} }">
                    <button @click="open = !open" 
                            class="w-full group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-admin-primary">
                        <svg class="mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119.993z" />
                        </svg>
                        Products
                        <svg x-show="!open" class="ml-auto h-5 w-5 transform transition-colors" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <svg x-show="open" class="ml-auto h-5 w-5 transform transition-colors" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div x-show="open" class="pl-11 space-y-1">
                        <a href="{{ url('/admin/view-products') }}" 
                           class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->is('admin/view-products') ? 'bg-admin-primary text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                            All Products
                        </a>
                        <a href="{{ url('/admin/add-product') }}" 
                           class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->is('admin/add-product') ? 'bg-admin-primary text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                            Add Product
                        </a>
                    </div>
                </div>
                
                <!-- Categories -->
                <div x-data="{ open: {{ request()->is('admin/*categor*') ? 'true' : 'false' }} }">
                    <button @click="open = !open" 
                            class="w-full group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-admin-primary">
                        <svg class="mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                        </svg>
                        Categories
                        <svg x-show="!open" class="ml-auto h-5 w-5 transform transition-colors" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <svg x-show="open" class="ml-auto h-5 w-5 transform transition-colors" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div x-show="open" class="pl-11 space-y-1">
                        <a href="{{ url('/admin/view-categories') }}" 
                           class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->is('admin/view-categories') ? 'bg-admin-primary text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                            All Categories
                        </a>
                        <a href="{{ url('/admin/add-category') }}" 
                           class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->is('admin/add-category') ? 'bg-admin-primary text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                            Add Category
                        </a>
                    </div>
                </div>
                
                <!-- Settings -->
                <a href="{{ url('/admin/settings') }}" 
                   class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->is('admin/settings') ? 'bg-admin-primary text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                    <svg class="mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Settings
                </a>
            </nav>
        </div>
        
        <!-- User menu -->
        <div class="flex-shrink-0 flex bg-gray-800 p-4">
            <div class="flex items-center">
                <div>
                    <div class="w-8 h-8 bg-admin-primary rounded-full flex items-center justify-center">
                        <span class="text-white text-sm font-medium">{{ substr(auth()->user()->name ?? 'A', 0, 1) }}</span>
                    </div>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-white">{{ auth()->user()->name ?? 'Admin' }}</p>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-xs text-gray-300 hover:text-white">Sign out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>