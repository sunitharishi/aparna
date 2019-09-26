<?php



namespace App\Http\Controllers;



use App\Asset;
use App\Emp;
use DB;
use App\Template;
use App\TemplateSection;
use App\TemplateField;
use Auth;

use Illuminate\Http\Request;

use App\Http\Requests\StoreAssetsRequest;

use App\Http\Requests\UpdateAssetsRequest;


class AssetsController extends Controller

{



    /**

     * Display a listing of Client.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {   
        $c = $request->input('c', 0);
        $categories = \App\AssetType::get()->pluck('name', 'id')->prepend('Asset Type', '');
        $assets = Asset::select("assets.*",'asset_types.name as catgname','templates.code as tcode','templates.name as tname')
                        ->leftJoin('asset_types','asset_types.id','=','assets.category_id')
                        ->leftJoin('templates','templates.id','=','assets.template_id');
        if($c) $assets = $assets->where('assets.category_id', $c);
        $assets = $assets->orderBy('assets.id','desc')->get();
		$sno=1;
        return view('assets.index', compact('assets','sno','categories'));

    }  
 


    /**

     * Show the form for creating new Client.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {
        //Asset tempates
        $templates = array(''=>'Please select');
        $templates_list = \App\Template::select('id','name','code')->get();
        if($templates_list) {
            foreach ($templates_list as $tval) {
                $templates[$tval->id] = $tval->code.'-'.$tval->name;
            }
        }
        
        $relations = [

            'categories' => \App\AssetType::get()->pluck('name', 'id')->prepend('Please select', ''),
            'templates' => $templates

        ]; 



        return view('assets.create', $relations);

    }



    /**

     * Store a newly created Client in storage.

     *

     * @param  \App\Http\Requests\StoreClientsRequest  $request

     * @return \Illuminate\Http\Response

     */

    public function store(StoreAssetsRequest $request)

    {

        $edata = $request->all();

        $assetRow = Asset::where('acode', $edata['acode'])->first();
        if($assetRow) return redirect()->back()->withErrors('Asset code already exists.');
        $edata['user_id']=Auth::user()->id;
        Asset::create($edata);


        return redirect()->route('assets.index');

    }



    /**

     * Show the form for editing Client.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {
        //Asset tempates
        $templates = array(''=>'Please select');
        $templates_list = \App\Template::select('id','name','code')->get();
        if($templates_list) {
            foreach ($templates_list as $tval) {
                $templates[$tval->id] = $tval->code.'-'.$tval->name;
            }
        }

        $relations = [
            'categories' => \App\AssetType::get()->pluck('name', 'id')->prepend('Please select', ''),
            'templates' => $templates
        ];



        $asset = Asset::findOrFail($id);



        return view('assets.edit', compact('asset') + $relations);

    }



    /**

     * Update Client in storage.

     *

     * @param  \App\Http\Requests\UpdateClientsRequest  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(UpdateAssetsRequest $request, $id)

    {

        $asset = Asset::findOrFail($id);
        $edata = $request->all();

        $assetRow = Asset::where('acode', $edata['acode'])->where('id','<>',$id)->first();
        if($assetRow) return redirect()->back()->withErrors('Asset code already exists.');

        $asset->update($edata);

        return redirect()->route('assets.index');

    }



    /**

     * Display Client.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {
        $asset = Asset::findOrFail($id);
        if(!$asset) return redirect()->route('assets.index')->withErrors('Asset not found.');

        $category = \App\AssetType::where('id',$asset->category_id)->first();
        $catgname = "";
        if($category) $catgname = $category->name;

        $template = Template::where('id',$asset->template_id)->first();
        $templatename = "";
        if($template) $templatename = $template->name.'('.$template->acode.')';

        return view('assets.show', compact('asset','catgname','templatename'));

    }



    /**

     * Remove Client from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        $asset = Asset::findOrFail($id);

        $asset->delete();



        return redirect()->route('assets.index');

    }



    /**

     * Delete all selected Client at once.

     *

     * @param Request $request

     */

    public function massDestroy(Request $request)

    {

        if ($request->input('ids')) {

            $entries = Asset::whereIn('id', $request->input('ids'))->get();



            foreach ($entries as $entry) {

                $entry->delete();

            }

        }

    }


    //Asset template
    public function assetTemplate($id,Request $request)
    {
        $assetTemplateForm = 1;
        //Save form
        if($request->ajax()){
            $edata = $request->all();
            print_r($edata);
            if($edata['atfid']) {
                $ftypes = $edata['atftype'];
                $fivals = $edata['atfvalue'];
                foreach($edata['atfid'] as $fk=>$fid) {
                    $ftype = $ftypes[$fk];
                    
                    if($ftype=='3') {
                        if(isset($fivals[$fk])) {
                            
                        }
                    } else {
                        $fival = $fivals[$fk];
                    }
                }
            }
            exit;
        }
        $asset = Asset::where('id',$id)->first();
        if(!$asset) return redirect()->route('assets.index')->withErrors('Asset not found');

        $template = Template::where('code',$asset->template)->first();
        if(!$template) return redirect()->route('assets.index')->withErrors('Asset Template not found');

        //Sections
        $section_rows = TemplateSection::where('template_id',$template->id)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get();
        $sections = array(0=>array('head'=>'','cols'=>2,'fields'=>array()));
        if($section_rows) {
            foreach($section_rows as $sval) $sections[$sval->id] = array('head'=>$sval->title,'cols'=>$sval->inputs_per_row,'fields'=>array());
        }

        //Fields
        $fields = TemplateField::where('template_id',$template->id)->orderBy('section_id', 'asc')->orderBy('sort', 'asc')->orderBy('label', 'asc')->get();  
        if($fields) {
            foreach($fields as $fval) {
                $sections[$fval->section_id]['fields'][]=$fval;
            }
        } else $sections = array();

        $field_types = array('1'=>'Text box','2'=>'Select box','3'=>'Check box','4'=>'Radio button','5'=>'Text Area','6'=>'Date','7'=>'DateTime','8'=>'Text Editor','9'=>'Attachment');
        $field_required = array('N'=>'No','Y'=>'Yes');
        $field_valids = array('0'=>'Any','1'=>'Alphabets','2'=>'Numbers','3'=>'Alpha Numeric');

        return view('assets.template', compact('asset','template','sections','field_types','field_required','field_valids','assetTemplateForm'));
    }

    //Get Category assets
    public function getCatgAssets(Request $request)
    {
        $assetList = array();        
        $edata = $request->all();
        if(isset($edata['catg_id']) && $edata['catg_id']) {
            $assetList = array(''=>'Please select');
            $a_list = \App\Asset::select('id','name','acode')->where('category_id',$edata['catg_id'])->get();
            if($a_list) {
                foreach ($a_list as $tval) {
                    $assetList[$tval->id] = $tval->acode.'-'.$tval->name;
                }
            }
        }
        return view('assets.assets_selectbox', compact('assetList'));
    }



}

