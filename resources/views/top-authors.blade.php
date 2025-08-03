<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Home
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg">
                <div class="p-6">
                    <!-- Header -->
                    <div class="flex flex-col sm:flex-row justify-between sm:items-center mb-6 space-y-4 sm:space-y-0">
                        <h3 class="text-xl font-semibold text-gray-800">Top 10 Most Famous Authors</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200 text-sm">
                            <thead class="bg-gray-50 text-gray-700 uppercase tracking-wider">
                                <tr>
                                    <th class="px-4 py-3 border text-left">No</th>
                                    <th class="px-4 py-3 border text-left">Author Name</th>
                                    <th class="px-4 py-3 border text-left">Voter</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($topAuthors as $author)
                                    <tr
                                        class="hover:bg-white transition @if ($loop->even) bg-gray-100 @else bg-gray-50 @endif">
                                        <td class="px-4 py-2">{{ $loop->index + 1 }}</td>
                                        <td class="px-4 py-2">{{ $author->author_name }}</td>
                                        <td class="px-4 py-2">{{ $author->upvote_count }}</td>

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

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
