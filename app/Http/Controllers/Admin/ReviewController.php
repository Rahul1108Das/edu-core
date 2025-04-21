<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $reviews = Review::with(['user', 'course'])->latest()->paginate(20);
        return view('admin.review.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review) : RedirectResponse
    {
        $review->status = $request->status ? 1 : 0;
        $review->save();

        notyf()->success('Updated Successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        try {
            $review->delete();
            notyf()->success('Deleted Successfully!');
            return response(['message' => 'Deleted Successfully!'], 200);
        }catch(Exception $e) {
            // logger("Course Review Error >> ".$e);
            notyf()->error('Something went wrong!');
            return response(['message' => 'Something went wrong!'], 500);
        }
    }
}
