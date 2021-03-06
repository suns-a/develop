<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
    public function getAllPost()
    {
        try {
            $posts = DB::table('posts')->get();
            return view('posts', compact('posts'));
        } catch (PDOException $e) {
            echo '失敗'. $e->getMessage();
            exit();
        };
    }

    public function addPost()
    {
        $post = new Post();
        $post->title = "Second Post Title";
        $post->body = "Second Post Description";
        $post->save();
        return "Post has been created successfully!";
    }

    public function addComment($id)
    {
        $post = Post::find($id);
        $comment = new Comment();
        $comment->comment = "This is second comment.";
        $post->comments()->save($comment);
        return "Comment has been posted";
    }

    public function getCommentsByPost($id)
    {
        $comments = Post::find($id)->comments;
        return $comments;
    }

    public function addPostSubmit(Request $request)
    {
        DB::table('posts')->insert([
            'title' => $request->title,
            'body' => $request->body
        ]);
        return back()->with('post_created', 'Post has been created successfully!');
    }

    public function getPostById($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        return view('single-post', compact('post'));
    }

    public function deletePost($id)
    {
        DB::table('posts')->where('id', $id)->delete();
        return back()->with('post_deleted', 'Post has been deleted successfully!');
    }

    public function editPost($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        return view('edit-post', compact('post'));
    }

    public function updatePost(Request $request)
    {
        DB::table('posts')->where('id', $request->id)->update([
            'title' => $request->title,
            'body' => $request->body
        ]);
        return back()->with('post_updated', 'Post has been updated successfully!');
    }

    public function innerJoinClause()
    {
        $request = DB::table('users')
                ->join('posts', 'users.id', '=', 'posts.user_id')
                ->select('users.name', 'posts.title', 'posts.body')
                ->get();
        return $request;
    }

    public function leftJoinClause()
    {
        $result = DB::table('users')
                ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
                ->get();
        return $result;
    }

    public function rightJoinClause()
    {
        $result = DB::table('users')
                ->rightJoin('posts', 'users.id', '=', 'posts.user_id')
                ->get();
        return $result;
    }

    public function getAllPostsUsingModel()
    {
        $posts = Post::all();
        return $posts;
    }
}
