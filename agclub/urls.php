<?php
    $lang = join('|', array_keys($__app['languages']));
    
    $__urlPatterns = Array(
        'app' => Array(
			Array('|\/','ApplicationController','main', 'app'),
			Array('(?P<lang>[a-z]{2})|\/','ApplicationController','main', 'app'),
			
			// registration
			Array('(?P<lang>[a-z]{2})\/registration','RegistrationController','registerUser', 'registration'),
			Array('(?P<lang>[a-z]{2})\/login','AuthController','logIn', 'auth'),
			Array('(?P<lang>[a-z]{2})\/logout','AuthController','logOut', 'auth'),
			Array('(?P<lang>[a-z]{2})\/lostpsw','AuthController','lostPswAjax', 'auth'),
			Array('(?P<lang>[a-z]{2})\/lostpsw\/(?P<token>[a-zA-Z0-9]{32})','AuthController','lostPassword', 'auth'),
			Array('(?P<lang>[a-z]{2})\/lostpsw\/save','AuthController','savePsw', 'auth'),
			Array('(?P<lang>[a-z]{2})\/save-guest','AuthController','saveGuest', 'auth'),
			
			// news
			Array('(?P<lang>[a-z]{2})\/news|\/','NewsController','archive', 'news', Array('page_id' => '0')),
			Array('(?P<lang>[a-z]{2})\/news\/page\/(?P<page_id>[0-9]{1,5})','NewsController','archive', 'news'),
			Array('(?P<lang>[a-z]{2})\/news\/view\/(?P<news_id>[0-9]{1,5})','NewsController','viewNews', 'news'),
			Array('(?P<lang>[a-z]{2})\/news\/add\/comment\/(?P<news_id>[0-9]{1,5})','NewsController','addComment', 'news'),
			
			// companies | added 26.3.2013
			Array('(?P<lang>[a-z]{2})\/companies|\/','CompaniesController','archive', 'companies', Array('page_id' => '0')),
			Array('(?P<lang>[a-z]{2})\/companies\/page\/(?P<page_id>[0-9]{1,5})','CompaniesController','archive', 'companies'),
			Array('(?P<lang>[a-z]{2})\/companies\/view\/(?P<news_id>[0-9]{1,5})','CompaniesController','viewNews', 'companies'),
			
			// services network
			Array('(?P<lang>[a-z]{2})\/services-network|\/','ServicesNetworkController','getList', 'serv-net'),
			Array('serv-net\/getmap\/(?P<service_id>[0-9]{1,5})','ServicesNetworkController','getMap', 'serv-net'),
			
			// feedback
			Array('(?P<lang>[a-z]{2})\/feedback','FeedbackController','view', 'feedback'),
			Array('(?P<lang>[a-z]{2})\/feedback\/add','FeedbackController','add', 'feedback'),
			
			// objects
			Array('(?P<lang>[a-z]{2})\/objects\/list\/(?P<category_id>[0-9]{1,5})','ObjectsController','listObjects', 'objects'),
			Array('(?P<lang>[a-z]{2})\/objects\/getdiscount\/(?P<object_id>[0-9]{1,5})','ObjectsController','getDiscount', 'objects'),
			Array('objects\/get-object-data\/(?P<object_id>[0-9]{1,5})','ObjectsController','getObjectData', 'objects'),
			Array('(?P<lang>[a-z]{2})\/objects\/get-object-data\/(?P<object_id>[0-9]{1,5})','ObjectsController','getObjectData', 'objects'),
			
			// category
			Array('(?P<lang>[a-z]{2})\/category|\/page\/(?P<page_number>[0-9]{1,5})', 'CategoryController', 'getList', 'category', Array('page_number' => '0')),
			Array('(?P<lang>[a-z]{2})\/category\/view\/(?P<category_id>[0-9]{1,5})|\/page\/(?P<page_number>[0-9]{1,5})', 'CategoryController', 'view', 'category', Array('page_number' => '0')),
			
			// profile
			Array('(?P<lang>[a-z]{2})\/profile','ProfileController','view', 'profile'),
			Array('(?P<lang>[a-z]{2})\/profile\/save','ProfileController','save', 'profile'),

			// call to
			Array('(?P<lang>[a-z]{2})\/callto\/addorder','CallToController','addOrder', 'call_to'),
			
			// horoscope
			Array('(?P<lang>[a-z]{2})\/horoscope\/(?P<sex_id>[0-9]{1,5})\/(?P<zodiac_id>[0-9]{1,5})','HoroscopeController','getHoroscope', 'horoscope'),
			
			// search
			Array('(?P<lang>[a-z]{2})\/search\/(?P<search_text>[0-9а-яёструфхцчшщыюьъa-zəöğüçşА-ЯЁСТРУФХЦЧШЩЫЮАA-ZƏÖĞÜÇŞ,\.\s]{1,20})|\/page\/(?P<page_number>[0-9]{1,5})','SearchController','search', 'search', Array('page_number' => '0')),
			
			// get map
			Array('getmap\/(?P<object_id>[0-9]{1,5})','ApplicationController','getMap', 'app'),
			Array('getcaptcha|\/(?P<object_id>.*)','ApplicationController','getCaptcha', 'app'),
			
			// inc rating
			Array('addrating','ApplicationController','incRating', 'app'),
			
			// view page
			Array('(?P<lang>[a-z]{2})\/view-page\/(?P<page_id>[0-9]{1,5})|\/(?P<page_title>.*)','ContentController','viewPage', 'content'),
			
			// sitemap
			Array('(?P<lang>[a-z]{2})\/sitemap','ApplicationController','siteMap', 'app'),
			
			// image resizer
			Array('imageresizer\/resize\/(?P<width>[0-9]{1,4})\/(?P<height>[0-9]{1,4})\/(?P<file_path>.*+)','ImageResizer','resize', 'utils'),
			// static files
			Array('get_static\/(?P<file_type>[a-z0-9_-]{1,30})|\/|(?P<module_name>[a-z0-9_-]{1,30})','StaticController','getStatic', 'utils'),
			// page not found
            Array('.*','ApplicationController','pageNotFound', 'app'),
			
        ),
    );

?>