<?php
/*
 * php artisan make:controller NewsController --resource
 * php artisan make:mode News
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {
        return view('news.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
*will accept the request from create and will save thte post in the database
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * will show the post
     */
    public function show(string $id)
    {
        //
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
