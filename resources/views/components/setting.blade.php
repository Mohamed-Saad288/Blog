<section class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
        <form method="POST" action="/admin/posts" class="mt-10" enctype="multipart/form-data">
            @csrf
            <x-form.input name="title"/>
            <x-form.input name="excerpt"/>
            <x-form.textarea name="body" />
            <x-form.textarea name="slug" />
            <x-form.input name="thumbnail" type="file"/>
            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="category_id"
                >
                    Categories
                </label>
                <select name="category_id" id="category">
                    @foreach(App\Models\Category::all() as $category)
                        <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected': ""}}>
                            {{ucwords($category->name)}}
                        </option>
                    @endforeach
                </select>

            </div>
            <div class="mb-6">
                <x-submit-button>Post</x-submit-button>
            </div>
        </form>
    </main>
</section>
