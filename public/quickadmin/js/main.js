var dTableColSearch;
$(document).ready(function () {

    $('.summernote').summernote({height:300});
    $(".datepick").datepicker({dateFormat: "dd-mm-yy"});
    $('.timepick').datetimepicker({
        format: 'HH:mm'
    }); 

    if($( ".select2mes" ).length) $('.select2mes').select2();
    if($( ".select2mem" ).length) $('.select2mem').select2();    

    if($( "#sortable" ).length) $( "#sortable" ).sortable({
      sort: function( event, ui ) {section_sort()}
    });


    var activeSub = $(document).find('.active-sub');
    if (activeSub.length > 0) {
        activeSub.parent().show();
        activeSub.parent().parent().find('.arrow').addClass('open');
        activeSub.parent().parent().addClass('open');
    }

    $('.datatable').each(function() {
        var options = {
            retrieve: true,
            dom: 'frtip<"actions">',
            columnDefs: [],
            "iDisplayLength": 100,
            "aaSorting": []
        };

        if ($(this).hasClass('dt-select')) {
            options.select = {
                style: 'multi',
                selector: 'td:first-child'
            };

            options.columnDefs.push({
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            });
        }

        $(this).dataTable(options);
    });


    //Data table with Column search
    if($('#dTableColSearch').length && false) {        

        var options = {
            retrieve: true,
            dom: 'frtip<"actions">',
            columnDefs: [],
            "iDisplayLength": 100,
            "aaSorting": []
        };

        if ($('.dTableColSearch').hasClass('dt-select')) {
            options.select = {
                style: 'multi',
                selector: 'td:first-child'
            };

            options.columnDefs.push({
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            });
        }

        var dTableColSearch = $('#dTableColSearch').dataTable(options);

        // Filter event handler
        $( dTableColSearch.table().container() ).on( 'keyup', 'tfoot input', function () {
            dTableColSearch
                .column( $(this).data('index') )
                .search( this.value )
                .draw();
        } );

        // Filter event handler
        // Apply the search
        /*dTableColSearch.columns().eq( 0 ).each( function ( colIdx ) {
            $( 'input', $('.filters td')[colIdx] ).on( 'keyup change', function () {
                dTableColSearch
                    .column( colIdx )
                    .search( this.value )
                    .draw();
            } );
        } );*/
        /*$( '.dTableColSearch tfoot input' ).on( 'keyup', function () {
            dTableColSearch
                .column( $(this).data('index') )
                .search( this.value )
                .draw();
        } );        */
    }
    

    if (typeof window.route_mass_crud_entries_destroy != 'undefined') {
        $('.datatable').siblings('.actions').html('<a href="' + window.route_mass_crud_entries_destroy + '" class="btn btn-xs btn-danger js-delete-selected" onclick="return confirm(\'Are you sure\');" style="margin-top:0.755em;margin-left: 20px;">Delete selected</a>');
    }
	
   if (typeof window.route_mass_crud_entries_approve != 'undefined') {
        $('.datatable').siblings('.actions').append('<a href="' + window.route_mass_crud_entries_approve + '" class="btn btn-xs btn-success js-approve-selected"  onclick="return confirm(\'Are you sure\');" style="margin-top:0.755em;margin-left: 20px;">Approve selected</a>');
    } 
	
	 if (typeof window.route_mass_crud_entries_reject != 'undefined') {
        $('.datatable').siblings('.actions').append('<a href="' + window.route_mass_crud_entries_reject + '" class="btn btn-xs btn-danger js-reject-selected"  onclick="return confirm(\'Are you sure\');" style="margin-top:0.755em;margin-left: 20px;">Reject selected</a>');
    }
	
		 if (typeof window.route_mass_crud_entries_lockapprove != 'undefined') {
            $('.approvesection').html('<a href="' + window.route_mass_crud_entries_lockapprove + '" class="btn btn-xs btn-success js-lock-selected accessSelected" onclick="return confirm(\'Are you sure\');" style="margin-top:0.755em;margin-left: 20px;" >Unlock</a>');
        }  
		
		 if (typeof window.route_mass_crud_entries_lockreject != 'undefined') {
            $('.approvesection').append('<a href="' + window.route_mass_crud_entries_lockreject + '" class="btn btn-xs btn-danger js-lock-selected rejSelected" onclick="return confirm(\'Are you sure\');" style="margin-top:0.755em;margin-left: 20px;" >Lock</a>');
        }  
		
		if (typeof window.route_mass_crud_entries_groupassign != 'undefined') {
            $('.assetgroupsection').html('<a href="' + window.route_mass_crud_entries_groupassign + '" class="btn btn-xs btn-success js-lock-selected asgroupSelected" onclick="return confirm(\'Are you sure\');" style="margin-top:0.755em;margin-left: 20px;" >Assign Group</a>');
        }  
		
		
	

    $(document).on('click', '.js-delete-selected', function() {
        var ids = [];

        $(this).closest('.actions').siblings('.datatable').find('tbody tr.selected').each(function() {
            ids.push($(this).data('entry-id'));
        });
		
		//alert(ids);  

        $.ajax({
            method: 'POST',
            url: $(this).attr('href'),
            data: {
                _token: _token,
                ids: ids
            }
        }).done(function() {
            location.reload();
        });

        return false;
    });
	
	$(document).on('click', '.js-approve-selected', function() {
        var ids = [];

        $(this).closest('.actions').siblings('.datatable').find('tbody tr.selected').each(function() {
            ids.push($(this).data('entry-id'));
        });

        $.ajax({
            method: 'POST',
            url: $(this).attr('href'),
            data: {
                _token: _token,
                ids: ids
            }
        }).done(function() {
            location.reload();
        });

        return false;
    });
	
	$(document).on('click', '.js-reject-selected', function() {
        var ids = [];

        $(this).closest('.actions').siblings('.datatable').find('tbody tr.selected').each(function() {
            ids.push($(this).data('entry-id'));
        });

        $.ajax({
            method: 'POST',
            url: $(this).attr('href'),
            data: {
                _token: _token,
                ids: ids
            }
        }).done(function() {
            location.reload();
        });

        return false;
    });

$(document).on('click', '.accessSelected', function() {
        var ids = [];

        $('#dTableColSearch').find('tbody tr.selected').each(function() {
            ids.push($(this).data('entry-id'));
        });

        $.ajax({
            method: 'POST',
            url: $(this).attr('href'),
            data: {
                _token: _token,
                ids: ids
            }
        }).done(function() {
            location.reload();
        });

        return false;
    });


$(document).on('click', '.asgroupSelected', function() {
        var ids = [];
		var group = 0;
		
		group = $("#assetgroup").val();
		
		//if(parseFloat(group) > 0) {

        $('#dTableColSearch').find('tbody tr.selected').each(function() {
            //ids.push($(this).data('entry-id'));
			ids.push($(this).data('entry-id')); 
        });
		
		//alert(ids);
		 

        $.ajax({
            method: 'POST',
            url: $(this).attr('href'),
            data: {
                _token: _token,
                ids: ids,
				group: group
            }
        }).done(function() {
            location.reload();
        });

        return false;
		/*}else {
			 alert("Please select the group");
			}*/
			  return false;
    });



$(document).on('click', '.rejSelected', function() {
        var ids = [];

        $('#dTableColSearch').find('tbody tr.selected').each(function() {
            ids.push($(this).data('entry-id'));
        });

        $.ajax({
            method: 'POST',
            url: $(this).attr('href'),
            data: {
                _token: _token,
                ids: ids
            }
        }).done(function() {
            location.reload();
        });

        return false;
    });


    $(document).on('click', '.datatable #select-all', function() {
        var selected = $(this).is(':checked');

        $(this).closest('table.datatable').find('td:first-child').each(function() {
            if (selected != $(this).closest('tr').hasClass('selected')) {
                $(this).click();
            }
        });
    });

    $('.mass').click(function () {
        if ($(this).is(":checked")) {
            $('.single').each(function () {
                if ($(this).is(":checked") == false) {
                    $(this).click();
                }
            });
        } else {
            $('.single').each(function () {
                if ($(this).is(":checked") == true) {
                    $(this).click();
                }
            });
        }
    });

    $('.page-sidebar').on('click', 'li > a', function (e) {

        if ($('body').hasClass('page-sidebar-closed') && $(this).parent('li').parent('.page-sidebar-menu').size() === 1) {
            return;
        }

        var hasSubMenu = $(this).next().hasClass('sub-menu');

        if ($(this).next().hasClass('sub-menu always-open')) {
            return;
        }

        var parent = $(this).parent().parent();
        var the = $(this);
        var menu = $('.page-sidebar-menu');
        var sub = $(this).next();

        var autoScroll = menu.data("auto-scroll");
        var slideSpeed = parseInt(menu.data("slide-speed"));
        var keepExpand = menu.data("keep-expanded");

        if (keepExpand !== true) {
            parent.children('li.open').children('a').children('.arrow').removeClass('open');
            parent.children('li.open').children('.sub-menu:not(.always-open)').slideUp(slideSpeed);
            parent.children('li.open').removeClass('open');
        }

        var slideOffeset = -200;

        if (sub.is(":visible")) {
            $('.arrow', $(this)).removeClass("open");
            $(this).parent().removeClass("open");
            sub.slideUp(slideSpeed, function () {
                if (autoScroll === true && $('body').hasClass('page-sidebar-closed') === false) {
                    if ($('body').hasClass('page-sidebar-fixed')) {
                        menu.slimScroll({
                            'scrollTo': (the.position()).top
                        });
                    }
                }
            });
        } else if (hasSubMenu) {
            $('.arrow', $(this)).addClass("open");
            $(this).parent().addClass("open");
            sub.slideDown(slideSpeed, function () {
                if (autoScroll === true && $('body').hasClass('page-sidebar-closed') === false) {
                    if ($('body').hasClass('page-sidebar-fixed')) {
                        menu.slimScroll({
                            'scrollTo': (the.position()).top
                        });
                    }
                }
            });
        }
        if (hasSubMenu == true || $(this).attr('href') == '#') {
            e.preventDefault();
        }
    });

    

});

