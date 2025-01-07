<?php
/*
 * php artisan make:controller NewsController --resource
 * php artisan make:mode News
 */

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{

    public function index(){
       
        return view('news.index')
        ->with('news', News::orderBy('created_at','DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view('news.create');
    }

    /**
*will accept the request from create and will save the post in the database
     */
    public function store(Request $request)
    {
       
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,gif|max:5048',  // image validation
            ]);
      $slug = Str::slug($request->title,'-');
            $newImageName = uniqid() . '-' . $slug . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
     
           
             News::create([
                'title' => $request->input('title'),//from create.blade it tikes the info that we created
                'description' => $request->input('description'),
               'slug' => $slug,//the variable that we made 
                'image' => $newImageName, // the image that we uploaded
                'user_id' => auth()->user()->id, // the user that created the post
             ]);

             return redirect('/news');
    }

    /**
     * will show the post
     */
    public function show($slug)
    {
        return view('news.show')->with('news', News::where('slug', $slug)->firstOrFail());

    }

    /**
     * edit the post
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * is like store but take the request from edit and update the post in the database
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Deleete the post from the database
     */
    public function destroy(string $id)
    {
        //
    }
}
