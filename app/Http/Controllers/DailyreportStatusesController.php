<?php

namespace App\Http\Controllers;

use App\DailyreportStatus;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDailyreportStatusesRequest;
use App\Http\Requests\UpdateDailyreportStatusesRequest;

class DailyreportStatusesController extends Controller
{

    /**
     * Display a listing of ClientStatus.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client_statuses = DailyreportStatus::all();

        return view('dailyreport_statuses.index', compact('client_statuses'));
    }

    /**
     * Show the form for creating new ClientStatus.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dailyreport_statuses.create');
    }

    /**
     * Store a newly created ClientStatus in storage.
     *
     * @param  \App\Http\Requests\StoreClientStatusesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDailyreportStatusesRequest $request)
    {
        DailyreportStatus::create($request->all());

        return redirect()->route('dailyreport_statuses.index');
    }

    /**
     * Show the form for editing ClientStatus.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dailyreport_statuses  = DailyreportStatus::findOrFail($id);

        return view('dailyreport_statuses.edit', compact('dailyreport_statuses'));
    }

    /**
     * Update ClientStatus in storage.
     *
     * @param  \App\Http\Requests\UpdateClientStatusesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDailyreportStatusesRequest $request, $id)
    {
        $client_status = DailyreportStatus::findOrFail($id);
        $client_status->update($request->all());

        return redirect()->route('dailyreport_statuses.index');
    }

    /**
     * Remove ClientStatus from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client_status = DailyreportStatus::findOrFail($id);
        $client_status->delete();

        return redirect()->route('dailyreport_statuses.index');
    }

    /**
     * Delete all selected ClientStatus at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = DailyreportStatus::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
