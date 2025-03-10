<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ isset($client) ? 'Edit Client' : 'Add Client' }}
            </h2>
            <a href="{{ route('dashboard') }}" class="inline-block text-white bg-blue-500 px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                Back
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ isset($client) ? route('clients.update', $client->id) : route('clients.store') }}" method="POST">
                    @csrf
                    @if (isset($client))
                        @method('PUT')
                    @endif

                    <!-- Client Name -->
                        <div class="mb-4">
                            <label for="client_name" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Client Name</label>
                            <input type="text" name="client_name" id="client_name" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" value="{{ isset($client) ? $client->client_name : old('client_name') }}" required>
                        </div>

                        <!-- Phone Number -->
                        <div class="mb-4">
                            <label for="phone_number" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Phone Number</label>
                            <input type="text" name="phone_number" id="phone_number" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" value="{{ isset($client) ? $client->phone_number : old('phone_number') }}" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Email</label>
                            <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" value="{{ isset($client) ? $client->email : old('email') }}" required>
                        </div>

                        <!-- Address -->
                        <div class="mb-4">
                            <label for="address" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Address</label>
                            <textarea name="address" id="address" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" rows="3" required>{{ isset($client) ? $client->address : old('address') }}</textarea>
                        </div>

                        <!-- App Created -->
                        <div class="mb-6">
                            <label for="app_created" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">App Created</label>
                            <select name="app_created" id="app_created" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" required>
                                <option value="app" {{ (isset($client) && $client->app_created === 'app') ? 'selected' : '' }}>App</option>
                                <option value="website" {{ (isset($client) && $client->app_created === 'website') ? 'selected' : '' }}>Website</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-200">
                            {{ isset($client) ? 'Update Client' : 'Add Client' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
