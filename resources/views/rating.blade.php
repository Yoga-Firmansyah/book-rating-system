<div>
    <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
</div>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Rating
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                <!-- Header -->
                <h3 class="text-xl font-semibold text-gray-800 mb-6">Insert Rating</h3>

                <form action="{{ route('store-rating') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
                        <!-- Select Author -->
                        <div>
                            <label for="author" class="block text-sm font-medium text-gray-700 mb-1">Author</label>
                            <select name="author" id="author" class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-400 focus:outline-none text-sm"
                                onchange="getBooks(this.value)" required>
                                <option value="" disabled selected>Select Author</option>
                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Select Book -->
                        <div>
                            <label for="book" class="block text-sm font-medium text-gray-700 mb-1">Book</label>
                            <select name="book_id" id="book" class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-400 focus:outline-none text-sm" required>
                                <option value="">Select Book</option>
                            </select>
                        </div>

                        <!-- Select Rating -->
                        <div>
                            <label for="rating" class="block text-sm font-medium text-gray-700 mb-1">Rating</label>
                            <select name="value" id="rating" class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-400 focus:outline-none text-sm" required>
                                @for ($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition cursor-pointer">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script>
        function getBooks(authorId) {
            fetch(`/getBooks/${authorId}`)
                .then(res => res.json())
                .then(books => {
                    const bookSelect = document.getElementById('book');
                    bookSelect.innerHTML = '<option value="">Select Book</option>';
                    books.forEach(book => {
                        const option = document.createElement('option');
                        option.value = book.id;
                        option.textContent = book.name;
                        bookSelect.appendChild(option);
                    });
                });
        }
    </script>
</x-app-layout>