//ASSET TEMPLATES
var fileUploadsCount=1;
var doProcess = 0;
var load_asset_template_form_flag=0;
//Add Field box
function field_add(dis) {
    var efbox = $(".field_clone").html();
    var sele = $(dis).parents('fieldset');
    sele.find(".FieldBoxes").append(efbox);
    sele.find(".fieldbox:last .esection").val(sele.data("value"));
    if(sele.find(".fbof").hasClass("fa-angle-down")==true) {
        sele.find(".fbof").removeClass("fa-angle-down");
        sele.find(".fbof").addClass("fa-angle-up");
        sele.find(".FieldBoxes").show();
    }
}
//Remove Field box
function field_delete(dis) {
    var efid = $(dis).parents('.fieldbox').find(".efid").val();
    if(isNaN(efid)==false) {
        var efdel = $("#field_delete").val();
        if(efdel!="") efdel += ",";
        efdel += efid;
        $("#field_delete").val(efdel);
    }
    $(dis).parents('.fieldbox').remove();
}
//Show Field Options
function field_show_options(dis) {
    var fbox = $(dis).parents('.fieldbox');
    if(dis.value=='2' || dis.value=='3' || dis.value=='4') {
        fbox.find('.foptions').show();
        fbox.find('.foptions .foption').val('');
        fbox.find('.foptions .foption').addClass('erequired');
    } else {
        fbox.find('.foptions').hide();
        fbox.find('.foptions .foption').val('');
        fbox.find('.foptions .foption').removeClass('erequired');
    }
}
//Show Section popup
function field_change_section(dis) {
    if(dis.value=='') return;
    if(dis.value=='N') {
        $('#title').val('');
        $('#inputs_per_row').val('');
        $('#sort').val('');
        sectionCount++;
        $('#secCount').val(sectionCount);
        $('#secdelete').hide();
    } else {
        $('#title').val($(".sectionBoxes .secsno"+dis.value+" .stitle").val());
        $('#inputs_per_row').val($(".sectionBoxes .secsno"+dis.value+" .scols").val());
        $('#secCount').val($(".sectionBoxes .secsno"+dis.value+" .ssno").val());
        $('#sort').val($(".sectionBoxes .secsno"+dis.value+" .ssort").val());
        $('#scid').val(dis.value);
        $('#secdelete').show();
    }
    $(".esections").html($(".sectionBoxes").html());
    $("#sectionModal").modal();
}
//Section Edit
function Section_edit(dis) {
    $(dis).parents('fieldset').find(".sectionedit").toggle();
}
//Section Delete
function Section_delete(dis) {
    var esid = $(dis).parents('fieldset').data("value");
    $('fieldset.fs'+esid).parent().remove();
    if(isNaN(esid)==false) {
        var esdel = $("#section_delete").val();
        if(esdel!="") esdel += ",";
        esdel += esid;
        $("#section_delete").val(esdel);
    }
    $( "#sortable" ).sortable( "refresh" );
}
//Section New
function Section_new(dis) {
    var esbox = $(".section_clone").html();
    sectionCount++;
    var scnt="S"+sectionCount;
    esbox = esbox.replace("NNNN", scnt);
    esbox = esbox.replace("NNNN", scnt);
    esbox = esbox.replace("SECTIONID", scnt);
    esbox = esbox.replace("SECTIONLABEL", 'Section '+sectionCount);
    esbox = esbox.replace("SECTIONLABEL", 'Section '+sectionCount);
    $(".sectionFields").append(esbox);
    var section_new_option = '<option value="'+scnt+'">Section '+sectionCount+'</option>';
    $(".esection").append(section_new_option);    
    $( "#sortable" ).sortable( "refresh" );
}
//Section title change
function sectiontitlechange(dis) {
    $(dis).parents('fieldset').find("legend span").html(dis.value);
}
//Save Section
function field_save_section(sact) {
    $('#secAction').val(sact);
    if(sact=='save' && $('#title').val()=='') {
        alert('Section title required');
        return;
    }
    if(sact=='delete') {
        var esid = $('#scid').val();
        $('#sectionBox.secsno'+esid).remove();
        $('fieldset.fs'+esid).remove();
        if(isNaN(esid)==false) {
            var esdel = $("#section_delete").val();
            if(esdel!="") efdel += ",";
            esdel += esid;
            $("#section_delete").val(esdel);
        }
    }
    //SORT
    section_sort();

    $.ajax({
        type: "POST",
        cache: false,
        dataType: 'json',
        url: $("#frmSection").attr('action'),
        data: $("#frmSection").serialize()
    })
    .done(function( resp ) {        
        if(resp.status == false) {
            alert(resp.message);
            return;
        }
        $("#field_all_sections").html(resp.section_all);
        var esval = '';
        $(".fieldbox .esection").each(function(){
            esval = $(this).val();
            $(this).html(resp.section_single);
            $(this).val(esval);
        });
        $(".sectionBoxes").html(resp.section_inputs);
        $("#sectionModal").modal('hide');
        if(sact=='save') {
            if(resp.section.sact == true) {
                var esbox = $(".section_clone").html();
                esbox = esbox.replace("NNNN", resp.section.secid);
                esbox = esbox.replace("SECTIONID", resp.section.secid);
                esbox = esbox.replace("SECTIONLABEL", resp.section.sectitle);
                $(".sectionFields").append(esbox);
                $( "#sortable" ).sortable({
                  sort: function( event, ui ) {section_sort()}
                });                
            } else {
                var sfs = $(".sectionFields fieldset.fs"+resp.section.secid);
                sfs.find('legend span').html(resp.section.sectitle);
            }
        }
    })
    .fail(function() {
        alert( "Unable to process, please try again" );
    });
    return false;    
}
//Section Sort
function section_sort() {
    var srt = 0;
    var secid = '';
    $(".sectionFields fieldset").each(function(){
        srt++;
        $(this).find(".ssort").val(srt);
    });
}

