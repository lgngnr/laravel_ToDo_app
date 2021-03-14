@extends('app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg mt-5">
            <h1>register</h1>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="sr-only">Name</label>
                        <input type="text" name="name" id="name" placeholder="your name"
                            class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ @old('name')}}" />
                            @error('name')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div>
                    <div class="mb-4">
                        <label for="email" class="sr-only">Email</label>
                        <input type="text" name="email" id="email" placeholder="your email"
                            class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{@old('email')}}" />
                            @error('email')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password" class="sr-only">Password</label>
                        <input type="text" name="password" id="password" placeholder="your pass"
                                class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="" />
                            @error('password')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password_confirmation" class="sr-only">Password</label>
                        <input type="text" name="password_confirmation" id="password_confirmation" placeholder="confirm pass"
                                class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="" />
                            @error('password_confirmation')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Register</button>
                </form>
        </div>
    </div>
@endsection

