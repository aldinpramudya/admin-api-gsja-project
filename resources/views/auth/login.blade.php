<!-- resources/views/auth/login.blade.php -->
<x-guest-layout>
    <div class="flex w-full min-h-screen">
        <!-- Left Side - Background Image with Logo and Text -->
        <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-[#E5322D] to-[#c42820] relative overflow-hidden">
            <!-- Background Pattern/Decoration -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full -translate-x-1/2 -translate-y-1/2"></div>
                <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/2 translate-y-1/2"></div>
            </div>

            <!-- Content -->
            <div class="relative z-10 flex flex-col justify-center items-center w-full px-12 text-white">
                <!-- Logo -->
                <div class="mb-8">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-32 h-32 object-contain">
                </div>

                <!-- Welcome Text -->
                <div class="text-center">
                    <h1 class="text-5xl font-bold mb-4">Selamat Datang Kembali!</h1>
                    <p class="text-xl text-white/90 mb-8">Admin GSJA BDP1 Jatim</p>
                    <div class="w-24 h-1 bg-white mx-auto rounded-full"></div>
                </div>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-gray-50">
            <div class="w-full max-w-md">
                <!-- Mobile Logo (shown only on small screens) -->
                <div class="lg:hidden text-center mb-8">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-20 h-20 mx-auto mb-4">
                    <h2 class="text-2xl font-bold text-[#E5322D]">Login Admin GSJA BPD 1 Jatim</h2>
                </div>

                <!-- Login Card -->
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <!-- Header -->
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-800 mb-2">Log In</h2>
                        <p class="text-gray-600">Masukkan Email dan Password dengan benar</p>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf
                        <!-- Username -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold" />
                            <div class="mt-2 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <input id="email" 
                                       type="email" 
                                       name="email" 
                                       value="{{ old('email') }}"
                                       class="block w-full pl-10 pr-3 py-3 border rounded-lg focus:ring-2 focus:ring-[#E5322D] focus:border-transparent transition duration-150 ease-in-out @error('username') border-red-500 @enderror" 
                                       placeholder="Enter your email"
                                       required 
                                       autofocus>
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div>
                            <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-semibold" />
                            <div class="mt-2 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                                <input id="password" 
                                       type="password" 
                                       name="password"
                                       class="block w-full pl-10 pr-3 py-3 rounded-lg focus:ring-2 focus:ring-[#E5322D] focus:border-transparent transition duration-150 ease-in-out @error('password') border-red-500 @enderror" 
                                       placeholder="Enter your password"
                                       required>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" 
                                   class="text-sm text-[#E5322D] hover:text-[#c42820] font-semibold transition duration-150">
                                    Forgot password?
                                </a>
                            @endif
                        </div>

                        <!-- Login Button -->
                        <div>
                            <button type="submit" 
                                    class="w-full bg-[#E5322D] hover:bg-[#c42820] text-white font-semibold py-3 px-4 rounded-lg transition duration-150 ease-in-out transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#E5322D] shadow-lg">
                                Sign In
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>