//Show / Hide Fields box 
function field_visibility(dis) {    
    var sele = $(dis).parents('fieldset');
    if($(dis).find("i").hasClass("fa-angle-down")==false) {
        $(dis).find("i").removeClass("fa-angle-up");
        $(dis).find("i").addClass("fa-angle-down");
        sele.find(".FieldBoxes").hide();
    } else {
        $(dis).find("i").removeClass("fa-angle-down");
        $(dis).find("i").addClass("fa-angle-up");
        sele.find(".FieldBoxes").show();
    }
}

//Save Template
function template_save() {
    if(doProcess){
        alert("Please wait saving inprocess....");
        return false;
    }
    $("#frmTemplate .help-block").html('');
    var esave = true;
    /*$("#frmTemplate .erequired").each(function(){
		alert($(this).val());
        if($(this).val()=="") {
            $(this).parents(".form-group").find('.help-block').html('Required');
            esave = false;
        }        
    });
    if(esave==false) return false;*/
    section_sort();
    doProcess = 1;
    $(".loader").html('<img src="/images/spinner.gif" />');
    //Save process
    $.ajax({
        type: "POST",
        cache: false,
        dataType: 'json',
        url: $("#frmTemplate").attr('action'),
        data: $("#frmTemplate").serialize()
    })
    .done(function( resp ) {                                
        doProcess = 0;
        $(".loader").html('');
        if(resp.status==false) {
            $("#frmerror").html(resp.message);
        } else if(resp.status==true) {
            alert(resp.message);
            location.replace($(".aturl").attr('href'));
        }
    })
    .fail(function() {
        doProcess = 0;
        $(".loader").html('');
        alert( "Unable to process, please try again" );
    });
    return false;
}
//Load asset template form
var smnoteSave =0;
function load_asset_template_form() {    
    $("form").submit(function(){
        console.log("Saving Form");
        
        if(doProcess){
            alert("Please wait saving inprocess....");
            return false;
        }

        var formData = new FormData(this);
        //var fsminfo = '';
        /*$("#frmcommAsset .summernote").each(function(){
            //fsminfo = $(this).text();
            formData.append($(this).attr('name'), $('#'+$(this).attr('id')).text() );
        });*/
        smnoteSave++;
        console.log(smnoteSave);
        if(smnoteSave==1 && $("#frmcommAsset .summernote").length) {
            setTimeout(function(){ $("#frmcommAsset").submit(); }, 3000);
            return false;
        }
        
        //var efdata = $("#frmcommAsset").serialize();

        var esave = true;
        $("#frmcommAsset .form-group .help-block").html('');
        $("#frmcommAsset .erequired").each(function(){
            if($(this).hasClass('echeckbox')==true) {
                if($(this).parents(".checkbox").find(":checked").length==0) {
                    $(this).parents(".form-group").find('.help-block').html('Required');
                    esave = false;
                }
            }
            else if($(this).hasClass('eradiobox')==true) {
                if($(this).parents(".radiobox").find(":checked").length==0) {
                    $(this).parents(".form-group").find('.help-block').html('Required');
                    esave = false;
                }
            }
            else if($(this).val()=="") {
                $(this).parents(".form-group").find('.help-block').html('Required');
                esave = false;
            }        
        });
        if(esave==false) return false;

        doProcess = 1;
        $(".loader").html('<img src="/images/spinner.gif" />');

        $.ajax({
            url: $(this).attr("action"),
            type: 'POST',
            data: formData,
            async: false,
            success: function (resp2) {
                doProcess = 0;
                $(".loader").html('');
                var resp = JSON.parse(resp2);
                //alert(resp.message);
                $("#frmerror").html(resp.message);
                $('html, body').animate({ scrollTop: 0 }, 'slow');
                if(resp.status==true) {
                    setTimeout(function(){ location.replace($(".aturl").attr('href')); }, 3000);
                }
            },
            error: function(xhr,textStatus,error){          
                doProcess = 0;
                $(".loader").html('');
                alert('Unable to process the saving,please try again.');                    
            },
            cache: false,
            contentType: false,
            processData: false
        });

        return false;
    });
}
//end of ASSET TEMPLATES

