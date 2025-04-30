<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Commentaire;
use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();
        return view('components.blog', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        return view('components.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        try {
            $validated = $request->validated();

            $post = new Post();
            $post->user_id = $validated['user_id'];
            $post->titre = $validated['titre'];
            $post->description = $validated['description'];
            $post->contenue = $validated['contenue'];
            $post->link = $validated['link'];

            if ($request->hasFile('image')) {
                $post->image = $request->file('image')->store('images', 'public');
            } else {
                return back()->withErrors(['image' => 'Erreur d\'enregistrement d\'image. ']);
            }

            $post->save();

            return redirect()->route('dashboard')->with('success', 'Post créé.');
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Une erreur s\'est produit']);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $post = Post::with('comment.user')->findOrFail($id); 
    $user = $post->user;

    return view('components.showBlog', [
        'user' => $user,
        'post' => $post,
        'comments' => $post->comment 
    ]);
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        return view('components.editBlog', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, $id)
{
    $post = Post::findOrFail($id);
    
    try {
        $validated = $request->validated();

        $post->user_id = $validated['user_id'];
        $post->titre = $validated['titre'];
        $post->description = $validated['description'];
        $post->contenue = $validated['contenue'];
        $post->link = $validated['link'];


        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $post->image = $request->file('image')->store('images', 'public');
        }

        $post->save();

        return redirect()->route('dashboard')->with('success', 'Post updated successfully.');
    } catch (Exception $e) {
        return back()->withErrors(['error' => 'An error occurred']);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $title = Post::find($id);
        $title->delete();

        return redirect()->route('dashboard')
        ->with('success', "L'article '" . $title . "' a été supprimé avec succès !");

    }

    public function comdistoyed($commentaire){

        $commentaire = Commentaire::find($commentaire);
        $commentaire->delete();

        return  back()->with('success','Commentaire supprimé avec succès !');
    }

    public function commentaire(Request $request, $post_id){
        $request->validate([
            'body' => 'required|max:1000',
        ]);

        $commentaire = new Commentaire();
        $commentaire->body = $request->body;
        $commentaire->post_id = $post_id;
        $commentaire->user_id = Auth::id(); 
        $commentaire->save();

        $post = Post::findOrFail($post_id);
        // $post->user->notify(new CommentNotification($commentaire));
        return back()->with('success', 'Votre commentaire a été ajouté.');
    }
   
}
