<?php 



/*Route::get('/', function () {



    return redirect('/home');



});
*/


 

   

Route::get('/', 'HomeFrontController@index');  

  

Route::get('contactus', 'ContactusController@index')->name('contactus');



Route::get('map', 'ContactusController@mapindex')->name('map');



Route::get('eventcomingsn', 'ContactusController@eventcomingsn')->name('eventcomingsn');



Route::get('calendar', 'ContactusController@calendarview')->name('calendar');



Route::get('tplancalendar', 'ContactusController@tplancalendar')->name('tplancalendar');



Route::get('calview', 'TasksController@calview')->name('tasks.calview');



Route::get('momview', 'TasksController@momview')->name('mom.calview');



Route::get('whyaparna', 'WhyAparnaController@index')->name('whyaparna');



Route::get('feature', 'FeatureController@index')->name('feature');



Route::get('management', 'ContactusController@management')->name('management');



Route::get('benfit', 'ContactusController@benfit')->name('benfit');



Route::get('services', 'ServicesController@index')->name('services');



Route::get('test', 'DailyReportsController@test1')->name('test');



Route::get('ourprojects', 'OurprojectsController@index')->name('ourprojects');



Route::get('aboutus', 'AboutusController@index')->name('aboutus');



Route::get('/ourprojects-detail/{id}', ['uses' => 'OurprojectsdetailController@detailView' , 'laroute' => true])->name('detail');	 



Route::get('/sentsms', ['uses' => 'DailyReportsController@sentsms' , 'laroute' => true])->name('dailyreports.sentsms');



Route::get('/sentsecuresms', ['uses' => 'DailyReportsController@sentsecuresms' , 'laroute' => true])->name('dailyreports.sentsecuresms');



Route::get('/sentpmssms', ['uses' => 'DailyReportsController@sentpmssms' , 'laroute' => true])->name('dailyreports.sentpmssms');



Route::get('/sentfmssms', ['uses' => 'DailyReportsController@sentfmssms' , 'laroute' => true])->name('dailyreports.sentfmssms');



Route::get('/sentfiresms', ['uses' => 'DailyReportsController@sentfiresms' , 'laroute' => true])->name('dailyreports.sentfiresms');
 

Route::get('/sentallemails', ['uses' => 'DailyReportsController@sentallemails' , 'laroute' => true])->name('dailyreports.sentallemails');

Route::post('/upload','WebservicesController@upload');  

Route::post('/recupload','WebservicesController@recupload');  

Route::post('/ulogin','WebservicesController@userLogin');

Route::get('/allcats','WebservicesController@getallcategories');

Route::get('/allsites/{id}','WebservicesController@getallsites');

Route::get('/alllocations/{id}','WebservicesController@getalllocations');


Route::post('/savesnagReport','WebservicesController@savesnagReport');





// ITEMS IMPORT



Route::get('/importitems', ['uses' => 'ItemsController@itemimport', 'as' => 'items.import']);



 



// Authentication Routes...    



$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');



$this->post('login', 'Auth\LoginController@login')->name('auth.login');



$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');







// Registration Routes...



$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');



$this->post('register', 'Auth\RegisterController@register')->name('auth.register');







// Password Reset Routes...



$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');



$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');



$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('auth.password.email');



$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');