//Load File uploader
function load_file_uploader(aug_ufinputs) {
    fileUploadsCount=1;
    var fileUploadsettings = {
        url: AttachmentPostUrl,
        method: "POST",
        allowedTypes:aug_ufinputs['uTypes']!=undefined?aug_ufinputs['uTypes']:"jpg,png,gif,doc,pdf,docx,csv,xlsx,wav",
        fileName: aug_ufinputs['ufilename'],
        multiple: aug_ufinputs['multiple'],
        onSuccess:function(files,resp,xhr)
        {
            //console.log(files,resp,xhr);   
            $('#statusUploader_'+aug_ufinputs['refid']).append(resp);
            $('#statusFailed_'+aug_ufinputs['refid']).html("");
            setTimeout(function(){ $('.ajax-file-upload-statusbar').remove(); }, 3000);
        },
        onError: function(files,status,errMsg)
        {
            //console.log(files,status,errMsg);
            $('#statusFailed_'+aug_ufinputs['refid']).html('<font color="red">'+js_upload_failed_lang+'</font>');
        }
    };
    $('#fileUploader_'+aug_ufinputs['refid']).uploadFile(fileUploadsettings);
}
//Delete Attachment
function delete_uploaded_file(dis){
    if(!confirm('Are you sure you want to delete?')) return;
    var disbox = $(dis).parents('.ufileBox'); 
    var ufilepath = disbox.find('.ufilepath').val();
    disbox.remove();
    $.ajax({
           type: "POST",
           url: AttachmentDeleteUrl,
           data: 'filepath='+ufilepath,
           success: function(resp){}
        });
}

