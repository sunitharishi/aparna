<?php

namespace App\Http\Controllers;

use App\ClientStatus;
use App\Template;
use App\TemplateSection;
use App\TemplateField;
use App\Asset;
use Auth;
use Config;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClientStatusesRequest;
use App\Http\Requests\UpdateClientStatusesRequest;
use Maatwebsite\Excel\Facades\Excel;

class AssetTemplateController extends Controller
{

    /**
     * Display a listing of Asset Templates.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates = Template::orderBy('id','desc')->get();
        $sno=1;
        return view('asset_template.index', compact('templates','sno'));
    }

    /**
     * Show the form for creating new Asset Templates.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $field_types = array('1'=>'Text box','2'=>'Select box','3'=>'Check box','4'=>'Radio button','5'=>'Text Area','6'=>'Date','7'=>'DateTime','8'=>'Text Editor','9'=>'Attachment');
        $field_required = array('N'=>'No','Y'=>'Yes');
        $field_valids = array('0'=>'Any','1'=>'Alphabets','2'=>'Numbers','3'=>'Alpha Numeric');
        $field_sections = array('0'=>'No Section');
        $field_all_sections = array(''=>'Sections','N'=>'New Section');
        $field_section_inputs = array('1'=>'1','2'=>'2','3'=>'3','4'=>'4');
        $sections = array(0=>array('head'=>'Default','cols'=>2,'order'=>'1','fields'=>array()));
        $secCount = 1;
        return view('asset_template.create', compact('field_types','field_required','field_valids','field_sections','field_all_sections','field_section_inputs','secCount','sections'));
    }

    /**
     * Store a newly created Asset Templates in storage.
     *
     * @param  \App\Http\Requests\StoreClientStatusesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $edata = $request->all();
        //print_r($edata);
        //return;        
        //Save template        
        $template = $edata['template'];
        $fields = isset($edata['field'])?$edata['field']:array();
        $er = "";
        if(empty($template['name'])) $er .= "Template name required<br>";
        if(empty($template['code'])) $er .= "Template code required<br>";
        else {
            if($edata['id']) {
                $templateRow = Template::where('code', $template['code'])->where('id','<>',$edata['id'])->first();
            } else {
                $templateRow = Template::where('code', $template['code'])->first();
            }
            if($templateRow) $er .= "Template code already exists<br>";
        }
        if(count($fields)==0) $er .= "Template fields required<br>";
        if($er) {
            $json = array('message'=>$er,'status'=>false);
            echo json_encode($json);
            return;
        }

        if($edata['id']) {
            $template_id = $edata['id'];
            $etemplate = Template::where('id',$template_id)->first();
            $etData = [
                'code' => $template['code'],
                'name' => $template['name']
            ];
            $etemplate->update($etData);
        } else {
            $etData = [
                'code' => $template['code'],
                'name' => $template['name'],
                'user_id' => Auth::user()->id,
                'created_at' => date('Y-m-d H:i:s')
            ];
            $template_id = Template::insertGetId($etData);
            if(!$template_id) {
                $json = array('message'=>'Unable to save template','status'=>false);
                echo json_encode($json);
                return;        
            }
        }
        //section delete
        $section_deletes = $edata['section_delete'];
        if($section_deletes) $section_deletes = explode(",", $section_deletes);
        if($section_deletes && $template_id) {
            foreach ($section_deletes as $scid) {
                if(!is_numeric($scid)) continue;
                $section = TemplateSection::where('template_id',$template_id)->where('id',$scid);
                if($section->count()) {
                    $section->delete();
                    TemplateField::where('template_id',$template_id)->where('section_id',$scid)->delete();
                }
            }
        }

        //save sections
        $section_ids = array();
        $sections = isset($edata['section'])?$edata['section']:array();
        if($sections && $template_id) {
            foreach($sections['id'] as $si=>$sid) {
                if($sid) {
                    $section = TemplateSection::where('id',$sid)->first();
                    $etsData = [
                        'title' => $sections['title'][$si],
                        'inputs_per_row' => $sections['inputs_per_row'][$si],
                        'sort' => empty($sections['sort'][$si])?1:(int)$sections['sort'][$si]
                    ];
                    $section->update($etsData);                    
                } else {
                    $etsData = [
                        'template_id' => $template_id,
                        'title' => $sections['title'][$si],
                        'inputs_per_row' => $sections['inputs_per_row'][$si],
                        'sort' => empty($sections['sort'][$si])?1:(int)$sections['sort'][$si],
                        'created_at' => date('Y-m-d H:i:s')
                    ];
                    $section_id = TemplateSection::insertGetId($etsData);                    
                    $section_ids[$sections['sno'][$si]] = $section_id;
                }
            }            
        }

        //Field delete
        $field_deletes = $edata['field_delete'];
        if($field_deletes) $field_deletes = explode(",", $field_deletes);
        if($field_deletes && $template_id) {
            foreach ($field_deletes as $sfid) {
                if(!is_numeric($sfid)) continue;
                TemplateField::where('template_id',$template_id)->where('id',$sfid)->delete();
            }
        }

        //Save Fields        
        if($fields && $template_id) {
            foreach($fields['fid'] as $si=>$sid) {
                $section_id = is_numeric($fields['section_id'][$si])?$fields['section_id'][$si]:$section_ids[$fields['section_id'][$si]];
                if($sid) {
                    $sfield = TemplateField::where('id',$sid)->first();
                    $etsfData = [
                        'section_id' => $section_id,
                        'label' => $fields['label'][$si],
                        'itype' => $fields['itype'][$si],
                        'idefault' => !empty($fields['idefault'][$si])?$fields['idefault'][$si]:'',
                        'ioptions' => $fields['ioptions'][$si],
                        'required' => $fields['required'][$si],
                        'ivalids' => $fields['ivalids'][$si],
                        'sort' => empty($fields['sort'][$si])?1:(int)$fields['sort'][$si]
                    ];
                    $sfield->update($etsfData);                    
                } else {
                    $etsfData = [
                        'template_id' => $template_id,
                        'section_id' => $section_id,
                        'label' => $fields['label'][$si],
                        'itype' => $fields['itype'][$si],
                        'idefault' => !empty($fields['idefault'][$si])?$fields['idefault'][$si]:'',
                        'ioptions' => $fields['ioptions'][$si],
                        'required' => $fields['required'][$si],
                        'ivalids' => $fields['ivalids'][$si],
                        'sort' => empty($fields['sort'][$si])?1:(int)$fields['sort'][$si],
                        'created_at' => date('Y-m-d H:i:s')
                    ];
                    $field_id = TemplateField::insertGetId($etsfData);
                }
            }            
        }
        $json = array('message'=>'Template Saved successfully','status'=>true);
        echo json_encode($json);
        return;        
    }

    /**
     * Show the form for editing ClientStatus.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $template = Template::where('id',$id)->first();
        if(!$template) return redirect()->route('asset-templates.index')->withErrors('Template not found');

        //Sections
        $field_sections = array('0'=>'No Section','N'=>'New Section');
        $field_all_sections = array(''=>'Sections','N'=>'New Section');
        $section_rows = TemplateSection::where('template_id',$template->id)->orderBy('sort', 'asc')->orderBy('title', 'asc')->get();
        $sections = array(0=>array('head'=>'Default','cols'=>2,'order'=>'1','fields'=>array()));
        if($section_rows) {
            foreach($section_rows as $sval) {
                $sections[$sval->id] = array('head'=>$sval->title,'cols'=>$sval->inputs_per_row,'order'=>$sval->sort,'fields'=>array());
                $field_sections[$sval->id] = $sval->title.'('.$sval->inputs_per_row.')';
                $field_all_sections[$sval->id] = $sval->sort.'. '.$sval->title.'('.$sval->inputs_per_row.')';
            }            
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
        $field_section_inputs = array('1'=>'1','2'=>'2','3'=>'3','4'=>'4');
        $secCount = 1;
        return view('asset_template.create', compact('template','field_types','field_required','field_valids','field_sections','field_all_sections','field_section_inputs','section_rows','sections','secCount'));
    }

    /**
     * Update ClientStatus in storage.
     *
     * @param  \App\Http\Requests\UpdateClientStatusesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientStatusesRequest $request, $id)
    {
        return;
        $client_status = ClientStatus::findOrFail($id);
        $client_status->update($request->all());

        return redirect()->route('asset-templates.index');
    }

    /**
     * Remove ClientStatus from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        $template = Template::where('id',$id)->first();
        if($template) {
            //verify template used some where, if yes alert user
            $template_asset = Asset::where('template_id',$template->id)->first();
            if($template_asset) return redirect()->route('asset-templates.index')->withErrors($template->code.' Template already assigned to Asset');
            $template->delete();
            TemplateSection::where('template_id',$id)->delete();
            TemplateField::where('template_id',$id)->delete();
        }
        return redirect()->route('asset-templates.index');
    }

    /**
     * Delete all selected ClientStatus at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Template::whereIn('id', $request->input('ids'))->get();
            foreach ($entries as $entry) {
                //verify template used some where, if yes alert user
                $template_asset = Asset::where('template',$entry->code)->first();
                if($template_asset) continue;
                $entry->delete();
                TemplateSection::where('template_id',$entry->id)->delete();
                TemplateField::where('template_id',$entry->id)->delete();
            }
        }
    }

    //Save section
    public function savesection(Request $request)
    {
        $json = array('message'=>'','status'=>true);
        $edata = $request->all();
        if(empty($edata['title'])) {
            $json = array('message'=>'Section title required','status'=>false);
            echo json_encode($json);
            return;
        }
        $sections = isset($edata['section'])?$edata['section']:array();
        $secCount = $edata['secCount'];
        //All Options
        $section_all = '<option value="">Sections</option>';
        $section_single = '<option value="0">No Section</option>';
        $section_inputs = '';

        $sec_val = '';
        $sec_title = '';

        $section_new = true;
        if($sections) {
            foreach($sections['id'] as $si=>$sid) {                
                if($sections['sno'][$si]==$secCount) {
                    $section_new = false;
                    if($edata['secAction']=="delete") continue;
                    $sections['title'][$si]=$edata['title'];
                    $sections['inputs_per_row'][$si]=$edata['inputs_per_row'];
                    $sections['sort'][$si]=empty($edata['sort'])?1:(int)$edata['sort'];

                    $sec_val = $edata['scid']=="0"?'S'.$secCount:$edata['scid'];
                    $sec_title = $edata['title'];
                }
                $sort = $sections['sort'][$si];
                if(empty($sort)) $sort=1;
                else if(!is_numeric($sort)) $sort=1;
                $sval = $sections['id'][$si]?$sections['id'][$si]:'S'.$sections['sno'][$si];
                //all sections
                $section_all .= '<option value="'.$sval.'">'.$sort.'. '.$sections['title'][$si].'('.$sections['inputs_per_row'][$si].')</option>';        
                //single section
                $section_single .= '<option value="'.$sval.'">'.$sections['title'][$si].'('.$sections['inputs_per_row'][$si].')</option>';
                //section inputs
                $section_inputs .= '<div class="sectionBox secsno'.$sval.'">';
                $section_inputs .= '<input name="section[id][]" class="sid" type="hidden" value="'.$sections['id'][$si].'" />';
                $section_inputs .= '<input name="section[sno][]" class="ssno" type="hidden" value="'.$sections['sno'][$si].'" />';
                $section_inputs .= '<input name="section[sort][]" class="ssort" type="hidden" value="'.$sort.'" />';
                $section_inputs .= '<input name="section[title][]" class="stitle" type="hidden" value="'.$sections['title'][$si].'" />';
                $section_inputs .= '<input name="section[inputs_per_row][]" class="scols" type="hidden" value="'.$sections['inputs_per_row'][$si].'" />';
                $section_inputs .= '</div>';
            }
        }

        //New Section
        if($section_new == true) {
            $sort = $edata['sort'];
            if(empty($sort)) $sort=1;
            else if(!is_numeric($sort)) $sort=1;
            $sval = 'S'.$edata['secCount'];
            //all sections
            $section_all .= '<option value="'.$sval.'">'.$sort.'. '.$edata['title'].'('.$edata['inputs_per_row'].')</option>';        
            //single section
            $section_single .= '<option value="'.$sval.'">'.$edata['title'].'('.$edata['inputs_per_row'].')</option>';
            //section inputs            
            $section_inputs .= '<div class="sectionBox secsno'.$sval.'">';
            $section_inputs .= '<input name="section[id][]" class="sid" type="hidden" value="0" />';
            $section_inputs .= '<input name="section[sno][]" class="ssno" type="hidden" value="'.$edata['secCount'].'" />';
            $section_inputs .= '<input name="section[sort][]" class="ssort" type="hidden" value="'.$sort.'" />';
            $section_inputs .= '<input name="section[title][]" class="stitle" type="hidden" value="'.$edata['title'].'" />';
            $section_inputs .= '<input name="section[inputs_per_row][]" class="scols" type="hidden" value="'.$edata['inputs_per_row'].'" />';
            $section_inputs .= '</div>'; 

            $sec_val = 'S'.$edata['secCount'];
            $sec_title = $edata['title'];
        }
        $section_all .= '<option value="N">New Section</option>';
        $json['section_all'] = $section_all;
        $json['section_single'] = $section_single;
        $json['section_inputs'] = $section_inputs;
        if($edata['secAction']=="save") {
            $json['section'] = array('secid'=>$sec_val,'sectitle'=>$sec_title,'sact'=>$section_new);
        }
        echo json_encode($json);
        return;
    }

    //view template
    public function view($id)
    {
        $template = Template::where('id',$id)->first();
        if(!$template) return redirect()->route('asset-templates.index')->withErrors('Template not found');

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

        return view('asset_template.show', compact('template','sections','field_types','field_required','field_valids'));
    }

    //Asset template Import
    public function assetTemplateimport(Request $request)
    {
        $message = "";
        $updated=0;
        //Save excel employees
        if ($request->isMethod('post')) {

            $edata = $request->all();
            $uid = Auth::user()->id;
            //Check excel
            if(!isset($edata['file'])) return redirect()->route('asset_template.import')->withErrors('Template excel not found');

            $filename = 'template-'.$uid.'-'.uniqid();
            $extension = $request->file('file')->getClientOriginalExtension();
            $extension = strtolower($extension);
            //check extentions  xls or xlsx 
            if($extension<>"xls" && $extension<>"xlsx") return redirect()->route('asset_template.import')->withErrors('Only xls or xlsx file is allowed!!');            

            $file = $request->file('file')->move('tmp',$filename.".".$extension);
            $filename_extension = 'tmp/'.$filename.'.'.$extension;

            //$filename_extension = 'tmp/emp-5a8bfc2b9f690.xls';
            //$filename_extension = 'tmp/emp-sample.xlsx';
            $updated = 0;
            Config::set('excel.import.heading', 'false');
            $xls_datas = Excel::load($filename_extension, function($reader) { })->toArray();                        
            //$xls_datas = Excel::load($filename_extension, function($reader) {})->all();

            $cms = array();

            if(count($xls_datas) > 0) 
            {
                //echo "<pre>";print_r($xls_datas);echo "</pre>";
                /*
                    0 - S.No

                    1 - Template Code
                    2 - Template Name

                    3 - SECTION  - Default / Other
                    4 - Section Name
                    5 - Number of columns
                    6 - Sort Order

                    7 - FIELD
                    8 - Field Lable
                    9 - Field Type - 1,2,3,4,5,6,7,8,9
                    10 - Field Required - Y,N
                    11 - Field Input Validation - 0,1,2,3
                    12 - Field Order
                    13 - Field Default value
                    14 - Field Options
                */
                $n=0;
                $indx=0;
                if($xls_datas[0]) $indx=0;
                else if($xls_datas[1]) $indx=1;
                //loop excel
                foreach($xls_datas[$indx] as $xval)
                {  
                    $n++;
                    //echo "1. <pre>";print_r($xval);echo "</pre>";
                    //if($n==10) break;
                    //continue;
                    
                    //if($n>=10) break; 
                    $sno = $xval[0];
                    $tempcode = trim($xval[1]);
                    $tempcode2 = strtolower($tempcode);
                    $tempname = trim($xval[2]);
                    if(empty($tempcode) || empty($tempname)) continue;
                    $template_id = 0;
                    //$etemplate = Template::where('LOWER(code)',$tempcode2)->first();
                    $etemplate = Template::whereRaw('LOWER(code)=?',$tempcode2)->first();
                    if($etemplate) {
                        $template_id = $etemplate->id;
                        $etData = [
                            'code' => $tempcode,
                            'name' => $tempname
                        ];
                        $etemplate->update($etData);
                    } else {
                        $etData = [
                            'code' => $tempcode,
                            'name' => $tempname,
                            'user_id' => $uid,
                            'created_at' => date('Y-m-d H:i:s')
                        ];
                        $template_id = Template::insertGetId($etData);
                        if(!$template_id) continue;
                    }
                    $sfindx = 2;
                    $sectionSort = 1;

                    $section_id=0;
                    while(1) {
                        
                        $sfindx++;
                        //echo " $tempcode $sfindx - ";
                        if(!isset($xval[$sfindx])) break;
                        $sftype = $xval[$sfindx];
                        if(empty($sftype)) continue;
                        $sftype = strtolower(trim($sftype));
                        if($sftype<>"section" && $sftype<>"field") break;
                        
                        //Section
                        if($sftype=="section") {                            
                            $s1 = isset($xval[$sfindx+1])?trim($xval[$sfindx+1]):'';//title
                            $s2 = isset($xval[$sfindx+2])?trim($xval[$sfindx+2]):'2';//columns
                            $s3 = isset($xval[$sfindx+3])?trim($xval[$sfindx+3]):1;//sort
                            $sfindx=$sfindx+3;
                            if(empty($s1) || strtolower($s1)=="default") {
                                $section_id=0;                                
                            } else {
                                $section_id = 0;
                                $esection = TemplateSection::where('template_id',$template_id)->whereRaw('LOWER(title)=?',strtolower($s1))->first();
                                if($esection) $section_id = $esection->id;
                                else {
                                    $s2 = $s2?(int)$s2:2;
                                    if($s2>4) $s2=2;
                                    $etsData = [
                                        'template_id' => $template_id,
                                        'title' => $s1,
                                        'inputs_per_row' => $s2,
                                        'sort' => $s3?(int)$s3:$sectionSort++,
                                        'created_at' => date('Y-m-d H:i:s')
                                    ];
                                    $section_id = TemplateSection::insertGetId($etsData);
                                }
                            }
                        } 
                        //Field
                        else if($sftype=="field") {
                            $f1 = isset($xval[$sfindx+1])?trim($xval[$sfindx+1]):'';//label
                            $f2 = isset($xval[$sfindx+2])?trim($xval[$sfindx+2]):'1';//type
                            $f3 = isset($xval[$sfindx+3])?trim($xval[$sfindx+3]):'N';//required
                            $f4 = isset($xval[$sfindx+4])?trim($xval[$sfindx+4]):'0';//valid
                            $f5 = isset($xval[$sfindx+5])?trim($xval[$sfindx+5]):1;//sort
                            $f6 = isset($xval[$sfindx+6])?trim($xval[$sfindx+6]):'';//default
                            $f7 = isset($xval[$sfindx+7])?trim($xval[$sfindx+7]):'';//options
                            $sfindx=$sfindx+7;
                            if(empty($f1)) continue;
                            if(empty($f2)) $f2=1; else $f2=(int)$f2;
                            if($f2>7) $f2=1;
                            if(empty($f3)) $f3='N';
                            else {
                                if(strtolower($f3)=="y") $f3='Y'; else $f3='N';
                            }
                            if(empty($f4)) $f4='0'; else $f4=(int)$f4;
                            if($f4>3) $f4='0';
                            
                            $etsfData = [
                                'template_id' => $template_id,
                                'section_id' => $section_id,
                                'label' => $f1,
                                'itype' => $f2,
                                'idefault' => $f6?$f6:'',
                                'ioptions' => $f7?$f7:'',
                                'required' => $f3,
                                'ivalids' => $f4,
                                'sort' => $f5?(int)$f5:1,
                                'created_at' => date('Y-m-d H:i:s')
                            ];
                            $field_id = TemplateField::insertGetId($etsfData);
                        }
                        //echo " :: $sfindx";
                    }                      
                    $updated++;
                    //echo "3. <pre>";print_r($einfo);echo "</pre>";    
                    //break;          
                }
            }
            //delete file
            $excelfile = public_path().'/'.$filename_extension;
            if(file_exists($excelfile)) @unlink($excelfile);
            $message = 'Templates Uploaded';
        }
        return view('asset_template.import', compact('message'));
    }

}
