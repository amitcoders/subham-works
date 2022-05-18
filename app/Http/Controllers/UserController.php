<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\PostBloger;
use App\Models\PostPlace; 
use Illuminate\Support\Facades\DB;
use Log;


class UserController extends Controller
{
    public function userDashboard(){
        
        $user = Auth::user();
        $postBlogers = PostBloger::where('user_id', $user->id)->where('blog_status','1')->get();
        return view('user.Dashboard', compact('postBlogers'));
    }

    public function blogPostStore(Request $request){
        $request->validate([
            'post_title'=>'required',
            'post_content'=>'required',
            'post_place'=>'required',
            'blog_image'=>'required',
        ]);

        if ($request->hasFile('blog_image')) {
            $file = $request->file('blog_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/', $filename);
        }
        $blogPost = new PostBloger();
        $blogPost->role_id = '0';
        $blogPost->user_id = $request->user_id;
        $blogPost->post_title = $request->post_title;
        $blogPost->post_content = $request->post_content;
        $blogPost->post_place = $request->post_place;
        $blogPost->blog_image = $filename;
        $blogPost->save();
        Log::info('User bog sae ho gaya ');
        return redirect()->route('user.dashboard')->with('success', 'Blog post has been send Successfully! Please wain for admin approval');
    }

    public function userEdit($id){
        Log::info('User edit ho gaya '.$id);
        $postBloger = PostBloger::find($id);
        return view('user.edit_blog', compact('postBloger'));
    }

    public function userBlogPost(Request $request, $id){
        $request->validate([
            'post_title'=>'required',
            'post_content'=>'required',
            'post_place'=>'required',
            'blog_image'=>'required',
        ]);
        if ($request->hasFile('blog_image')) {
            $file = $request->file('blog_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/', $filename);
        }

        $blogPost = PostBloger::find($id);
        $blogPost->post_title = $request->post_title;
        $blogPost->post_content = $request->post_content;
        $blogPost->post_place = $request->post_place;
        $blogPost->blog_image = $filename;
        $blogPost->save();
        Log::info('User update ho gaya '.$id);
        return redirect()->route('user.dashboard')->with('success', 'Blog post has been updated Successfully!');
    }

    public function delete($id){
        $blogPost = PostBloger::find($id);
        $blogPost->delete();
        Log::info('User delete ho gaya '.$id);
        return redirect()->route('user.dashboard')->with('success', 'Blog post has been deleted Successfully!');
    }


    public function testings()
    {
        return view('testing');
    }
}
