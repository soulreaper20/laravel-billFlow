<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ isset($transaction) ? 'Edit Transaction' : 'Add Transaction' }}
            </h2>
            <a href="{{ route('clients.transactions', $client->id) }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                Add Transaction
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ isset($transaction) ? route('transactions.update', $transaction->id) : route('clients.transactions.store', $client->id) }}" method="POST">
                    @csrf
                    @if (isset($transaction))
                        @method('PUT')
                    @endif

                    <!-- Hidden input for client_id -->
                        <input type="hidden" name="client_id" value="{{ $client->id }}">

                        <!-- Previous Payment Date -->
                        <div class="mb-4">
                            <label for="previous_payment_date" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Previous Payment Date</label>
                            <input type="date" name="previous_payment_date" id="previous_payment_date" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" value="{{ isset($transaction) ? $transaction->previous_payment_date : old('previous_payment_date') }}" required>
                        </div>

                        <!-- Previous Payment Amount -->
                        <div class="mb-4">
                            <label for="previous_payment_amount" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Previous Payment Amount</label>
                            <input type="number" step="0.01" name="previous_payment_amount" id="previous_payment_amount" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" value="{{ isset($transaction) ? $transaction->previous_payment_amount : old('previous_payment_amount') }}" required>
                        </div>

                        <!-- Next Payment Date -->
                        <div class="mb-4">
                            <label for="next_payment_date" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Next Payment Date</label>
                            <input type="date" name="next_payment_date" id="next_payment_date" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" value="{{ isset($transaction) ? $transaction->next_payment_date : old('next_payment_date') }}" required>
                        </div>

                        <!-- Next Payment Amount -->
                        <div class="mb-4">
                            <label for="next_payment_amount" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Next Payment Amount</label>
                            <input type="number" step="0.01" name="next_payment_amount" id="next_payment_amount" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" value="{{ isset($transaction) ? $transaction->next_payment_amount : old('next_payment_amount') }}" required>
                        </div>

                        <!-- Remarks -->
                        <div class="mb-4">
                            <label for="remarks" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Remarks</label>
                            <textarea name="remarks" id="remarks" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" rows="3">{{ isset($transaction) ? $transaction->remarks : old('remarks') }}</textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-200">
                            {{ isset($transaction) ? 'Update Transaction' : 'Add Transaction' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
