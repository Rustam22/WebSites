<?php
	class NewsModel extends CRUDModel {
		public $r_id;
		public $lang_id;
		public $itemTitle;
		public $content;
		public $image;
		public $date;
		public $type;

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
			$this->date = new ModelDateField("date", $messages['field_date'], true, true);
			$this->date->common = true;

			$this->type = new ModelSelectField("type", $messages['field_type'], Array(
				0 => $messages['field_news'],
				1 => $messages['field_company']
			), true, true);
			$this->type->common = true;
		}

		public function getSearchUrl() {
			return 'news/view/' . $this->r_id->value;
		}

		public static function initialize() {
			self::$displayFields = Array('image', 'itemTitle', 'date', 'type');
			self::$title = Application::$messages['model_news']['title'];
			self::$iconPath = 'news-icon.png';
			self::$multiLang = true;
			self::$searchable = true;
			self::$viewUrl = 'news';
			self::$searchSettings = Array(
				'title_field' => 'itemTitle',
				'content_field' => 'content',
			);
		}

		public static function getLastNews($count, $lang = false) {
			$sql = " WHERE ";
			$values = Array();
			$sql .= " `type` = '0' ";
			if (self::$multiLang && $lang) {
				$sql .= " AND `lang_id` = '{#1}'";
				$values[] = $lang;
			}
			$sql .= "ORDER BY `date` DESC LIMIT ". intval($count);

			$news = self::find($sql, $values);
			$c = count($news);
			for ($i = 0; $i < $c; $i++) {
				$news[$i]->description = Utils::parseWords($news[$i]->content->value, 1);
			}
			return $news;
		}

		public static function getNewsWithCommentsCount($lang, $start, $limit, $type = 0) {
			$sql = "SELECT `vl1_NewsModel`.*, count(`vl1_NewsCommentsModel`.`newsId`) as `comments_count`
			FROM `vl1_NewsModel`
			LEFT JOIN `vl1_NewsCommentsModel` ON `vl1_NewsModel`.`r_id` = `vl1_NewsCommentsModel`.`newsId`
			WHERE `vl1_NewsModel`.`lang_id` = '{#1}' AND `vl1_NewsModel`.`itemTitle` <> '' AND `vl1_NewsModel`.`type` = '".$type."'
			GROUP BY `vl1_NewsModel`.`r_id` ORDER BY `vl1_NewsModel`.`date` DESC LIMIT " . ($start * $limit) . "," . $limit;
			$r = self::fQuery($sql, Array($lang));
			$c = count($r);
			for ($i = 0; $i < $c; $i++) {
				$r[$i]['description'] = Utils::parseWords($r[$i]['content'], 1);
			}
			return $r;
		}
		
		public static function getNews($newsId, $lang) {
			$news = NewsModel::get($newsId, $lang);
			$sql = "
				SELECT `vl1_NewsCommentsModel`.`commentText`,`vl1_NewsCommentsModel`.`date`, `vl1_SiteUsersModel`.* 
				FROM `vl1_NewsCommentsModel`
				INNER JOIN `vl1_SiteUsersModel` 
				ON `vl1_NewsCommentsModel`.`userId` = `vl1_SiteUsersModel`.`id` 
				WHERE `vl1_NewsCommentsModel`.`newsId` = '{#1}'
			";
			$comments = self::fQuery($sql, Array($newsId));
			return Array(
				'news' => $news,
				'comments' => $comments,
			);
		}
	}
?>