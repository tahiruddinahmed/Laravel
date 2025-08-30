<x-auth-layout>
    <div class="bg-gray-800 p-8 rounded-lg shadow-md w-full max-w-sm border border-gray-700">
        <h2 class="text-2xl font-bold text-center mb-6 text-white">Create an Account</h2>
        <form method="POST" action="/register">
            @csrf
            <div class="mb-4">
                <x-form-label for="name">Name</x-form-label>
                <x-form-input type="text" id="name" name="name" placeholder="Enter Full name"></x-form-input>
            </div> 
            <div class="mb-4">
                <x-form-label for="email">Email</x-form-label>
                <x-form-input type="email" id="email" name="email" placeholder="Email Address"></x-form-input>
            </div>
            <div class="mb-4">
                <x-form-label for="password">Password</x-form-label>
                <x-form-input type="password" id="password" name="password" placeholder="************"></x-form-input>
            </div>
            <div class="mb-6">
                <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                <x-form-input type="password" id="password_confirmation" name="password_confirmation" placeholder="************"></x-form-input>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                    Sign Up
                </button>
            </div>
        </form>
        <p class="text-center text-gray-400 text-xs mt-4">
            Already have an account? <a href="{{ route('login') }}" class="text-blue-400 hover:text-blue-500">Login here</a>.
        </p>
    </div>
</x-auth-layout>