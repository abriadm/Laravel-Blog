<aside id="default-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <h1 class="text-gray-900 text-xl dark:text-slate-300 px-3 mt-4 mb-5 font-semibold text-underline">Administrator
        </h1>
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/dashboard/posts"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <span class="ms-3">Posts</span>
                </a>
            </li>
            <li>
                <a href="/dashboard/categories"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <span class="ms-3">Category</span>
                </a>
            </li>
            <li>
                <a href="{{ route('users') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <span class="ms-3">Users</span>
                </a>
            </li>
        </ul>


    </div>
</aside>