//TASK MANAGEMENT
var community_title = '';
var community_id = '';

//Community employee selection
function select_site_emp(dis) {
    var emp_value=dis.value;
    if(emp_value!="") {
        if($(".empids .empbox.empid"+emp_value).length>0) return;
		 var sitesel = community_id;
		 var s1 = '<div  class="site_'+sitesel+' commoncom"><div><b>'+community_title+':</b></div>';
		 var s2 =  '</div>';
		
        var emp_title = $("#emp_id option:selected").text();
		
      // var emphtml = '<div class="empbox empid'+emp_value+'"><a onclick="task_emp_delete(this)"><i class="fa fa-close"></i></a> '+community_title+':'+emp_title+'<input type="hidden" name="empid[]" value="'+emp_value+'" /><input type="hidden" name="empname[]" value="'+community_title+':'+emp_title+'" /></div>';
	  
	  var emphtml = '<div class="empbox empid'+emp_value+'"><a onclick="task_emp_delete(this)"><i class="fa fa-close"></i></a>'+emp_title+'<input type="hidden" name="empid[]" value="'+emp_value+'" /><input type="hidden" name="empname[]" value="'+community_title+':'+emp_title+'" /><input type="hidden" name="siteidval[]" value="'+sitesel+'" /><input type="hidden" name="sitenameval[]" value="'+community_title+'" /></div>';
	  
	  if($(".empids .site_"+sitesel).length > 0){
		  $(".empids .site_"+sitesel).append(emphtml);
		  }else{
			   $(".empids").append(s1 + emphtml + s2);
			}
			
		      
       // $(".empids").append(emphtml);
    }
}
//Community employee deletion
function task_emp_delete(dis) {
	var cscount = $(dis).parents('.commoncom').find('.empbox').length;
	if(cscount == 1){
      $(dis).parents('.commoncom').remove();
	}else{
		 $(dis).parents('.empbox').remove();
	 }
}
//Get community users
function getCommunityUsers(dis) {    
    if(dis.value=='') return;    
    community_title = $("#site option:selected").text();
	community_id = $("#site").val();
    //Get list
    $.ajax({
        type: "POST",
        cache: false,
        url: "/emps/getCommunityUsers",
        data: 'site_id='+dis.value
    })
    .done(function( resp ) {                                        
        $(".empgroup").html(resp);
        $('#emp_id').select2();
    })
    .fail(function() {
        alert( "Unable to process, please try again" );
    });
}
//Delete task Attachment
function delete_task_attachment(dis,id){
    if(!confirm('Are you sure you want to delete?')) return;
    if(id) {
        var etadel = $("#attachment_delete").val();
        if(etadel!="") etadel += ",";
        etadel += id;
        $("#attachment_delete").val(etadel);
    }
    var disbox = $(dis).parents('.ufileBox'); 
    disbox.remove();
}
//end of TASK MANAGEMENT

$(document).ready(function() {  
    if($('#dTableColSearch').length>0) {
        // DataTable
        var options = {
            retrieve: true,
            dom: 'frtip<"actions">',
            columnDefs: [],
            "iDisplayLength": 100,
            "aaSorting": []
        };

        if ($('#dTableColSearch').hasClass('dt-select')) {
            options.select = {
                style: 'multi',
                selector: 'td:first-child'
            };

            options.columnDefs.push({
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            });
        }

        var table = $('#dTableColSearch').DataTable( options );
     
        // Filter event handler
        $( table.table().container() ).on( 'keyup', 'thead input', function () {
            table
                .column( $(this).data('index') )
                .search( this.value )
                .draw();
        } ); 

        if (typeof window.route_mass_crud_entries_destroy != 'undefined') {
            $('#dTableColSearch').siblings('.actions').html('<a href="' + window.route_mass_crud_entries_destroy + '" class="btn btn-xs btn-danger js-delete-selected" onclick="return confirm(\'Are you sure\');" style="margin-top:0.755em;margin-left: 20px;">Delete selected</a>');
        }  
		
		 if (typeof window.route_mass_crud_entries_approve != 'undefined') {
            $('#dTableColSearch').siblings('.actions').append('<a href="' + window.route_mass_crud_entries_approve + '" class="btn btn-xs btn-success js-approve-selected"  onclick="return confirm(\'Are you sure\');" style="margin-top:0.755em;margin-left: 20px;" >Approve selected</a>');
        }  
		
		 if (typeof window.route_mass_crud_entries_reject != 'undefined') {
            $('#dTableColSearch').siblings('.actions').append('<a href="' + window.route_mass_crud_entries_reject + '" class="btn btn-xs btn-danger js-reject-selected" onclick="return confirm(\'Are you sure\');" style="margin-top:0.755em;margin-left: 20px;" >Reject selected</a>');
        }  
		
		
		
		 

        $(document).on('click', '#dTableColSearch #select-all', function() {
            var selected = $(this).is(':checked');
 
            $(this).closest('table#dTableColSearch').find('td:first-child').each(function() {
                if (selected != $(this).closest('tr').hasClass('selected')) {
                    $(this).click();
                } 
            });
        });
    }
    
} );

