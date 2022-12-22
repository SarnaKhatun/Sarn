@if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            <a href="{{route('logout')}}" class="text-sm text-gray-700 dark:text-gray-500 underline" onclick="event.preventDefault();document.getElementById('logoutForm').submit();">Logout</a>
            <form action="{{'logout'}}" method="post" id="logoutForm">
                @csrf
            </form>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
        @endauth
    </div>
@endif
