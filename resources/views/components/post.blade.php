@props(['post' => $post])

<div class="mb-4 mt-4">
    <a href="{{ route('user.posts', $post->user) }}" class="font-black">{{ ucfirst($post->user->name) }}</a>
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