//Community Assets
//download asset
function download_asset() { 
  
    var flag = true;

    $(".download-asset-form .erequired").each(function(){
        if($(this).val()=="") {
            $(this).parents(".form-group").find('.help-block').html('Required');
            flag = false;
        }        
    });
    if($(".catype:checked").length==0) {
        alert("Please check Download or Upload checkbox");
        return false;
    }

    if($(".catype:checked").val()=="Upload") {
        var allowedFiles = [".xls", ".xlsx"];
        var fileUpload = $("#file");

        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
        if (!regex.test(fileUpload.val().toLowerCase())) {
            $(".afile").html('Required');
            flag = false;   
        }
    }

    if(flag == true){
        return true; 
    } 
    else{
        return false;    
    }

 }

 //Upload asset
function upload_asset() { 
  
    var flag = true;

    $(".upload-asset-form .erequired").each(function(){
        if($(this).val()=="") {
            $(this).parents(".form-group").find('.help-block').html('Required');
            flag = false;
        }        
    });

    var allowedFiles = [".xls", ".xlsx"];
    var fileUpload = $("#file");

    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
    if (!regex.test(fileUpload.val().toLowerCase())) {
        $(".afile").html('Required');
        flag = false;   
    }

    if(flag == true){
        return true; 
    } 
    else{
        return false;    
    }

 }

function getCatgAssets(dis) {
    if(dis.value=='') return;    
    //Get list
    $.ajax({
        type: "POST",
        cache: false,
        url: "/assets/getCatgAssets",
        data: 'catg_id='+dis.value
    })
    .done(function( resp ) {                                        
        $("#asset_id_box").html(resp);
        $('#asset_id').select2();
    })
    .fail(function() {
        alert( "Unable to process, please try again" );
    });
}
//Add Asset box
function addAsset(dis) {
    var efbox = $(".asset_clone").html();
    $(".assetsList").append(efbox);
}
//Remove asset box
function asset_delete(dis) {
    $(dis).parents('.assetbox').remove();
}
//Save Template
function community_assets_save() {
    if(doProcess){
        alert("Please wait saving inprocess....");
        return false;
    }
    $("#frmcommAsset .help-block").html('');
    var esave = true;
    $("#frmcommAsset .erequired").each(function(){
        if($(this).val()=="") {
            $(this).parents(".form-group").find('.help-block').html('Required');
            esave = false;
        }        
    });
    if(esave==false) return false;
    if($(".assetsList .assetbox").length==0) {
        $("#frmerror").html("Assets required");
        return false;
    }
    doProcess = 1;
    $(".loader").html('<img src="/images/spinner.gif" />');
    //Save process
    $.ajax({
        type: "POST",
        cache: false,
        dataType: 'json',
        url: $("#frmcommAsset").attr('action'),
        data: $("#frmcommAsset").serialize()
    })
    .done(function( resp ) {                                
        doProcess = 0;
        $(".loader").html('');
        if(resp.status==false) {
            $("#frmerror").html(resp.message);
        } else if(resp.status==true) {
            alert(resp.message);
            location.replace($(".aturl").attr('href'));
        }
    })
    .fail(function() {
        doProcess = 0;
        $(".loader").html('');
        alert( "Unable to process, please try again" );
    });
    return false;
}

//JOBCARD
//Jobcard type change
function setJobtype(dis) {
    if(dis.value=='') {
        $(".jctypeoptions1").hide();
        $(".jctypeoptions2").hide();
        return;
    } else if(dis.value=='1' || dis.value=='2') {
        if($("#site_id").val()=="") {
            $("#site_id").parents(".form-group").find('.help-block').html('Required');
            $("#site_id").val('');
            return;
        }
        $(".jctypeoptions2").hide();
        $(".jctypeoptions1").show();   
        $("#asset_id").val('');
        $("#jctype12").val('');
		 $(".optjdate").show();
       // $(".optjdate").hide();
        getJobcaredtypeOptions()
        return;
    } else if(dis.value=='3') {
        $(".jctypeoptions1").hide();
        $(".jctypeoptions2").show();
        $("#asset_id").val(''); 
        //$("#asset_id").select2('destroy');
        //$('#asset_id').select2();  
        $("#jctype12").val('');
        $(".optjdate").hide(); 
        return;
    } else if(dis.value=='4') {
        $(".jctypeoptions1").hide();
        $(".jctypeoptions2").show();
        $("#asset_id").val(''); 
        //$("#asset_id").select2('destroy');
        //$('#asset_id').select2();  
        $("#jctype12").val('');
        $(".optjdate").show(); 
        return;    
    }
}
  
