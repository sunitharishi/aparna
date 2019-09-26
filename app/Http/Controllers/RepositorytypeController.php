<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\RepositoryTypeRequest;
use App\RepositorycatType;
use App\RepositoryType;
use App\Repository;
class RepositorytypeController extends Controller
{

    /** 
     * Display a listing of ClientStatus.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$scount = "";
		$fcount = "";
		$cid = "";
		$data = array();
        $category = RepositoryType::orderBy('id','desc')->get();
		if(count($category) > 0)
		{
			foreach($category as $key=>$cat)
			{
				$cid = $cat->id;
				$scount = RepositorycatType::select("repositorycat_types.*")->where("category",$cid)->count();
				$fcount = Repository::select("repositories.*")->where("category",$cid)->count();
				$data[$key]['id'] = $cat->id;
				$data[$key]['name'] = $cat->name;
				$data[$key]['scount'] = $scount;
				$data[$key]['fcount'] = $fcount;
			}
		}
		$relations = ['folders' => $data];			
        return view('repository_type.index', $relations);
    }

    /**
     * Show the form for creating new ClientStatus.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('repository_type.create');
    }

    /**
     * Store a newly created ClientStatus in storage.
     *
     * @param  \App\Http\Requests\StoreClientStatusesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RepositoryTypeRequest $request)
    {
        RepositoryType::create($request->all());

        return redirect()->route('repository-types.index');
    }

    /**
     * Show the form for editing ClientStatus.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category  = RepositoryType::findOrFail($id);

        return view('repository_type.edit', compact('category'));
    }

    /**
     * Update ClientStatus in storage.
     *
     * @param  \App\Http\Requests\UpdateClientStatusesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RepositoryTypeRequest $request, $id)
    {
        $category = RepositoryType::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('repository-types.index');
    }

    /**
     * Remove ClientStatus from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client_status = RepositoryType::findOrFail($id);
        $client_status->delete();

        return redirect()->route('repository-types.index');
    }

    /**
     * Delete all selected ClientStatus at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = RepositoryType::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
