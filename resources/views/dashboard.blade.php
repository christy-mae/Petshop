<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-6">
        <h1 class="text-3xl font-bold mb-4">Dashboard</h1>
        <h2 class="text-xl font-semibold mb-2">Order Summary</h2>
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">Order ID</th>
                    <th class="border px-4 py-2">Customer</th>
                    <th class="border px-4 py-2">Pet Name</th>
                    <th class="border px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr>
                        <td class="border px-4 py-2">{{ $order->id }}</td>
                        <td class="border px-4 py-2">{{ $order->customer_name }}</td>
                        <td class="border px-4 py-2">{{ $order->pet->name }}</td>
                        <td class="border px-4 py-2">{{ $order->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="border px-4 py-2 text-center">No orders yet</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="flex justify-center mt-4">
            <a href="{{ route('view.pets') }}" class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded">
                View Pets
            </a>
        </div>
    </div>

    @flasher_render
</x-app-layout>
