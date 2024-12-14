<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('View Pets') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-6">
        <h1 class="text-3xl font-bold mb-4">Available Pets</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($pets as $pet)
                <div class="border rounded p-4 overflow-hidden">
                    <img src="{{ asset('images/' . $pet->image_url) }}" alt="{{ $pet->name }}" class="w-full h-40 object-cover rounded-md">
                    <h2 class="text-xl font-semibold mt-2">{{ $pet->name }}</h2>
                    <p class="text-gray-600">{{ $pet->description }}</p>
                    <p class="text-green-600 font-bold mt-2">${{ number_format($pet->price, 2) }}</p>
                    <div class="mt-2">
                        <button 
                            onclick="showConfirmationModal({{ $pet->id }}, '{{ $pet->name }}')" 
                            class="text-white bg-green-500 px-3 py-1 rounded">
                            Buy
                        </button>
                        <a href="{{ route('view.pet', $pet->id) }}" class="text-white bg-blue-500 px-3 py-1 rounded">
                            View
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div id="confirmation-modal" class="fixed inset-0 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-lg w-96 p-6 text-center">
            <h2 class="text-lg font-bold mb-4">Confirm Purchase</h2>
            <p id="confirmation-message" class="mb-4"></p>
            <div class="flex justify-center space-x-4">
                <button 
                    onclick="closeConfirmationModal()" 
                    class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                    Cancel
                </button>
                <button 
                    id="confirm-purchase-btn" 
                    class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                    Confirm
                </button>
            </div>
        </div>
    </div>

    <script>
        let selectedPetId = null;

        // Function to show the confirmation modal
        function showConfirmationModal(petId, petName) {
            selectedPetId = petId;
            document.getElementById('confirmation-message').innerText = `Do you want to purchase ${petName}?`;
            document.getElementById('confirmation-modal').classList.remove('hidden');
        }

        // Function to close the confirmation modal
        function closeConfirmationModal() {
            document.getElementById('confirmation-modal').classList.add('hidden');
        }

        // Handle the confirm purchase button click
        document.getElementById('confirm-purchase-btn').addEventListener('click', function() {
            if (selectedPetId) {
                // Sending AJAX request to buy the pet
                fetch(`/buy-pet/${selectedPetId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    closeConfirmationModal();
                    if (data.success) {
                        // Display the success message with Toastr
                        toastr.success(data.message);
                        // Redirect after the notification (you can adjust the delay if needed)
                        setTimeout(function() {
                            window.location.href = data.redirect; // Redirect to the dashboard
                        }, 2000); // Adjust the delay for redirection (2 seconds)
                    } else {
                        alert(data.message); // Handle errors
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                });
            }
        });
    </script>
</x-app-layout>