Route::group(['middleware' => 'auth'], function () {



    Route::get('/admin', 'HomeController@indexdashboardtemp');

	

	//Route::get('/admin', 'HomeController@indexdashboard');



	Route::get('/dashboard', 'HomeController@indexdashboardtemp'); 

	

	Route::get('/dashboardtemp', 'HomeController@indexdashboardtemp');   



    Route::resource('roles', 'RolesController');



    Route::post('roles_mass_destroy', ['uses' => 'RolesController@massDestroy', 'as' => 'roles.mass_destroy']);



    Route::resource('users', 'UsersController');



    Route::post('users_mass_destroy', ['uses' => 'UsersController@massDestroy', 'as' => 'users.mass_destroy']);



    Route::resource('user_actions', 'UserActionsController');



    Route::resource('settings', 'SettingsController');



    Route::resource('currencies', 'CurrenciesController');



    Route::post('currencies_mass_destroy', ['uses' => 'CurrenciesController@massDestroy', 'as' => 'currencies.mass_destroy']);



    Route::resource('transaction_types', 'TransactionTypesController');



    Route::post('transaction_types_mass_destroy', ['uses' => 'TransactionTypesController@massDestroy', 'as' => 'transaction_types.mass_destroy']);



    Route::resource('income_sources', 'IncomeSourcesController');



    Route::post('income_sources_mass_destroy', ['uses' => 'IncomeSourcesController@massDestroy', 'as' => 'income_sources.mass_destroy']);



    Route::resource('client_statuses', 'ClientStatusesController');



	Route::resource('dailyreport_statuses', 'DailyreportStatusesController');



	Route::post('dailyreport_statuses_mass_destroy', ['uses' => 'DailyreportStatusesController@massDestroy', 'as' => 'dailyreport_statuses.mass_destroy']);



    Route::post('client_statuses_mass_destroy', ['uses' => 'ClientStatusesController@massDestroy', 'as' => 'client_statuses.mass_destroy']);



    Route::resource('project_statuses', 'ProjectStatusesController');



    Route::post('project_statuses_mass_destroy', ['uses' => 'ProjectStatusesController@massDestroy', 'as' => 'project_statuses.mass_destroy']);



    Route::resource('clients', 'ClientsController');



	Route::resource('vendors', 'VendorsController');



	Route::resource('assets', 'AssetsController');

	

	Route::resource('tasks', 'TasksController');

	

	Route::get('attendance', ['uses' => 'AttendanceController@getlist', 'as' => 'attendance.getlist']);

	

	Route::resource('indents', 'IndentsController');

	

	Route::post('indents_mass_approve', ['uses' => 'IndentsController@massApprove', 'as' => 'indents.mass_approve']);

	

	Route::post('indents_mass_destroy', ['uses' => 'IndentsController@massDestroy', 'as' => 'indents.mass_destroy']);

	

	Route::post('indents_mass_reject', ['uses' => 'IndentsController@massReject', 'as' => 'indents.mass_reject']);

	

	Route::resource('meetups', 'MeetupsController');  

	

	Route::resource('forums', 'ForumsController');

	

	Route::resource('items', 'ItemsController'); 
	
	Route::resource('snagcategories', 'SnagcategoriesController'); 
	Route::resource('snaglocations', 'SnaglocationsController'); 

	

	 Route::resource('amc', 'AmcController');

	 Route::resource('repository', 'RepositoryController');

	 

	 Route::get('repositorycat_types/{id}', ['uses' => 'RepositorycattypeController@index', 'as' => 'repositorycat_type.index']);

	 

	 Route::get('repositorycat_types/{id}', ['uses' => 'RepositorycattypeController@index', 'as' => 'repositorycat_type.index']);

	 

	 Route::get('repositorycat_types/{id}/create', ['uses' => 'RepositorycattypeController@create', 'as' => 'repositorycat_type.create']);

	 

	 Route::get('repository/{cid}/{id}', ['uses' => 'RepositorycattypeController@show', 'as' => 'repositorycat_type.show']);

	 

	 Route::get('repository/{cid}/{id}/create', ['uses' => 'RepositoryController@create', 'as' => 'repository.create']);

	 

	 //Route::get('repository/{cid}/{id}', ['uses' => 'RepositoryController@index', 'as' => 'repository.index']);

	 

	 Route::get('enable/{rep_id}/{status}', ['uses' => 'RepositoryController@enable', 'as' => 'repository.enable']);

	 

	 

	 Route::get('enablesite/{site_id}/{status}', ['uses' => 'SitesController@enable', 'as' => 'sites.enable']); 

	 

	 //Back TO MIS REPORTS

	
	Route::get('/missiteselection', ['uses' => 'MisReportsController@missiteselection' , 'laroute' => true])->name('missiteselection');

	Route::get('misreportsoptions/{year}/{month}', ['uses' => 'MisReportsController@backmisreports', 'as' => 'misreports.backmisreports']); 

 

	Route::post('tasks/comment', ['uses' => 'TasksController@saveTaskComment', 'as' => 'tasks.comment']);

	Route::post('forums/comment', ['uses' => 'ForumsController@saveTaskComment', 'as' => 'forums.comment']); 

	

	Route::post('forums/commentreply', ['uses' => 'ForumsController@savecommentreply', 'as' => 'forums.commentreply']); 

	

	Route::get('tasks/comment/delete/{comment_id}', ['uses' => 'TasksController@delTaskComment', 'as' => 'tasks.commentdel']);

	

	Route::get('indents/approve/{comment_id}', ['uses' => 'IndentsController@approveIndent', 'as' => 'indents.approveIndent']);

	

	Route::get('indents/reject/{comment_id}', ['uses' => 'IndentsController@rejectIndent', 'as' => 'indents.rejectIndent']);

	

	Route::get('indents/requeststatus/{comment_id}', ['uses' => 'IndentsController@requeststatus', 'as' => 'indents.requeststatus']);

	

	Route::get('forums/comment/delete/{comment_id}', ['uses' => 'ForumsController@delTaskComment', 'as' => 'forums.commentdel']);

	

	Route::get('forums/comment/deletereply/{comment_id}', ['uses' => 'ForumsController@delreplyTaskComment', 'as' => 'forums.commentreplydel']);

	

	Route::get('forums/raiseforum/likereply/{comment_id}', ['uses' => 'ForumsController@likeforumTask', 'as' => 'forums.raiseforum']);

	Route::get('forums/downforum/likereply/{comment_id}', ['uses' => 'ForumsController@dislikeforumTask', 'as' => 'forums.downforum']);

	

	

	Route::get('likecomment', ['uses' => 'ForumsController@likecomment', 'as' => 'forum.likecomment']); 

	

	//FORUMS



    Route::get('getselectedcatresults', ['uses' => 'ForumsController@getselectedcatresults', 'as' => 'forums.getselectedcatresults']); 



	Route::resource('category', 'CategoryController');

	Route::resource('assetgroup', 'AssetgroupController');

	Route::resource('asset-types', 'AssettypeController'); 

	Route::resource('assetcat-types', 'AssetcattypeController'); 

	

	

	Route::resource('repository-types', 'RepositorytypeController'); 

	Route::resource('repositorycat-types', 'RepositorycattypeController'); 

	

	

	// ASSIGN GEOUP TO ASSET

	Route::get('assignassetgroup', ['uses' => 'AssetgroupController@assignassetgroup', 'as' => 'assetgroup.assigngroup']);

	

	// MASS GROUP SELECTION

	

	Route::post('asset_mass_groupassign', ['uses' => 'IndentsController@massgroupassign', 'as' => 'indents.mass_approveassign']);



	Route::resource('sites', 'SitesController');
	
	Route::resource('horticultures', 'HorticultureController');
	
	Route::get('horticultureimport', ['uses' => 'HorticultureController@horticultureimport' , 'as' => 'horticultures.import']);
	
	Route::post('savehorticultureimport', ['uses' => 'HorticultureController@savehskhorticultureimport', 'as' => 'uploadexcel.savehskhorticultureimport']);
	
	
	Route::resource('blocks', 'BlockController');

	

	Route::resource('sitesbkp', 'SitesbkpController'); 



	Route::resource('employees', 'EmployeesController');



	Route::resource('emps', 'EmpsController');



	Route::post('category_mass_destroy', ['uses' => 'CategoryController@massDestroy', 'as' => 'category.mass_destroy']);

	Route::post('asset_types_mass_destroy', ['uses' => 'AssettypeController@massDestroy', 'as' => 'asset-types.mass_destroy']);

	

	Route::post('repository_types_mass_destroy', ['uses' => 'RepositorytypeController@massDestroy', 'as' => 'repository-types.mass_destroy']);



    Route::post('clients_mass_destroy', ['uses' => 'ClientsController@massDestroy', 'as' => 'clients.mass_destroy']);



	Route::post('vendors_mass_destroy', ['uses' => 'VendorsController@massDestroy', 'as' => 'vendors.mass_destroy']);

	

	Route::post('items_mass_destroy', ['uses' => 'ItemsController@massDestroy', 'as' => 'items.mass_destroy']);
	
	Route::post('snag_mass_destroy', ['uses' => 'AuditReportsController@massDestroy', 'as' => 'snag.mass_destroy']);



	Route::post('sites_mass_destroy', ['uses' => 'SitesController@massDestroy', 'as' => 'sites.mass_destroy']);
	
	Route::post('horticultures_mass_destroy', ['uses' => 'HorticultureController@massDestroy', 'as' => 'horticultures.mass_destroy']);



	Route::post('employees_mass_destroy', ['uses' => 'EmployeesController@massDestroy', 'as' => 'employees.mass_destroy']);



	Route::post('emps_mass_destroy', ['uses' => 'EmpsController@massDestroy', 'as' => 'emps.mass_destroy']);

	Route::get('emps-import', ['uses' => 'EmpsController@empimport', 'as' => 'emps.eimport']);

	Route::post('emps-import', ['uses' => 'EmpsController@empimport', 'as' => 'emps.import']);

	Route::post('emps/getCommunityUsers', ['uses' => 'EmpsController@getCommunityUsers']);



	Route::post('assets_mass_destroy', ['uses' => 'AssetsController@massDestroy', 'as' => 'assets.mass_destroy']);

	Route::post('assets/template/{id}', ['uses' => 'AssetsController@assetTemplate', 'as' => 'assets.etemplate' ]);

	Route::get('assets/template/{id}', ['uses' => 'AssetsController@assetTemplate', 'as' => 'assets.template' ]);

	Route::post('assets/getCatgAssets', ['uses' => 'AssetsController@getCatgAssets' ]);



	/*-------------------------------MMR IMAGES DELETES-------------------------------*/
	
	Route::get('mmrdeleteimage', ['uses' => 'MMRController@deleteImage', 'as' => 'mmr.deleteppmImage']);
	
	Route::get('deleteexcess', ['uses' => 'ReportvalidationController@deleteexcess', 'as' => 'mmr.deleteexcess']);
	
	
	/*-------------------------------MMR IMAGES DELETES-------------------------------*/
	
	
	

    Route::resource('projects', 'ProjectsController');



    Route::post('projects_mass_destroy', ['uses' => 'ProjectsController@massDestroy', 'as' => 'projects.mass_destroy']);



    Route::resource('notes', 'NotesController');



    Route::post('notes_mass_destroy', ['uses' => 'NotesController@massDestroy', 'as' => 'notes.mass_destroy']);



    Route::resource('documents', 'DocumentsController');



    Route::post('documents_mass_destroy', ['uses' => 'DocumentsController@massDestroy', 'as' => 'documents.mass_destroy']);



    Route::resource('transactions', 'TransactionsController');



    Route::post('transactions_mass_destroy', ['uses' => 'TransactionsController@massDestroy', 'as' => 'transactions.mass_destroy']);



    Route::resource('reports', 'ReportsController');



	



	Route::resource('dailyreports', 'DailyReportsController');



	

	Route::resource('firereports', 'FireReportsController');

	Route::resource('misreports', 'MisReportsController');

	

	Route::get('snagindex', ['uses' => 'AuditReportsController@snagindex' , 'laroute' => true])->name('snagindex');
	
	Route::get('eyesore', ['uses' => 'AuditReportsController@eyesore' , 'laroute' => true])->name('eyesore');



	Route::get('getsnagreports', ['uses' => 'AuditReportsController@getsnagreports', 'as' => 'auditreport.getsnagreports']);
	
	Route::get('getsorereports', ['uses' => 'AuditReportsController@getsorereports', 'as' => 'auditreport.getsorereports']);
	
	Route::get('snagedit', ['uses' => 'AuditReportsController@snagedit', 'as' => 'audit.snagedit']);
	
	Route::get('snagsiteselect', ['uses' => 'AuditReportsController@snagsiteselect', 'as' => 'audit.snagsiteselect']);
	
	Route::get('soresiteselect', ['uses' => 'AuditReportsController@soresiteselect', 'as' => 'audit.soresiteselect']);
	
	
	Route::get('getlocations', ['uses' => 'ReportvalidationController@getlocations', 'as' => 'validationtemplates.getlocations']);

	

	Route::get('getsnagreportexport', ['uses' => 'AuditReportsController@getsnagreportexport', 'as' => 'auditreport.getsnagreportexport']);
	
	Route::get('getsoreexport', ['uses' => 'AuditReportsController@getsoreexport', 'as' => 'auditreport.getsoreexport']);
	
	Route::get('getsummaryreport', ['uses' => 'AuditReportsController@getsummaryreport', 'as' => 'auditreport.getsummaryreport']);

	

	Route::get('getsnagreportpdf', ['uses' => 'AuditReportsController@getsnagreportpdf', 'as' => 'auditreport.getsnagreportpdf']);

	

	Route::get('getsnagreportedit', ['uses' => 'AuditReportsController@getsnagreportedit', 'as' => 'auditreport.getsnagreportedit']);
	
	Route::get('snagpicdelete', ['uses' => 'AuditReportsController@snagpicdelete', 'as' => 'auditreport.snagpicdelete']);
	
	
	Route::get('snagpicrdelete', ['uses' => 'AuditReportsController@snagpicrdelete', 'as' => 'auditreport.snagpicrdelete']);
	
	Route::get('getsnagreportdelete', ['uses' => 'AuditReportsController@deletesnagreport', 'as' => 'auditreport.deletesnagreport']);

	

	Route::resource('progressreports', 'ProgressReportsController');

	

	Route::get('advancedindex', ['uses' => 'MisReportsController@advancedindex' , 'laroute' => true])->name('advancedindex');

	

	Route::get('advanceddailyindex', ['uses' => 'MisReportsController@advanceddailyindex' , 'laroute' => true])->name('advanceddailyindex');



	Route::get('/getmisreportprint/{id}', ['uses' => 'MisReportsController@getprintview' , 'laroute' => true])->name('misprintview');



	Route::get('/getmisreportupdate/{id}', ['uses' => 'MisReportsController@geteditview' , 'laroute' => true])->name('miseditview');

	

	// MIS UPDATE

	

	 

	//Route::get('/getmisreportrecupdate/{id}/{year}/{month}', ['uses' => 'MisReportsController@getupdateview' , 'laroute' => true])->name('getupdateview');

	

	Route::get('/getmisreportrecupdate/{id}/{year}/{month}', ['uses' => 'MisReportsController@geteditformview' , 'laroute' => true])->name('geteditformview');

	
	Route::get('/getnocrecupdate/{year}/{month}', ['uses' => 'MisReportsController@getnocformview' , 'laroute' => true])->name('getnocformview');

	Route::get('getfiresafenocvalues', ['uses' => 'ValidationController@getfiresafenocvalues', 'as' => 'validation.getfiresafenocvalues']); 

	// MIS PREVIEW    

	

	Route::get('/getmisreportrecview/{id}/{year}/{month}', ['uses' => 'MisReportsController@getpreview' , 'laroute' => true])->name('getpreview');

	

	Route::get('/getattendanceformview', ['uses' => 'AttendanceController@uploadform' , 'laroute' => true])->name('attendance.uploadform');

	

	Route::get('/attendscan', ['uses' => 'AttendanceController@attendscan' , 'laroute' => true])->name('attendscan');

	

	Route::get('/attendtrack', ['uses' => 'AttendanceController@attendtrack' , 'laroute' => true])->name('attendtrack');

	  

	//getmisreportrecupdate

	

	// PROGRESS REPORTS EDIT PREVIEW

	

	Route::get('/getprogressreportrecupdate/{id}/{year}/{month}', ['uses' => 'ProgressReportsController@getprogresspreview' , 'laroute' => true])->name('getpreview');

	

	// END PREOGRESS REPORTS EDIT PREVIEW

	

	// MIS PRINT

	

	Route::get('/getmisreportrecprint/{id}/{year}/{month}', ['uses' => 'MisReportsController@getprintview' , 'laroute' => true])->name('getprintview');

	

	// MIS DOWNLOADS

	

	Route::get('/getmisreportrecdownload/{id}/{year}/{month}', ['uses' => 'MisReportsController@getdownloadview' , 'laroute' => true])->name('getdownloadview');

	

	

	

	Route::get('/downloadoverallmis/{year}/{month}/{date}', ['uses' => 'MisReportsController@downloadoverallmis' , 'laroute' => true])->name('downloadoverallmis');

	

	//Route::get('/downloadoverallmmr/{year}/{month}/{site}', ['uses' => 'MMRController@downloadoverallmmr' , 'laroute' => true])->name('downloadoverallmmr');
	
	
	Route::get('/downloadoverallmmr/{year}/{month}/{site}', ['uses' => 'MMRDownload@downloadoverallmmr' , 'laroute' => true])->name('downloadoverallmmr');

	

	Route::get('/updatemmr', ['uses' => 'MMRController@updatemmr' , 'laroute' => true])->name('updatemmr');

	

	Route::get('/downloadoverallmisindex/{year}/{month}/{date}', ['uses' => 'MisReportsController@downloadoverallmisindex' , 'laroute' => true])->name('downloadoverallmis');

	



	Route::get('/getmisreportpreview/{id}', ['uses' => 'MisReportsController@getpreview' , 'laroute' => true])->name('mispreview');

	



	Route::get('/getmisreportupdatedetail/{id}', ['uses' => 'MisReportsController@geteditdetailview' , 'laroute' => true])->name('misdetailpreview');



	



	Route::get('/getmisreportupdatedetailview/{id}', ['uses' => 'MisReportsController@getmisupdatedetailview' , 'laroute' => true])->name('getupdatedetailview');



	 



	 



	Route::resource('reportvalidation', 'ReportvalidationController');   



	Route::resource('reportvaldetail', 'ReportvalidationDetailController');  

	

	Route::get('/mmr/main', ['uses' => 'MMRController@index' , 'laroute' => true])->name('mmr.main');



	

  // DAILY LOCK TIME

    Route::get('/daylocktime', ['uses' => 'DailyReportsController@daylocktimeform' , 'laroute' => true])->name('dailyreports.dailylocktime');

	   

	Route::get('/reportdetailfrom/{id}/{type}/{year}/{month}', ['uses' => 'ReportvalidationController@addform' , 'laroute' => true])->name('detailform');	
	
	
		
	Route::get('/reportdetailsfrom/{id}/{type}/{year}/{month}', ['uses' => 'ReportvalidationController@summaryform' , 'laroute' => true])->name('detailform');	 



	Route::post('excessmanpower', ['uses' => 'ReportvalidationController@excessmanpower', 'as' => 'reportvalidation.excessmanpower']); 


	 



	//Route::resource('getdailyreportdetail/{id}', 'DailyReportsDetailController');  



	Route::get('/getdailyreportdetail/{id}', ['uses' => 'DailyReportsDetailController@index3' , 'laroute' => true])->name('dailyreportsdetail.index3');

	 

	Route::get('/getdailyreportdetail/{id}/{date}', ['uses' => 'DailyReportsDetailController@index3' , 'laroute' => true])->name('reports');



   // Route::get('/getdailyreport/{site}/{id}', ['uses' => 'DailyReportsController@massDestroy' , 'laroute' => true])->name('project');	 

    Route::get('/getdailyreport/{site}/{id}/{date}', ['uses' => 'DailyReportsController@massDestroy' , 'laroute' => true])->name('project');

	

	Route::get('/getdailyreportconstruction/{site}/{id}/{date}', ['uses' => 'DailyReportsController@massconstructionDestroy' , 'laroute' => true])->name('project');

	



	Route::get('/getdailyreportprint/{id}', ['uses' => 'DailyReportsController@printpage' , 'laroute' => true])->name('printpage');	  



	Route::get('/getdailyreportprintfpm/{id}/{dateval}', ['uses' => 'DailyReportsController@printfpmpage' , 'laroute' => true])->name('printfmspage');	 



	Route::get('/getdailyreportprintpms/{id}/{dateval}', ['uses' => 'DailyReportsController@printpmspage' , 'laroute' => true])->name('printpmspage');	 



	Route::get('/getdailyreportprintsecurity/{id}/{dateval}', ['uses' => 'DailyReportsController@printsecuritypage' , 'laroute' => true])->name('printsecuritypage');	 



	Route::get('/getdailyreportprintfiresafe/{id}/{dateval}', ['uses' => 'DailyReportsController@printfiresafepage' , 'laroute' => true])->name('printfiresafepage');



	/* DOWNLOAD DAILY REPORTS */

	

	Route::get('/dailyreportdownloadsecure/{id}/{dateval}', ['uses' => 'DailyReportsController@downloadsecurepage' , 'laroute' => true])->name('downloadsecurepage');

	Route::get('/dailyreportdownloadpms/{id}/{dateval}', ['uses' => 'DailyReportsController@downloadpmspage' , 'laroute' => true])->name('downloadpmspage');

	Route::get('/dailyreportdownloadfms/{id}/{dateval}', ['uses' => 'DailyReportsController@downloadfmspage' , 'laroute' => true])->name('downloadfmspage');

	Route::get('/dailyreportdownloadfiresafe/{id}/{dateval}', ['uses' => 'DailyReportsController@downloadfiresafepage' , 'laroute' => true])->name('downloadfiresafepage');

	

	

	

	// GET AUDIT REPORTS

	

	Route::resource('audit', 'AuditReportsController');

	Route::get('auditupload', ['uses' => 'ProgressReportsController@audituploadindex' , 'laroute' => true])->name('audituploadindex');

	

	

	Route::get('/getauditreportrecupdate/{id}/{year}/{month}', ['uses' => 'ProgressReportsController@getaudituploadview' , 'laroute' => true])->name('getpreview');

	

	

	

	Route::get('/auditfms/a1', ['uses' => 'AuditReportsController@fmsa1' , 'laroute' => true])->name('fmsa1');

	Route::get('/auditfms/a2', ['uses' => 'AuditReportsController@fmsa2' , 'laroute' => true])->name('fmsa2');

	Route::get('/auditfms/a3', ['uses' => 'AuditReportsController@fmsa3' , 'laroute' => true])->name('fmsa3');

	Route::get('/auditfms/a4', ['uses' => 'AuditReportsController@fmsa4' , 'laroute' => true])->name('fmsa4');

	Route::get('/auditfms/a5', ['uses' => 'AuditReportsController@fmsa5' , 'laroute' => true])->name('fmsa5');

	Route::get('/auditfms/a6', ['uses' => 'AuditReportsController@fmsa6' , 'laroute' => true])->name('fmsa6');

	Route::get('/auditfms/a7', ['uses' => 'AuditReportsController@fmsa7' , 'laroute' => true])->name('fmsa7');

	Route::get('/auditfms/a8', ['uses' => 'AuditReportsController@fmsa8' , 'laroute' => true])->name('fmsa8');

	Route::get('/auditfms/a9', ['uses' => 'AuditReportsController@fmsa9' , 'laroute' => true])->name('fmsa9');

	Route::get('/auditfms/a10', ['uses' => 'AuditReportsController@fmsa10' , 'laroute' => true])->name('fmsa10');

	Route::get('/auditfms/a11', ['uses' => 'AuditReportsController@fmsa11' , 'laroute' => true])->name('fmsa11');

	Route::get('/auditfms/a12', ['uses' => 'AuditReportsController@fmsa12' , 'laroute' => true])->name('fmsa12');

	Route::get('/auditfms/a13', ['uses' => 'AuditReportsController@fmsa13' , 'laroute' => true])->name('fmsa13');

	Route::get('/auditfms/a14', ['uses' => 'AuditReportsController@fmsa14' , 'laroute' => true])->name('fmsa14');

	Route::get('/auditfms/a15', ['uses' => 'AuditReportsController@fmsa15' , 'laroute' => true])->name('fmsa15');

	Route::get('/auditfms/a16', ['uses' => 'AuditReportsController@fmsa16' , 'laroute' => true])->name('fmsa16');

	Route::get('/auditfms/a17', ['uses' => 'AuditReportsController@fmsa17' , 'laroute' => true])->name('fmsa17');

	Route::get('/auditfms/a18', ['uses' => 'AuditReportsController@fmsa18' , 'laroute' => true])->name('fmsa18');

	Route::get('/auditfms/a19', ['uses' => 'AuditReportsController@fmsa19' , 'laroute' => true])->name('fmsa19');

	Route::get('/auditfms/a20', ['uses' => 'AuditReportsController@fmsa20' , 'laroute' => true])->name('fmsa20');

	Route::get('/auditfms/a21', ['uses' => 'AuditReportsController@fmsa21' , 'laroute' => true])->name('fmsa21');

	

	Route::get('/auditfms/a22', ['uses' => 'AuditReportsController@fmsa22' , 'laroute' => true])->name('fmsa22');

	Route::get('/auditfms/a23', ['uses' => 'AuditReportsController@fmsa23' , 'laroute' => true])->name('fmsa23');

	Route::get('/auditfms/a24', ['uses' => 'AuditReportsController@fmsa24' , 'laroute' => true])->name('fmsa24');

	Route::get('/auditfms/a25', ['uses' => 'AuditReportsController@fmsa25' , 'laroute' => true])->name('fmsa25');
	
	
	Route::get('/auditfms/a26', ['uses' => 'AuditReportsController@fmsa26' , 'laroute' => true])->name('fmsa26');

	

	

	

	Route::get('/auditpms/a1', ['uses' => 'AuditReportsController@pmsa1' , 'laroute' => true])->name('pmsa1');

	Route::get('/auditpms/a2', ['uses' => 'AuditReportsController@pmsa2' , 'laroute' => true])->name('pmsa2');

	Route::get('/auditpms/a3', ['uses' => 'AuditReportsController@pmsa3' , 'laroute' => true])->name('pmsa3');

	Route::get('/auditpms/a4', ['uses' => 'AuditReportsController@pmsa4' , 'laroute' => true])->name('pmsa4');

	Route::get('/auditpms/a5', ['uses' => 'AuditReportsController@pmsa5' , 'laroute' => true])->name('pmsa5');

	Route::get('/auditpms/a6', ['uses' => 'AuditReportsController@pmsa6' , 'laroute' => true])->name('pmsa6');

	Route::get('/auditpms/a7', ['uses' => 'AuditReportsController@pmsa7' , 'laroute' => true])->name('pmsa7');

	Route::get('/auditpms/a8', ['uses' => 'AuditReportsController@pmsa8' , 'laroute' => true])->name('pmsa8');

	Route::get('/auditpms/a9', ['uses' => 'AuditReportsController@pmsa9' , 'laroute' => true])->name('pmsa9');

	Route::get('/auditpms/a10', ['uses' => 'AuditReportsController@pmsa10' , 'laroute' => true])->name('pmsa10');

	Route::get('/auditpms/a11', ['uses' => 'AuditReportsController@pmsa11' , 'laroute' => true])->name('pmsa11');

	Route::get('/auditpms/a12', ['uses' => 'AuditReportsController@pmsa12' , 'laroute' => true])->name('pmsa12');

	Route::get('/auditpms/a13', ['uses' => 'AuditReportsController@pmsa13' , 'laroute' => true])->name('pmsa13');

	Route::get('/auditpms/a14', ['uses' => 'AuditReportsController@pmsa14' , 'laroute' => true])->name('pmsa14');

	Route::get('/auditpms/a15', ['uses' => 'AuditReportsController@pmsa15' , 'laroute' => true])->name('pmsa15');

	Route::get('/auditpms/a16', ['uses' => 'AuditReportsController@pmsa16' , 'laroute' => true])->name('pmsa16');

	Route::get('/auditpms/a17', ['uses' => 'AuditReportsController@pmsa17' , 'laroute' => true])->name('pmsa17');

	Route::get('/auditpms/a18', ['uses' => 'AuditReportsController@pmsa18' , 'laroute' => true])->name('pmsa18');

	Route::get('/auditpms/a19', ['uses' => 'AuditReportsController@pmsa19' , 'laroute' => true])->name('pmsa19');

	Route::get('/auditpms/a20', ['uses' => 'AuditReportsController@pmsa20' , 'laroute' => true])->name('pmsa20');

	Route::get('/auditpms/a21', ['uses' => 'AuditReportsController@pmsa21' , 'laroute' => true])->name('pmsa21');

	Route::get('/auditpms/a22', ['uses' => 'AuditReportsController@pmsa22' , 'laroute' => true])->name('pmsa22');

	//Route::get('/auditpms/a23', ['uses' => 'AuditReportsController@pmsa23' , 'laroute' => true])->name('pmsa23');

	Route::get('/auditpms/a24', ['uses' => 'AuditReportsController@pmsa24' , 'laroute' => true])->name('pmsa24');

	Route::get('/auditpms/a25', ['uses' => 'AuditReportsController@pmsa25' , 'laroute' => true])->name('pmsa25');

	Route::get('/auditpms/a26', ['uses' => 'AuditReportsController@pmsa26' , 'laroute' => true])->name('pmsa26');

	   

	

	Route::get('/auditsecurity/a1', ['uses' => 'AuditReportsController@securitya1' , 'laroute' => true])->name('securitya1');

	Route::get('/auditsecurity/a4', ['uses' => 'AuditReportsController@securitya4' , 'laroute' => true])->name('securitya4');

	Route::get('/auditsecurity/a6', ['uses' => 'AuditReportsController@securitya6' , 'laroute' => true])->name('securitya6');

	Route::get('/auditsecurity/a7', ['uses' => 'AuditReportsController@securitya7' , 'laroute' => true])->name('securitya7');

	

	Route::get('/auditsecurity/a9', ['uses' => 'AuditReportsController@securitya9' , 'laroute' => true])->name('securitya9');

	Route::get('/auditsecurity/a10', ['uses' => 'AuditReportsController@securitya10' , 'laroute' => true])->name('securitya10');

	Route::get('/auditsecurity/a14', ['uses' => 'AuditReportsController@securitya14' , 'laroute' => true])->name('securitya14');





	/*------------------PHYSICAL ATTENDANCE----------------*/

	Route::get('/auditsecurity/a17', ['uses' => 'AuditReportsController@securitya17' , 'laroute' => true])->name('securitya17');



	Route::get('getsecurityphaauditreports', ['uses' => 'AuditReportsController@getsecurityphaauditreports', 'as' => 'auditreport.getsecurityphaauditreports']);

	

	Route::get('getsecurityphaauditreportexport', ['uses' => 'AuditReportsController@getsecurityphaauditreportexport', 'as' => 'auditreport.getsecurityphaauditreportexport']);





	/*------------------Allowed Without ID Cards ----------------*/

	Route::get('/auditsecurity/a2', ['uses' => 'AuditReportsController@securitya2' , 'laroute' => true])->name('securitya2');



	Route::get('getsecuritywicauditreports', ['uses' => 'AuditReportsController@getsecuritywicauditreports', 'as' => 'auditreport.getsecuritywicauditreports']);

	

	Route::get('getsecuritywicauditreportexport', ['uses' => 'AuditReportsController@getsecuritywicauditreportexport', 'as' => 'auditreport.getsecuritywicauditreportexport']);





	/*------------------Not working total no's ----------------*/

	Route::get('/auditsecurity/a3', ['uses' => 'AuditReportsController@securitya3' , 'laroute' => true])->name('securitya3');



	Route::get('getsecuritynwtauditreports', ['uses' => 'AuditReportsController@getsecuritynwtauditreports', 'as' => 'auditreport.getsecuritynwtauditreports']);

	

	Route::get('getsecuritynwtauditreportexport', ['uses' => 'AuditReportsController@getsecuritynwtauditreportexport', 'as' => 'auditreport.getsecuritynwtauditreportexport']);







	/*------------------Available (No's) ----------------*/

	Route::get('/auditsecurity/a4', ['uses' => 'AuditReportsController@securitya4' , 'laroute' => true])->name('securitya4');



	Route::get('getsecurityanauditreports', ['uses' => 'AuditReportsController@getsecurityanauditreports', 'as' => 'auditreport.getsecurityanauditreports']);

	

	Route::get('getsecurityanauditreportexport', ['uses' => 'AuditReportsController@getsecurityanauditreportexport', 'as' => 'auditreport.getsecurityanauditreportexport']);





	/*------------------Solar Fencing Working Status ----------------*/

	

	Route::get('/auditsecurity/a5', ['uses' => 'AuditReportsController@securitya5' , 'laroute' => true])->name('securitya5');



	Route::get('getsecuritysfwsauditreports', ['uses' => 'AuditReportsController@getsecuritysfwsauditreports', 'as' => 'auditreport.getsecuritysfwsauditreports']);

	

	Route::get('getsecuritysfwsauditreportexport', ['uses' => 'AuditReportsController@getsecuritysfwsauditreportexport', 'as' => 'auditreport.getsecuritysfwsauditreportexport']);





	/*------------------Date Sheets Pending ----------------*/

	Route::get('/auditsecurity/a6', ['uses' => 'AuditReportsController@securitya6' , 'laroute' => true])->name('securitya6');



	Route::get('getsecuritydspauditreports', ['uses' => 'AuditReportsController@getsecuritydspauditreports', 'as' => 'auditreport.getsecuritydspauditreports']);

	

	Route::get('getsecuritydspauditreportexport', ['uses' => 'AuditReportsController@getsecuritydspauditreportexport', 'as' => 'auditreport.getsecuritydspauditreportexport']);





	/*------------------Night Bio Checked ----------------*/

	Route::get('/auditsecurity/a8', ['uses' => 'AuditReportsController@securitya8' , 'laroute' => true])->name('securitya8');



	Route::get('getsecuritynbcauditreports', ['uses' => 'AuditReportsController@getsecuritynbcauditreports', 'as' => 'auditreport.getsecuritynbcauditreports']);

	

	Route::get('getsecuritynbcauditreportexport', ['uses' => 'AuditReportsController@getsecuritynbcauditreportexport', 'as' => 'auditreport.getsecuritynbcauditreportexport']);







	/*------------------Security - Violations / Occurences etc ----------------*/

	Route::get('/auditsecurity/a9', ['uses' => 'AuditReportsController@securitya9' , 'laroute' => true])->name('securitya9');



	Route::get('getsecurityvoauditreports', ['uses' => 'AuditReportsController@getsecurityvoauditreports', 'as' => 'auditreport.getsecurityvoauditreports']);

	

	Route::get('getsecurityvoauditreportexport', ['uses' => 'AuditReportsController@getsecurityvoauditreportexport', 'as' => 'auditreport.getsecurityvoauditreportexport']);







	/*------------------Without Shoes----------------*/

	Route::get('/auditsecurity/a11', ['uses' => 'AuditReportsController@securitya11' , 'laroute' => true])->name('securitya11');



	Route::get('getsecuritywsauditreports', ['uses' => 'AuditReportsController@getsecuritywsauditreports', 'as' => 'auditreport.getsecuritywsauditreports']);

	

	Route::get('getsecuritywsauditreportexport', ['uses' => 'AuditReportsController@getsecuritywsauditreportexport', 'as' => 'auditreport.getsecuritywsauditreportexport']);





	/*------------------Without Uniform----------------*/

	Route::get('/auditsecurity/a12', ['uses' => 'AuditReportsController@securitya12' , 'laroute' => true])->name('securitya12');



	Route::get('getsecuritywunauditreports', ['uses' => 'AuditReportsController@getsecuritywunauditreports', 'as' => 'auditreport.getsecuritywunauditreports']);

	

	Route::get('getsecuritywunauditreportexport', ['uses' => 'AuditReportsController@getsecuritywunauditreportexport', 'as' => 'auditreport.getsecuritywunauditreportexport']);





	/*------------------Knows Fire Fighting----------------*/

	Route::get('/auditsecurity/a13', ['uses' => 'AuditReportsController@securitya13' , 'laroute' => true])->name('securitya13');



	Route::get('getsecuritykffauditreports', ['uses' => 'AuditReportsController@getsecuritykffauditreports', 'as' => 'auditreport.getsecuritykffauditreports']);

	

	Route::get('getsecuritykffauditreportexport', ['uses' => 'AuditReportsController@getsecuritykffauditreportexport', 'as' => 'auditreport.getsecuritykffauditreportexport']);







	/*------------------Security - Less than 5' 2'' ----------------*/

	Route::get('/auditsecurity/a14', ['uses' => 'AuditReportsController@securitya14' , 'laroute' => true])->name('securitya14');



	Route::get('getsecurityheightauditreports', ['uses' => 'AuditReportsController@getsecurityheightauditreports', 'as' => 'auditreport.getsecurityheightauditreports']);

	

	Route::get('getsecurityheightauditreportexport', ['uses' => 'AuditReportsController@getsecurityheightauditreportexport', 'as' => 'auditreport.getsecurityheightauditreportexport']);







	/*------------------Less Than 50 years----------------*/

	Route::get('/auditsecurity/a15', ['uses' => 'AuditReportsController@securitya15' , 'laroute' => true])->name('securitya15');



	Route::get('getsecurityage50auditreports', ['uses' => 'AuditReportsController@getsecurityage50auditreports', 'as' => 'auditreport.getsecurityage50auditreports']);

	

	Route::get('getsecage50Auditreportexport', ['uses' => 'AuditReportsController@getsecage50Auditreportexport', 'as' => 'auditreport.getsecage50Auditreportexport']);







	/*------------------Less Than 20 years----------------*/

	Route::get('/auditsecurity/a16', ['uses' => 'AuditReportsController@securitya16' , 'laroute' => true])->name('securitya16');



	Route::get('getsecurityage20auditreports', ['uses' => 'AuditReportsController@getsecurityage20auditreports', 'as' => 'auditreport.getsecurityage20auditreports']);

	

	Route::get('getsecage20Auditreportexport', ['uses' => 'AuditReportsController@getsecage20Auditreportexport', 'as' => 'auditreport.getsecage20Auditreportexport']);





	/*------------------Daily Beriefing Meeting----------------*/

	Route::get('/auditsecurity/a19', ['uses' => 'AuditReportsController@securitya19' , 'laroute' => true])->name('securitya19');



	Route::get('getsecuritydbmauditreports', ['uses' => 'AuditReportsController@getsecuritydbmauditreports', 'as' => 'auditreport.getsecuritydbmauditreports']);

	

	Route::get('getsecuritydbmauditreportexport', ['uses' => 'AuditReportsController@getsecuritydbmauditreportexport', 'as' => 'auditreport.getsecuritydbmauditreportexport']);







	







	//Route::get('/auditsecurity/a17', ['uses' => 'AuditReportsController@securitya17' , 'laroute' => true])->name('securitya17');

	Route::get('/auditsecurity/a18', ['uses' => 'AuditReportsController@securitya18' , 'laroute' => true])->name('securitya18');

	Route::get('/auditsecurity/a19', ['uses' => 'AuditReportsController@securitya19' , 'laroute' => true])->name('securitya19');

	Route::get('/auditsecurity/a20', ['uses' => 'AuditReportsController@securitya20' , 'laroute' => true])->name('securitya20');

	Route::get('/auditsecurity/a21', ['uses' => 'AuditReportsController@securitya21' , 'laroute' => true])->name('securitya21');

	Route::get('/auditsecurity/a22', ['uses' => 'AuditReportsController@securitya22' , 'laroute' => true])->name('securitya22');

	Route::get('/auditsecurity/a23', ['uses' => 'AuditReportsController@securitya23' , 'laroute' => true])->name('securitya23');

	Route::get('/auditsecurity/a24', ['uses' => 'AuditReportsController@securitya24' , 'laroute' => true])->name('securitya24');

	// END GET AUDIT REPORTS

	  

	      

	

	/* END DOWNLOAD DAILY REPORTS*/

  

	

   

	



	Route::get('/getdailyreportview/{id}', ['uses' => 'DailyReportsDetailController@viewdetailpage' , 'laroute' => true])->name('viewpage');



	

 

	Route::get('/getdailyreportviewdetail/{id}/{dateval}', ['uses' => 'DailyReportsDetailController@detailviewdetailpage' , 'laroute' => true])->name('viewpage');



	Route::get('/getdailyreportpmsviewdetail/{id}/{dateval}', ['uses' => 'DailyReportsDetailController@detailviewpmsdetailpage' , 'laroute' => true])->name('viewpage');



	Route::get('/getdailyreportfiresafeviewdetail/{id}/{dateval}', ['uses' => 'DailyReportsDetailController@detailviewfiresafedetailpage' , 'laroute' => true])->name('viewpage');



	Route::get('/getdailyreportsecurityviewdetail/{id}/{dateval}', ['uses' => 'DailyReportsDetailController@detailviewsecuritydetailpage' , 'laroute' => true])->name('viewpage');



   Route::get('/getdailyreporthortiviewdetail/{id}/{dateval}', ['uses' => 'DailyReportsDetailController@detailviewhortidetailpage' , 'laroute' => true])->name('viewpage');
	



     //Route::resource('/users/ajaxupdate/', ['uses' => 'UsersController@getcommunity' , 'laroute' => true])->name('getcommunity');



	 



	 Route::get('/userscreateemp/updation/{community}/{empid}', ['uses' => 'UsersController@create' , 'laroute' => true])->name('viewempdetail');	



	



	Route::get('/userscreate/{id}', ['uses' => 'UsersController@create' , 'laroute' => true])->name('viewpage');

	

	

	Route::get('/userscreateempedit/updation/{userid}/{community}/{empid}', ['uses' => 'UsersController@edit' , 'laroute' => true])->name('viewempdetail');	



	 



	Route::get('/usersedit/{userid}/{id}', ['uses' => 'UsersController@edit' , 'laroute' => true])->name('viewpage');



	



	Route::get('/getdailyreportdetaildate/{id}/{date}', ['uses' => 'DailyReportsController@getformdata' , 'laroute' => true])->name('fromdata');



	



	Route::get('/getdailyreportfiresafedetaildate/{id}/{date}', ['uses' => 'DailyReportsController@getfiresafeformdata' , 'laroute' => true])->name('fromdata');



	



	Route::get('/getpmsdailyreportdetaildate/{id}/{date}', ['uses' => 'DailyReportsController@getpmsformdata' , 'laroute' => true])->name('fmsfromdata');



	



	Route::get('/getsecuritydailyreportdetaildate/{id}/{date}', ['uses' => 'DailyReportsController@getsecurityformdata' , 'laroute' => true])->name('fmsfromdata');



	 



	



	Route::post('storepms', ['uses' => 'DailyReportsController@storepms', 'as' => 'dailyreports.storepms']);
	
	Route::post('storehorti', ['uses' => 'DailyReportsController@storehorti', 'as' => 'dailyreports.storehorti']);
	
	
	Route::post('rideonpms', ['uses' => 'DailyReportsController@rideonpms', 'as' => 'dailyreports.rideonpms']);

	

	Route::post('storedailylock', ['uses' => 'DailyReportsController@storedailylock', 'as' => 'dailyreports.storedailylock']);



	Route::post('storefiresafe', ['uses' => 'DailyReportsController@storefiresafe', 'as' => 'dailyreports.storefiresafe']);

	
	Route::post('snagreportedit', ['uses' => 'AuditReportsController@snagreportedit', 'as' => 'misreports.snagreportedit']);

	Route::post('storesnag', ['uses' => 'AuditReportsController@storesnag', 'as' => 'misreports.storesnag']);
	
	Route::post('submitsnag', ['uses' => 'AuditReportsController@submitsnag', 'as' => 'misreports.submitsnag']);
	
	Route::post('submitsore', ['uses' => 'AuditReportsController@submitsore', 'as' => 'eyesore.submitsore']);
	
	
	Route::get('getsnagreportcreate', ['uses' => 'AuditReportsController@getsnagreportcreate', 'as' => 'auditreport.getsnagreportcreate']);
	
	Route::get('geteyesorecreate', ['uses' => 'AuditReportsController@geteyesorecreate', 'as' => 'auditreport.geteyesorecreate']);



	Route::post('storesecurity', ['uses' => 'DailyReportsController@storesecurity', 'as' => 'dailyreports.storesecurity']);

	

	

	// STORE MIS

	

	Route::post('storeoccupancy', ['uses' => 'MisReportsController@storeoccupancy', 'as' => 'misreports.storeoccupancy']);

	

	Route::post('storecmd', ['uses' => 'MisReportsController@storecmd', 'as' => 'misreports.storecmd']);

	

	Route::post('storeclubhouse', ['uses' => 'MisReportsController@storeclubhouse', 'as' => 'misreports.storeclubhouse']);

	

	Route::post('storemetrowater', ['uses' => 'MisReportsController@storemetrowater', 'as' => 'misreports.storemetrowater']);

	

	Route::post('storewaterconsump', ['uses' => 'MisReportsController@storewaterconsump', 'as' => 'misreports.storewaterconsump']);
	
	
	Route::post('storeflushconsump', ['uses' => 'MisReportsController@storeflushconsump', 'as' => 'misreports.storeflushconsump']);

	

	Route::post('storeborewellnw', ['uses' => 'MisReportsController@storeborewellnw', 'as' => 'misreports.storeborewellnw']);
	
	
	Route::post('storeflush', ['uses' => 'MisReportsController@storeflush', 'as' => 'misreports.storeflush']);
	

	Route::post('storemisfiresafe', ['uses' => 'MisReportsController@storemisfiresafe', 'as' => 'misreports.storemisfiresafe']);
	
	
	
	
	
	Route::post('storenocfiresafe', ['uses' => 'MisReportsController@storenocfiresafe', 'as' => 'misreports.storenocfiresafe']);

	

	Route::post('storemisequipment', ['uses' => 'MisReportsController@storemisequipment', 'as' => 'misreports.storemisequipment']);

	

	Route::post('storemisstp', ['uses' => 'MisReportsController@storemisstp', 'as' => 'misreports.storemisstp']);

	

	Route::post('storemiswsp', ['uses' => 'MisReportsController@storemiswsp', 'as' => 'misreports.storemiswsp']);



	

	Route::post('storemissecurity', ['uses' => 'MisReportsController@storemissecurity', 'as' => 'misreports.storemissecurity']);

	

	Route::post('storemishousekp', ['uses' => 'MisReportsController@storemishousekp', 'as' => 'misreports.storemishousekp']);

	

	Route::post('storemishorticulture', ['uses' => 'MisReportsController@storemishorticulture', 'as' => 'misreports.storemishorticulture']);

	

	

	

	

	Route::post('storemistraffic', ['uses' => 'MisReportsController@storemistraffic', 'as' => 'misreports.storemistraffic']);

	

	

	Route::post('storemisallsite', ['uses' => 'MisReportsController@storemisallsites', 'as' => 'misreports.storemisallsite']);
	

	// STORE PROGRESS REPORTS

	

	Route::post('storeprogresspower', ['uses' => 'ProgressReportsController@storeprogresspower', 'as' => 'progressreports.storeprogresspower']);

	

	Route::get('dieselreport', ['uses' => 'ProgressReportsController@getdieselreportsview']); 

	  

	Route::get('valid', ['uses' => 'ValidationController@valid', 'as' => 'validation.valid']);



	Route::get('mocdelete', ['uses' => 'ValidationController@mockDrillDelete', 'as' => 'validation.mocdelete']);  
	
	Route::get('mockdrillupdate', ['uses' => 'ValidationController@mockdrillupdate', 'as' => 'validation.mockdrillupdate']); 

	
	Route::get('preparedelete', ['uses' => 'ValidationController@prepareDelete', 'as' => 'validation.preparedelete']);  
	
	
	Route::get('prepareupdate', ['uses' => 'ValidationController@prepareupdate', 'as' => 'validation.prepareupdate']);  
	

	Route::get('getindentrequest', ['uses' => 'IndentsController@getindentrequest', 'as' => 'indents.getindentrequest']); 

	

	Route::get('updateindentrequest', ['uses' => 'IndentsController@updateindentrequest', 'as' => 'indents.updateindentrequest']);  



	Route::get('checkstatus', ['uses' => 'ValidationController@checkstatus', 'as' => 'validation.checkstatus']); 

	

	Route::get('checkdailystatus', ['uses' => 'ValidationController@checkdailystatus', 'as' => 'validation.checkdailystatus']);

	

	Route::get('checkmisstatusreports', ['uses' => 'ValidationController@checkmisstatusreports', 'as' => 'validation.checkmisstatusreports']);	

	

	Route::get('checkmmrstatusreports', ['uses' => 'ValidationController@checkmmrstatusreports', 'as' => 'validation.checkmmrstatusreports']);

	

	//AUDIT REPORTS

	

    Route::get('getctptauditreports', ['uses' => 'AuditReportsController@getctptauditreports', 'as' => 'auditreport.getctptauditreports']);



    Route::get('getfmsctptauditreportexport', ['uses' => 'AuditReportsController@getfmsctptauditreportexport', 'as' => 'auditreport.getfmsctptauditreportexport']);





    Route::get('getfmssludgeauditreports', ['uses' => 'AuditReportsController@getfmssludgeauditreports', 'as' => 'auditreport.getfmssludgeauditreports']);



    Route::get('getfmssludgeauditreportexport', ['uses' => 'AuditReportsController@getfmssludgeauditreportexport', 'as' => 'auditreport.getfmssludgeauditreportexport']);







	Route::get('getfmsltauditreports', ['uses' => 'AuditReportsController@getfmsltauditreports', 'as' => 'auditreport.getfmsltauditreports']);

	Route::get('getfmskvaauditreports', ['uses' => 'AuditReportsController@getfmskvaauditreports', 'as' => 'auditreport.getfmskvaauditreports']);

	Route::get('getfmskvaauditreportexport', ['uses' => 'AuditReportsController@getfmskvaauditreportexport', 'as' => 'auditreport.getfmskvaauditreportexport']);

	Route::get('getfmspwrfauditreportexport', ['uses' => 'AuditReportsController@getfmspwrfauditreportexport', 'as' => 'auditreport.getfmspwrfauditreportexport']);

	

	Route::get('getfmspwrfauditreports', ['uses' => 'AuditReportsController@getfmspwrfauditreports', 'as' => 'auditreport.getfmspwrfauditreports']);

	

	

	Route::get('getfmsmlssfauditreports', ['uses' => 'AuditReportsController@getfmsmlssfauditreports', 'as' => 'auditreport.getfmsmlssfauditreports']);

	Route::get('getfmsmlssfauditreportexport', ['uses' => 'AuditReportsController@getfmsmlssfauditreportexport', 'as' => 'auditreport.getfmsmlssfauditreportexport']);

	

	

	Route::get('getfmspwrtwauditreports', ['uses' => 'AuditReportsController@getfmspwrtwauditreports', 'as' => 'auditreport.getfmspwrtwauditreports']);

	Route::get('getfmspwrrwauditreports', ['uses' => 'AuditReportsController@getfmspwrrwauditreports', 'as' => 'auditreport.getfmspwrrwauditreports']);

	Route::get('getfmsbnwauditreports', ['uses' => 'AuditReportsController@getfmsbnwauditreports', 'as' => 'auditreport.getfmsbnwauditreports']);

	Route::get('getfmsbnwauditreportexport', ['uses' => 'AuditReportsController@getfmsbnwauditreportexport', 'as' => 'auditreport.getfmsbnwauditreportexport']);



	Route::get('getfmsliftauditreports', ['uses' => 'AuditReportsController@getfmsliftauditreports', 'as' => 'auditreport.getfmsliftauditreports']);

	Route::get('getfmsliftauditreportexport', ['uses' => 'AuditReportsController@getfmsliftauditreportexport', 'as' => 'auditreport.getfmsliftauditreportexport']);

	

	Route::get('getfmssfnwauditreports', ['uses' => 'AuditReportsController@getfmssfnwauditreports', 'as' => 'auditreport.getfmssfnwauditreports']);

	Route::get('getfmssfnwauditreportexport', ['uses' => 'AuditReportsController@getfmssfnwauditreportexport', 'as' => 'auditreport.getfmssfnwauditreportexport']);

	

	Route::get('getfmsborewellsauditreports', ['uses' => 'AuditReportsController@getfmsborewellsauditreports', 'as' => 'auditreport.getfmsborewellsauditreports']);

	Route::get('getfmsdgsetsauditreports', ['uses' => 'AuditReportsController@getfmsdgsetsauditreports', 'as' => 'auditreport.getfmsdgsetsauditreports']);

	

	

	Route::get('getfmstwauditreports', ['uses' => 'AuditReportsController@getfmstwauditreports', 'as' => 'auditreport.getfmstwauditreports']);

	Route::get('getfmstwauditreportexport', ['uses' => 'AuditReportsController@getfmstwauditreportexport', 'as' => 'auditreport.getfmstwauditreportexport']);
	
	
	
	Route::get('getfmspcauditreports', ['uses' => 'AuditReportsController@getfmspcauditreports', 'as' => 'auditreport.getfmspcauditreports']);

	Route::get('getfmspcauditreportexport', ['uses' => 'AuditReportsController@getfmspcauditreportexport', 'as' => 'auditreport.getfmspcauditreportexport']);

	

	

	Route::get('getfmsdsnwauditreports', ['uses' => 'AuditReportsController@getfmsdsnwauditreports', 'as' => 'auditreport.getfmsdsnwauditreports']);

	Route::get('getfmsdsnwauditreportexport', ['uses' => 'AuditReportsController@getfmsdsnwauditreportexport', 'as' => 'auditreport.getfmsdsnwauditreportexport']);

	

	

	Route::get('getfmsfrcauditreports', ['uses' => 'AuditReportsController@getfmsfrcauditreports', 'as' => 'auditreport.getfmsfrcauditreports']);

	Route::get('getfmsfrcauditreportexport', ['uses' => 'AuditReportsController@getfmsfrcauditreportexport', 'as' => 'auditreport.getfmsfrcauditreportexport']);

	

	

	Route::get('getfmssppauditreports', ['uses' => 'AuditReportsController@getfmssppauditreports', 'as' => 'auditreport.getfmssppauditreports']);

	Route::get('getfmssppauditreportexport', ['uses' => 'AuditReportsController@getfmssppauditreportexport', 'as' => 'auditreport.getfmssppauditreportexport']);

	

	

	Route::get('getfmsisaauditreports', ['uses' => 'AuditReportsController@getfmsisaauditreports', 'as' => 'auditreport.getfmsisaauditreports']);

	Route::get('getfmsisaauditreportexport', ['uses' => 'AuditReportsController@getfmsisaauditreportexport', 'as' => 'auditreport.getfmsisaauditreportexport']);

	

	

	Route::get('getfmsppmtwauditreports', ['uses' => 'AuditReportsController@getfmsppmtwauditreports', 'as' => 'auditreport.getfmsppmtwauditreports']);

	Route::get('getfmsppmtwauditreportexport', ['uses' => 'AuditReportsController@getfmsppmtwauditreportexport', 'as' => 'auditreport.getfmsppmtwauditreportexport']);

	

	

	Route::get('getfmsppmrwauditreports', ['uses' => 'AuditReportsController@getfmsppmrwauditreports', 'as' => 'auditreport.getfmsppmrwauditreports']);

	Route::get('getfmsppmrwauditreportexport', ['uses' => 'AuditReportsController@getfmsppmrwauditreportexport', 'as' => 'auditreport.getfmsppmrwauditreportexport']);

	

	

	Route::get('getfmshodauditreports', ['uses' => 'AuditReportsController@getfmshodauditreports', 'as' => 'auditreport.getfmshodauditreports']);

	Route::get('getfmshodauditreportexport', ['uses' => 'AuditReportsController@getfmshodauditreportexport', 'as' => 'auditreport.getfmshodauditreportexport']);

	

	

	

	Route::get('getfmsdarauditreports', ['uses' => 'AuditReportsController@getfmsdarauditreports', 'as' => 'auditreport.getfmsdarauditreports']);

	Route::get('getfmsdarauditreportsexport', ['uses' => 'AuditReportsController@getfmsdarauditreportsexport', 'as' => 'auditreport.getfmsdarauditreportsexport']);

	Route::get('getpmsdarauditreportsexport', ['uses' => 'AuditReportsController@getpmsdarauditreportsexport', 'as' => 'auditreport.getpmsdarauditreportsexport']);

	Route::get('getpmsctptauditreportexport', ['uses' => 'AuditReportsController@getpmsctptauditreportexport', 'as' => 'auditreport.getpmsctptauditreportexport']);

	

	

	Route::get('getpmsdarauditreportsexport', ['uses' => 'AuditReportsController@getpmsdarauditreportsexport', 'as' => 'auditreport.getpmsdarauditreportsexport']);





	Route::get('getsecage20auditreportsexport', ['uses' => 'AuditReportsController@getsecage20auditreportsexport', 'as' => 'auditreport.getsecage20auditreportsexport']);





	Route::get('getcleaningauditreportsexport', ['uses' => 'AuditReportsController@getcleaningauditreportsexport', 'as' => 'auditreport.getcleaningauditreportsexport']);

	

	

	

	Route::get('getgarbageauditreports', ['uses' => 'AuditReportsController@getgarbageauditreports', 'as' => 'auditreport.getgarbageauditreports']);

	Route::get('getgarbageauditreportsexport', ['uses' => 'AuditReportsController@getgarbageauditreportsexport', 'as' => 'auditreport.getgarbageauditreportsexport']);

	

	

	Route::get('getrideauditreports', ['uses' => 'AuditReportsController@getrideauditreports', 'as' => 'auditreport.getrideauditreports']);

	Route::get('getrideauditreportsexport', ['uses' => 'AuditReportsController@getrideauditreportsexport', 'as' => 'auditreport.getrideauditreportsexport']);

	 

	Route::get('getchuserauditreports', ['uses' => 'AuditReportsController@getchuserauditreports', 'as' => 'auditreport.getchuserauditreports']);

	Route::get('getchuserauditreportsexport', ['uses' => 'AuditReportsController@getchuserauditreportsexport', 'as' => 'auditreport.getchuserauditreportsexport']);

	

	Route::get('getchusermtdauditreports', ['uses' => 'AuditReportsController@getchusermtdauditreports', 'as' => 'auditreport.getchusermtdauditreports']);

	Route::get('getchusermtdauditreportsexport', ['uses' => 'AuditReportsController@getchusermtdauditreportsexport', 'as' => 'auditreport.getchusermtdauditreportsexport']);

	

	Route::get('getoccupancyauditreports', ['uses' => 'AuditReportsController@getoccupancyauditreports', 'as' => 'auditreport.getoccupancyauditreports']);

	Route::get('getoccupancyauditreportsexport', ['uses' => 'AuditReportsController@getoccupancyauditreportsexport', 'as' => 'auditreport.getoccupancyauditreportsexport']);

	

	Route::get('getpmsdarauditreports', ['uses' => 'AuditReportsController@getpmsdarauditreports', 'as' => 'auditreport.getpmsdarauditreports']);



	Route::get('getsecdarauditreports', ['uses' => 'AuditReportsController@getsecdarauditreports', 'as' => 'auditreport.getsecdarauditreports']);



	Route::get('getsecage20auditreports', ['uses' => 'AuditReportsController@getsecage20auditreports', 'as' => 'auditreport.getsecage20auditreports']);

	

	

	Route::get('getpmssuphelpauditreports', ['uses' => 'AuditReportsController@getpmssuphelpauditreports', 'as' => 'auditreport.getpmssuphelpauditreports']);

	

	Route::get('getpmswaterauditreports', ['uses' => 'AuditReportsController@getpmswaterauditreports', 'as' => 'auditreport.getpmswaterauditreports']);

	

	Route::get('getpmschasuphelpauditreports', ['uses' => 'AuditReportsController@getpmschasuphelpauditreports', 'as' => 'auditreport.getpmschasuphelpauditreports']);

	

	Route::get('getpmschaauditreportexport', ['uses' => 'AuditReportsController@getpmschaauditreportexport', 'as' => 'auditreport.getpmschaauditreportexport']);

	

	

	Route::get('getpmshousekeepingsuphelpauditreports', ['uses' => 'AuditReportsController@getpmshousekeepingsuphelpauditreports', 'as' => 'auditreport.getpmshousekeepingsuphelpauditreports']);

	

	Route::get('getpmshousekeepingsuphelpauditreportexport', ['uses' => 'AuditReportsController@getpmshousekeepingsuphelpauditreportexport', 'as' => 'auditreport.getpmshousekeepingsuphelpauditreportexport']);

	

	

	Route::get('getpmswaterauditreportexport', ['uses' => 'AuditReportsController@getpmswaterauditreportexport', 'as' => 'auditreport.getpmswaterauditreportexport']);

	

	Route::get('getpmscleanauditreports', ['uses' => 'AuditReportsController@getpmscleanauditreports', 'as' => 'auditreport.getpmscleanauditreports']);

	

	Route::get('getpmssparyingauditreports', ['uses' => 'AuditReportsController@getpmssparyingauditreports', 'as' => 'auditreport.getpmssparyingauditreports']);

	

	Route::get('getpmscmdrmdreports', ['uses' => 'AuditReportsController@getpmscmdrmdreports', 'as' => 'auditreport.getpmscmdrmdreports']);

	

	Route::get('getpowervalues', ['uses' => 'AuditReportsController@getpowervalues', 'as' => 'auditreport.getpowervalues']);

	Route::get('getpowerauditreportsexport', ['uses' => 'AuditReportsController@getpowerauditreportsexport', 'as' => 'auditreport.getpowerauditreportsexport']);







	

	

	  

	Route::get('getdailymonthstatus', ['uses' => 'ValidationController@getdailymonthstatus', 'as' => 'validation.getdailymonthstatus']);  

	

	Route::get('getsitedashboard', ['uses' => 'ValidationController@getsitedashboard', 'as' => 'validation.getsitedashboard']);  

	

	// MIS CHECK STATUS

	 

	Route::get('checkmisstatus', ['uses' => 'ValidationController@checkmisstatus', 'as' => 'validation.checkmisstatus']);

	

	

	

	

	

	// ADVANCED REPORTS

	

	Route::get('getadvanceReports', ['uses' => 'ValidationController@getadvanceReports', 'as' => 'validation.getadvanceReports']);

	

	Route::get('getadvanceprintReports', ['uses' => 'ValidationController@getadvanceprintReports', 'as' => 'validation.getadvanceprintReports']);

	

	Route::get('getjcardprint', ['uses' => 'TopicsController@getjcardprint', 'as' => 'topics.jcardprint']);

	

	Route::get('getjcarddownload', ['uses' => 'TopicsController@getjcarddownload', 'as' => 'topics.pdfReport']);

	

	

	Route::get('getbreakdownprint', ['uses' => 'TopicsController@getbreakdownprint', 'as' => 'topics.breakdownprint']);	

	Route::get('getbreakdowndownload', ['uses' => 'TopicsController@getbreakdowndownload', 'as' => 'topics.breakpdfReport']);

	

	

	Route::get('getincidentcardprint', ['uses' => 'TopicsController@getincidentcardprint', 'as' => 'topics.incidentprint']);	

	Route::get('getincidentdownload', ['uses' => 'TopicsController@getincidentdownload', 'as' => 'topics.incidentpdfReport']);

	

	

	

	

	Route::get('getadvancedownload', ['uses' => 'ValidationController@getadvancedownload', 'as' => 'validation.getadvancedownload']);

	

	Route::get('getdailyadvancedownload', ['uses' => 'ValidationController@getdailyadvancedownload', 'as' => 'validation.getdailyadvancedownload']);

	

	

	// MIS GET AJAX VALUES

	

	Route::get('getmsvalues', ['uses' => 'ValidationController@getmsvalues', 'as' => 'validation.getmsvalues']); 

	

	Route::get('getcmdvalues', ['uses' => 'ValidationController@getcmdvalues', 'as' => 'validation.getcmdvalues']); 

	

	Route::get('getclubhousemsvalues', ['uses' => 'ValidationController@getclubhousemsvalues', 'as' => 'validation.getclubhousemsvalues']);

	

	Route::get('getbrnwmsvalues', ['uses' => 'ValidationController@getbrnwmsvalues', 'as' => 'validation.getbrnwmsvalues']); 
	
	Route::get('getflushmsvalues', ['uses' => 'ValidationController@getflushmsvalues', 'as' => 'validation.getflushmsvalues']); 

	

	Route::get('getwaterconsump', ['uses' => 'ValidationController@getwaterconsump', 'as' => 'validation.getwaterconsump']); 

	

	Route::get('getfiresafemsvalues', ['uses' => 'ValidationController@getfiresafemsvalues', 'as' => 'validation.getfiresafemsvalues']); 
	
	
	Route::get('getbloacksforsite', ['uses' => 'HorticultureController@getbloacksforsite', 'as' => 'horticultures.getbloacksforsite']); 
	
	Route::get('gethoslocations', ['uses' => 'HorticultureController@gethoslocations', 'as' => 'horticultures.gethoslocations']); 

	

	Route::get('getequipmentmisvalues', ['uses' => 'ValidationController@getequipmentmisvalues', 'as' => 'validation.getequipmentmisvalues']); 

	

	Route::get('getstpmsvalues', ['uses' => 'ValidationController@getstpmsvalues', 'as' => 'validation.getstpmsvalues']); 

	

	Route::get('gettrafficvalues', ['uses' => 'ValidationController@gettrafficvalues', 'as' => 'validation.gettrafficvalues']); 

	

    Route::get('getwspmsvalues', ['uses' => 'ValidationController@getwspmsvalues', 'as' => 'validation.getwspmsvalues']); 

	

	Route::get('getsecuritymsvalues', ['uses' => 'ValidationController@getsecuritymsvalues', 'as' => 'validation.getsecuritymsvalues']); 

	

	Route::get('gethousekpmisvalues', ['uses' => 'ValidationController@gethousekpmisvalues', 'as' => 'validation.gethousekpmisvalues']);

	

	Route::get('gethorticulturemsvalues', ['uses' => 'ValidationController@gethorticulturemsvalues', 'as' => 'validation.gethorticulturemsvalues']); 

	

	Route::get('getindentviewexport', ['uses' => 'ValidationController@getindentviewexport', 'as' => 'validation.getindentviewexport']); 

	

	Route::get('getapnacomptviewexport', ['uses' => 'ValidationController@getapnacomptviewexport', 'as' => 'validation.getapnacomptviewexport']); 

	

	Route::get('getmockdrillexport', ['uses' => 'ValidationController@getmockdrillexport', 'as' => 'validation.getmockdrillexport']); 

	

	Route::get('getprepareexport', ['uses' => 'ValidationController@getprepareexport', 'as' => 'validation.getprepareexport']); 
	
	
	Route::get('getfiresafecount', ['uses' => 'ValidationController@getfiresafecount', 'as' => 'validation.getfiresafecount']); 
	
	Route::get('getmockdrillcount', ['uses' => 'ValidationController@getmockdrillcount', 'as' => 'validation.getmockdrillcount']); 

	Route::get('getsiteslection', ['uses' => 'ValidationController@getsiteslection', 'as' => 'validation.getsiteslection']); 

	

	// GET PROGRESS AJAX VALUES

	Route::get('getpropowervalues', ['uses' => 'ValidationController@getpropowervalues', 'as' => 'validation.getpropowervalues']); 

	//Route::get('getdailydieselrpts', ['uses' => 'ProgressReportsController@getdailydieselreports', 'as' => 'progressreports.getdailydieselreports']);

	Route::get('getdailydieselrpts', ['uses' => 'ValidationController@getdailydieselreports', 'as' => 'validation.getdailydieselreports']);

	

	

	Route::get('getdgsetsites', ['uses' => 'ValidationController@getdgsetsites', 'as' => 'validation.getdgsetsites']);

	

	

	

	// REFINE SEARCH FOR ATTENDANCE

	 Route::get('getsearchres', ['uses' => 'AttendanceController@getsearchres', 'as' => 'attendance.getsearchres']); 

	 

	  Route::get('gettrackres', ['uses' => 'AttendanceController@gettrackres', 'as' => 'attendance.gettrackres']); 

	

 

     //ATTENDANCE SCAN SEARCH 

	 Route::get('getscansearchres', ['uses' => 'AttendanceController@getscansearchres', 'as' => 'attendance.getscansearchres']); 

	 

	  Route::get('getpopupres', ['uses' => 'AttendanceController@getpopupres', 'as' => 'attendance.getpopupres']); 

	   Route::get('getpopupabres', ['uses' => 'AttendanceController@getpopupabres', 'as' => 'attendance.getpopupabres']); 

	   Route::get('getnotenteredres', ['uses' => 'AttendanceController@getnotenteredres', 'as' => 'attendance.getnotenteredres']); 

	   

	      

	

	Route::post('saveuploadfile', ['uses' => 'UploadexcelController@saveuploadfile', 'as' => 'uploadexcel.saveuploadfile']);

	

	Route::post('saveapnauploadfile', ['uses' => 'UploadexcelController@saveapnauploadfile', 'as' => 'uploadexcel.saveapnauploadfile']);

	

	Route::post('saveamctrackuploadfile', ['uses' => 'UploadexcelController@saveamctrackuploadfile', 'as' => 'uploadexcel.saveamctrackuploadfile']);

	

	Route::post('savemockdrill', ['uses' => 'UploadexcelController@savemockdrill', 'as' => 'uploadexcel.savemockdrill']);

	

	Route::post('savefireprepare', ['uses' => 'UploadexcelController@savefireprepare', 'as' => 'uploadexcel.savefireprepare']);

	

	Route::post('saveattendance', ['uses' => 'AttendanceController@saveuploadfile', 'as' => 'attendance.saveattendance']);

	

	//MMR SLA SAVING

	Route::post('saveslaupload', ['uses' => 'UploadexcelController@saveslaupload', 'as' => 'uploadexcel.saveslaupload']);
	
	Route::post('savehskupload', ['uses' => 'UploadexcelController@savehskupload', 'as' => 'uploadexcel.savehskupload']);

	

	// SAVE CLUB HOUSE UPLOAD EXCEL

	

	Route::post('saveclubhouseuploadfile', ['uses' => 'UploadexcelController@saveclubhouseuploadfile', 'as' => 'uploadexcel.saveclubhouseuploadfile']);

	

	// SAVE HORTICULTURE UPLOAD FILE

	

   Route::post('savehorticultureuploadfile', ['uses' => 'UploadexcelController@savehorticultureuploadfile', 'as' => 'uploadexcel.savehorticultureuploadfile']);

   

   // SAVE HRM UPLOAD FILE

   

   Route::post('savehrmuploadfile', ['uses' => 'UploadexcelController@savehrmuploadfile', 'as' => 'uploadexcel.savehrmuploadfile']);

   

   // AUDIT APNA COMPLAINT REPORT

   

     Route::post('saveauditapnauploadfile', ['uses' => 'UploadexcelController@saveauditapnauploadfile', 'as' => 'uploadexcel.saveauditapnauploadfile']);

	 

   // UPLOAD PRETTY CASH DAILY

     Route::post('saveauditprettycashupload', ['uses' => 'UploadexcelController@saveauditprettycashupload', 'as' => 'uploadexcel.saveauditprettycashupload']);	 

	 Route::post('saveauditprettycashexpense', ['uses' => 'UploadexcelController@saveauditprettycashexpense', 'as' => 'uploadexcel.saveauditprettycashexpense']);	 

	

	// CLUB HOUSE RATECARD UPLOAD 

	  Route::post('saveauditchratecard', ['uses' => 'UploadexcelController@saveauditchratecard', 'as' => 'uploadexcel.saveauditchratecard']);

	

	

	// IMPORT CONTROLLER

	Route::post('saveitemsuploadfile', ['uses' => 'UploadexcelController@saveitemsuploadfile', 'as' => 'uploadexcel.saveitemsuploadfile']);
	
	
	Route::post('savesnaguploadfile', ['uses' => 'UploadexcelController@savesnaguploadfile', 'as' => 'uploadexcel.savesnaguploadfile']);

	 

	

	



	Route::get('validtotpms', ['uses' => 'ValidationController@validtotpms', 'as' => 'validation.validtotpms']); 



	 



	Route::get('validtotfiresafe', ['uses' => 'ValidationController@validtotfiresafe', 'as' => 'validation.validtotfiresafe']); 



	Route::get('securityvalid', ['uses' => 'ValidationController@securityvalid', 'as' => 'validation.securityvalid']); 



	//Asset Templates	

	Route::get('asset-templates/import', ['uses' => 'AssetTemplateController@assetTemplateimport', 'as' => 'asset-templates.import']);

	Route::post('asset-templates/import', ['uses' => 'AssetTemplateController@assetTemplateimport', 'as' => 'asset-templates.eimport']);

	Route::resource('asset-templates', 'AssetTemplateController');

	Route::post('asset-templates-mass-destroy', ['uses' => 'AssetTemplateController@massDestroy', 'as' => 'asset-templates.mass_destroy']);

	Route::post('asset-templates-section-save', ['uses' => 'AssetTemplateController@savesection', 'as' => 'asset-templates.savesection']);

	Route::get('asset-templates/view/{id}', ['uses' => 'AssetTemplateController@view', 'as' => 'asset-templates.view' ]);	

	//end of Asset Templates



	//Attachments

	Route::resource('attachments', 'AttachmentController');

	Route::post('attachments/delete', ['uses' => 'AttachmentController@delattach', 'as' => 'attachments.delete']);
	
	Route::get('fileupload', 'AuditReportsController@fileUpload');
	Route::post('fileupload', 'AuditReportsController@fileStore');
	
	Route::get('rfileupload', 'AuditReportsController@rfileUpload');
	Route::post('rfileupload', 'AuditReportsController@rfileStore');



	//Community Assets

	Route::get('commassets/import', ['uses' => 'CommunityAssetsController@assetTemplateimport', 'as' => 'commassets.import']);

	Route::post('commassets/import', ['uses' => 'CommunityAssetsController@assetTemplateimport', 'as' => 'commassets.eimport']);
	
	Route::get('commassets/maintenance', ['uses' => 'CommunityAssetsController@assetTemplatemaintenance', 'as' => 'commassets.maintenance']);
	
	Route::get('aparnaassets/maintenance', ['uses' => 'AparnaAssetsController@assetTemplatemaintenance', 'as' => 'aparnaassets.maintenance']);
	
	Route::get('commassets/alertemails', ['uses' => 'CommunityAssetsController@assetAlertEmails', 'as' => 'commassets.alertemails']);
	
	Route::get('commassets/alertsms', ['uses' => 'CommunityAssetsController@assetSMS', 'as' => 'commassets.alertsms']);
	
	
	Route::get('commassets/maintenanceupdate', ['uses' => 'CommunityAssetsController@assetTemplatemaintenanceupdate', 'as' => 'commassets.maintenanceupdate']);
	
	Route::get('aparnaassets/maintenanceupdate', ['uses' => 'AparnaAssetsController@assetTemplatemaintenanceupdate', 'as' => 'aparnaassets.maintenanceupdate']);
	
	Route::get('commassets/cassetedit', ['uses' => 'CommunityAssetsController@communityassetTemplateedit', 'as' => 'commassets.cassetedit']);
	
	Route::get('aparnaassets/cassetedit', ['uses' => 'AparnaAssetsController@aparnaassetTemplateedit', 'as' => 'aparnaassets.cassetedit']);

	Route::resource('commassets', 'CommunityAssetsController');
	
	Route::resource('aparnaassets', 'AparnaAssetsController');
	
	Route::get('aparnaassets/import', ['uses' => 'AparnaAssetsController@assetTemplateimport', 'as' => 'aparnaassets.import']);

	Route::post('aparnaassets/import', ['uses' => 'AparnaAssetsController@assetTemplateimport', 'as' => 'aparnaassets.eimport']);
	
	

	Route::resource('otherassets', 'OtherAssetsController');

	Route::post('commassets-mass-destroy', ['uses' => 'CommunityAssetsController@massDestroy', 'as' => 'commassets.mass_destroy']);
	
	Route::post('aparnaassets-mass-destroy', ['uses' => 'AparnaAssetsController@massDestroy', 'as' => 'aparnaassets.mass_destroy']);

	Route::get('communityassets/report', ['uses' => 'CommunityAssetsController@assetReport', 'as' => 'commassets.report' ]);
	
	

	Route::get('aparnaassets/report', ['uses' => 'AparnaAssetsController@assetReport', 'as' => 'aparnaassets.report' ]);

	

	

	// COMMUNITY ASSETS  VIEW BREAKDOWN

	Route::get('communityassets/breakdown/{id}/edit', ['uses' => 'CommunityAssetsController@breakdownEdit', 'as' => 'commbreakdown.edit' ]);	
	Route::get('acommunityassets/breakdown/{id}/edit', ['uses' => 'AparnaAssetsController@breakdownEdit', 'as' => 'acommbreakdown.edit' ]);

	Route::get('communityassets/incident/{id}/edit', ['uses' => 'CommunityAssetsController@incidentEdit', 'as' => 'commincident.edit' ]);
	Route::get('acommunityassets/incident/{id}/edit', ['uses' => 'AparnaAssetsController@incidentEdit', 'as' => 'acommincident.edit' ]);
	
	
	Route::post('acommunityassets/breakdown/save', ['uses' => 'AparnaAssetsController@breakdownSave', 'as' => 'acommbreakdown.save' ]);

	

	Route::post('communityassets/breakdown/save', ['uses' => 'CommunityAssetsController@breakdownSave', 'as' => 'commbreakdown.save' ]);
	Route::post('acommunityassets/breakdown/save', ['uses' => 'AparnaAssetsController@breakdownSave', 'as' => 'acommbreakdown.save' ]);

	

	Route::post('communityassets/incident/save', ['uses' => 'CommunityAssetsController@incidentSave', 'as' => 'commincident.save' ]);

	

	Route::get('communityassets/jobcard/{id}/edit', ['uses' => 'CommunityAssetsController@jobcardEdit', 'as' => 'commjobcard.edit' ]);
	Route::get('acommunityassets/jobcard/{id}/edit', ['uses' => 'AparnaAssetsController@jobcardEdit', 'as' => 'acommjobcard.edit' ]);

	

	Route::post('communityassets/jobcard/options', ['uses' => 'CommunityAssetsController@jobcardOptions' ]);

	

	Route::post('communityassets/jobcard/save', ['uses' => 'CommunityAssetsController@jobcardSave', 'as' => 'jcommobcard.save' ]);
	Route::post('acommunityassets/jobcard/save', ['uses' => 'AparnaAssetsController@jobcardSave', 'as' => 'jacommobcard.save' ]);

	

	

	//Reports : break downs, job cards, incident reports, 

	//Route::resource('reports', 'ReportsController');

	

	Route::get('topics/breakdown', ['uses' => 'TopicsController@breakdown' , 'as' => 'topics.breakdown' ]);

	Route::get('topics/breakdown/edit', ['uses' => 'TopicsController@breakdownEdit' ]);

	Route::get('topics/breakdown/{id}/edit', ['uses' => 'TopicsController@breakdownUpdate', 'as' => 'breakdown.edit' ]);

	Route::get('topics/breakdown/{id}/view', ['uses' => 'TopicsController@breakdownView', 'as' => 'breakdown.view' ]);	

	Route::post('topics/breakdown/save', ['uses' => 'TopicsController@breakdownSave', 'as' => 'breakdown.save' ]);

	Route::delete('topics/breakdown/delete/{id}', ['uses' => 'TopicsController@breakdownDelete', 'as' => 'breakdown.delete' ]);

	Route::get('topics/incident', ['uses' => 'TopicsController@incident' , 'as' => 'topics.incident']);

	Route::get('topics/incident/edit', ['uses' => 'TopicsController@incidentEdit' ]);	

	Route::get('topics/incident/{id}/edit', ['uses' => 'TopicsController@incidentUpdate', 'as' => 'incident.edit' ]);

	Route::get('topics/incident/{id}/view', ['uses' => 'TopicsController@incidentView', 'as' => 'incident.view' ]);	

	Route::post('topics/incident/save', ['uses' => 'TopicsController@incidentSave', 'as' => 'incident.save' ]);

	Route::delete('topics/incident/delete/{id}', ['uses' => 'TopicsController@incidentDelete', 'as' => 'incident.delete' ]);

	Route::get('topics/jobcard', ['uses' => 'TopicsController@jobcard' , 'as' => 'topics.jobcard']);

	Route::get('topics/jobcard/edit', ['uses' => 'TopicsController@jobcardEdit' ]);

	Route::get('topics/jobcard/{id}/edit', ['uses' => 'TopicsController@jobcardUpdate', 'as' => 'jobcard.edit' ]);

	Route::get('topics/jobcard/{id}/view', ['uses' => 'TopicsController@jobcardView', 'as' => 'jobcard.view' ]);	

	Route::post('topics/jobcard/save', ['uses' => 'TopicsController@jobcardSave', 'as' => 'jobcard.save' ]);

	Route::delete('topics/jobcard/delete/{id}', ['uses' => 'TopicsController@jobcardDelete', 'as' => 'jobcard.delete' ]);	

	Route::post('topics/jobcard/options', ['uses' => 'TopicsController@jobcardOptions' ]);

	Route::post('topics/jobcard/sites', ['uses' => 'TopicsController@jobcardSites' ]);

	Route::post('topics/incident/sites', ['uses' => 'TopicsController@incidentSites' ]);

	Route::post('topics/jobcard/employees', ['uses' => 'TopicsController@getJobcardUsers' ]);

	Route::post('topics/jobcard/items', ['uses' => 'TopicsController@getJobcardItems' ]);

	Route::post('topics/jobcard/assetemployees', ['uses' => 'TopicsController@getJobcardAssetUsers' ]);

	Route::get('topics/historycard', ['uses' => 'TopicsController@historycard', 'as' => 'historycard' ]);

	Route::delete('topics/historycard/delete/{id}', ['uses' => 'TopicsController@historycardDelete', 'as' => 'historycard.delete' ]);

	Route::post('historycard-mass-destroy', ['uses' => 'TopicsController@historycardmassDestroy', 'as' => 'historycard.mass_destroy']);

	Route::post('jobcard-mass-destroy', ['uses' => 'TopicsController@jobcard_massDestroy', 'as' => 'jobcard.mass_destroy']);

	Route::post('breakdown-mass-destroy', ['uses' => 'TopicsController@breakdown_massDestroy', 'as' => 'breakdown.mass_destroy']);

	Route::post('incident-mass-destroy', ['uses' => 'TopicsController@incident_massDestroy', 'as' => 'incident.mass_destroy']);	

	Route::post('topics/community-assets', ['uses' => 'TopicsController@getCommunityAssets' ]);



    Route::post('items/sucategories', ['uses' => 'ItemsController@getSubcategories' ]);

	

	Route::post('repository/sucategories', ['uses' => 'RepositoryController@getSubcategories' ]);

	

    Route::post('items/indentsucategories', ['uses' => 'ItemsController@getIndentSubcategories' ]);

	

	Route::post('items/indentinsucategories', ['uses' => 'ItemsController@getIndentInSubcategories' ]);

	

 

	

	

	 // LOCK PERMISSIONS

	 

/*	Route::get('/sentsms', ['uses' => 'DailyReportsController@sentsms' , 'laroute' => true])->name('dailyreports.sentsms');*/

	 

	Route::get('/lockpermission', ['uses' => 'DailyReportsController@lockpermission' , 'laroute' => true])->name('dailyreports.lockpermission');

	

	Route::get('/createlockpermission', ['uses' => 'DailyReportsController@createlockpermission' , 'laroute' => true])->name('dailyreports.createlockpermission');

	Route::post('storelockpermission', ['uses' => 'DailyReportsController@storelockpermission', 'as' => 'dailyreports.storelockpermission']);

	

	Route::post('mass_dailydestroy', ['uses' => 'DailyReportsController@massDailydestroy', 'as' => 'dailyreports.mass_dailydestroy']);

	

	

	Route::post('dailyreports_mass_approvepermission', ['uses' => 'IndentsController@massApprovepermission', 'as' => 'indents.mass_approvepermission']);
	
	Route::get('drlsystem', ['uses' => 'IndentsController@drlsystem', 'as' => 'indents.drlsystem']);

	

	Route::post('dailyreports_mass_destroy', ['uses' => 'DailyReportsController@massDestroy', 'as' => 'dailyreports.mass_destroy']);

	

	Route::post('dailyreports_mass_reject', ['uses' => 'IndentsController@massRejectpermission', 'as' => 'indents.mass_rejectpermission']);

	

	Route::get('/getfaceattendance', ['uses' => 'AttendanceController@getfaceattendance', 'as' => 'attendance.getfaceattendance']);

	

	

	   

	// GET SUB CAT ITEMS

	Route::post('cat/subcat/items', ['uses' => 'IndentsController@getsubcatItems' ]); 

	       

 

	//Route::get('/userscreateemp/updation/{community}/{empid}', ['uses' => 'UsersController@create' , 'laroute' => true])->name('viewempdetail');	



	



//	Route::post('/users/updateemp', 'UsersController@updateemp')->name('users.updateemp'); 



	  



	    



	// Route::resource('roles', 'RolesController'); 



	



	// TEST URLS 



	Route::get('uploadexcel', ['uses' => 'UploadexcelController@uploadexcel', 'as' => 'uploadexcel.uploadexcel']); 

	

	Route::get('testgraph', ['uses' => 'ValidationController@testgraph', 'as' => 'validation.testgraph']); 

	

	Route::get('testnoc/{type}/{year}/{mon}', ['uses' => 'MisReportsController@testnoc', 'as' => 'misreports.testnoc']); 

	

	Route::get('/testpdf/{id}/{year}/{month}', ['uses' => 'MisReportsController@testpdf' , 'laroute' => true])->name('testpdf');

	

	//Route::get('testnoc/{type}/{year}/{mon}', ['uses' => 'MisReportsController@testnoc', 'as' => 'misreports.testnoc']);

	

	

	

//  Route::post('saveuploadfile', ['uses' => 'UploadexcelController@saveuploadfile', 'as' => 'uploadexcel.saveuploadfile']);







   Route::get('sites/create/next/{site_id}', ['uses' => 'SitesController@movenext', 'as' => 'sites.nextcreate']);

   Route::get('sites/edit/next/{site_id}', ['uses' => 'SitesController@movenext', 'as' => 'sites.next']);







    // DAILY BREAK DOWN COUNT

	

	Route::get('getbreakdowncount', ['uses' => 'ValidationController@getbreakdowncount', 'as' => 'validation.getbreakdowncount']); 

	Route::get('getIncidentcount', ['uses' => 'ValidationController@getIncidentcount', 'as' => 'validation.getIncidentcount']);

	Route::get('getjobcardcount', ['uses' => 'ValidationController@getjobcardcount', 'as' => 'validation.getjobcardcount']); 

	

	

	

	Route::get('topics/breakdowncreate/{id}', ['uses' => 'TopicsController@breakdowndaily' ]);

	Route::get('topics/incidentcreate/{id}', ['uses' => 'TopicsController@incidentdaily' ]);

	Route::get('topics/jobcardcreate/{id}', ['uses' => 'TopicsController@jobcarddaily' ]);

	

	

	// MMR SRORAGE

	

	Route::get('mmreditform', ['uses' => 'MMRController@mmreditform', 'as' => 'mmr.mmreditform']); 

	Route::post('storeeditform', ['uses' => 'MMRController@storeeditform', 'as' => 'mmr.storeeditform']); 

	

	// MMR HOUSEKEEP ACTIVITIES

	Route::post('storehousekpact', ['uses' => 'MMRController@storehousekpact', 'as' => 'mmr.storehousekpact']); 

	Route::post('storehousekpconsume', ['uses' => 'MMRController@storehousekpconsume', 'as' => 'mmr.storehousekpconsume']); 

	

	Route::post('storemanpower', ['uses' => 'MMRController@storemanpower', 'as' => 'mmr.storemanpower']); 
	
	
	Route::post('storemanpowerreport', ['uses' => 'MMRController@storemanpowerreport', 'as' => 'mmr.storemanpowerreport']); 

	

	Route::post('storewsptestreport', ['uses' => 'MMRController@storewsptestreport', 'as' => 'mmr.storewsptestreport']); 



	Route::post('storewsptestreport1', ['uses' => 'MMRController@storewsptestreport1', 'as' => 'mmr.storewsptestreport1']); 



	Route::post('storestptestreport', ['uses' => 'MMRController@storestptestreport', 'as' => 'mmr.storestptestreport']); 
	
	
	
	Route::post('storestptestreport1', ['uses' => 'MMRController@storestptestreport1', 'as' => 'mmr.storestptestreport1']); 
	

	Route::post('storemajorincident', ['uses' => 'MMRController@storemajorincident', 'as' => 'mmr.storemajorincident']); 
	
	
	Route::post('storesummary', ['uses' => 'ReportvalidationController@storesummary', 'as' => 'reportvalidation.storesummary']); 

	

		Route::post('storemmrppm', ['uses' => 'MMRController@storemmrppm', 'as' => 'mmr.storemmrppm']); 

		

		Route::post('storemmrmonthly', ['uses' => 'MMRController@storemmrmonthly', 'as' => 'mmr.storemmrmonthly']); 
		
		
		Route::post('storemmrpetmonthly', ['uses' => 'MMRController@storemmrpetmonthly', 'as' => 'mmr.storemmrpetmonthly']); 
		
		Route::post('storemmreventmonth', ['uses' => 'MMRController@storemmreventmonth', 'as' => 'mmr.storemmreventmonth']); 
		
		
		Route::post('storehkcmmmrmonthly', ['uses' => 'MMRController@storehkcmmmrmonthly', 'as' => 'mmr.storehkcmmmrmonthly']); 
		
		Route::post('storewarantymmmrmonthly', ['uses' => 'MMRController@storewarantymmmrmonthly', 'as' => 'mmr.storewarantymmmrmonthly']); 

	

	  

	

	  

  // DEMO ROUTES

   Route::get('/getdemodailyreport/{site}/{id}/{date}', ['uses' => 'DailyReportsController@demofiles' , 'laroute' => true])->name('project');

   Route::get('/testing', ['uses' => 'UsersController@getusersexcel' , 'laroute' => true])->name('project'); 

	

	Route::get('mmr/titleindex', ['uses' => 'MMRController@getindex']);

	Route::get('mmr/contents', ['uses' => 'MMRController@getcontents']);

	Route::get('mmr/power', ['uses' => 'MMRController@getpower']);

	Route::get('mmr/water', ['uses' => 'MMRController@getwater']);

	

	Route::get('mmr/manpower', ['uses' => 'MMRController@getmanpower']);

	Route::get('mmr/engineeringservices', ['uses' => 'MMRController@getengineeringservices']);

	Route::get('mmr/equipmentavailability', ['uses' => 'MMRController@getequipmentavailability']);

	Route::get('mmr/mmrvendorppm', ['uses' => 'MMRController@getmmrvendorppm']);

	Route::get('mmr/mmrcompletedppmtracker', ['uses' => 'MMRController@getmmrcompletedppmtracker']);

	Route::get('mmr/mmrplannedppmtracker', ['uses' => 'MMRController@getmmrplannedppmtracker']);

	Route::get('mmr/mmramctracker', ['uses' => 'MMRController@getmmramctracker']);

	Route::get('mmr/mmrmajoractivities', ['uses' => 'MMRController@getmmrmajoractivities']);

	Route::get('mmr/mmrstatutorycompliances', ['uses' => 'MMRController@getmmrstatutorycompliances']);

	Route::get('mmr/mmrsoftservices', ['uses' => 'MMRController@getmmrsoftservices']);

	Route::get('mmr/mmrhousekeepingmachinery', ['uses' => 'MMRController@getmmrhousekeepingmachinery']);

	Route::get('mmr/mmrboardsummary', ['uses' => 'MMRController@getmmrboardsummary']);

	Route::get('mmr/mmrhousekeepingconsumables', ['uses' => 'MMRController@getmmrhousekeepingconsumables']);

	Route::get('mmr/mmrgardenconsumables', ['uses' => 'MMRController@getmmrgardenconsumables']);

	Route::get('mmr/mmrpestcontrolmanagement', ['uses' => 'MMRController@getmmrpestcontrolmanagement']);

	Route::get('mmr/mmrgardeningmanagement', ['uses' => 'MMRController@getmmrgardeningmanagement']);

	Route::get('mmr/mmractivitiesingardening', ['uses' => 'MMRController@getmmractivitiesingardening']);

	Route::get('mmr/mmrothermatters', ['uses' => 'MMRController@getmmrothermatters']);

	Route::get('mmr/mmrkeyapprovals', ['uses' => 'MMRController@getmmrkeyapprovals']);

    Route::get('mmr/mmrmajorincidents', ['uses' => 'MMRController@getmmrmajorincidents']);

	

	

	Route::get('mmr/mmrmonthreports', ['uses' => 'MMRController@getmmrmonthreports']);

	Route::get('mmr/mmrscopenature', ['uses' => 'MMRController@getmmrscopenature']);

	Route::get('mmr/mmrproposedmanpower', ['uses' => 'MMRController@getmmrproposedmanpower']);

	Route::get('mmr/mmrtechnicalservices', ['uses' => 'MMRController@getmmrtechnicalservices']);

	Route::get('mmr/mmrinitiativetaken', ['uses' => 'MMRController@getmmrinitiativetaken']);

	Route::get('mmr/mmrplannedperventives', ['uses' => 'MMRController@getmmrplannedperventives']);

	Route::get('mmr/mmrpowerfailureanalysis', ['uses' => 'MMRController@getmmrpowerfailureanalysis']);

	Route::get('mmr/mmraveragepowerconsumption', ['uses' => 'MMRController@getmmraveragepowerconsumption']);

	Route::get('mmr/mmrsofthousekeeping', ['uses' => 'MMRController@getmmrsofthousekeeping']);

	Route::get('mmr/mmrsofthorticulture', ['uses' => 'MMRController@getmmrsofthorticulture']);

	Route::get('mmr/mmrsoftothers', ['uses' => 'MMRController@getmmrsoftothers']);

	

  // TESTING	

   Route::get('/getmisreportrecdownloadtest/{id}/{year}/{month}', ['uses' => 'MisReportsController@getdownloadviewtest' , 'laroute' => true])->name('getdownloadviewtest');

   

   Route::get('topics/getbreakdown', ['uses' => 'TopicsController@updatebreakdownId']);

// GET CALENDAR VIEWS

   

   Route::get('getSitecalendarview', ['uses' => 'ContactusController@getSitecalendarview', 'as' => 'contactus.getSitecalendarview']);

   

   Route::get('taskcalendarview', ['uses' => 'ContactusController@taskcalendarview', 'as' => 'contactus.taskcalendarview']);

   

     

   // EDIT MMR REPORTS

   

    Route::get('/editmmr/{id}/{year}/{month}/{site}', ['uses' => 'MMRController@geteditmmr' , 'laroute' => true])->name('geteditmmr');
	
	
	

		



}); 