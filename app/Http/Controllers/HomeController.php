<?php

namespace App\Http\Controllers;

use Log;
use App\Models\User;
use App\Models\PostBloger;
use App\Models\PostPlace; 
use Illuminate\Http\Request;
use App\Models\verifycoursetoken;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminHome()
    {
        $allBloger = PostBloger::all();
        return view('adminHome', compact('allBloger'));
    }

    public function adminedit($id)
    {
        $postBloger = PostBloger::find($id);
        return view('admin.edit',compact('postBloger'));
    }

    public function update(Request $request, $id){
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
       
        return redirect()->route('admin.home')->with('success', 'Blog post has been updated Successfully!');
    }



    public function delete($id)
    {
        $blogPosts = PostBloger::find($id);
        $blogPosts->delete();
        return redirect()->route('admin.home')->with('success', 'Blog post has been deleted Successfully!');
        

    }

    public function statusCheckBlog($id)
    {
        $blogPosts = PostBloger::find($id);
        Log::info('what is comming from status'.$blogPosts);
        return view('admin.statusCheck',compact('blogPosts'));
    }

    

   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome()
    {
        return view('managerHome');
    }

    public function testing()
    {
        $allBloger = PostBloger::all();
        return view('testing', compact('allBloger'));
        // return view('testing');
    }

    public function otpverify()
    {
       
        return view('otpverify');
    }
    public function otpverification(Request $request, $validtoken, $email)
    {   
        

       $valid = verifycoursetoken::where('token',$validtoken)->where('email',$email)->first();

         if($valid){
            return view('otpverification',compact('valid'));
         }
         else{
            return view('accessdenied');
         }
        
    }

    public function otpSubmit(Request $request)
    {   
        $gettoken = $request->token;
        $getemail = $request->email;

        $valid = verifycoursetoken::where('token',$gettoken)->where('email',$getemail)->first();
        if($valid){
            $valid->delete();
            return redirect()->route('home')->with('success', 'OTP Verified Successfully!');
        }
        else{
            return view('accessdenied')->with('error', 'Invalid OTP!');
        }
    }

    public function acces_denied()
    {
        return view('accessdenied');
    }

   

    
}
