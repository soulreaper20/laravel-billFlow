<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <a href="{{ route('clients.create') }}" class="inline-block text-white bg-blue-500 px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                Add Client
            </a>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                {{ __("You're logged in!") }}

                <!-- Client List Table -->
                    <div class="mt-6">
                        <h3 class="text-lg font-semibold mb-4">Client List</h3>

                        @if ($clients->isEmpty())
                            <p class="text-gray-600 dark:text-gray-400">No clients found.</p>
                        @else
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600">
                                    <thead class="bg-gray-50 dark:bg-gray-600">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Name</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Phone</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Email</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Address</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">App Created</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                                    @foreach ($clients as $client)
                                        <tr class="bg-white dark:bg-gray-800">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $client->client_name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $client->phone_number }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $client->email }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $client->address }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $client->app_created === 'app' ? 'bg-blue-100 text-blue-800 dark:bg-blue-200 dark:text-blue-900' : 'bg-green-100 text-green-800 dark:bg-green-200 dark:text-green-900' }}">
                                                        {{ ucfirst($client->app_created) }}
                                                    </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('clients.edit', $client->id) }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                                                    Edit
                                                </a>
                                                <a href="{{ route('clients.transactions', $client->id) }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                                                    View
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
