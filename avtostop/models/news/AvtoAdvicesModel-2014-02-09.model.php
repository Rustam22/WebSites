<?php	class AvtoAdvicesModel extends CRUDModel {	
	public $r_id;	
	public $lang_id;	
	public $itemTitle;	
	public $content;	
	public $image;	
	//public $smallImage;	
	public $date;		
	//public $forLoggedIn;	
	public static $tplViewFile;	
	public static $multiLang = true;	
	public function __construct() {		
	$this->r_id = new stdClass();		
	$this->r_id->value = null;		
	$this->lang_id = new stdClass();	
	$this->lang_id->value = null;			
	$messages = Application::$messages['model_news'];	
	$this->itemTitle = new ModelTextField("itemTitle", $messages['field_itemTitle'], true, true);	
	$this->itemTitle->required = false;		
	$this->content = new ModelTinyMce("content", $messages['field_content'], true, true);		
	$this->content->required = false;	
	$this->image = new ModelFMImageField("image", Application::$messages['model_news']['field_image'], false, true);	
	$this->image->required = false;	
	$this->image->common = true;		
	$this->smallImage = new ModelFMImageField("smallImage", Application::$messages['model_news']['field_smallImage'], false, true);		
	$this->smallImage->required = false;	
	$this->smallImage->common = true;		
	$this->date = new ModelDateField("date", $messages['field_date'], true, true);	
	$this->date->common = true;						$this->forLoggedIn = new ModelSelectField("forLoggedIn", $messages['field_forLoggedIn'], Array(				'0' => Application::$messages['common_messages']['nno'],				'1' => Application::$messages['common_messages']['yyes'],			), true, true);			$this->forLoggedIn->common = true;		}		public function getSearchUrl() {			return 'advice/' . $this->r_id->value;		}				public static function initialize() {			self::$displayFields = Array('image', 'itemTitle', 'date');			self::$title = 'Avtofayda';			self::$iconPath = 'news-icon.png';			self::$multiLang = true;			self::$searchable = true;			self::$viewUrl = 'news';			self::$searchSettings = Array(				'title_field' => 'itemTitle',				'content_field' => 'content',			);		}				public static function getLast($lang, $limit) {			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `lang_id` = '{#1}' LIMIT " . $limit;			$r = self::fQuery($sql, Array($lang));			for ($i = 0, $c = count($r); $i < $c; $i++) {				$r[$i]['description'] = Utils::parseWords($r[$i]['content'], 1);			}			return $r;		}				public static function getToView($lang, $rId) {			$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `lang_id` = '{#1}' AND `r_id` = '{#2}' ";			$r = self::fQuery($sql, Array($lang, $rId));			if (count($r) == 1) return $r[0];			else return false;		}		
	
	public static function getListToView($start=0, $limit) {	
    if($start==0)
	$start=$start*$limit;	
	else
	$start=($start-1)*$limit;
	$sql = " SELECT * FROM `". self::getTableName() ."` WHERE `lang_id` = 'az' ORDER BY `id` DESC LIMIT " . $start . "," . $limit;	
	
	$r = self::fQuery($sql);	
	for ($i = 0, $c = count($r); $i < $c; $i++) {		
	$r[$i]['description'] = Utils::parseWords($r[$i]['content'], 1);		
	}	
	return Array(			
	'd' => $r,		
	'c' => self::count(" WHERE `lang_id` = 'az' ")		
	);			
	}	
	
	public static function getLastNews($count, $lang = false) {			$sql = "";			$values = Array();			if (self::$multiLang && $lang) {				$sql .= " WHERE `lang_id` = '{#1}'";				$values[] = $lang;			}			if (!Application::$storage['logged_in']) {				$sql .= " AND `forLoggedIn` <> '1' ";			}			$sql .= "ORDER BY `date` DESC LIMIT ". intval($count);						$news = self::find($sql, $values);			$c = count($news);			for ($i = 0; $i < $c; $i++) {				$news[$i]->description = Utils::parseWords($news[$i]->content->value, 1);			}			return $news;		}				public static function getNewsWithCommentsCount($lang, $start, $limit) {			$sql = "SELECT `vl1_NewsModel`.*, count(`vl1_NewsCommentsModel`.`newsId`) as `comments_count` 			FROM `vl1_NewsModel`			LEFT JOIN `vl1_NewsCommentsModel` ON `vl1_NewsModel`.`r_id` = `vl1_NewsCommentsModel`.`newsId` 			WHERE `vl1_NewsModel`.`lang_id` = '{#1}' AND `vl1_NewsModel`.`itemTitle` <> '' 			GROUP BY `vl1_NewsModel`.`itemTitle` LIMIT " . ($start * $limit) . "," . $limit;			$r = self::fQuery($sql, Array($lang));			$c = count($r);			for ($i = 0; $i < $c; $i++) {				$r[$i]['description'] = Utils::parseWords($r[$i]['content'], 1);			}			return $r;		}				public static function getNewsList($lang, $start, $limit) {			$sql = "SELECT `vl1_NewsModel`.* 			FROM `vl1_NewsModel` 			WHERE 			`vl1_NewsModel`.`lang_id` = '{#1}' 			AND `vl1_NewsModel`.`itemTitle` IS NOT NULL 			AND trim(`vl1_NewsModel`.`itemTitle`) <> '' ";			if (!Application::$storage['logged_in']) {				$sql .= " AND `forLoggedIn` <> '1' ";			}			$sql .= " ORDER BY `vl1_NewsModel`.`date` DESC 			LIMIT " . ($start * $limit) . "," . $limit;			$r = self::fQuery($sql, Array($lang));			$c = count($r);			for ($i = 0; $i < $c; $i++) {				$r[$i]['description'] = Utils::parseWords($r[$i]['content'], 1);				$r[$i]['url'] = self::getUrl($r[$i]['r_id'], $r[$i]['itemTitle']);			}			return $r;		}		private static function getUrl($id, $title) {			return Application::$settings['url'] . '/' . Application::$storage['lang'] . '/news/view/' . $id . '/' . Utils::translitUrl($title);		}				public static function getNews($newsId, $lang) {			$news = NewsModel::get($newsId, $lang);			$sql = "				SELECT `vl1_NewsCommentsModel`.`commentText`,`vl1_NewsCommentsModel`.`date`, `vl1_SiteUsersModel`.* 				FROM `vl1_NewsCommentsModel`				INNER JOIN `vl1_SiteUsersModel` 				ON `vl1_NewsCommentsModel`.`userId` = `vl1_SiteUsersModel`.`id` 				WHERE `vl1_NewsCommentsModel`.`newsId` = '{#1}'			";			if (!Application::$storage['logged_in']) {				$sql .= " AND `forLoggedIn` <> '1' ";			}			$comments = self::fQuery($sql, Array($newsId));			return Array(				'news' => $news,				'comments' => $comments,			);		}	}?>
	