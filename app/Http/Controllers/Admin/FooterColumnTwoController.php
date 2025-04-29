<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterColumnTwo;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FooterColumnTwoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $columnTwo = FooterColumnTwo::paginate(20);
        return view('admin.footer.column-two.index', compact('columnTwo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('admin.footer.column-two.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:255'],
            'status' => ['required', 'boolean'],
        ]);

        $columnTwo = new FooterColumnTwo();
        $columnTwo->title = $request->title;
        $columnTwo->url = $request->url;
        $columnTwo->status = $request->status;
        $columnTwo->save();

        notyf()->success('Added Successfully!');
        return to_route('admin.footer-column-two.index');
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
    public function edit(string $id) : View
    {
        $column = FooterColumnTwo::findOrFail($id);
        return view('admin.footer.column-two.edit', compact('column'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) : RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:255'],
            'status' => ['required', 'boolean'],
        ]);

        $columnTwo = FooterColumnTwo::findOrFail($id);
        $columnTwo->title = $request->title;
        $columnTwo->url = $request->url;
        $columnTwo->status = $request->status;
        $columnTwo->save();

        notyf()->success('Updated Successfully!');
        return to_route('admin.footer-column-two.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) : Response
    {
        $columnTwo = FooterColumnTwo::findOrFail($id);
        try {
            $columnTwo->delete();
            notyf()->success('Deleted Successfully!');
            return response(['message' => 'Deleted Successfully!'], 200);
        }catch(Exception $e) {
            // logger("Footer Column One Error >> ".$e);
            return response(['message' => 'Something went wrong!'], 500);
        }
    }
}
