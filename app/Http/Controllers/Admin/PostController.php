<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Auth;
use Illuminate\Http\Request;
use Redirect;

class PostController extends Controller
{

    private $autorizado = true;


    public function __construct()
    {
        $user = Auth::user();
        if ( ! $user->can('Post')) {
            flash('Você não tem acesso suficiente')->error();
            $this->autorizado = false;
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( ! $this->autorizado) {
            return back();
        }

        $data = Post::where('active', 1)->orderBy('created_at', 'desc');
        //page heading
        $title = 'Latest Posts';

        //return home.blade.php template from resources/views folder
        return view('admin.posts.list', compact('data'));
//        return view('admin.posts.list')->withPosts($posts)->withTitle($title);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ( ! $this->autorizado) {
            return back();
        }

        return view('admin.posts.create');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->slug = str_slug($post->title);
        $post->author_id = $request->user()->id;
        if ($request->has('save')) {
            $post->active = 0;
            $message = 'Post saved successfully';
        } else {
            $post->active = 1;
            $message = 'Post published successfully';
        }
        $post->save();

        return redirect('admin/posts/edit/'.$post->slug)->withMessage($message);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        if ( ! $post) {
            return redirect('/')->withErrors('requested page not found');
        }
        $comments = $post->comments;

        return view('admin.posts.show')->withPost($post)->withComments($comments);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $slug)
    {
        if ( ! $this->autorizado) {
            return back();
        }
        
        $post = Post::where('slug', $slug)->first();
        return view('admin.posts.edit', compact('post'));
        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Post                $post
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $post_id = $request->input('post_id');
        $post = Post::find($post_id);
        if ($post && ($post->author_id == $request->user()->id || $request->user()->is_admin())) {

            $title = $request->input('title');
            $slug = str_slug($title);
            $duplicate = Post::where('slug', $slug)->first();
            if ($duplicate) {
                if ($duplicate->id != $post_id) {
                    return redirect('admin/posts/edit/'.$post->slug)->withErrors('Title already exists.')->withInput();
                } else {
                    $post->slug = $slug;
                }
            }
            $post->title = $title;
            $post->body = $request->input('body');
            if ($request->has('save')) {
                $post->active = 0;
                flash('Post saved successfully')->success();
                $landing = 'admin/posts/edit/'.$post->slug;
            } else {
                $post->active = 1;
                flash('Post updated successfully')->success();
                $landing = 'posts/'.$post->slug;
            }
            $post->save();

            return redirect($landing);
        } else {
            return redirect('/admin/posts')->withErrors('you have not sufficient permissions');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $post = Post::find($id);
        if ($post && ($post->author_id == $request->user()->id || $request->user()->is_admin())) {
            $post->delete();
            $data['message'] = 'Post deleted Successfully';
            flash('Post deletado com sucesso')->success();
        } else {
            $data['errors'] = 'Invalid Operation. You have not sufficient permissions';
        }

        return redirect('/admin/posts')->with($data);
    }
}