function setJobtypecom(dis) {
    if(dis.value=='') {
        $(".jctypeoptions1").hide();
        $(".jctypeoptions2").hide();
        return;
    } else if(dis.value=='1' || dis.value=='2') {
        if($("#site_id").val()=="") {
            $("#site_id").parents(".form-group").find('.help-block').html('Required');
            $("#site_id").val('');
            return;
        }
        $(".jctypeoptions2").hide();
        $(".jctypeoptions1").show();   
        $("#asset_id").val('');
        $("#jctype12").val('');
		$(".optjdate").show(); 
       // $(".optjdate").hide();
        comgetJobcaredtypeOptions()
        return;
    } else if(dis.value=='3') {
        $(".jctypeoptions1").hide();
        $(".jctypeoptions2").show();
        $("#asset_id").val(''); 
        //$("#asset_id").select2('destroy');
        //$('#asset_id').select2();  
        $("#jctype12").val('');
        $(".optjdate").hide(); 
        return;
    } else if(dis.value=='4') {
        $(".jctypeoptions1").hide();
        $(".jctypeoptions2").show();
        $("#asset_id").val(''); 
        //$("#asset_id").select2('destroy');
        //$('#asset_id').select2();  
        $("#jctype12").val('');
        $(".optjdate").show(); 
        return;    
    }
}
//Community changed
function setJcSite_changed() {
    if($("#site_id").val()=="") {
        $("#site_id").parents(".form-group").find('.help-block').html('');
    }
    getJobcaredtypeOptions();
    //getTopicsCommunityAssets();
}
//Get Jobcard type options
function getJobcaredtypeOptions() {    
    if($("#jctype").val()=='') return;    
    var jctype = $("#jctype").val();
    var siteid = $("#site_id").val();
    //Get list
    $.ajax({
        type: "POST",
        cache: false,
        url: "/topics/jobcard/options",
        data: 'jctype='+jctype+'&siteid='+siteid
    })
    .done(function( resp ) {           
        $(".jctypeoptions1").html(resp);
        $('#jctype12').select2();
    })
    .fail(function() {
        alert( "Unable to process, please try again" );
    });
}

//Get Jobcard type options
function comgetJobcaredtypeOptions() {    
    if($("#jctype").val()=='') return;    
    var jctype = $("#jctype").val();
    var siteid = $("#site_id").val();
	 var assetid = $("#ast_id").val();
    //Get list
    $.ajax({
        type: "POST",
        cache: false,
        url: "/communityassets/jobcard/options",
        data: 'jctype='+jctype+'&siteid='+siteid+'&assetid='+assetid
    })
    .done(function( resp ) {           
        $(".jctypeoptions1").html(resp);
        $('#jctype12').select2();
    })
    .fail(function() {
        alert( "Unable to process, please try again" );
    });
}
//Get Jobcard type ref options
function employeeetypeget(val){
	if(val == 1){
		var dis = $("#jctype12").val();
		getJobCardEmployeesval(dis);
		 $(".employeee").show();
		  $("#vendorblock").hide();
		   $("#vendortextblock").hide();
		  
		  
		}
		if(val == 2){
		var dis = $("#jctype12").val();
		getJobCardvendorsval(dis);
		  
		}
	
	}
	
function getJobCardvendorsval(dis) {  
	   $("#vendorblock").show();
	   $(".employeee").hide();
	    $("#vendortextblock").show();
}
	
function getJobCardEmployeesnew(dis){
		 $('.employeeetype').show(); 
}

function getJobCardEmployeesval(dis) {  
    if(dis=='') return; 
    var jctype = $("#jctype").val();
    //Get list
	if(jctype == 1) {
	getItemDetailsval(dis);
	}
    $.ajax({
        type: "POST",
        cache: false,
        url: "/topics/jobcard/employees",
        data: 'jctype='+jctype+'&jctrefid='+dis
    })
	 .done(function( resp ) {           
        $(".employeee").html(resp);
        $('#emp_id').select2();
    })
    .fail(function() {
        alert( "Unable to process, please try again" );
    });
}

function getItemDetailsval(dis) {   
    if(dis=='') return;    
    var jctype = $("#jctype").val();
    //Get list
    $.ajax({
        type: "POST",
        cache: false,
        url: "/topics/jobcard/items",
        data: 'jctype='+jctype+'&jctrefid='+dis
    })
    .done(function( resp ) {           
        $("#sparesblock").html(resp);
    })
    .fail(function() {
        alert( "Unable to process, please try again" );
    });
}

function getJobCardEmployees(dis) {  
    if(dis.value=='') return; 
    var jctype = $("#jctype").val();
    //Get list
	if(jctype == 1) {
	getItemDetails(dis);
	}
    $.ajax({
        type: "POST",
        cache: false,
        url: "/topics/jobcard/employees",
        data: 'jctype='+jctype+'&jctrefid='+dis.value
    })
	 .done(function( resp ) {           
        $(".employeee").html(resp);
        $('#emp_id').select2();
    })
    .fail(function() {
        alert( "Unable to process, please try again" );
    });
}
// GET ITEMS
function getItemDetails(dis) {   
    if(dis.value=='') return;    
    var jctype = $("#jctype").val();
    //Get list
    $.ajax({
        type: "POST",
        cache: false,
        url: "/topics/jobcard/items",
        data: 'jctype='+jctype+'&jctrefid='+dis.value
    })
    .done(function( resp ) {           
        $("#sparesblock").html(resp);
    })
    .fail(function() {
        alert( "Unable to process, please try again" );
    });
}

