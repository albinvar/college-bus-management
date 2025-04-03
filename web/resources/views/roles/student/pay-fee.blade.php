<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Payment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <h3 class="text-lg font-semibold mb-4">Mock Payment</h3>

                    <div class="mb-4 text-left text-sm text-gray-700">
                <p class="text-gray-600 text-center mb-2">You are about to pay the following fee:</p>
                        
                        <p class="text-center text-2xl my-3"><strong>Amount Due:</strong> ₹{{ number_format($fee->due_amount, 2) }}</p>
                    </div>

                    <p class="text-gray-600 mb-4">Enter OTP to complete your payment.</p>

                    @if(session('error'))
                        <div class="text-red-600 mb-4">{{ session('error') }}</div>
                    @endif

                    <form method="POST" action="{{ route('payment.gateway.response') }}">
                        @csrf
                        <input type="hidden" name="paymentId" value="{{ uniqid('mock_', true) }}">

                        <div class="mb-4 text-left">
                            <label for="otp" class="block mb-1 font-medium">OTP</label>
                            <input id="otp" name="otp" type="text" class="border rounded px-4 py-2 w-full" required>
                            <small class="text-gray-500">Use OTP: <strong>12345</strong></small>
                        </div>

                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">
                            Submit Payment
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
