<?php

	class CategoryController extends Controller {
	
		public static function getList($request, $vars) {
			
			$page = $vars['page_number'];
			$limit = 9;
			$start = $page * $limit;
			
			$categories = CategoryModel::getOnlyLastCategories(0, 'itemTitle', Application::$storage['lang'], false, $start, $limit);
			
			$count = count(CategoryModel::getOnlyLastCategories(0, 'itemTitle', Application::$storage['lang'], true));
			
			$paginator = Utils::generatePaginator($count, $limit, $page);
			
			self::renderTemplate('category' . ds . 'category-list.tpl', Array(
				'categories' => $categories,
				'paginator' => $paginator,
				'csrf_key' => Application::getCSRFKey(),
				'currentPage' => $page
			));
			
		}
		
		public static function view($request, $vars) {
			$categoryId = $vars['category'];
			$lang = Application::$storage['lang'];
			$page = $vars['page'];
			
			
			$category = CategoryModel::find(" WHERE `r_id` = '{#1}' AND `lang_id` = '{#2}'", Array($categoryId, $lang));
			
			$hasMap = false;
			$mapMarkers = Array();
			
			if ($category) {
				$category = $category[0];
				// get categories
				
				$rel = CategoryRelationsModel::get($category->treeItemId->value);
				$relations = CategoryRelationsModel::getItemsAsKV();
				
				$childs = CategoryModel::getItemChilds($rel->id->value, $relations);
				$items = CategoryModel::getItems($_SESSION['lang']);
				
				// get items if exists
				$advertisements = Array();
				if ($category->formId->value || $category->hasVacancy->value) {
					$tables = Array();
					
					$formId = $category->formId->value;
					if ($formId) {
						
						$form = AdvertisementStructureModel::getTable($formId);
						if ($form !== false) {
						
							$data = AdvertisementsModel::getAllActiveAdvForCategory($form['table_name'], $categoryId);
							
							$_tmpAdvContainer = Array();
							
							$_c = count($data);
							for ($j = 0; $j < $_c; $j++) {
								
								$adv = AdvertisementsModel::getAdvItem($data[$j], $form);
								
								// init and add to list
								$adv->init();
								$_tmpAdvContainer[] = $adv;
							}
							
							$advertisements = AdvUtils::merge($advertisements, $_tmpAdvContainer);
							
							// get adv to map
							if ($form['has_map']) {
								$hasMap = true;
								
								for ($j = 0, $c = count($data); $j < $c; $j++) {
									$data[$j]['map'] = substr($data[$j]['map'], 1, strlen($data[$j]['map']) - 2);
									$data[$j]['map'] = explode(',', $data[$j]['map']);
									$data[$j]['map'] = $data[$j]['map'];
									$mapMarkers[] = Array(
										'title' => $data[$j]['title'],
										'description' => $data[$j]['description'],
										'map' => $data[$j]['map'],
										'table_id' => $form['id'],
										'record_id' => $data[$j]['id']
									);
								}
								
							}
							
						}
						
					}
					
					if ($category->hasVacancy->value) {
						$tables[] = 37;
						$tables[] = 38;
					}
					
					for ($i = 0, $c = count($tables); $i < $c; $i++) {
						
						$table = AdvertisementStructureModel::getTable($tables[$i]);
						
						if ($table !== false) {
							
							$data = AdvertisementsModel::getAllActiveAdvForCategory($table['table_name'], $categoryId);
							
							$_tmpAdvContainer = Array();
							
							$_c = count($data);
							for ($j = 0; $j < $_c; $j++) {
								
								$adv = AdvertisementsModel::getAdvItem($data[$j], $table);
								
								// init and add to list
								$adv->init();
								$_tmpAdvContainer[] = $adv;
							}
							
							$advertisements = AdvUtils::merge($advertisements, $_tmpAdvContainer);
							
						}
					}
				}
				
				$limit = Application::$settings['adv_limit'];
				
				$advCount = count($advertisements);
				$pagesCount = ceil($advCount / $limit);
				$advertisements = array_slice($advertisements, $page * $limit, $limit);
				
				$context = Array();
				$context['tree_items'] = $childs;
				$context['items'] = $items;
				$context['csrf_token'] = Application::getCSRFKey();
				$context['advertisements'] = $advertisements;
				$context['currentPage'] = $page;
				$context['pagesCount'] = $pagesCount;
				$context['categoryId'] = $categoryId;
				$context['has_map'] = $hasMap;
				$context['map_markers'] = json_encode($mapMarkers);
				
				self::renderTemplate('category' . ds . 'view.tpl', $context);
				
			} else ApplicationController::pageNotFound();
		}
	
	}

?>