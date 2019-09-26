<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{

    /** 
     * Display a listing of ClientStatus.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();

        return view('category.index', compact('category'));
    }

    /**
     * Show the form for creating new ClientStatus.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created ClientStatus in storage.
     *
     * @param  \App\Http\Requests\StoreClientStatusesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->all());

        return redirect()->route('category.index');
    }

    /**
     * Show the form for editing ClientStatus.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category  = Category::findOrFail($id);

        return view('category.edit', compact('category'));
    }

    /**
     * Update ClientStatus in storage.
     *
     * @param  \App\Http\Requests\UpdateClientStatusesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('category.index');
    }

    /**
     * Remove ClientStatus from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client_status = Category::findOrFail($id);
        $client_status->delete();

        return redirect()->route('category.index');
    }

    /**
     * Delete all selected ClientStatus at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Category::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
