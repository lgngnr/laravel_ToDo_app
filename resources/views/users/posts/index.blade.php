@extends('app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            @if(!empty($posts) && $posts->count())
                @foreach($posts as $post)
                    <x-post :post="$post" />
                @endforeach
                {{ $posts->links() }}
            @else
                <p>No posts</p>
            @endif
        </div>
    </div>
@endsection
