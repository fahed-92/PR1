<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CategoryReques;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts',Post::all());    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Post::create([
          'title'=> $request->title,
          'description'=> $request->description,
//          'content'=> $request->content,
          'image' =>  $request->image->store('images','public'),
          'category_id' => $request->categoryID
        ]);
        if($request->tags){
        $post->tags()->attach($request->tags);
        }

        $request->session()->flash('success','Post added sucessfuly');
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Post $post )
    {
        return view('posts.create' ,
        [
            'post'=> $post ,
            'categories'=>Category::all() ,
            'tags'=>Tag::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request,Post $post)
    {
        $data = $request->only(['title','description','content']);
        if ($request->hasFile('image')){
                $image = $request->image->store('images' , 'public');
                Storage::disk('public')->delete($post->image);
                $data['image']= $image;
        }
        if($request->tags)
        {
        $post->tags()->sync($request->tags);
        }
        $post->update($data);
        $request->session()->flash('success','Post Updated sucessfuly');
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {

        $post =Post::withTrashed()->where('id',$id)->first();
        if($post->trashed()){
            Storage::disk('public')->delete($post->image);
            $post->forceDelete();
        }else{
            $post->delete();
        }
        $request->session()->flash('success','Post trashed sucessfuly');
        return redirect(route('posts.index'));
    }
    public function trashed(){
        $trashed=Post::onlyTrashed()->get();
        return view('posts.index')->withPosts($trashed);

    }
    public function restore(Request $request,$id){
        Post::withTrashed()->where('id',$id)->restore();
        $request->session()->flash('success','Post Restored sucessfuly');
        return redirect(route('posts.index'));
    }
}
