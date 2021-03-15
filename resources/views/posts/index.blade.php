@extends('app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form action="{{route('post.add')}}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg
                        @error('body') border-red-500 @enderror" placeholder="A cosa stai pensando?"></textarea>
                    @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
                </div>
            </form>
            @if(!empty($posts) && $posts->count())
                @foreach($posts as $post)
                    <div class="mb-4 mt-4">
                        <a href="" class="font-black">{{ ucfirst($post->user->name) }}</a>
                        <span class="text-gray-600">created at {{ $post->created_at->diffForHumans() }}</span>
                        <p class="mb-2">{{ $post->body }}</p>
                        <div class="flex justify-start">
                            @if(!$post->likedBy(auth()->user()))
                                <form action="{{ route('post.like', $post) }}" method="post" class="mr-1">
                                    @csrf
                                    <button type="submit" class="text-blue-500">Like</button>
                                </form>
                            @else
                                <form action="{{ route('post.unlike', $post) }}" method="post" class="mr-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-blue-500">Unlike</button>
                                </form>
                            @endif
                            <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
                            @can('delete',$post)
                                <div class="ml-2">
                                    <form action="{{ route('post.delete', $post) }}" method="post" class="mr-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-2 py-2 rounded font-medium">Delete</button>
                                    </form>
                                </div>
                            @endcan
                        </div>
                    </div>
                @endforeach
                {{ $posts->links() }}
            @else
                <p>No posts</p>
            @endif
        </div>
    </div>
@endsection
