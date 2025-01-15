<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\FAQCategory;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = FAQCategory::with('faqs')->get();
        return view('faqs.index', compact('categories'));
    }

    /**
     * Show the form for creating a new FAQ.
     */
    public function create()
    {
        $categories = FAQCategory::all();
        return view('faqs.create', compact('categories'));
    }

    /**
     * Store a newly created FAQ in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'category_id' => 'required|exists:faq_categories,id',
        ]);

        FAQ::create($request->all());

        return redirect()->route('faqs.index')->with('success', 'FAQ added successfully!');
    }

    public function edit($id)
{
    $faq = FAQ::findOrFail($id);
    $categories = FAQCategory::all();
    return view('faqs.edit', compact('faq', 'categories'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'question' => 'required|string|max:255',
        'answer' => 'required|string|max:2000',
        'category_id' => 'required|exists:faq_categories,id',
    ]);

    $faq = FAQ::findOrFail($id);
    $faq->update($request->all());

    return redirect()->route('faqs.index')->with('success', 'FAQ updated successfully!');
}


    /**
     * Remove the specified FAQ.
     */
    public function destroy($id)
    {
        $faq = FAQ::findOrFail($id);
        $faq->delete();

        return redirect()->route('faqs.index')->with('success', 'FAQ deleted successfully!');
    }
}
