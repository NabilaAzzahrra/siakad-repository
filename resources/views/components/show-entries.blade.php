@props([
    'route' => '#',
    'page' => 1,
    'search' => '',
])

<form method="GET" action="{{ $route }}" class="flex items-center space-x-2">
    <label for="entries" class="text-sm">Show:</label>
    @if ($search)
        <input type="hidden" name="search" value="{{ $search }}">
    @endif
    <select
        class="w-20 relative inline-flex items-center px-4 py-2 font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300"
        name="entries" id="entries" onchange="this.form.submit()">
        {{-- <option value="5" {{ request('entries') == 5 ? 'selected' : '' }}>5</option> --}}
        <option value="10" {{ request('entries') == 10 ? 'selected' : '' }}>10</option>
        <option value="25" {{ request('entries') == 25 ? 'selected' : '' }}>25</option>
        <option value="50" {{ request('entries') == 50 ? 'selected' : '' }}>50</option>
        <option value="100" {{ request('entries') == 100 ? 'selected' : '' }}>100</option>
    </select>
    <label for="entries" class="text-sm">entries</label>
    <input type="hidden" name="page" value="{{ $page }}">
</form>
