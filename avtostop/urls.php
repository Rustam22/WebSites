<?php
    $lang = join('|', array_keys($__app['languages']));
    
    $__urlPatterns = Array(
        'app' => Array(
			Array('|\/','ApplicationController','main', 'app', Array('lang' => 'az')),
			Array('(?P<lang>[a-z]{2})|\/','ApplicationController','main', 'app', Array('lang' => 'az')),
			
			Array('page\/(?P<r_id>[0-9]{1,5}).*|\/','ContentController','viewPage', 'content', Array('lang' => 'az')),
			Array('gallery|\/','GalleryController','listAll', 'gallery', Array('lang' => 'az')),
			Array('advice\/(?P<r_id>[0-9]{1,5}).*|\/','AdviceController','view', 'content', Array('lang' => 'az')),
                       
			Array('advices|\/page\/(?P<page>[0-9]{1,5})|\/','AdviceController','listAll', 'content', Array('lang' => 'az', 'page' => 0)),
			Array('auto\/advice\/(?P<r_id>[0-9]{1,5}).*|\/','AdviceController','viewAvto', 'content', Array('lang' => 'az')),
			Array('auto\/advices|\/page\/(?P<page>[0-9]{1,5})|\/','AdviceController','listAllAvto', 'content', Array('lang' => 'az', 'page' => 0)),
			
			Array('auto\/insurance\/(?P<r_id>[0-9]{1,5}).*|\/','InsuranceController','viewInsurance', 'content', Array('lang' => 'az')),
			Array('auto\/insurances|\/page\/(?P<page>[0-9]{1,5})|\/','InsuranceController','listAllAvto', 'content', Array('lang' => 'az', 'page' => 0)),
		
			Array('faq\/(?P<r_id>[0-9]{1,5})|\/','FaqController','view', 'content', Array('lang' => 'az')),
			Array('faq\/add\/question|\/','FaqController','addQuestion', 'content', Array('lang' => 'az')),
			Array('advertisement\/(?P<r_id>[0-9]{1,5}).*|\/','AdvertisementController','view', 'advertisement', Array('lang' => 'az')),
			Array('advertisements|\/','AdvertisementController','listAll', 'advertisement', Array('lang' => 'az')),
			Array('advertisements\/found|\/page\/(?P<page>[0-9]{1,5})|\/','AdvertisementController','listAllFound', 'advertisement', Array('lang' => 'az', 'page' => 0)),
			Array('advertisements\/lost|\/page\/(?P<page>[0-9]{1,5})|\/','AdvertisementController','listAllLost', 'advertisement', Array('lang' => 'az', 'page' => 0)),
			
            
			//registration and auth
			Array('register|\/','AuthController','view', 'auth', Array('lang' => 'az')),
			Array('register\/add','AuthController','add', 'auth', Array('lang' => 'az')),       
			Array('register\/update','AuthController','updateUserFields', 'auth', Array('lang' => 'az')),
			Array('register\/getCode','AuthController','getCode', 'auth', Array('lang' => 'az')),
			Array('register\/approve_code','AuthController','approve_code', 'auth', Array('lang' => 'az')),            
			Array('register\/approve_codeOP','AuthController','approve_codeOP', 'auth', Array('lang' => 'az')),
			Array('register\/userActivate','AuthController','userActivate', 'auth', Array('lang' => 'az')),
			Array('register\/userActivateOP','AuthController','userActivateOP', 'auth', Array('lang' => 'az')),
			Array('register\/isLoggedIn','AuthController','isLoggedIn', 'auth', Array('lang' => 'az')),
			Array('register\/userLogout','AuthController','userLogout', 'auth', Array('lang' => 'az')),           
			Array('register\/passRecovery','AuthController','passRecovery', 'auth', Array('lang' => 'az')),
			Array('recovery|\/(?P<key>[a-z0-9_-]{1,60})','AuthController','recovery', 'auth', Array('lang' => 'az')),
			Array('register\/changedPass','AuthController','changedPass', 'auth', Array('lang' => 'az')),
			Array('register\/regQuestion','AuthController','regQuestion', 'auth', Array('lang' => 'az')),
			//Account image add process url
            Array('uploadAccountImage\/add','ApplicationController','uploadAccountImage', 'app', Array('lang' => 'az')),



            //Competition Urls
            Array('getAllCompetitionQuestions|\/','ApplicationController', 'getAllCompetitionQuestions', 'app', Array('lang' => 'az')),
            Array('getAnswerResult|\/','ApplicationController', 'getAnswerResult', 'app', Array('lang' => 'az')),
            Array('getUsersData|\/','ApplicationController', 'getUsersData', 'app', Array('lang' => 'az')),


			//activation or deactivation link (static password == '0a4e34d3ff321d604835096fecd46eff')
			//avtostop.tv/subscribe/994702920985/charged/0a4e34d3ff321d604835096fecd46eff
			//avtostop.tv/subscribe/994702920985/uncharged/0a4e34d3ff321d604835096fecd46eff
			Array('subscribe|\/(?P<mobile>[a-z0-9_-]{1,60})|\/(?P<bool>[a-z0-9_-]{1,60})|\/(?P<password>[a-z0-9_-]{1,60})','AuthController','subscribe', 'auth', Array('lang' => 'az')),

            //online complaint
            Array('onlineComplaint\/add','ApplicationController','addComplaint', 'app', Array('lang' => 'az')),
            Array('sendQuestionWithFiles\/add','ApplicationController','sendQuestionWithFiles', 'app', Array('lang' => 'az')),
            //kasko sender
            Array('register\/kaskoSender','AuthController','kaskoSender', 'auth', Array('lang' => 'az')),
                      
            //Url`s list for avtostopMobileApp (ajax request`s)
            Array('auto\/autoAdvices\/getAll','AdviceController','getAllAutoAdvices', 'content', Array('lang' => 'az')),
            Array('auto\/autoAdvices\/getCount','AdviceController','getAutoAdvicesCount', 'content', Array('lang' => 'az')),
            Array('advices\/getAll','AdviceController','getAllAdvices', 'content', Array('lang' => 'az')),
            Array('advices\/getCount','AdviceController','getAdvicesCount', 'content', Array('lang' => 'az')),

            //Magazines
            Array('magazines\/getAll','MagazineController','getAllAdvices', 'magazines', Array('lang' => 'az')),
            Array('magazines\/getCount','MagazineController','getAdvicesCount', 'magazines', Array('lang' => 'az')),
            Array('magazines|\/page\/(?P<page>[0-9]{1,5})|\/','MagazineController', 'listAll', 'magazines', Array('lang' => 'az', 'page' => 0)),
            Array('auto\/magazines|\/page\/(?P<page>[0-9]{1,5})|\/','MagazineController','listAllAvto', 'magazines', Array('lang' => 'az', 'page' => 0)),





            //Url For return registration search result data
            Array('registrations\/getAll','AdviceController','getAllRegData', 'content', Array('lang' => 'az')),
            Array('logs\/getAll','AdviceController','getAllLogData', 'content', Array('lang' => 'az')),

            //Save Item
            Array('saveItem|\/','PaymentController','saveItem', 'payment', Array('lang' => 'az')),
            //Save Item For Auth Users
            Array('saveItemByUserId|\/','PaymentController','saveItemByUserId', 'payment', Array('lang' => 'az')),
            //Get Magazine Download status By Magazine Id and Current Auth User Id
            Array('getCurrentMagazineStatus|\/','PaymentController','getCurrentMagazineStatus', 'payment', Array('lang' => 'az')),
            //TrueFalse page(redirects by golden pay settings after payment)
            Array('truefalse|\/([?][a-z_-]+[=][a-z0-9_-]{36})|\/','PaymentController','truefalse', 'payment', Array('lang' => 'az', 'page' => 0)),
            //Dowload Magazine Url
            Array('download|\/([a-z0-9_-]{1,36})|\/','PaymentController','downloadMagazine', 'payment', Array('lang' => 'az', 'page' => 0)),

            //Save Registration item
            Array('regSaveItem|\/','AuthController','saveItem', 'auth', Array('lang' => 'az')),




            

			// Search
			Array('search\/get\/form\/(?P<form_id>[0-9]{1,5})|\/','SearchController','getForm', 'search'),
			Array('search\/(?P<query>.*)|\/page\/(?P<page_number>[0-9]{1,5})|\/','SearchController','search', 'search', Array('page_number' => 0)),
			// Search end
			
			// image resizer
			Array('imageresizer\/resize\/(?P<width>[0-9]{1,4})\/(?P<height>[0-9]{1,4})\/(?P<file_path>.*+)','ImageResizer','resize', 'utils'),
			// static files
			Array('get_static\/(?P<file_type>[a-z0-9_-]{1,30})|\/|(?P<module_name>[a-z0-9_-]{1,30})','StaticController','getStatic', 'utils'),
             
                        //sms service 
                        Array('sms_service\/true|\/','SmsController','viewTrue', 'sms_service'),
                        Array('sms_service\/false|\/','SmsController','viewFalse', 'sms_service'),
			
			// user link
			Array('user(?P<user_id>[0-9]{1,20})|\/','ProfileController','viewProfile', 'profile'),
			
			// page not found
                        Array('.*','ApplicationController','pageNotFound', 'app'),
			
        ),
    );

?>