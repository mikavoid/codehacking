<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsCreateRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Photo;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $posts->load('user', 'category', 'photo');
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::lists('name', 'id')->all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        $user = Auth::user();
        $input = $request->all();

        if ($file = $request->file('photo_id')) {
            $name = $file->getClientOriginalName();
            $file->move(getenv('UPLOADED_FILES_ROOT') . '/images', $name);

            $photo = Photo::create(['path' => $name]);
            $input['photo_id'] = $photo->id;
        }
        $user->posts()->create($input);
        Session::flash('added', 'The post has been created');
        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrfail($id);
        $categories = Category::lists('name', 'id')->all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $input = $request->all();

        if ($file = $request->file('photo_id')) {
            $name = $file->getClientOriginalName();
            $file->move(getenv('UPLOADED_FILES_ROOT') . '/images', $name);

            $photo = Photo::create(['path' => $name]);
            $input['photo_id'] = $photo->id;
        }
        $user->posts()->where('id', $id)->first()->update($input);
        Session::flash('updated', 'The post has been updated');

        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Session::flash('deleted', 'The post has been deleted');
        $post = Post::findOrFail($id);

        if ($post->photo_id) {
            unlink(public_path() . $post->photo->path);
        }
        $post->delete();
        return redirect('/admin/posts');
    }
}
