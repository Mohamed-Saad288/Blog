<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;
use function PHPUnit\Framework\isEmpty;

class PostController extends Controller
{
    public function index()
    {
    return view('posts.index',
    [
        'posts' =>
            Post::
            latest()->filter
                (request(['search','category','author']))
                ->SimplePaginate(6)->withQueryString()

        ]);
    }
    public function show(Post $post)
    {
        return view('posts.show',[
            'post' => $post,
        ]);
    }
    public function create()
    {

        return view('posts.create');
    }
    public function store()
    {


        $attributes = request()->validate([
           'title' => 'required',
            'thumbnail' => 'required|image',
            'excerpt'=> 'required',
            'slug'=> ['required',Rule::unique('posts','slug')],
            'body' => 'required',
            'category_id' => ['required',Rule::exists('categories','id')],
        ]);
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = \request()->file('thumbnail')->store('thumbnail');
        Post::create($attributes);

        return redirect('/');

    }

}