// GET ITEMS BY SUBCATEGORY

// GET ITEMS
function getItembysubcat(dis) {   
    if(dis=='') return;  
	alert(dis);
    $.ajax({
        type: "POST",
        cache: false,
        url: "/cat/subcat/items",
        data: 'subcat='+dis
    }) 
    .done(function( resp ) {           
        $("#itemsdiv").html(resp);
    })
    .fail(function() {
        alert( "Unable to process, please try again" );
    });
}

function getinitemRecords(dis, idv) {   
    if(dis=='') return;  
	
    $.ajax({
        type: "POST",
        cache: false,
        url: "/cat/subcat/items",
        data: 'subcat='+dis
    }) 
    .done(function( resp ) {     
				   
        $("#itemcat_"+idv).html(resp);
    })
    .fail(function() {
        alert( "Unable to process, please try again" );
    });
}



//Get Jobcard type ref options
function getAssetEmployees(dis) {    
    if(dis.value=='') return;    
    var jctype = $("#jctype").val();
	var jctypetext = $("#asset_id option:selected").val();
	if(jctypetext=="other")
	{
		$("#oasset_dropdown").show();
		$("#other_text").show();
	}
	else
	{
		$("#oasset_dropdown").hide();
		$("#other_text").hide();
	}
    //Get list
    $.ajax({
        type: "POST",
        cache: false,
        url: "/topics/jobcard/assetemployees",
        data: 'jctype='+jctype+'&jctrefid='+dis.value
    })
    .done(function( resp ) {           
        $(".employeee").html(resp);
        $('#emp_id').select2();
    })
    .fail(function() {
        alert( "Unable to process, please try again" );
    });
}
//Get Jobcard type ref options
function getTopicsCommunityAssets() {
    var site_id = $("#site_id").val();
    var category_id = $("#category_id").val(); 
	getsubCatRecords(category_id);
    //Get list
    $.ajax({
        type: "POST",
        cache: false,
        url: "/topics/community-assets",
        data: 'site_id='+site_id+'&category_id='+category_id
    })
    .done(function( resp ) {           
        $("#topics_assets").html(resp);
        $('#asset_id').select2();
    })
    .fail(function() {
        alert( "Unable to process, please try again" );
    });
}

// GET ASSET TYPE SUB CATEGORIES

function getsubCatRecords(dis) {
	  
    var category_id = dis;    
    //Get list
    $.ajax({
        type: "POST",
        cache: false,
        url: "/items/sucategories",
        data: 'category_id='+category_id
    })
    .done(function( resp ) {           
        $("#subcatdiv").html(resp);
    })
    .fail(function() {
        alert( "Unable to process, please try again" );
    });
}


function getindentsubCatRecords(dis) {
	  
    var category_id = dis;    
    //Get list
    $.ajax({
        type: "POST",
        cache: false,
        url: "/items/indentsucategories",
        data: 'category_id='+category_id
    })
    .done(function( resp ) {           
        $("#subcatdiv").html(resp);
    })
    .fail(function() {
        alert( "Unable to process, please try again" );
    });
}

function getsubincatRecords(dis, idv) {
	  
    var category_id = dis;    
    //Get list
    $.ajax({
        type: "POST",
        cache: false,
        url: "/items/indentinsucategories",
        data: 'category_id='+category_id+'&subid='+idv
    })
    .done(function( resp ) {           
        $("#subcat_"+idv).html(resp);
    })
    .fail(function() {
        alert( "Unable to process, please try again" );
    });
}







//Select employ for jobcard
function select_jobcard_emp(dis) {
    var emp_value=dis.value;
    community_title = $("#sitename").val();
    if(emp_value!="") {
        if($(".empids .empbox.empid"+emp_value).length>0) return;
        var sitesel = community_id;
        var s1 = '<div  class="site_'+sitesel+' commoncom"><div><b>'+community_title+':</b></div>';
        var s2 =  '</div>';
        
        var emp_title = $("#emp_id option:selected").text();
        
        var emphtml = '<div class="empbox empid'+emp_value+'">'+
            '<a onclick="task_emp_delete(this)"><i class="fa fa-close"></i></a>'+
            emp_title+'<input type="hidden" name="empid[]" value="'+emp_value+'" />'+
            '<input type="hidden" name="empname[]" value="'+community_title+':'+emp_title+'" />'+
            '<input type="hidden" name="siteidval[]" value="'+sitesel+'" />'+
            '<input type="hidden" name="sitenameval[]" value="'+community_title+'" /></div>';
      
        if($(".empids .site_"+sitesel).length > 0){
            $(".empids .site_"+sitesel).append(emphtml);
        }else{
            $(".empids").append(s1 + emphtml + s2);
        }
    }
}
//Save Template
function saveJobcard() {
   $("#frmJobcard .help-block").html('');
    var esave = true;
    $("#frmJobcard .erequired").each(function(){
        if($(this).val()=="") {
            $(this).parents(".form-group").find('.help-block').html('Required');
            esave = false;
        }        
    });
    if(esave==false) return false;
    return true;
}
//end of JOBCARD