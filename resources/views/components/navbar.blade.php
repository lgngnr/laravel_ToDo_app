<nav class="p-6 bg-white flex justify-between mb-6">
    <ul class="flex items-center">
        <li class="ml-3"><a href="/" class="">Home</a></li>
        <li class="ml-3"><a href="/posts" class="">Posts</a></li>
    </ul>
    <ul class="flex items-center">
    @auth
        <li class="ml-3"><a href="/dashboard" class="">Dashboard</a></li>
        <li class="ml-3">
            <a href="/dashboard" class="">Welcome {{auth()->user()->name}}</a>
        </li>
        <li class="ml-3">
            <form action="{{route('logout')}}" method="POST" class="m-0">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </li>
    @endauth
    @guest
        <li class="ml-3"><a href="{{ route('login') }}" class="">Login</a></li>
        <li class="ml-3"><a href="{{ route('register') }}" class="">Register</a></li>
    </ul>
    @endguest
</nav>
