<?php
    $lang = join('|', array_keys($__app['languages']));
    
    $__urlPatterns = Array(
        'app' => Array(
			Array('|\/','ApplicationController','main', 'app'),
			Array('(?P<lang>[a-z]{2})|\/','ApplicationController','main', 'app'),
			Array('categories\/(?P<page_number>[0-9]{1,3})','ApplicationController','getCategories', 'app'),
			
			Array('map|\/','ApplicationController','viewMap', 'app'),
			Array('main|\/','ApplicationController','main', 'app'),
			
			// news
			//Array('(?P<lang>[a-z]{2})\/news|\/','NewsController','archive', 'news', Array('page_id' => '0')),
			//Array('(?P<lang>[a-z]{2})\/news\/page\/(?P<page_id>[0-9]{1,5})','NewsController','archive', 'news'),
			//Array('(?P<lang>[a-z]{2})\/news\/view\/(?P<news_id>[0-9]{1,5})\/(?P<news_title>.*)','NewsController','viewNews', 'news'),
			//Array('(?P<lang>[a-z]{2})\/news\/add\/comment\/(?P<news_id>[0-9]{1,5})','NewsController','addComment', 'news'),
			
			// announcements
			//Array('(?P<lang>[a-z]{2})\/announcements|\/','AnnouncementsController','archive', 'announcements', Array('page_id' => '0')),
			//Array('(?P<lang>[a-z]{2})\/announcements\/page\/(?P<page_id>[0-9]{1,5})','AnnouncementsController','archive', 'announcements'),
			//Array('(?P<lang>[a-z]{2})\/announcements\/view\/(?P<news_id>[0-9]{1,5})\/(?P<ann_title>.*)','AnnouncementsController','viewNews', 'announcements'),
			//Array('(?P<lang>[a-z]{2})\/announcements\/add\/comment\/(?P<news_id>[0-9]{1,5})','NewsController','addComment', 'news'),
			
			// b-oofers
			//Array('(?P<lang>[a-z]{2})\/business-offers|\/','BusinessOffersController','archive', 'b-offers', Array('page_id' => '0')),
			//Array('(?P<lang>[a-z]{2})\/business-offers\/page\/(?P<page_id>[0-9]{1,5})','BusinessOffersController','archive', 'b-offers'),
			//Array('(?P<lang>[a-z]{2})\/business-offers\/view\/(?P<news_id>[0-9]{1,5})\/(?P<bo_title>.*)','BusinessOffersController','viewNews', 'b-offers'),
			//Array('(?P<lang>[a-z]{2})\/announcements\/add\/comment\/(?P<news_id>[0-9]{1,5})','NewsController','addComment', 'news'),
			
			// application form
			//Array('(?P<lang>[a-z]{2})\/application-form','ApplicationFormController','view', 'application-form'),
			//Array('(?P<lang>[a-z]{2})\/application-form\/send','ApplicationFormController','save', 'application-form'),
			
			// feedback
			//Array('(?P<lang>[a-z]{2})\/feedback','FeedbackController','view', 'feedback'),
			//Array('(?P<lang>[a-z]{2})\/feedback\/add','FeedbackController','add', 'feedback'),
			
			// search
			//Array('(?P<lang>[a-z]{2})\/search\/(?P<search_text>[0-9а-яёструфхцчшщыюьъa-zəöğüçşА-ЯЁСТРУФХЦЧШЩЫЮАA-ZƏÖĞÜÇŞ,\.]{1,20})|\/page\/(?P<page_number>[0-9]{1,5})','SearchController','search', 'search', Array('page_number' => '0')),
			
			// view page
			//Array('(?P<lang>[a-z]{2})\/view-page\/(?P<page_id>[0-9]{1,5})\/(?P<page_title>.*)','ContentController','viewPage', 'content'),
			
			// sitemap
			//Array('(?P<lang>[a-z]{2})\/sitemap','ApplicationController','siteMap', 'app'),
			
			// photogallery
			//Array('(?P<lang>[a-z]{2})\/photogallery','PhotoGalleryController','view', 'photogallery'),
			
			// videogallery
			//Array('(?P<lang>[a-z]{2})\/videogallery','VideoGalleryController','view', 'videogallery'),
			//Array('(?P<lang>[a-z]{2})\/videogallery\/view\/(?P<video_id>[0-9]{1,5})','VideoGalleryController','getVideo', 'videogallery'),
			
			// registration
			//Array('(?P<lang>[a-z]{2})\/registration','RegistrationController','registerUser', 'registration'),
			//Array('(?P<lang>[a-z]{2})\/login','AuthController','logIn', 'auth'),
			//Array('(?P<lang>[a-z]{2})\/logout','AuthController','logOut', 'auth'),
			//Array('(?P<lang>[a-z]{2})\/lostpsw','AuthController','lostPswAjax', 'auth'),
			//Array('(?P<lang>[a-z]{2})\/lostpsw\/(?P<token>[a-zA-Z0-9]{32})','AuthController','lostPassword', 'auth'),
			//Array('(?P<lang>[a-z]{2})\/lostpsw\/save','AuthController','savePsw', 'auth'),
			
			// services network
			//Array('(?P<lang>[a-z]{2})\/services-network|\/','ServicesNetworkController','getList', 'serv-net'),
			//Array('serv-net\/getmap\/(?P<service_id>[0-9]{1,5})','ServicesNetworkController','getMap', 'serv-net'),
			
			
			// objects
			//Array('(?P<lang>[a-z]{2})\/objects\/list\/(?P<category_id>[0-9]{1,5})','ObjectsController','listObjects', 'objects'),
			//Array('(?P<lang>[a-z]{2})\/objects\/getdiscount\/(?P<object_id>[0-9]{1,5})','ObjectsController','getDiscount', 'objects'),
			Array('object\/(?P<object_id>[0-9]{1,5})','ObjectsController','viewObject', 'objects'),
			Array('object\/view\/(?P<object_id>[0-9]{1,5})','ObjectsController','viewObjectMap', 'objects'),
			Array('search\/object\/(?P<search_text>[0-9а-яёструфхцчшщыюьъa-zəöğüçşА-ЯЁСТРУФХЦЧШЩЫЮАA-ZƏÖĞÜÇŞ,\.\%]{1,20})|\/page\/(?P<page_number>[0-9]{1,3})','ObjectsController','searchObjects', 'objects', Array('page_number' => '0')),
			
			// category
			//Array('category|\/page\/(?P<page_number>[0-9]{1,5})', 'CategoryController', 'getList', 'category', Array('page_number' => '0')),
			Array('category\/view\/(?P<category_id>[0-9]{1,5})|\/page\/(?P<page_number>[0-9]{1,5})', 'CategoryController', 'view', 'category', Array('page_number' => '0')),
			
			// profile
			//Array('(?P<lang>[a-z]{2})\/profile','ProfileController','view', 'profile'),
			//Array('(?P<lang>[a-z]{2})\/profile\/save','ProfileController','save', 'profile'),

			// call to
			//Array('(?P<lang>[a-z]{2})\/callto\/addorder','CallToController','addOrder', 'call_to'),
			
			// horoscope
			//Array('(?P<lang>[a-z]{2})\/horoscope\/(?P<sex_id>[0-9]{1,5})\/(?P<zodiac_id>[0-9]{1,5})','HoroscopeController','getHoroscope', 'horoscope'),
			
			// get map
			//Array('getmap\/(?P<object_id>[0-9]{1,5})','ApplicationController','getMap', 'app'),
			
			// inc rating
			//Array('addrating','ApplicationController','incRating', 'app'),
			
			// image resizer
			//Array('imageresizer\/resize\/(?P<width>[0-9]{1,4})\/(?P<height>[0-9]{1,4})\/(?P<file_path>.*+)','ImageResizer','resize', 'utils'),
			// static files
			//Array('get_static\/(?P<file_type>[a-z0-9_-]{1,30})|\/|(?P<module_name>[a-z0-9_-]{1,30})','StaticController','getStatic', 'utils'),
			// page not found
            //Array('.*','ApplicationController','pageNotFound', 'app'),
			
        ),
    );

?>