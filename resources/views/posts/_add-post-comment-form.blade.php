@auth
    <x-panel>
        <form action="/posts/{{$post->slug}}/comments" method="POST"  >
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?id={{auth()->id()}}" alt="" width="40" height="40" class="rounded-full">
                <h2 class="ml-4">Want to Participate</h2>
            </header>
            <div class="mt-6">
                        <textarea name="body" class="w-full text-sm focus:outline-none focus:ring"
                                  rows="5"
                                  placeholder="Quick, thing of something to say!">
                        </textarea>
                @error('body')
                <span class="text-xm text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200 ">
               <x-submit-button>post</x-submit-button>
            </div>
        </form>
    </x-panel>
@else
    <a href="/register" class="hover:underline">Register</a>
    or
    <a href="/login" class="hover:underline">Login</a>
    to leave a comment
@endauth
