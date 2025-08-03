<div>
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
</div>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Home
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Flash Message -->
            @if (session('success'))
                <div class="mb-6 rounded-md bg-green-50 border border-green-300 p-4 text-green-700 text-sm shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow rounded-lg">
                <div class="p-6">
                    <!-- Header -->
                    <div class="flex flex-col sm:flex-row justify-between sm:items-center mb-6 space-y-4 sm:space-y-0">
                        <h3 class="text-xl font-semibold text-gray-800">List of Books</h3>
                    </div>

                    <!-- Search & Filter -->
                    <div class="bg-gray-50 border rounded-lg p-4 mb-6">
                        <form method="GET" action="{{ route('home') }}"
                            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                            <!-- Filter -->
                            <div>
                                <label for="filter" class="block text-sm font-medium text-gray-700 mb-1">
                                    List Shown
                                </label>
                                <select name="filter" id="filter"
                                    class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-400 focus:outline-none text-sm">
                                    <option value="10" {{ request('filter') == '10' ? 'selected' : '' }}>10</option>
                                    <option value="25" {{ request('filter') == '25' ? 'selected' : '' }}>25</option>
                                    <option value="50" {{ request('filter') == '50' ? 'selected' : '' }}>50</option>
                                    <option value="100" {{ request('filter') == '100' ? 'selected' : '' }}>100
                                    </option>
                                </select>
                            </div>

                            <!-- Search -->
                            <div>
                                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">
                                    Search
                                </label>
                                <input type="text" name="search" id="search" value="{{ request('search') }}"
                                    placeholder="Book Title or Author"
                                    class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-400 focus:outline-none text-sm">
                            </div>
                            <div class="flex items-end space-x-2">
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium transition cursor-pointer">
                                    Submit
                                </button>
                                <a href="{{ route('home') }}"
                                    class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md text-sm font-medium transition cursor-pointer">
                                    Reset
                                </a>
                            </div>
                        </form>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200 text-sm">
                            <thead class="bg-gray-50 text-gray-700 uppercase tracking-wider">
                                <tr>
                                    <th class="px-4 py-3 border text-left">No</th>
                                    <th class="px-4 py-3 border text-left">Book Name</th>
                                    <th class="px-4 py-3 border text-left">Category Name</th>
                                    <th class="px-4 py-3 border text-left">Author Name</th>
                                    <th class="px-4 py-3 border text-left">Average Rating</th>
                                    <th class="px-4 py-3 border text-left">Voter</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($books as $book)
                                    <tr
                                        class="hover:bg-white transition @if ($loop->even) bg-gray-100 @else bg-gray-50 @endif">
                                        <td class="px-4 py-2">{{ $loop->index + 1 }}</td>
                                        <td class="px-4 py-2">{{ $book->name }}</td>
                                        <td class="px-4 py-2">{{ $book->category_name }}</td>
                                        <td class="px-4 py-2">{{ $book->author_name }}</td>
                                        <td class="px-4 py-2">{{ number_format($book->average_rating, 2) }}</td>
                                        <td class="px-4 py-2">{{ $book->rating_count }}</td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-4 py-4 text-center text-gray-500">
                                            No Record Found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if ($books->hasPages())
                        <div class="mt-6">
                            {{ $books->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
