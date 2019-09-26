<?php

namespace App\Http\Controllers;

use App\AssetType;
use Illuminate\Http\Request;
use App\Http\Requests\AssettypeRequest;

class AssettypeController extends Controller
{

    /** 
     * Display a listing of ClientStatus.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = AssetType::orderBy('id','desc')->get();

        return view('asset_type.index', compact('category'));
    }

    /**
     * Show the form for creating new ClientStatus.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asset_type.create');
    }

    /**
     * Store a newly created ClientStatus in storage.
     *
     * @param  \App\Http\Requests\StoreClientStatusesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssettypeRequest $request)
    {
        AssetType::create($request->all());

        return redirect()->route('asset-types.index');
    }

    /**
     * Show the form for editing ClientStatus.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category  = AssetType::findOrFail($id);

        return view('asset_type.edit', compact('category'));
    }

    /**
     * Update ClientStatus in storage.
     *
     * @param  \App\Http\Requests\UpdateClientStatusesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AssettypeRequest $request, $id)
    {
        $category = AssetType::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('asset-types.index');
    }

    /**
     * Remove ClientStatus from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client_status = AssetType::findOrFail($id);
        $client_status->delete();

        return redirect()->route('asset-types.index');
    }

    /**
     * Delete all selected ClientStatus at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = AssetType::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
