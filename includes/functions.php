<?php
date_default_timezone_set('America/Los_Angeles');

include('config_inc.php');
include('Cart.php');



global $db;
if (isset($_SESSION['uid']) && $_SESSION['uid'] != "") {
	$chkUser = $db->rawQueryOne("select id from ci_customer where id=? ", array($_SESSION['uid']));
	if (!isset($chkUser) && empty($chkUser)) { ?>
		<script>
			window.location.href = "<?php echo base_url_site . "logout"; ?>";
		</script>
		<?php
	}
}

function clean($string)
{
	$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

	return preg_replace('/[^A-Za-z0-9\/\-]/', '', $string); // Removes special chars.
}


//@get all shopfor total from DB
function get_shopfor_total($titlename, $where1 = false)
{
	global $db;
	$sTotal = 0;
	if ($where1 != false) {

		$whereConditions = " where FIND_IN_SET(" . $titlename . ", categories)";
		/*if(strpos($whereConditions,"FIND_IN_SET($titlename, st.categories)")==false){
				$whereConditions.=" and FIND_IN_SET($titlename, st.categories)";
			} */


		$whereConditions .= $where1;

		$sql = "SELECT count(styleID) as total FROM `ci_styles` $whereConditions and pPrice!='0.00' and isExistProduct=1 and bestsellerrank<>0 ";
		//echo $sql;
		//die();
		$fabr = $db->rawQuery($sql);

		foreach ($fabr as $kk => $vv) {
			$sTotal = $sTotal + $vv['total'];
		}
		if (intval($sTotal) > 0) {
			return $sTotal;
		} else {
			return 0;
		}
	} else {
		$sql = "SELECT count(styleID) as total FROM `ci_styles` WHERE FIND_IN_SET($titlename, categories) and pPrice!='0.00' and isExistProduct=1 bestsellerrank<>0 ";

		$fabr = $db->rawQuery($sql);

		foreach ($fabr as $kk => $vv) {
			$sTotal = $sTotal + $vv['total'];
		}
		if (intval($sTotal) > 0) {
			return $sTotal;
		} else {
			return 0;
		}
	}




	/*$sTotal=0;
		if($where1!=false)
		{
			 $whereConditions=$where1;
			if(strpos($whereConditions,"FIND_IN_SET($titlename, st.categories)")==false){
				$whereConditions.=" and FIND_IN_SET($titlename, st.categories)";
			}
			$sql="SELECT count(styleID) as total FROM `ci_styles` as st inner join ci_products as pd on pd.styleID=st.styleID ".$whereConditions." group by pd.styleID order by st.styleID ASC";
			$shopfor = $db->rawQuery ($sql,array(''));

				foreach($shopfor as $kk=>$vv){
				$sTotal=$sTotal+$vv['total'];
				}
				if(intval($sTotal)>0) {
				return $sTotal;
				} else {
				return 0;
				}

		}
		else
		{
			$sql="SELECT count(styleID) as total FROM `ci_styles` WHERE FIND_IN_SET(".$titlename.",categories)";
			$shopfor = $db->rawQuery ($sql,array(''));

				foreach($shopfor as $kk=>$vv){
				$sTotal=$sTotal+$vv['total'];
				}
				if(intval($sTotal)>0) {
				return $sTotal;
				} else {
				return 0;
				}
		}*/
}


function adminSettings($columns)
{
	global $db;

	$condition = "= '$columns'";
	if (is_array($columns)) {
		$select = implode("', '", $columns);
		$condition = "IN ('$select')";
	}

	$results = $db->rawQuery("SELECT columnname, columndata FROM ci_admin_settings WHERE columnname $condition");

	return array_reduce($results, function ($config, $item) {
		$config[$item['columnname']] = $item['columndata'];
		return $config;
	}, []);
}


/* For Rob Messages */
function robCouponSale()
{
	global $db;
	$saleCoupon = $db->rawQueryOne("select columndata from ci_admin_settings  where columnname='salecoupon'");
	if (!empty($saleCoupon)) {
		return $saleCoupon['columndata'];
	} else {
		return "Error";
	}
}

function robCartCoupon()
{
	global $db;
	$cartcoupon = $db->rawQueryOne("select columndata from ci_admin_settings  where columnname='cartcoupon'");
	if (!empty($cartcoupon)) {
		return $cartcoupon['columndata'];
	} else {
		return "Error";
	}
}

function robLeftCoupon()
{
	global $db;
	$leftcoupon = $db->rawQueryOne("select columndata from ci_admin_settings  where columnname='leftcoupon'");
	if (!empty($leftcoupon)) {
		return $leftcoupon['columndata'];
	} else {
		return "Error";
	}
}

function robCartCouponCode()
{
	global $db;
	$cartcouponcode = $db->rawQueryOne("select columndata from ci_admin_settings  where columnname='cartcouponcode'");
	if (!empty($cartcouponcode)) {
		return $cartcouponcode['columndata'];
	} else {
		return "Error";
	}
}

function robVolumeDis()
{
	global $db;
	$volumedis = $db->rawQueryOne("select columndata from ci_admin_settings  where columnname='volumedis'");
	if (!empty($volumedis)) {
		return $volumedis['columndata'];
	} else {
		return "Error";
	}
}

function robHolidayMessages()
{
	global $db;
	$holidaymessages = $db->rawQueryOne("select columndata from ci_admin_settings  where columnname='holidaymessages'");
	if (!empty($holidaymessages)) {
		return $holidaymessages['columndata'];
	} else {
		return "Error";
	}
}


function getBrandTitle($catid)
{
	global $db;
	$brandTitle = $db->rawQueryOne("select pagetitle from ci_category  where categoryID=$catid");
	if (!empty($brandTitle)) {
		return $brandTitle['pagetitle'];
	} else {
		return "Error";
	}
}

function getBrandTagline($catid)
{
	global $db;
	$brandTagline = $db->rawQueryOne("select tagline from ci_category  where categoryID=$catid");
	if (!empty($brandTagline)) {
		return $brandTagline['tagline'];
	} else {
		return "Error";
	}
}

function getBrandDesc($catid)
{
	global $db;
	$brandDesc = $db->rawQueryOne("select htmldesc from ci_category  where categoryID=$catid");
	if (!empty($brandDesc)) {
		return $brandDesc['htmldesc'];
	} else {
		return "Error";
	}
}

function getBrandImg($catid)
{
	global $db;
	$brandImg = $db->rawQueryOne("select image from ci_category  where categoryID=$catid");
	if (!empty($brandImg)) {
		return $brandImg['image'];
	} else {
		return "Error";
	}
}

function getCategoryName($catId)
{
	global $db;
	$pdetails = $db->rawQueryOne("select name from ci_category where categoryID=? ", array($catId));
	return $pdetails['name'];
}

function getMultipleCategoryName($catId)
{
	global $db;
	$categories = implode("', '", $catId);
	$pdetails = $db->rawQuery("select categoryID, name from ci_category where categoryID IN ('" . $categories . "') ");
	return array_reduce($pdetails, function ($res, $item) {
		$res[$item['categoryID']] = $item['name'];
		return $res;
	}, []);
}

function getColorName($colrid)
{
	global $db;
	$pdetails = $db->rawQueryOne("select colorFamily from ci_colors_total where colorFamilyID=? ", array($colrid));
	return $pdetails['colorFamily'];
}

function getSizeName($sizeId)
{
	global $db;
	$pdetails = $db->rawQueryOne("select sizeName from ci_sizes_total where sizeName like '%" . $sizeId . "%' ", array($sizeId));
	return $pdetails['sizeName'];
}


function get_categoriesSort()
{
	global $db;
	//$categories = $db->rawQuery ("select name,catEDIid,totalProduct from ci_category_local  where showOnHome=? order by homepageLeftsideDisporder asc ", array(1));
	$categories = $db->rawQuery("select name,catEDIid,totalProduct from ci_category_local  where showOnHome=? order by displayOrder asc ", array(1)); //Start - Filters lets put in order - RM - 02/11/2021
	if (!empty($categories)) {
		return $categories;
	} else {
		return false;
	}
}

function get_categoriesSortBrand($brandName)
{
	global $db;
	$categories = $db->rawQuery("SELECT cl.name,cl.categoryID, (SELECT COUNT(*) FROM ci_styles css WHERE css.basecategory = cl.name AND css.brandname = '" . $brandName . "') AS totalProduct FROM ci_category cl  where cl.name IN (SELECT cs.baseCategory FROM ci_styles cs WHERE cs.brandname = '" . $brandName . "')  order by totalProduct desc ", array(1));
	if (!empty($categories)) {
		return $categories;
	} else {
		return false;
	}
}


function get_categoriesMSort()
{
	global $db;
	$catidss = array('42,119,3,105,88,5,135,14,138,116,121,146,23,24,6045');
	$categories = $db->rawQuery("select * from ci_category  where categoryID IN(42,119,3,105,88,5,135,14,138,116,121,146,23,24,318,6045) and mstatus=0 group by name "); //Start - How to add Face Mask on More - RM - 10/22/2021
	if (!empty($categories)) {
		return $categories;
	} else {
		return false;
	}
}


function get_all_brands($stwherecon = '')
{

	global $db;
	$whcon = "";



	/*if(isset($categoryId) && $categoryId!="") {

$cats=explode("_",$categoryId);
		if(!empty($cats[1])) {
		//print_r
		$categoryId1=$cats[0];
		$categoryId2=$cats[1];
		//echo $categoryId1."--".$categoryId2;
		//die();
		if($categoryId1!="" && $categoryId2!="") {
		$whcon=" WHERE FIND_IN_SET($categoryId1, categories) and FIND_IN_SET($categoryId2, categories) ";
		}
 } else {

	if($categoryId==59) {
		$whcon=" WHERE (FIND_IN_SET($categoryId, categories) or FIND_IN_SET(9, categories))";
		} else if($categoryId==52) {
		$whcon=" WHERE (FIND_IN_SET($categoryId, categories) or FIND_IN_SET(18, categories))";
		} else if($categoryId==49) {
		$whcon=" WHERE (FIND_IN_SET($categoryId, categories) or FIND_IN_SET(25, categories))";
		} else if($categoryId==22) {
		$whcon=" WHERE (FIND_IN_SET($categoryId, categories) or FIND_IN_SET(102, categories))";
		}  else {
		$whcon=" WHERE FIND_IN_SET($categoryId, categories)";
		}



//$whcon=" WHERE FIND_IN_SET($categoryId, categories)";
}
}*/
	/*echo "SELECT brandName,brandslug FROM `ci_styles` where ".str_replace(" AND (F"," (F",str_replace(" AND F"," F",$stwherecon))." group by  brandName order by brandName ASC";
die();*/

	$brands = $db->rawQuery("SELECT brandName,brandslug FROM `ci_styles` where 1 " . $stwherecon . " and brandstatus=0 AND brandName <> '' group by brandName order by brandName ASC"); //Start - showing wrong product when you click (lee) on brands side filter (SL6) - RM - 01/20/2022
	if (!empty($brands)) {
		return $brands;
	} else {
		return false;
	}
}




function getTotalBrands($brandname, $where1 = false)
{
	global $db;
	$sTotal = 0;
	$whereConditions = $where1;
	if ($where1 != false) {
		$whereConditions .= " and brandName like '%" . $brandname . "%' ";
		$sql = "SELECT count(styleID) as total FROM ci_styles where 1 " . $whereConditions . "  and pPrice!='0.00' and isExistProduct=1 and bestsellerrank<>0  order by  styleID ASC";
		//echo $sql;
		//die($sql);
		$clor = $db->rawQuery($sql);

		foreach ($clor as $kk => $vv) {
			$sTotal = $sTotal + $vv['total'];
		}
		if (intval($sTotal) > 0) {
			return $sTotal;
		} else {
			return 0;
		}
	} else {
		$sql = "SELECT count(styleID) as total FROM `ci_styles` WHERE brandName like '%" . $brandname . "%'  and pPrice!='0.00' and isExistProduct=1  ";
		//die($sql);
		$clor = $db->rawQuery($sql);
		$sTotal = $clor[0]['total'];

		if (intval($sTotal) > 0) {
			return $sTotal;
		} else {
			return 0;
		}
	}
}



function getTotalLBrands($brandname, $where1 = false)
{
	global $db;
	$sTotal = 0;
	$whereConditions = $where1;
	if ($where1 != false) {
		$whereConditions .= " and brandslug='" . $brandname . "' ";
		$sql = "SELECT count(styleID) as total FROM ci_styles where  1 " . $whereConditions . "  and pPrice!='0.00' and isExistProduct=1 and bestsellerrank<>0  order by  styleID ASC";
		//echo $sql;
		//	die($sql);
		$clor = $db->rawQuery($sql);

		foreach ($clor as $kk => $vv) {
			$sTotal = $sTotal + $vv['total'];
		}
		if (intval($sTotal) > 0) {
			return $sTotal;
		} else {
			return 0;
		}
	} else {
		$sql = "SELECT count(styleID) as total FROM `ci_styles` WHERE brandslug = '" . $brandname . "'  and pPrice!='0.00' and isExistProduct=1  ";
		//die($sql);
		$clor = $db->rawQuery($sql);
		$sTotal = $clor[0]['total'];

		if (intval($sTotal) > 0) {
			return $sTotal;
		} else {
			return 0;
		}
	}
}


function getTotalMBrands($brandname, $where1 = false)
{
	global $db;
	$whereConditions = $where1;
	if ($where1 != false) {
		$whereConditions .= " and brandName like '%" . $brandname . "%' and brandstatus=0 ";
		$sql = "SELECT count(styleID) as total FROM ci_styles where 1 " . $whereConditions . "  and pPrice>0 and isExistProduct=1 and bestsellerrank<>0  order by  styleID ASC";
		//die($sql);
		$clor = $db->rawQuery($sql);

		foreach ($clor as $kk => $vv) {
			$sTotal = $sTotal + $vv['total'];
		}
		if (intval($sTotal) > 0) {
			return $sTotal;
		} else {
			return 0;
		}
	} else {
		$sql = "SELECT count(styleID) as total FROM `ci_styles` WHERE brandName like '%" . $brandname . "%' and brandstatus=0  and pPrice>0 and isExistProduct=1  ";
		//die($sql);
		$clor = $db->rawQuery($sql);
		$sTotal = $clor[0]['total'];

		if (intval($sTotal) > 0) {
			return $sTotal;
		} else {
			return 0;
		}
	}
}





function get_category_total($categoryId)
{
	global $db;
	$tProducts = 0;
	if ($categoryId == 59) {
		$stwhere = "  (FIND_IN_SET($categoryId, categories) or FIND_IN_SET(9, categories))";
	} else if ($categoryId == 52) {
		$stwhere = "  (FIND_IN_SET($categoryId, categories) or FIND_IN_SET(18, categories))";
	} else if ($categoryId == 49) {
		$stwhere = "  (FIND_IN_SET($categoryId, categories) or FIND_IN_SET(25, categories))";
	} else if ($categoryId == 22) {
		$stwhere = "  (FIND_IN_SET($categoryId, categories) or FIND_IN_SET(102, categories))";
	} else {
		$stwhere = "  FIND_IN_SET($categoryId, categories)";
	}

	$pdetails = $db->rawQuery("SELECT count(styleID) as total FROM `ci_styles` where $stwhere and pPrice>0 and bestsellerrank<>0 and isExistProduct=1 order by styleID ASC ", array($catId));
	foreach ($pdetails as $kk => $vv) {
		$tProducts = $tProducts + $vv['total'];
	}
	return $tProducts;
}


function getColName($col, $key, $val)
{
	global $db;
	$pdetails = $db->rawQueryOne("select $col from ci_products where $key=?", array($val));
	return $pdetails[$col];
}

function getFirstColorName($styleID)
{
	global $db;
	$pdetails = $db->rawQueryOne("select colorName from ci_products where styleID=? order by colorName asc ", array($styleID));
	return $pdetails['colorName'];
}

function getStyleThumnailImages($styleID)
{
	global $db;
	$pdetails = $db->rawQueryOne("select colorFrontImage,colorSideImage,colorBackImage from ci_products where styleID=? order by colorName asc ", array($styleID));
	return $pdetails;
}

function getStyleColorsImages($styleID)
{
	global $db;
	$pdetails = $db->rawQuery('SELECT styleID,colorFrontImage,colorFamilyID from ci_products where styleID = ? group by colorName order by colorName asc ', array($styleID));
	return $pdetails;
}

//test function for script
function getStyleColorsImages_test($styleID)
{
	global $db;
	$pdetails = $db->rawQuery('SELECT styleID,colorFrontImage,colorFamilyID from ci_products where styleID = ? group by colorName order by colorName asc ', array($styleID));
	return $pdetails;
}


function get_product_color($styleID)
{
	global $db;
	$colors = $db->rawQuery('SELECT color1,color2,colorFamily,colorGroup,colorSwatchImage,colorFamilyID,colorName from ci_products where styleID = ? group by colorName ', array($styleID));
	if (!empty($colors)) {
		return $colors;
	} else {
		return false;
	}
}

//test function for script
function get_product_color_test($styleID)
{
	global $db;
	$colors = $db->rawQuery('SELECT color1,colorFamily,colorGroup,colorSwatchImage,colorFamilyID,colorName from ci_products_insert where styleID = ? group by colorName ', array($styleID));
	if (!empty($colors)) {
		return $colors;
	} else {
		return false;
	}
}

function get_product_color_all($styleID)
{
	global $db;
	$colors = $db->rawQuery('SELECT colorFamilyID,colorGroup,colorName from ci_products where styleID = ? group by colorGroup ', array($styleID));
	if (!empty($colors)) {
		return $colors;
	} else {
		return false;
	}
}

//test function for script
function get_product_color_all_test($styleID)
{
	global $db;
	$colors = $db->rawQuery('SELECT colorFamilyID,colorGroup,colorName from ci_products_insert where styleID = ? group by colorGroup ', array($styleID));
	if (!empty($colors)) {
		return $colors;
	} else {
		return false;
	}
}

function get_product_skuNskulls($styleID)
{
	global $db;
	$skus = $db->rawQuery('SELECT sku,skuID,skuID_Master,gtin from ci_products where styleID = ? group by sku ', array($styleID));
	if (!empty($skus)) {
		return $skus;
	} else {
		return false;
	}
}

function get_product_sizes_all($styleID)
{
	global $db;
	$sizes = $db->rawQuery('SELECT sizeName,sizeCode,sizeOrder FROM `ci_products` where styleID = ? group by `sizeName` order by `sizeOrder` ', array($styleID));
	if (!empty($sizes)) {
		return $sizes;
	} else {
		return false;
	}
}

// test function for script
function get_product_sizes_all_test($styleID)
{
	global $db;
	$sizes = $db->rawQuery('SELECT sizeName,sizeCode,sizeOrder FROM `ci_products` where styleID = ? group by `sizeName` order by `sizeOrder` ', array($styleID));
	if (!empty($sizes)) {
		return $sizes;
	} else {
		return false;
	}
}





/*function get_style_product_price($styleid){
global $db;
$params = array($styleid);
$actualPrice = $db->rawQuery("SELECT customerPrice,piecePrice, salePrice FROM ci_products WHERE styleID=? order by piecePrice,salePrice ASC limit 1", $params);
if(intval($actualPrice[0]['piecePrice'])>0){
		if(intval($actualPrice[0]['piecePrice'])==0){
			return  @$actualPrice[1]['salePrice'];
		} else {
			 return @$actualPrice[0]['piecePrice'];
		}
}*/

function get_style_product_price($styleid)
{
	global $db;
	$params = array('');
	$actualPrice = $db->rawQueryOne("SELECT customerPrice FROM ci_products WHERE styleID=$styleid order by customerPrice ASC limit 1");
	if (intval($actualPrice['customerPrice']) > 0) {
		return @$actualPrice['customerPrice'];
	} else {
		return 0;
	}
}
//test function for script
function get_style_product_price_test($styleid)
{
	global $db;
	$params = array('');
	$actualPrice = $db->rawQueryOne("SELECT customerPrice FROM ci_products_insert WHERE styleID=$styleid order by customerPrice ASC limit 1");
	if (intval($actualPrice['customerPrice']) > 0) {
		return @$actualPrice['customerPrice'];
	} else {
		return 0;
	}
}


function fnGetSizes($styleId)
{
	global $db;
	$params = array($styleId);
	$stSizes = $db->rawQuery('SELECT sizeName from ci_products where styleID = ? group by sizeName order by sizeOrder asc ', $params);
	return $stSizes;
}

function fnGetAllSizes($styleId)
{
	global $db;
	$params = array('');
	$stSizes = $db->rawQuery('SELECT sizeName from ci_products where 1 group by sizeName order by sizeOrder asc ');
	return $stSizes;
}

function fnGetSizesPrices($styleId, $colorFamilyId)
{
	global $db;
	$params = array($styleId, $colorFamilyId);
	$stSizesPrices = $db->rawQuery('SELECT piecePrice,salePrice from ci_products where styleID = ? and colorFamilyID = ? group by sizeName order by sizeOrder asc ', $params);
	return $stSizesPrices;
}

// test function for script
function fnGetSizesPrices_test($styleId, $colorFamilyId)
{
	global $db;
	$params = array($styleId, $colorFamilyId);
	$stSizesPrices = $db->rawQuery('SELECT piecePrice,salePrice from ci_products_insert where styleID = ? and colorFamilyID = ? group by sizeName order by sizeOrder asc ', $params);
	return $stSizesPrices;
}

function fnGetSubCategories($status, $catId)
{
	global $db;
	$params = array($status, $catId);
	$stSubCategories = $db->rawQuery('SELECT * from ci_category_local_map where mappedSubStatus = ? and mappedSubCatLiveParentId = ? order by sort asc ', $params);
	return $stSubCategories;
}

function fnGetSubCategoriesfooter($status, $catId)
{
	global $db;
	$params = array($status, $catId);
	$stSubCategories = $db->rawQueryOne('SELECT * from ci_category_local_map where mappedSubStatus = ? and mappedSubCatId = ? order by sort asc', $params);
	return $stSubCategories;
}

function getSlug($catid)
{
	global $db;
	$params = array('');
	$actualPrice = $db->rawQueryOne("SELECT slug FROM ci_category WHERE categoryID=$catid limit 1");
	return $actualPrice['slug'];
}

function getcatIdbySlug($catid)
{
	global $db;
	// Start - This is for LIVE and Stage MySQL injection - AP - 02/09/2021
	$params = [$catid, $catid];
	$actualPrice = $db->rawQueryOne("SELECT categoryID FROM ci_category WHERE slug= ? or cslug=? limit 1", $params);
	// End - This is for LIVE and Stage MySQL injection - AP - 02/09/2021
	return $actualPrice['categoryID'];
}

function getcatIdbySlugFromMeta($catid)
{
	global $db;
	// Start - This is for LIVE and Stage MySQL injection - AP - 02/09/2021
	$params = [$catid];
	$actualPrice = $db->rawQueryOne("SELECT categoryID FROM ci_category_meta WHERE slug= ? AND is_active = 1 limit 1", $params);
	// End - This is for LIVE and Stage MySQL injection - AP - 02/09/2021
	return $actualPrice['categoryID'];
}

function getCategoryMetaBySlug($catid)
{
	global $db;
	$actualPrice = $db->rawQueryOne("SELECT pagemetatitle, pagemetakeywords, pagemetadescription FROM ci_category_meta WHERE slug = ? AND is_active = 1 limit 1", [$catid]);
	return $actualPrice;
}

function getslugdbySlug($catid)
{
	global $db;
	$params = array('');
	$actualPrice = $db->rawQueryOne("SELECT slug FROM ci_category WHERE slug like '" . $catid . "%' or cslug like '" . $catid . "%' limit 1");
	return $actualPrice['slug'];
}


function chkCustomSlugexistCategory($catid)
{
	global $db;

	$catslug = $db->rawQueryOne("select cslug,slug from ci_category where categoryID ='" . $catid . "' ");
	if (isset($catslug['cslug']) && $catslug['cslug'] != "") {
		return $catslug['cslug'];
	} else {
		return $catslug['slug'];
	}
}

function fnCountSubCategory($subcatid, $catid)
{
	global $db;
	$params = array('');
	$scategory = $db->rawQueryOne("SELECT count(styleID) as total FROM `ci_styles` where (FIND_IN_SET($catid, categories) and FIND_IN_SET($subcatid, categories))  and pPrice>0 and isExistProduct=1 ");
	if (isset($scategory['total']) && $scategory['total'] > 0) {
		return true;
	} else {
		return false;
	}
}


function fnCountSubCategoryMore($catid)
{
	global $db;
	$params = array('');
	$scategory = $db->rawQueryOne("SELECT count(styleID) as total FROM `ci_styles` where FIND_IN_SET($catid, categories) and pPrice>0 and isExistProduct=1 ");
	if (isset($scategory['total']) && $scategory['total'] > 0) {
		return true;
	} else {
		return false;
	}
}

function getTopNavSubMenuAjax($catid)
{
	global $db;

	$query = <<<EOD
SELECT
	ci_category_local_map.forceShow as forceShow,
	ci_styles.styleImage as styleImage,
	ci_category_local_map.mappedSubCatId AS id,
	ci_category_local_map.mappedSubCatName AS name,
	ci_category_local_map.sort,
	ci_category_local_map.mappedSubCatLiveParentId AS category_id,
	CASE WHEN prime_category.cslug <> '' THEN prime_category.cslug ELSE prime_category.slug END AS prime_slug,
	CASE WHEN sub_category.cslug <> '' THEN sub_category.cslug ELSE sub_category.slug END AS sub_slug
FROM ci_category_local_map
INNER JOIN ci_category AS prime_category ON prime_category.categoryID = ci_category_local_map.mappedSubCatLiveParentId
INNER JOIN ci_category AS sub_category ON sub_category.categoryID = ci_category_local_map.mappedSubCatId
INNER JOIN ci_styles ON (FIND_IN_SET(ci_category_local_map.mappedSubCatId, categories) AND FIND_IN_SET(ci_category_local_map.mappedSubCatLiveParentId, categories)) AND ci_styles.pPrice > 0 AND ci_styles.isExistProduct = 1 OR (FIND_IN_SET(ci_category_local_map.mappedSubCatLiveParentId, categories) AND ci_category_local_map.forceShow = 1)
WHERE ci_category_local_map.mappedSubStatus = 1
AND ci_category_local_map.mappedSubCatLiveParentId = '$catid'
GROUP BY prime_slug, sub_slug
ORDER BY sort ASC
EOD;

	$subcategories = $db->rawQuery($query);

	$html = "";
	if (!empty($subcategories)) {
		$html .= '<ul class="mega-menu">'; //Start - Mega Menu with more sub links like SnS - Roi - 09/10/2020
		foreach ($subcategories as $subcategory) {
			if (in_array($subcategory['name'], $names))
				continue;

			//Start - How to add submenu? - RM - 10/09/2020
			/*if ($subcategory['forceShow'] == 1) {
					$subcategory['item_lists'] = $db->rawQuery("SELECT slug, customTitle, slugCategory FROM ci_styles where FIND_IN_SET(" . $subcategory['id'] . ", categories) and bestsellerrank <> 0 order by bestsellerrank ASC LIMIT 5"); // Start - Mega Menu with more sub links like SnS - Roi - 09/11/2020
				} else {
					$subcategory['item_lists'] = $db->rawQuery("SELECT slug, customTitle, slugCategory FROM ci_styles where FIND_IN_SET(" . $subcategory['category_id'] . ", categories) AND FIND_IN_SET(" . $subcategory['id'] . ", categories) and bestsellerrank <> 0 order by bestsellerrank ASC LIMIT 5"); // Start - Mega Menu with more sub links like SnS - Roi - 09/11/2020
				}*/
			//End - How to add submenu? - RM - 10/09/2020

			//Start - How to add submenu? - RM - 10/09/2020
			if ($subcategory['forceShow'] == 1) {
				$html .= '<li class="mega-menu__sub"><a class="mega-menu__title" href="' . base_url_site . $subcategory['sub_slug'] . '">' . $subcategory['name'] . '</a>';	//Start - Mega Menu with more sub links like SnS - Roi - 09/10/2020
			} else {
				$html .= '<li class="mega-menu__sub"><a class="mega-menu__title" href="' . base_url_site . $subcategory['prime_slug'] . '-' . $subcategory['sub_slug'] . '">' . $subcategory['name'] . '</a>';	//Start - Mega Menu with more sub links like SnS - Roi - 09/10/2020
			}
			//End - How to add submenu? - RM - 10/09/2020

			//Start - For our interactive menu please verify GotApparel.com - Roi - 10012020
			$html .= '<div class="mega-menu__body">';

			//$imgset = base_url_site.'styleImages/SCImages/cart-images/'.str_replace("Images/Style/","",$subcategory['styleImage']);

			//$html.='<div class="mega-menu__img"><img src="'.$imgset.'" alt="hello" class="image" onerror="this.src=\''.base_url_site.'images/no-image-found.jpg'.'\';"></div>';

			$html .= '<div class="mega-menu__text">';
			//End - For our interactive menu please verify GotApparel.com - Roi - 10012020

			$fits = array('3/4 Sleeve', 'Accessories', 'Advantage', 'American Made', 'Aprons', 'Athletics', 'Backpacks', 'Bags', 'Beanies', 'Bibs', 'Blankets', 'Bowling Shirts', 'Bras', 'Bucket', 'Camisoles', 'Camouflage', 'Capris', 'Chairs', 'Chambray', 'Cinch', 'Clear', 'Coolers', 'Cozy / Coozies', 'Cuffed / Cuffs', 'Digital', 'Dog Wear', 'Drawstrings', 'Dress Shirts', 'Dresses', 'Duffels', 'Five-Panel', 'Flat Bills', 'Fleece', 'Full-Zips', 'Gloves', 'Golf', 'Gusset', 'Headwear', 'Henley', 'High Visibility', 'Hooded / Hoods', 'Jackets', 'Jumpers', 'Kissing Zippers', 'Knit', 'Kryptek', 'Leggings', 'Long Sleeves', 'Loungewear', 'Media Pocket', 'Mesh Back', 'Messengers', 'Mossy Oak', 'Muddy Girl', 'Neons', 'Oilfield', 'Onesies', 'Open Backs', 'Open Bottoms', 'Outerwear', 'Packables', 'Pants', 'Plackets', 'Pockets', 'Polos', 'Ponchos', 'Pre-Curved Visor', 'Puffers', 'Pullovers', 'Quarter-Zips', 'Raglans', 'Realtree', 'Rollers / Luggage', 'Safety', 'Scarf / Scarves', 'School', 'Short Sleeves', 'Shorts', 'Six-Panel', 'Sleeveless', 'Spiritwear', 'Sport Shirts', 'Structured', 'Sweaters', 'Sweatpants', 'Sweatshirts', 'Swimwear', 'T-Shirts', 'Tank Tops', 'Thumbholes', 'Tie Dyed', 'Totes', 'Towels', 'Truckers', 'Underwear', 'Uniforms', 'Union Made', 'Unstructured', 'USA Made', 'Vests', 'Visor', 'Warm-ups', 'Workwear', 'Wovens');

			$listfits = implode("','", $fits);

			//$customfits = $db->rawQuery("SELECT name,categoryID, (SELECT count(styleID) as total FROM `ci_styles` where FIND_IN_SET(categoryID, categories) AND FIND_IN_SET(".$subcategory['category_id'].", categories) and FIND_IN_SET(".$subcategory['id'].", categories) and bestsellerrank<>0 and pPrice>0 and isExistProduct=1) as countFits from ci_category where name IN('" . $listfits . "') group by name order by countFits desc LIMIT 5");

			if ($subcategory['forceShow'] == 1) {
				$customfits = $db->rawQuery("SELECT name,categoryID, count(ci_styles.styleID) as countfits from ci_category INNER JOIN ci_styles ON FIND_IN_SET(ci_category.categoryID, ci_styles.categories) AND FIND_IN_SET(" . $subcategory['id'] . ", ci_styles.categories) where name IN('" . $listfits . "') group by name order by countfits desc LIMIT 5");
			} else {
				$customfits = $db->rawQuery("SELECT name,categoryID, count(ci_styles.styleID) as countfits from ci_category INNER JOIN ci_styles ON FIND_IN_SET(ci_category.categoryID, ci_styles.categories) AND FIND_IN_SET(" . $subcategory['category_id'] . ", ci_styles.categories) and FIND_IN_SET(" . $subcategory['id'] . ", ci_styles.categories) where name IN('" . $listfits . "') group by name order by countfits desc LIMIT 5");
			}

			//if (!empty($subcategory['item_lists'])) { // Start - Mega Menu with more sub links like SnS - Roi - 09/11/2020
			if (!empty($customfits)) {
				$html .= "<ul>";
				//foreach ($subcategory['item_lists'] as $key => $item_list) {
				foreach ($customfits as $key => $fit) {
					$html .= "<li class=" . $subcategory['category_id'] . '-' . $subcategory['id'] . "><a href=" . base_url_site . $subcategory['prime_slug'] . '-' . $subcategory['sub_slug'] . '?fitid=' . $fit['categoryID'] . ">" . $fit['name'] . "</a></li>";
					//$html .= "<li class=" . $subcategory['category_id'] . '-' . $subcategory['id'] . "><a href=" . base_url_site . $item_list['slugCategory'] . '/' . $item_list['slug'] . ">" . substr($item_list['customTitle'], 0, 25) . "...</a></li>";
				}
				$html .= "</ul>";

				if ($key >= 4) {
					$html .= "<a href=" . base_url_site . $subcategory['prime_slug'] . '-' . $subcategory['sub_slug'] . " class='mega-menu__more'>View more here <span>⇀</span> </a>";
				}
			}

			$html .= '</div></div>'; //Start - For our interactive menu please verify GotApparel.com - Roi - 10012020

			$html .= "</li>"; // End - Mega Menu with more sub links like SnS - Roi - 09/11/2020

			array_push($names, $subcategory['name']);
		}
		$html .= '</ul>';
	}

	return $html;
}

function getTopNavSubMenuAjaxStatic($mainid)
{
	global $db;
	$query = "select * from ci_sub_menu where mainid = ? order by position";
	$sub_menus = $db->rawQuery($query, [$mainid]);
	$html = "";
	if (!empty($sub_menus)) {
		$html .= '<ul class="mega-menu">';
		foreach ($sub_menus as $sub_menu) {
			// Start - look for menu mockup for mobile - CL - 10282022
			$html .= '<li class="mega-menu__sub"><a class="mega-menu__title" href="' . base_url_site . $sub_menu['slug'] . '">';

			if (!empty($sub_menu['imageurl'])) {
				$filename = explode('.', $sub_menu['imageurl'])[0];
				$mobile_path = base_url_site . 'images/menu/mobile/';
				$desktop_path = base_url_site . 'images/menu/desktop/';
				$webp_src = "webp/" . $filename . '.webp?v=1122022114';
				$png_src = "png/" . $filename . '.png?v=1122022114';

				$html .= '
				<picture>
					<source srcset="' . $mobile_path . $webp_src . ' " type="image/webp">
					<img class="image" src="' . $mobile_path . $png_src . '" loading="lazy" style="display:none;" width="44" height="55" onerror="$(this).hide();">
				</picture>';
			}
			;

			$html .= '		<span class="title">' . $sub_menu['title'] . '</span>
			</a>';
			$html .= '<div class="mega-menu__body">';
			$html .= '<div class="mega-menu__text">';

			$submenulists = $db->rawQuery("SELECT * from ci_sub_menu_list where subid= '" . $sub_menu['id'] . "' order by position");
			if (!empty($submenulists)) {
				$html .= "<ul>";
				foreach ($submenulists as $key => $submenulist) {
					$html .= "<li class=" . $sub_menu['id'] . '-' . $submenulist['id'] . "><a href=" . base_url_site . $submenulist['slug'] . ">" . $submenulist['title'] . "</a></li>";
				}
				$html .= "</ul>";
			}

			$html .= '</div>';

			if (!empty($sub_menu['imageurl'])) {
				$html .= '<div class="mega-menu__img"><a class="mega-menu__image-link" href="' . base_url_site . $sub_menu['slug'] . '">
					<picture>
						<source srcset="' . $desktop_path . $webp_src . ' " type="image/webp">
						<img class="image" src="' . $desktop_path . $png_src . '" loading="lazy" width="130" height="162" onerror="$(this).hide();" >
					</picture>
					</a></div>'; // Start - Display white blank image if webp is not supported - CL - 5/3/2021  |  make navbar menu images clickable WL 4/18/2022  | MEga menu image WL 4/20/22
			}
			// End - look for menu mockup for mobile - CL - 10282022
		}
		$html .= '</ul>';
	}
	return $html;
}



function get_TopNav()
{
	global $db;

	$query = <<<EOD
SELECT
    ci_category_local.catEDIid AS id,
   	ci_category_local.name,
   	CASE
	   	WHEN ci_category.cslug <> ''
			THEN ci_category.cslug
			ELSE ci_category.slug
	END AS slug
FROM ci_category_local
INNER JOIN ci_category ON ci_category.categoryID = ci_category_local.catEDIid
WHERE STATUS = 1
GROUP BY ci_category_local.categoryLocalID
ORDER BY displayOrder
EOD;

	$categories = $db->rawQuery($query);

	$html = "";
	foreach ($categories as $category) {
		$html .= '<li class="navbar__footer-item" data-categoryid = "' . $category['id'] . '"><div class="navbar__footer-header">
			<a class="navbar__footer-link" href="' . base_url_site . $category['slug'] . '">' . $category['name'] . '</a>
		 	<button class="btn navbar__footer-item-btn"><img src="' . base_url_site . 'images/new/chevron-right.svg" alt="submenu"></button>
		 </div>
		';
	}

	return $html;
}

function get_TopNavStatic()
{
	global $db;
	// Start - look for menu mockup for mobile - CL - 10282022 - 736am
	// $query = "select * from ci_main_menu order by position";
	$query = "SELECT menu.title, menu.slug, sub.imageurl, menu.img_title, menu.img_alt, menu.id AS id FROM ci_sub_menu AS sub INNER JOIN ci_main_menu AS menu ON menu.id = sub.mainid GROUP BY menu.title ORDER BY menu.position"; // Start - Bulkapparel missing image alt - CL - 882024	
	$main_menus = $db->rawQuery($query);

	$html = "";
	foreach ($main_menus as $main_menu) {
		//Start - How to add Face Mask on More - RM - 10/27/2021
		$html .= '<li class="navbar__footer-item" data-categoryid = "' . $main_menu['id'] . '"><div class="navbar__footer-header">';

		$html .= '<a class="navbar__footer-link" href="' . base_url_site . $main_menu['slug'] . '">';

		if ($main_menu['imageurl']) {
			$filename = explode('.', $main_menu['imageurl'])[0];
			$webp_src = base_url_site . 'images/menu/mobile/' . "webp/" . $filename . '.webp?v=1122022114';
			$png_src = base_url_site . 'images/menu/mobile/' . "png/" . $filename . '.png?v=1122022114';
			// Start - Bulkapparel missing image alt - CL - 862024
			$alt_attr = isset($main_menu['img_alt']) ? 'alt="' . $main_menu['img_alt'] . '"' : '';
			$title_attr = isset($main_menu['img_title']) ? 'title="' . $main_menu['img_title'] . '"' : '';

			$html .= '<picture>
				<source srcset="' . $webp_src . ' " type="image/webp">
				<img class="navbar__footer-image" src="' . $png_src . '" width="48" height="60" loading="lazy" style="display:none;" ' . $alt_attr . ' ' . $title_attr . '>
			</picture>';
			// End - Bulkapparel missing image alt - CL - 862024
		}

		$html .= $main_menu['title'] . '</a>
			 	<button class="btn navbar__footer-item-btn">
				   <img src="' . base_url_site . 'images/new/chevron-right.svg?v=1122022114" width="48" height="60" alt="Toggle Submenu Icon" title="Submenu" loading="lazy">
				</button>
			 </div>
			';
		//End - How to add Face Mask on More - RM - 10/27/2021
		// End - look for menu mockup for mobile - CL - 10282022 - 736am
	}
	return $html;
}


function get_TopNavBeforeAjax()
{
	global $db;

	$query = <<<EOD
SELECT
    ci_category_local.catEDIid AS id,
   	ci_category_local.name,
   	CASE
	   	WHEN ci_category.cslug <> ''
			THEN ci_category.cslug
			ELSE ci_category.slug
	END AS slug
FROM ci_category_local
INNER JOIN ci_category ON ci_category.categoryID = ci_category_local.catEDIid
WHERE STATUS = 1
GROUP BY ci_category_local.categoryLocalID
ORDER BY displayOrder
EOD;

	$categories = $db->rawQuery($query);
	$categoryIds = implode("', '", array_column($categories, 'id'));

	//Start - For our interactive menu please verify GotApparel.com - Roi - 10012020 - added imagecat
	//Start - How to add submenu? - RM - 10/09/2020 - added forceShow field on select and join
	$query = <<<EOD
SELECT
	ci_category_local_map.forceShow as forceShow,
	ci_styles.styleImage as styleImage,
	ci_category_local_map.mappedSubCatId AS id,
	ci_category_local_map.mappedSubCatName AS name,
	ci_category_local_map.sort,
	ci_category_local_map.mappedSubCatLiveParentId AS category_id,
	CASE WHEN prime_category.cslug <> '' THEN prime_category.cslug ELSE prime_category.slug END AS prime_slug,
	CASE WHEN sub_category.cslug <> '' THEN sub_category.cslug ELSE sub_category.slug END AS sub_slug
FROM ci_category_local_map
INNER JOIN ci_category AS prime_category ON prime_category.categoryID = ci_category_local_map.mappedSubCatLiveParentId
INNER JOIN ci_category AS sub_category ON sub_category.categoryID = ci_category_local_map.mappedSubCatId
INNER JOIN ci_styles ON (FIND_IN_SET(ci_category_local_map.mappedSubCatId, categories) AND FIND_IN_SET(ci_category_local_map.mappedSubCatLiveParentId, categories)) AND ci_styles.pPrice > 0 AND ci_styles.isExistProduct = 1 OR (FIND_IN_SET(ci_category_local_map.mappedSubCatLiveParentId, categories) AND ci_category_local_map.forceShow = 1)
WHERE ci_category_local_map.mappedSubStatus = 1
AND ci_category_local_map.mappedSubCatLiveParentId IN ('$categoryIds')
GROUP BY prime_slug, sub_slug
ORDER BY sort ASC
EOD;

	$subcategories = $db->rawQuery($query);

	$html = "";
	foreach ($categories as $category) {
		// Start - Menu and footer customizable colors backbround for holidays - CL - 11/17/2020
		$html .= '<li class="navbar__footer-item"><div class="navbar__footer-header">
			<a class="navbar__footer-link" href="' . base_url_site . $category['slug'] . '">' . $category['name'] . '</a>
		 	<button class="btn navbar__footer-item-btn"><img src="' . base_url_site . 'images/new/chevron-right.svg" alt="submenu"></button>
		 </div>
		'; //Start - Mega Menu with more sub links like SnS - Roi - 09/10/2020  | WL 10212020 - Remove this <img src="' . base_url_site . 'images/subnav-indicator.png" alt="submenu">
		// End - Menu and footer customizable colors backbround for holidays - CL - 11/17/2020
		$items = array_filter($subcategories, function ($subcategory) use ($category) {
			return $category['id'] == $subcategory['category_id'];
		});

		$names = [];

		if (!empty($items)) {
			$html .= '<ul class="mega-menu">'; //Start - Mega Menu with more sub links like SnS - Roi - 09/10/2020
			foreach ($items as $subcategory) {
				if (in_array($subcategory['name'], $names))
					continue;

				//Start - How to add submenu? - RM - 10/09/2020
				if ($subcategory['forceShow'] == 1) {
					$subcategory['item_lists'] = $db->rawQuery("SELECT slug, customTitle, slugCategory FROM ci_styles where FIND_IN_SET(" . $subcategory['id'] . ", categories) and bestsellerrank <> 0 order by bestsellerrank ASC LIMIT 5"); // Start - Mega Menu with more sub links like SnS - Roi - 09/11/2020
				} else {
					$subcategory['item_lists'] = $db->rawQuery("SELECT slug, customTitle, slugCategory FROM ci_styles where FIND_IN_SET(" . $subcategory['category_id'] . ", categories) AND FIND_IN_SET(" . $subcategory['id'] . ", categories) and bestsellerrank <> 0 order by bestsellerrank ASC LIMIT 5"); // Start - Mega Menu with more sub links like SnS - Roi - 09/11/2020
				}
				//End - How to add submenu? - RM - 10/09/2020

				//Start - How to add submenu? - RM - 10/09/2020
				if ($subcategory['forceShow'] == 1) {
					$html .= '<li class="mega-menu__sub"><a class="mega-menu__title" href="' . base_url_site . $subcategory['sub_slug'] . '">' . $subcategory['name'] . '</a>';	//Start - Mega Menu with more sub links like SnS - Roi - 09/10/2020
				} else {
					$html .= '<li class="mega-menu__sub"><a class="mega-menu__title" href="' . base_url_site . $subcategory['prime_slug'] . '-' . $subcategory['sub_slug'] . '">' . $subcategory['name'] . '</a>';	//Start - Mega Menu with more sub links like SnS - Roi - 09/10/2020
				}
				//End - How to add submenu? - RM - 10/09/2020

				//Start - For our interactive menu please verify GotApparel.com - Roi - 10012020
				$html .= '<div class="mega-menu__body">';

				//$imgset = base_url_site.'styleImages/SCImages/cart-images/'.str_replace("Images/Style/","",$subcategory['styleImage']);

				//$html.='<div class="mega-menu__img"><img src="'.$imgset.'" alt="hello" class="image" onerror="this.src=\''.base_url_site.'images/no-image-found.jpg'.'\';"></div>';

				$html .= '<div class="mega-menu__text">';
				//End - For our interactive menu please verify GotApparel.com - Roi - 10012020

				if (!empty($subcategory['item_lists'])) { // Start - Mega Menu with more sub links like SnS - Roi - 09/11/2020
					$html .= "<ul>";
					foreach ($subcategory['item_lists'] as $key => $item_list) {
						$html .= "<li class=" . $subcategory['category_id'] . '-' . $subcategory['id'] . "><a href=" . base_url_site . $item_list['slugCategory'] . '/' . $item_list['slug'] . ">" . substr($item_list['customTitle'], 0, 25) . "...</a></li>";
					}
					$html .= "</ul>";

					if ($key >= 4) {
						$html .= "<a href=" . base_url_site . $subcategory['prime_slug'] . '-' . $subcategory['sub_slug'] . " class='mega-menu__more'>View more here <span>⇀</span> </a>";
					}
				}

				$html .= '</div></div>'; //Start - For our interactive menu please verify GotApparel.com - Roi - 10012020

				$html .= "</li>"; // End - Mega Menu with more sub links like SnS - Roi - 09/11/2020

				array_push($names, $subcategory['name']);
			}
			$html .= '</ul>';
		}
	}

	return $html;

	$stCategories = $db->rawQuery('SELECT * from ci_category_local where status = ? order by displayOrder ', array(1));
	foreach ($stCategories as $k => $v) {
		$html .= '<li><a href="' . base_url_site . chkCustomSlugexistCategory($v['catEDIid']) . '">' . $v['name'] . '</a><span><img src="' . base_url_site . 'images/subnav-indicator.png" alt="submenu"></span>';

		$stSubCategories = fnGetSubCategories("1", $v['catEDIid']);

		if (!empty($stSubCategories)) {
			$html .= '<ul>';
			foreach ($stSubCategories as $key => $val) {
				if (fnCountSubCategory($val['mappedSubCatId'], $v['catEDIid'])) {
					$html .= '<li><a href="' . base_url_site . chkCustomSlugexistCategory($val['mappedSubCatLiveParentId']) . '-' . chkCustomSlugexistCategory($val['mappedSubCatId']) . '">' . $val['mappedSubCatName'] . '</a>';
				}
			}
			$html .= '</ul>';
		}
		$html .= '</li>';
	}
	return $html;
}

function get_SiteMapNav()
{
	global $db;
	$html = "";
	$j = 1;
	$stCategories = $db->rawQuery('SELECT * from ci_category_local where status = ? order by displayOrder ', array(1));
	$html .= '<div class="sitebox">';
	foreach ($stCategories as $k => $v) {
		$html .= '<ul>';
		$html .= '<li><a href="' . base_url_site . chkCustomSlugexistCategory($v['catEDIid']) . '"><strong>' . $v['name'] . ' Wholesale</strong></a></li>';
		$html .= '<li><a href="' . base_url_site . chkCustomSlugexistCategory($v['catEDIid']) . '">View All</a></li>';
		$html .= '<li><a href="' . base_url_site . chkCustomSlugexistCategory($v['catEDIid']) . '">BestSellers</a></li>';

		$stSubCategories = fnGetSubCategories("1", $v['catEDIid']);

		if (!empty($stSubCategories)) {

			foreach ($stSubCategories as $key => $val) {

				$html .= '<li><a href="' . base_url_site . chkCustomSlugexistCategory($val['mappedSubCatLiveParentId']) . '-' . chkCustomSlugexistCategory($val['mappedSubCatId']) . '">' . $val['mappedSubCatName'] . '</a>';
			}
			$html .= '</li>';
		}

		$html .= '</ul>';
		if ($j % 5 == 0) {
			$html .= '</div><div class="sitebox">';
		}
		$j++;
	}
	return $html;
}



function get_CatFooterNav1($catId)
{
	global $db;
	$html = "";
	$catlistids = explode(",", $catId);

	$i = 0;
	$mcategory = array();
	$smcategory = array();

	for ($k = 0; $k < count($catlistids); $k++) {
		$gcat = explode("_", $catlistids[$k]);
		if ($gcat[0] == "c") {
			$mcategory[] = $gcat[1];
		}
		if ($gcat[0] == "s") {
			$smcategory[] = $gcat[1];
		}
	}
	$stCategories = $db->rawQuery("SELECT * from ci_category_local where  status = 1 order by displayOrder ");
	foreach ($stCategories as $keys => $items) {
		if (in_array($items['catEDIid'], $mcategory)) {
			//if(($items['catEDIid']==$gcat[1])) {
			$html .= '<li class="footer__list-item"><a class="footer__list-link" href="' . base_url_site . chkCustomSlugexistCategory($items['catEDIid']) . '">' . $items['name'] . '</a></li>'; // Start - Menu and footer customizable colors backbround for holidays - CL - 11/17/2020
		}
		$i++;
	}
	//print_r($mcategory);
	for ($j = 0; $j < count($smcategory); $j++) {
		//$gscat=explode("_",$catlistids[$i]);
		$stSubCategories = fnGetSubCategoriesfooter("1", $smcategory[$j]);
		//print_r($stSubCategories);
		/*
		if(!empty($stSubCategories)){
		foreach($stSubCategories as $key=>$val){
		if(in_array($val['mappedSubCatId'],$smcategory)) {*/
		//if(($val['mappedSubCatId']==$gscat[1]) && $smcategory[0]=="s") {
		$html .= '<li class="footer__list-item"><a class="footer__list-link" href="' . base_url_site . chkCustomSlugexistCategory($stSubCategories['mappedSubCatId']) . '">' . $stSubCategories['mappedSubCatName'] . '</a></li>'; // Start - Menu and footer customizable colors backbround for holidays - CL - 11/12/2020
		//}
		//}
		//}
	}
	return $html;
}

function get_CatFooterNav2($brndnames)
{
	global $db;
	$html = "";
	$brndlist = explode(",", $brndnames);
	$listbrnds = implode("','", $brndlist);
	$brands = $db->rawQuery("SELECT brandslug,brandName from ci_styles where brandName IN('" . $listbrnds . "') and bestsellerrank<>0 group by brandName order by bestsellerrank asc limit 0,10");
	foreach ($brands as $i => $v) {
		$html .= '<li class="footer__list-item"><a class="footer__list-link" href="' . base_url_site . 'styles?brand=' . strtolower($v['brandslug']) . '">' . $v['brandName'] . '</a></li>'; // Start - Menu and footer customizable colors backbround for holidays - CL - 11/17/2020
	}
	return $html;
}

function get_CatFooterNav3($pgids)
{
	global $db;
	$html = "";
	$brands = $db->rawQuery("SELECT * from ci_pages where pageid IN(" . $pgids . ") order by pageid asc limit 0,10");
	foreach ($brands as $i => $v) {
		$html .= '<li class="footer__list-item"><a class="footer__list-link" href="' . $v['pageLink'] . '">' . $v['pageshowtitle'] . '</a></li>'; // Start - Menu and footer customizable colors backbround for holidays - CL - 11/17/2020
	}
	return $html;
}





function get_lowest_style_product_price($styleid, $categoryId)
{
	global $db;
	$params = array($styleid, $categoryId);
	$piecePrice = $db->rawQueryValue('select productPrice from ci_styles_price where styleID=? and categoryID=? limit 1 ', $params);

	return @$piecePrice[0];
}



function showallbrands()
{
	global $db;
	$params = array('');

	$brands = $db->rawQuery('SELECT * from ci_styles where bestsellerrank<>0  group by brandName');
	$res = array();
	foreach ($brands as $i => $v) {
		$res[$v['brandslug']] = $v['brandName'];
	}
	return $res;
}

function getFeaturedBrands()
{
	global $db;

	// Start - Fix the Brands in the custom pages Brands slider - Cl - 132022	
	return $db->rawQuery('SELECT featured_brand.brandName, featured_brand.brandSlug, featured_brand.brandImage, filter_brands.position 
	FROM ci_featured_brands as featured_brand
	LEFT JOIN ci_filter_brands AS filter_brands ON filter_brands.brandSlug = featured_brand.brandSlug
	ORDER BY CASE WHEN filter_brands.position IS NULL THEN 1 ELSE 0 END, filter_brands.position ASC
	');
	// End - Fix the Brands in the custom pages Brands slider - Cl - 132022
}

// Start - Featured Brands no need to display popup - CL - 1272023
function getFeaturedBrandsSettings()
{
	global $db;
	return $db->getOne('ci_featured_brand_settings');
}
// End - Featured Brands no need to display popup - CL - 1272023

function showallbrandsM()
{
	global $db;
	$params = array('');

	$brands = $db->rawQuery('SELECT brandslug,brandName,brandstatus,brandImage from ci_styles where bestsellerrank<>0 and brandstatus=0 group by brandName'); //Start - Mega Menu with more sub links like SnS - Rm - 11/27/2020
	$res = array();
	/*			foreach($brands as $i=>$v){
				$res[$v['brandslug']]=$v['brandName'];
			}*/
	return $brands;
}

function showallbrandsMWithImage()
{
	global $db;
	//Start - Brands that have image can able to arrange in admin brand modules - RM - 02/10/2021
	/*	$brand_images = $db->rawQuery('SELECT * from ci_brandimages order by position');
	$array_image = [];

	if(!empty($brand_images)){
		foreach($brand_images as $v){
			array_push($array_image, $v['brandslug']);
		}
		$array_image = implode("','", $array_image);
	}*/

	$params = array('');

	// $brands = $db->rawQuery("SELECT ci_styles.brandslug,brandName,brandstatus,brandImage from ci_styles INNER JOIN ci_shipping_groups ON ci_shipping_groups.id = ci_styles.cartGroupID AND ci_shipping_groups.enabled = (1) INNER JOIN ci_brandimages ON ci_brandimages.brandslug = ci_styles.brandslug where bestsellerrank<>0 and brandstatus=0 group by brandName order by ci_brandimages.position");
	$query = <<<SQL
	SELECT
		ci_styles.brandslug,
		brandName,
		brandstatus,
		brandImage
	FROM ci_styles
	INNER JOIN ci_brandimages ON ci_brandimages.brandslug = ci_styles.brandslug
	WHERE bestsellerrank <> 0
	AND brandstatus = 0
	-- AND EXISTS (
	-- 	SELECT 1 FROM ci_shipping_groups
	-- 	WHERE ci_shipping_groups.id = ci_styles.cartGroupID
	-- 	AND ci_shipping_groups.enabled = (1)
	-- )
	GROUP BY
		brandName
	ORDER BY
		ci_brandimages.position
SQL;
	$brands = $db->rawQuery($query);
	$res = array();
	//End - Brands that have image can able to arrange in admin brand modules - RM - 02/10/2021

	return $brands;
}

function showallbrandsMWithoutImage()
{
	global $db;
	//Start - Brands that have image can able to arrange in admin brand modules - RM - 02/10/2021
	/*$brand_images = $db->rawQuery('SELECT * from ci_brandimages');
	$array_image = [];

	if(!empty($brand_images)){
		foreach($brand_images as $v){
			array_push($array_image, $v['brandslug']);
		}
		$array_image = implode("','", $array_image);
	}
	*/
	$params = array('');

	// $brands = $db->rawQuery("SELECT brandslug,brandName,brandstatus,brandImage from ci_styles INNER JOIN ci_shipping_groups ON ci_shipping_groups.id = ci_styles.cartGroupID AND ci_shipping_groups.enabled = (1) where bestsellerrank<>0 and brandstatus=0 AND brandslug <> '' group by brandName order by brandName");
	$query = <<<SQL
	SELECT
		brandslug,
		brandName,
		brandstatus,
		brandImage
	FROM ci_styles
	WHERE bestsellerrank <> 0
	AND brandstatus = 0
	AND brandslug <> ''
	-- AND EXISTS (
	-- 	SELECT 1 FROM ci_shipping_groups
	-- 	WHERE ci_shipping_groups.id = ci_styles.cartGroupID
	-- 	AND ci_shipping_groups.enabled = (1)
	-- )
	GROUP BY
		brandName
	ORDER BY
		brandName
SQL;
	$brands = $db->rawQuery($query);

	$res = array();
	//End - Brands that have image can able to arrange in admin brand modules - RM - 02/10/2021
	return $brands;
}

//get all fabrics
function fetch_product_fabrics()
{
	$fabriclist = array('Bamboo', 'Blends', 'Burnouts', 'Canvas', 'Cashmere', 'Chenille', 'Corduroy', 'Cotton - 100%', 'Cotton - Combed', 'Cotton - Organic', 'Cotton - Over 50%', 'Cotton - Polyester (50/50)', 'Cotton - Ringspun', 'Denim', 'Dobby', 'Down', 'Eco-Friendly', 'Flannels', 'French Terry', 'Gingham', 'Jersey', 'Lycra', 'Mesh', 'Micro Fleece', 'Non Woven', 'Nylon', 'Organic', 'Performance', 'Pique', 'Plaid', 'Polyester', 'Polyester - 50%', 'Polyester - Over 50%', 'Poplin', 'PVC', 'Rayon', 'Recycled', 'Ribbed', 'Ripstop', 'Sherpa', 'Slub', 'Spandex', 'Stripes', 'Thermals', 'Triblends', 'Tricot', 'Viscose');
	$listfabrics = implode("','", $fabriclist);
	global $db;
	$params = array('');
	$fabrics = $db->rawQuery("SELECT name,categoryID from ci_category where name IN('" . $listfabrics . "') group by name order by name asc");
	return $fabrics;
}

//@get all shopfor total from DB
function get_fabric_total($fabricid, $where1 = false)
{
	global $db;
	$sTotal = 0;
	//die($where1);
	if ($where1 != false) {
		$whereConditions = " where FIND_IN_SET(" . $fabricid . ", categories)";
		$whereConditions .= $where1;

		$sql = "SELECT count(styleID) as total FROM `ci_styles` $whereConditions and pPrice>0 and isExistProduct=1 ";
		//echo $sql;
		//die();
		$fabr = $db->rawQuery($sql);

		foreach ($fabr as $kk => $vv) {
			$sTotal = $sTotal + $vv['total'];
		}
		if (intval($sTotal) > 0) {
			return $sTotal;
		} else {
			return 0;
		}
	} else {
		$sql = "SELECT count(styleID) as total FROM `ci_styles` WHERE FIND_IN_SET($fabricid, categories) and pPrice>0 and isExistProduct=1 ";

		$fabr = $db->rawQuery($sql);

		foreach ($fabr as $kk => $vv) {
			$sTotal = $sTotal + $vv['total'];
		}
		if (intval($sTotal) > 0) {
			return $sTotal;
		} else {
			return 0;
		}
	}
}




function getAllColors($cat)
{
	global $db;

	$colors = $db->rawQuery("SELECT color1,colorFamily,colorFamilyID,totalColors from ci_colors_total order by colorFamily ");
	if (!empty($colors)) {
		return $colors;
	} else {
		return false;
	}
}

//@get all color total from DB
function get_color_total($color, $where1 = false)
{
	global $db;
	$whereConditions = $where1;
	if ($where1 != false) {
		$whereConditions .= " and pColorsId IN(" . $color . ")";
		$sql = "SELECT count(styleID) as total FROM ci_styles where 1 " . $whereConditions . " and isExistProduct=1   order by  styleID ASC";
		//echo $sql;
		///die();
		$clor = $db->rawQuery($sql);

		foreach ($clor as $kk => $vv) {
			$sTotal = $sTotal + $vv['total'];
		}
		if (intval($sTotal) > 0) {
			return $sTotal;
		} else {
			return 0;
		}
	} else {
		$sql = "SELECT count(styleID) as total FROM `ci_styles` WHERE pColorsId IN (" . $color . ") and isExistProduct=1 ";
		$clor = $db->rawQuery($sql);
		$sTotal = $clor[0]['total'];

		if (intval($sTotal) > 0) {
			return $sTotal;
		} else {
			return 0;
		}
	}
}

//For importscript to style
function getAllSizes()
{
	global $db;
	$sizesall = array('Adjustable', 'One Size', 'XXS', 'Youth', 'XS', 'S', 'M', 'L', 'XL', '2XL', '3XL', '4XL', '5XL', '6XL', 'XS/S', 'S/M', 'M/L', 'L/XL', '2X/', '2XL/3XL', 'XL/2XL', '4XL/5XL', 'LT', 'XLT', '2XLT', '3XLT', '4XLT', '10H', '14H', '18H', '30', '30W or 50W', 'NB', '32', '34', '36', '2T', '38', '38 or 58', '40', '42', '44', '46', '48', '50', '2', '52', '54', '56', '2T/3T', '3T', '4', '3/6', '4T', '5', '5 - XS', '5/6', '5T', '6', '6 - S', '6/12', '6M', '6T', '7 - S', '7', '8', '8 - M', '10', '12', '12 - L', '12/18', '12M', '14', '14.5', '15', '15.5', '16', '16 - XL', '18/24', '18M', '16.5', '17', '17.5', '18', '18 - XXL', '18.5', '19.5', '20', '20 - XXL', '20.5', '22', '24', '24M', '28W', '30W', '32W', '34W', '36W', '38W', '40W', '42W', '44W', '46W', '48W', '50W', '1 - 14/16', '2 - 18/20', '3 - 22/24', '4 - 26/28', '5 - 30/32');
	$listsizes = implode("','", $sizesall);
	$sizes = $db->rawQuery("SELECT styleID,`sizeName`,`sizeCode`,`sizeOrder` FROM `ci_products` where sizeName IN('" . $listsizes . "') group by sizeName order by sizeName ");
	if (!empty($sizes)) {
		return $sizes;
	} else {
		return false;
	}
}

//For importscript to seperate table
function getSizesAll()
{
	global $db;
	$sizes = $db->rawQuery("SELECT `sizeName`,`sizeCode`,`sizeOrder`,sizeTotal FROM `ci_sizes_total` where 1 order by sizeOrder ");
	if (!empty($sizes)) {
		return $sizes;
	} else {
		return false;
	}
}

//@get all color total from DB
function get_size_total($sizeId, $where1 = false)
{
	global $db;
	$whereConditions = $where1;
	if ($where1 != false) {
		$whereConditions .= " and FIND_IN_SET('" . $sizeId . "', pSizesId) ";
		$sql = "SELECT count(styleID) as total FROM ci_styles where 1 " . $whereConditions . " and isExistProduct=1   order by  styleID ASC";

		$clor = $db->rawQuery($sql);
		$sTotal = 0;
		foreach ($clor as $kk => $vv) {
			$sTotal = $sTotal + $vv['total'];
		}
		if (intval($sTotal) > 0) {
			return $sTotal;
		} else {
			return 0;
		}
	} else {
		$sql = "SELECT count(styleID) as total FROM `ci_styles` WHERE FIND_IN_SET('" . $sizeId . "', pSizesId) and isExistProduct=1 ";
		//die($sql);
		$clor = $db->rawQuery($sql);
		$sTotal = $clor[0]['total'];

		if (intval($sTotal) > 0) {
			return $sTotal;
		} else {
			return 0;
		}
	}
}


function get_allcustomstyles()
{
	global $db;
	$cusstyles = array('Adjustable', 'Adult', 'Cropped', 'Fitted', 'Flowy', 'Girls', 'High Profiles', 'Infants / Toddlers', 'Juniors', 'Low Profiles', 'Mens', 'Mid Profiles', 'Missy', 'One Size', 'Relaxed', 'Side Seams', 'Talls', 'Tubular', 'Unisex', 'Womens', 'Youth');

	$listcstyles = implode("','", $cusstyles);
	$customStyles = $db->rawQuery("SELECT name,categoryID from ci_category where name IN('" . $listcstyles . "') group by name order by name asc ");

	return $customStyles;
}

//@get all shopfor total from DB
function get_customstyle_total($cstyleid, $where1 = false)
{
	global $db;
	$sTotal = 0;
	//die($where1);
	if ($where1 != false) {
		$whereConditions = " where FIND_IN_SET(" . $cstyleid . ", categories)";
		$whereConditions .= $where1;

		$sql = "SELECT count(styleID) as total FROM `ci_styles` $whereConditions and pPrice>0 and isExistProduct=1 ";
		//echo $sql;
		//die();
		$fabr = $db->rawQuery($sql);

		foreach ($fabr as $kk => $vv) {
			$sTotal = $sTotal + $vv['total'];
		}
		if (intval($sTotal) > 0) {
			return $sTotal;
		} else {
			return 0;
		}
	} else {
		$sql = "SELECT count(styleID) as total FROM `ci_styles` WHERE FIND_IN_SET($cstyleid, categories) and pPrice>0 and isExistProduct=1 ";

		$fabr = $db->rawQuery($sql);

		foreach ($fabr as $kk => $vv) {
			$sTotal = $sTotal + $vv['total'];
		}
		if (intval($sTotal) > 0) {
			return $sTotal;
		} else {
			return 0;
		}
	}
}

function load_all_fit()
{
	global $db;
	$fits = array('3/4 Sleeve', 'Accessories', 'Advantage', 'American Made', 'Aprons', 'Athletics', 'Backpacks', 'Bags', 'Beanies', 'Bibs', 'Blankets', 'Bowling Shirts', 'Bras', 'Bucket', 'Camisoles', 'Camouflage', 'Capris', 'Chairs', 'Chambray', 'Cinch', 'Clear', 'Coolers', 'Cozy / Coozies', 'Cuffed / Cuffs', 'Digital', 'Dog Wear', 'Drawstrings', 'Dress Shirts', 'Dresses', 'Duffels', 'Five-Panel', 'Flat Bills', 'Fleece', 'Full-Zips', 'Gloves', 'Golf', 'Gusset', 'Headwear', 'Henley', 'High Visibility', 'Hooded / Hoods', 'Jackets', 'Jumpers', 'Kissing Zippers', 'Knit', 'Kryptek', 'Leggings', 'Long Sleeves', 'Loungewear', 'Media Pocket', 'Mesh Back', 'Messengers', 'Mossy Oak', 'Muddy Girl', 'Neons', 'Oilfield', 'Onesies', 'Open Backs', 'Open Bottoms', 'Outerwear', 'Packables', 'Pants', 'Plackets', 'Pockets', 'Polos', 'Ponchos', 'Pre-Curved Visor', 'Puffers', 'Pullovers', 'Quarter-Zips', 'Raglans', 'Realtree', 'Rollers / Luggage', 'Safety', 'Scarf / Scarves', 'School', 'Short Sleeves', 'Shorts', 'Six-Panel', 'Sleeveless', 'Spiritwear', 'Sport Shirts', 'Structured', 'Sweaters', 'Sweatpants', 'Sweatshirts', 'Swimwear', 'T-Shirts', 'Tank Tops', 'Thumbholes', 'Tie Dyed', 'Totes', 'Towels', 'Truckers', 'Underwear', 'Uniforms', 'Union Made', 'Unstructured', 'USA Made', 'Vests', 'Visor', 'Warm-ups', 'Workwear', 'Wovens');

	$listfits = implode("','", $fits);

	$customfits = $db->rawQuery("SELECT name,categoryID from ci_category where name IN('" . $listfits . "') group by name order by name asc ");
	return $customfits;
}

function get_fit_total($fitId, $where1 = false)
{
	global $db;
	$sTotal = 0;
	//die($where1);
	if ($where1 != false) {
		$whereConditions = " where FIND_IN_SET(" . $fitId . ", categories)";
		$whereConditions .= $where1;

		$sql = "SELECT count(styleID) as total FROM `ci_styles` $whereConditions and pPrice>0 and isExistProduct=1 ";
		//echo $sql;
		//die();
		$fabr = $db->rawQuery($sql);

		foreach ($fabr as $kk => $vv) {
			$sTotal = $sTotal + $vv['total'];
		}
		if (intval($sTotal) > 0) {
			return $sTotal;
		} else {
			return 0;
		}
	} else {
		$sql = "SELECT count(styleID) as total FROM `ci_styles` WHERE FIND_IN_SET($fitId, categories) and pPrice>0 and isExistProduct=1 ";

		$fabr = $db->rawQuery($sql);

		foreach ($fabr as $kk => $vv) {
			$sTotal = $sTotal + $vv['total'];
		}
		if (intval($sTotal) > 0) {
			return $sTotal;
		} else {
			return 0;
		}
	}
}



################ pagination function #########################################
function paginate_function($item_per_page, $current_page, $total_records, $total_pages)
{
	$pagination = '';
	if ($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages) { //verify total pages and current page number
		$pagination .= '<ul class="pagination">';

		$pglinks = ($total_records / $item_per_page);


		$right_links = $current_page + 7;
		$previous = $current_page - 1; //previous link
		$next = $current_page + 1; //next link
		$first_link = true; //boolean var to decide our first link

		if ($current_page > 1) {
			$previous_link = ($previous == 0) ? 1 : $previous;
			$pagination .= '<li class="first" data-page="1" title="First" style="cursor:pointer"><a href="javascript:void(0);" >&laquo;</a></li>'; //first link
			$pagination .= '<li data-page="' . $previous_link . '" style="cursor:pointer"><a href="javascript:void(0);"  title="Previous">&lt;</a></li>'; //previous link
			for ($i = ($current_page - 2); $i < $current_page; $i++) { //Create left-hand side links
				if ($i > 0) {
					$pagination .= '<li data-page="' . $i . '" title="Page' . $i . '" style="cursor:pointer"><a href="javascript:void(0);" >' . $i . '</a></li>';
				}
			}
			$first_link = false; //set first link to false
		}

		if ($first_link) { //if current active page is first link
			$pagination .= '<li class="first active">' . $current_page . '</li>';
		} elseif ($current_page == $total_pages) { //if it's the last active link
			$pagination .= '<li class="last active">' . $current_page . '</li>';
		} else { //regular current link
			$pagination .= '<li class="active">' . $current_page . '</li>';
		}

		for ($i = $current_page + 1; $i < $right_links; $i++) { //create right-hand side links
			if ($i <= $total_pages) {
				$pagination .= '<li data-page="' . $i . '" title="Page ' . $i . '" style="cursor:pointer"><a href="javascript:void(0);" >' . $i . '</a></li>';
			}
		}
		if ($current_page < $total_pages) {
			$next_link = ($i > $total_pages) ? $total_pages : $i;
			$pagination .= '<li data-page="' . ($current_page + 1) . '" style="cursor:pointer"><a href="javascript:void(0);"  title="Next">&gt;</a></li>'; //next link
			$pagination .= '<li class="last" data-page="' . $total_pages . '" style="cursor:pointer"><a href="javascript:void(0);"  title="Last">&raquo;</a></li>'; //last link
		}

		$pagination .= '</ul>';
	}
	return $pagination; //return pagination links
}

function getDetailsBySlug($slug)
{
	global $db;

	//Start - alpha adjustments - RM - 02/12/2024
	$alphaImport = adminSettings('onlynewalphaimport');
	$removeAlphaOnExistingStyle = "";
	if (isset($alphaImport['onlynewalphaimport']) && $alphaImport['onlynewalphaimport'] == 0) {
		$removeAlphaOnExistingStyle = " AND withAlphaOnExistStyle != 1";
	}
	//End - alpha adjustments - RM - 02/12/2024

	// We need to separate the `ci_styles` query from `ci_products` to prevent retrieving large data from database.
	// For example: `description` contains HTML which gets repeated for each item if we ever join ci_products
	// increasing latency and payload size. The effect is ever more signifant the more colors a product has.

	$styleQuery = <<<SQL
		SELECT
			ci_styles.styleID,
			ci_styles.slug,
			ci_styles.brandslug,
			ci_styles.partNumber,
			ci_styles.brandName,
			ci_styles.styleName,
			ci_styles.title,
			ci_styles.customTitle,
			ci_styles.relateditems,
			ci_styles.customerviewed,
			ci_styles.description,
			ci_styles.baseCategory,
			ci_styles.slugCategory,
			ci_styles.categories,
			ci_styles.catalogPageNumber,
			ci_styles.newStyle,
			ci_styles.priceheading,
			ci_styles.comparableGroup,
			ci_styles.pPrice,
			ci_styles.companionGroup,
			ci_styles.styleImageStatus,
			ci_styles.brandImage,
			ci_styles.styleImage,
			ci_styles.isSentStockEmail,
			ci_styles.isWhiteInfo,
			ci_styles.defaultColor,
			ci_styles.imageVersion, -- Start - apply s3bucket for all images  -CL - 1152025 - 1033am
			ci_styles.cartGroupID as styleCartGroupID,
			-- Start - On product detail page, show the cart group logo where the clipboard icon is - CL - 2102-23
			-- ci_styles.cartGroupID,
			CASE WHEN ci_shipping_groups.id IS NOT NULL THEN ci_shipping_groups.id ELSE default_shipping_group.id END AS cartGroupID,
			CASE WHEN ci_shipping_groups.id IS NOT NULL THEN ci_shipping_groups.logo ELSE default_shipping_group.logo END AS shipping_logo,
			CASE WHEN ci_shipping_groups.id IS NOT NULL THEN ci_shipping_groups.name ELSE default_shipping_group.name END AS shipping_name,
			CASE WHEN ci_shipping_groups.id IS NOT NULL THEN ci_shipping_groups.description ELSE default_shipping_group.description END AS shipping_description,
			CASE WHEN ci_shipping_groups.id IS NOT NULL THEN ci_shipping_groups.hoverDescription ELSE default_shipping_group.hoverDescription END AS shipping_hover_description,
			CASE WHEN ci_shipping_groups.id IS NOT NULL THEN ci_shipping_groups.clickDescription ELSE default_shipping_group.clickDescription END AS shipping_click_description,
			ci_styles.vendor
			-- ci_shipping_groups.logo AS shipping_logo,
			-- ci_shipping_groups.name AS shipping_name, 
			-- ci_shipping_groups.description AS shipping_description, 
			-- ci_shipping_groups.hoverDescription AS shipping_hover_description, 
			-- ci_shipping_groups.clickDescription AS shipping_click_description
			-- End - On product detail page, show the cart group logo where the clipboard icon is - CL - 2102-23
		FROM ci_styles
		LEFT JOIN ci_shipping_groups ON ci_shipping_groups.id = ci_styles.cartGroupID -- AND ci_shipping_groups.enabled = (1) -- Start - Option to turn on or off groups - AP - 11/07/2022
			AND ci_shipping_groups.enabled = (1)
		LEFT JOIN ci_shipping_groups AS default_shipping_group ON default_shipping_group.id = 1
		WHERE slug = ?
		AND ((ci_styles.cartGroupID != 10 AND ci_styles.brandstatus = 0) OR ci_styles.cartGroupID = 10) -- Start - if the brand is disabled, it's still showing the products to customer - RM - 05/26/2023 
SQL;

	$style = $db->rawQueryOne($styleQuery, [$slug]);

	if (empty($style))
		return [null, []];

	$productQuery = <<<SQL
		SELECT
			p.sku,
			p.gtin,
			p.colorName,
			p.sizeName,
			p.colorCode,
			p.colorPriceCodeName,
			p.colorGroup,
			p.colorGroupName,
			p.colorFamilyID,
			p.colorFamily,
			p.colorSwatchImage,
			p.colorSwatchTextColor,
			p.colorFrontImage,
			p.colorSideImage,
			p.colorBackImage,
			p.alphaFrontImage,
			p.alphaSideImage,
			p.alphaBackImage,
			p.color1,
			p.color2,
			MIN(p.customerPrice) AS customerPrice,
			p.saleExpiration,
			p.qty,
			-- p.warehouses,
			p.isfreeshipping,
			p.isColorFeatured,
			p.iscoupon,
			p.isbulkdiscount,
			SUM(p.qty) AS stock,
			CASE WHEN MIN(ci_shipping_groups.id) IS NOT NULL THEN MIN(ci_shipping_groups.id) ELSE 1 END as cartGroupID,
			CASE
				WHEN st.cartGroupID = 1
				AND p.cartGroupID = 2 THEN 1
				ELSE 0
			END as withAlphaOnExistStyle
		FROM ci_products AS p
		INNER JOIN ci_styles AS st ON st.styleID = p.styleID
		LEFT JOIN ci_shipping_groups ON ci_shipping_groups.id = p.cartGroupID -- AND ci_shipping_groups.enabled = (1) -- Start - Option to turn on or off groups - AP - 11/07/2022
			AND ci_shipping_groups.enabled = (1)
		WHERE p.colorStatus = "0"
		AND st.isExistProduct = 1
		AND p.sizeStatus = "0"
		AND ((st.cartGroupID != 10 AND st.brandstatus = 0) OR st.cartGroupID = 10) -- Start - if the brand is disabled, it's still showing the products to customer - RM - 05/26/2023 
		AND st.styleID = ?
		AND ((st.cartGroupID != 10 AND p.isDS = 0) OR st.cartGroupID = 10)
		-- AND EXISTS (
		-- 	SELECT 1 FROM ci_shipping_groups
		-- 	WHERE ci_shipping_groups.id = p.cartGroupID
		-- 	AND ci_shipping_groups.enabled = (1)
		-- )
		AND p.colorName IN (
			SELECT DISTINCT colorName
			FROM ci_products FORCE INDEX (styleID)
			WHERE qty > 0
			AND ci_products.styleID = p.styleID
		)
		GROUP BY
			p.colorName
		HAVING
			stock > 0 $removeAlphaOnExistingStyle
		ORDER BY
			p.colorName
SQL;

	$products = $db->rawQuery($productQuery, [$style['styleID']]);

	$items = array_reduce($products, function ($result, $product) use ($style) {
		if (!isset($result[$product['colorName']]))
			$result[$product['colorName']] = [];

		$result[$product['colorName']][] = array_merge($style, $product);

		return $result;
	});

	return [$style, $items];
}

function getDetaislByStyleId($styleID)
{
	global $db;

	//Start - alpha adjustments - RM - 02/12/2024
	$alphaImport = adminSettings('onlynewalphaimport');
	$removeAlphaOnExistingStyle = "";
	if (isset($alphaImport['onlynewalphaimport']) && $alphaImport['onlynewalphaimport'] == 0) {
		$removeAlphaOnExistingStyle = " AND withAlphaOnExistStyle != 1";
	}
	//End - alpha adjustments - RM - 02/12/2024

	// $pdetails = $db->arraybuilder()->rawQuery('SELECT p.sku,p.gtin,p.colorName,p.sizeName,p.colorCode,p.colorPriceCodeName,p.colorGroup,p.colorGroupName,p.colorFamilyID,p.colorFamily,p.colorSwatchImage,p.colorSwatchTextColor,st.slug,p.colorFrontImage,	p.colorSideImage,p.colorBackImage,p.alphaFrontImage, p.alphaSideImage, p.alphaBackImage,p.color1,p.color2,p.customerPrice,p.saleExpiration,p.qty,p.warehouses,st.styleID,st.brandslug,st.partNumber,st.brandName,st.styleName,st.title,st.customTitle,st.relateditems,st.customerviewed,st.description,st.baseCategory,st.categories,st.catalogPageNumber,st.newStyle,st.priceheading,st.comparableGroup,st.pPrice,st.companionGroup,st.styleImageStatus,st.brandImage,st.styleImage,p.isfreeshipping,p.isColorFeatured,p.iscoupon,p.isbulkdiscount, st.isSentStockEmail, st.isWhiteInfo, st.defaultColor, SUM(p.qty) AS stock, MIN(p.cartGroupID) as cartGroupID, CASE WHEN st.cartGroupID = 1 AND p.cartGroupID = 2 THEN 1 ELSE 0 END as withAlphaOnExistStyle from ci_products as p inner join ci_styles as st on st.styleID=p.styleID INNER JOIN ci_shipping_groups ON ci_shipping_groups.id = p.cartGroupID AND ci_shipping_groups.enabled = (1) where p.colorStatus="0" and  st.isExistProduct=1 and p.sizeStatus="0" and st.styleID = ? and p.isDS = 0 AND EXISTS ( SELECT ci_products.gtin FROM ci_products INNER JOIN ci_shipping_groups ON ci_shipping_groups.id = ci_products.cartGroupID AND ci_shipping_groups.enabled = 1 where qty > 0 and colorName = p.colorName and styleID = st.styleID) GROUP BY p.colorName HAVING stock > 0 '.$removeAlphaOnExistingStyle.' ORDER BY p.colorName', [$styleID]);  // Start - Free shipping exclusion - 06/11/2020 11:33 AM //Start - Email or text alert for member for selected styles that are not in stock - 10/29/2020 added: isSentStockEmail //Start - out of stock for both mobile and PC - RM - 11/04/2020 // Start - We need to add another structured data that will allow to show google inventory by size - AP - 11/07/2020 Start - add an option in the product module to display the product info on the models image - RM - 07/07/2021   //Start - Fix this issue on SL6 about do not display I think - RM - 12/20/2021 Start - Added : iswhiteinfo Product edit feedback - RM - 07/20/2022 Start - Added : defaultColor Product edit feedback - RM - 08/02/2022 //Start - alpha adjustments - RM 02122024 - added cartGroupID removeAlphaOnExistingStyle added shipping groups
	$query = <<<SQL
	SELECT
		p.sku,
		p.gtin,
		p.colorName,
		p.sizeName,
		p.colorCode,
		p.colorPriceCodeName,
		p.colorGroup,
		p.colorGroupName,
		p.colorFamilyID,
		p.colorFamily,
		p.colorSwatchImage,
		p.colorSwatchTextColor,
		st.slug,
		p.colorFrontImage,
		p.colorSideImage,
		p.colorBackImage,
		p.alphaFrontImage,
		p.alphaSideImage,
		p.alphaBackImage,
		p.color1,
		p.color2,
		p.customerPrice,
		p.saleExpiration,
		p.qty,
		p.warehouses,
		st.styleID,
		st.brandslug,
		st.partNumber,
		st.brandName,
		st.styleName,
		st.title,
		st.customTitle,
		st.relateditems,
		st.customerviewed,
		st.description,
		st.baseCategory,
		st.categories,
		st.catalogPageNumber,
		st.newStyle,
		st.priceheading,
		st.comparableGroup,
		st.pPrice,
		st.companionGroup,
		st.styleImageStatus,
		st.brandImage,
		st.styleImage,
		p.isfreeshipping,
		p.isColorFeatured,
		p.iscoupon,
		p.isbulkdiscount,
		st.isSentStockEmail,
		st.isWhiteInfo,
		st.defaultColor,
		st.cartGroupID as styleCartGroupID,
		-- p.cartGroupID,
		-- Start - On product detail page, show the cart group logo where the clipboard icon is - CL - 2102-23
		-- ci_shipping_groups.logo AS shipping_logo,
		-- ci_shipping_groups.name AS shipping_name, 
		-- ci_shipping_groups.description AS shipping_description, 
		-- ci_shipping_groups.hoverDescription AS shipping_hover_description, 
		-- ci_shipping_groups.clickDescription AS shipping_click_description,
		-- End - On product detail page, show the cart group logo where the clipboard icon is - CL - 2102-23
		SUM(p.qty) AS stock,
		-- MIN(p.cartGroupID) as cartGroupID,
		CASE WHEN MIN(ci_shipping_groups.id) IS NOT NULL THEN MIN(ci_shipping_groups.id) ELSE default_shipping_group.id END AS cartGroupID,
		CASE WHEN ci_shipping_groups.id IS NOT NULL THEN ci_shipping_groups.logo ELSE default_shipping_group.logo END AS shipping_logo,
		CASE WHEN ci_shipping_groups.id IS NOT NULL THEN ci_shipping_groups.name ELSE default_shipping_group.name END AS shipping_name,
		CASE WHEN ci_shipping_groups.id IS NOT NULL THEN ci_shipping_groups.description ELSE default_shipping_group.description END AS shipping_description,
		CASE WHEN ci_shipping_groups.id IS NOT NULL THEN ci_shipping_groups.hoverDescription ELSE default_shipping_group.hoverDescription END AS shipping_hover_description,
		CASE WHEN ci_shipping_groups.id IS NOT NULL THEN ci_shipping_groups.clickDescription ELSE default_shipping_group.clickDescription END AS shipping_click_description,
		MIN(p.vendor) AS vendor,
		CASE
			WHEN st.vendor = 1
			AND p.vendor = 2 THEN 1
			ELSE 0
		END as withAlphaOnExistStyle
	FROM ci_products AS p
	INNER JOIN ci_styles AS st ON st.styleID = p.styleID
	LEFT JOIN ci_shipping_groups ON ci_shipping_groups.id = p.cartGroupID -- AND ci_shipping_groups.enabled = (1) -- Start - Option to turn on or off groups - AP - 11/07/2022
		AND ci_shipping_groups.enabled = (1)
	LEFT JOIN ci_shipping_groups AS default_shipping_group ON default_shipping_group.id = 1
	WHERE p.colorStatus = "0"
	AND st.isExistProduct = 1
	AND p.sizeStatus = "0"
	AND st.brandstatus = 0 -- Start - if the brand is disabled, it's still showing the products to customer - RM - 05/26/2023 
	AND st.styleID = ?
	AND p.isDS = 0
	AND p.colorName IN (
		SELECT DISTINCT colorName
		FROM ci_products
		WHERE qty > 0
		AND ci_products.styleID = p.styleID
	)
	-- AND EXISTS (
	-- 	SELECT 1 FROM ci_shipping_groups
	-- 	WHERE ci_shipping_groups.id = p.cartGroupID
	-- 	AND ci_shipping_groups.enabled = (1)
	-- )
		-- AND EXISTS (
		-- 	SELECT
		-- 		ci_products.gtin
		-- 	FROM
		-- 		ci_products
		-- 		INNER JOIN ci_shipping_groups ON ci_shipping_groups.id = ci_products.cartGroupID
		-- 		AND ci_shipping_groups.enabled = 1
		-- 	where
		-- 		qty > 0
		-- 		and colorName = p.colorName
		-- 		and styleID = st.styleID
		-- )
	GROUP BY
		p.colorName
	HAVING
		stock > 0 $removeAlphaOnExistingStyle
	ORDER BY
		p.colorName
SQL;
	$pdetails = $db->arraybuilder()->rawQuery($query, [$styleID]);

	$result1 = $pdetails;
	$newArr = $result1; //array();
	$tmpArr = array();
	// foreach ($result1 as $kk => $vv) {
	// 	if ($vv['sku'] == $psku) {
	// 		$tmpArr = array($result1[$kk]);
	// 		unset($result1[$kk]);
	// 	}
	// 	$newArr = array_merge($tmpArr, $result1);
	// }

	$arr = array();
	$tmp = "";
	$i = 0;
	foreach ($newArr as $key => $item) {
		if (isset($tmp) && empty($tmp)) {
			$tmp = $item['colorName'];
		}
		if (isset($tmp) && !empty($tmp) && $tmp != $item['colorName']) {
			$tmp = $item['colorName'];
			$i = 0;
		}
		$arr[$tmp][$i] = $item;
		$i++;
	}
	/*echo "<pre>arr===";
	print_r($arr);
	die();*/
	return $arr;
}

function getDetaislByStyleIdOriginal($styleID)
{
	global $db;
	$pdetails = $db->arraybuilder()->rawQuery('SELECT p.sku,p.gtin,p.colorName,p.sizeName,p.colorCode,p.colorPriceCodeName,p.colorGroup,p.colorGroupName,p.colorFamilyID,p.colorFamily,p.colorSwatchImage,p.colorSwatchTextColor,p.colorFrontImage,	p.colorSideImage,p.colorBackImage,p.color1,p.color2,p.customerPrice,p.saleExpiration,p.qty,p.warehouses,st.styleID,st.brandslug,st.partNumber,st.brandName,st.styleName,st.title,st.customTitle,st.relateditems,st.customerviewed,st.description,st.baseCategory,st.categories,st.catalogPageNumber,st.newStyle,st.priceheading,st.comparableGroup,st.pPrice,st.companionGroup,st.styleImageStatus,st.brandImage,st.styleImage,p.isfreeshipping,p.isColorFeatured,p.iscoupon,p.isbulkdiscount, st.isSentStockEmail, (select count(*) FROM ci_products where qty > 0 and colorName = p.colorName and styleID = st.styleID) as stock from ci_products as p inner join ci_styles as st on st.styleID=p.styleID where p.colorStatus="0" and  st.isExistProduct=1 and p.sizeStatus="0" and st.styleID = ? and p.isDS = 0 having stock != 0 ORDER BY p.colorName');  // Start - Free shipping exclusion - 06/11/2020 11:33 AM //Start - Email or text alert for member for selected styles that are not in stock - 10/29/2020 added: isSentStockEmail //Start - out of stock for both mobile and PC - RM - 11/04/2020 // Start - We need to add another structured data that will allow to show google inventory by size - AP - 11/07/2020 Start - add an option in the product module to display the product info on the models image - RM - 07/07/2021   //Start - Fix this issue on SL6 about do not display I think - RM - 12/20/2021

	$result1 = $pdetails;
	$newArr = $result1; //array();
	$tmpArr = array();
	// foreach ($result1 as $kk => $vv) {
	// 	if ($vv['sku'] == $psku) {
	// 		$tmpArr = array($result1[$kk]);
	// 		unset($result1[$kk]);
	// 	}
	// 	$newArr = array_merge($tmpArr, $result1);
	// }

	$arr = array();
	$tmp = "";
	$i = 0;
	foreach ($newArr as $key => $item) {
		if (isset($tmp) && empty($tmp)) {
			$tmp = $item['colorName'];
		}
		if (isset($tmp) && !empty($tmp) && $tmp != $item['colorName']) {
			$tmp = $item['colorName'];
			$i = 0;
		}
		$arr[$tmp][$i] = $item;
		$i++;
	}
	/*echo "<pre>arr===";
	print_r($arr);
	die();*/
	return $arr;
}

// Start - Images displaying in incorrect path that causing image blur - CL - 07/20/2021
function imageLoadingTemplate($size)
{
	return '<div class="loading-image">
		<img src="' . base_url_site . 'images/loading.gif" style="
		height:' . $size . 'px;width:' . $size . 'px;" loading="lazy" draggable="false">
	</div>';
}

$noImageFound = '"' . base_url_site . 'images/no-image-found.jpg"'; //Start -  SL6 image issues when color image missing it shows last color instead of missing image placeholder - CL - 11/3/2021 - Make Bulkapparel works on IE Browser - CL - 115202
$noImageWithSourceFound = 'this.src=' . $noImageFound . ';this.parentNode.children[0].srcset=' . $noImageFound; // Start - Display Alpha images and SNS images in Product details page

// Start - possibly discuss about adding zoom tool to pdetail PC only - CL - 3/1/2022
function previewImageTemplate($structuredWithColor, $desktopSrc, $mobileSrc, $highResoSrc = '', $colorname, $withLoading)
{
	// Start - Display Alpha images and SNS images in Product details page - CL - 4182022
	global $noImageWithSourceFound; // Start - Make Bulkapparel works on IE Browser - CL - 1142022-920am
	// <!-- Start - MOZ Updates - CL - 08/11/2021 --> 
	// Start - FIX CLS and other issues with all the pages in SL6 not only index - CL - 1192022 -1123am - Product details page adjustment mobile view - 1/26/2022
	// Start - possibly discuss about adding zoom tool to pdetail PC only  - CL - 3212022-731am 
	$dataLargeImage = file_exists(str_replace(base_url_site, '', $highResoSrc)) ? $highResoSrc : $desktopSrc;
	return '
	<picture class="preview-image">
        <source 
			class="preview-img-mobile"
			srcset="' . $mobileSrc . '" 
			width="328"
			height="410"
			media="(max-width: 768px)"
		>
        <img 
			width="480"
			height="600"
			class="pimg review-img-desktop" 
			data-large-img-url="' . $dataLargeImage . '"
			src="' . $desktopSrc . '" 
			alt="' . $colorname . '"
			title="' . $colorname . '"
			onerror=' . $noImageWithSourceFound . '
		>
    </picture>';
	// End - Display Alpha images and SNS images in Product details page - CL - 4182022
	// Start - possibly discuss about adding zoom tool to pdetail PC only  - CL - 3212022-731am 
	// End - FIX CLS and other issues with all the pages in SL6 not only index - CL - 1192022 -1123am - Product details page adjustment mobile view - 1/26/2022
	// <!--Start - Bulkapparel works on IE Browser - CL - 1142022-920am -->
	// <!-- End - MOZ Updates - CL - 08/11/2021 --> 
}
// End - possibly discuss about adding zoom tool to pdetail PC only - CL - 3/1/2022
function legacyPreviewImageTemplate($image, $colorname, $withLoading)
{
	global $noImageFound; // Start - Make Bulkapparel works on IE Browser - CL - 1142022-920am
	// Start - FIX CLS and other issues with all the pages in SL6 not only index - CL - 1192022 -1123am
	return '
	<picture class="legacy-preview-template">
        <source 
			class="preview-img-mobile"
			srcset="' . $image . '" 
			width="328"
			height="410"
			onerror=this.srcset=' . $noImageFound . '
			media="(max-width: 768px)"
		>
        <img 
			width="480"
			height="600"
			class="pimg review-img-desktop" 
			src="' . $image . '" 
			alt="' . $colorname . '"
			title="' . $colorname . '"
			onerror=this.src=' . $noImageFound . '
		>
    </picture>';
	// End - FIX CLS and other issues with all the pages in SL6 not only index - CL - 1192022 -1123am
}

// Start - possibly discuss about adding zoom tool to pdetail PC only - CL - 3/21/2022
function thumbnailImageTemplate($structuredWithColor, $desktopSrc, $mobileSrc, $desktopPreview, $mobilePreview, $highResoSrc = '', $colorname, $withLoading)
{
	// Start - Display Alpha images and SNS images in Product details page - CL - 4182022
	global $noImageWithSourceFound; // Start -  SL6 image issues when color image missing it shows last color instead of missing image placeholder - CL - 11/3/2021
	// Start - FIX CLS and other issues with all the pages in SL6 not only index - CL - 1192022 -1123am - Product details page adjustment mobile view - 1/26/2022
	$dataLargeImage = file_exists(str_replace(base_url_site, '', $highResoSrc)) ? $highResoSrc : $desktopPreview;
	return '
	<picture class="thumbnail-template">
        <source 
			class="thumbnail-img-mobile"
			srcset="' . $mobileSrc . '" 
			width="56"
			height="70"
			media="(max-width: 768px)"
		>
        <img 
			width="80"
			height="100"
			src="' . $desktopSrc . '"
			data-desktop-src="' . $desktopSrc . '"
			data-desktop-preview="' . $desktopPreview . '" 
			data-mobile-src="' . $mobileSrc . '"
			data-mobile-preview="' . $mobilePreview . '"
			data-large-img-url="' . $dataLargeImage . '"
			class="thumbnail-img-desktop" 
			alt="' . $colorname . '"
			title="' . $colorname . '"
			onerror=' . $noImageWithSourceFound . '
		>
    </picture>';
	// End - Display Alpha images and SNS images in Product details page - CL - 4182022
	// End - FIX CLS and other issues with all the pages in SL6 not only index - CL - 1192022 -1123am - Product details page adjustment mobile view - 1/26/2022
}
// End - possibly discuss about adding zoom tool to pdetail PC only - CL - 3/21/2022

function legacyThumbnailImageTemplate($image, $colorname, $withLoading)
{
	global $noImageFound; // Start -  SL6 image issues when color image missing it shows last color instead of missing image placeholder - CL - 11/3/2021
	// Start - FIX CLS and other issues with all the pages in SL6 not only index - CL - 1192022 -1123am
	return '
	<picture class="legacy-thumbnail-template">
        <source 
			class="thumbnail-img-mobile"
			srcset="' . $image . '" 
			width="56"
			height="70"
			onerror=this.srcset=' . $noImageFound . '
			media="(max-width: 768px)"
		>
        <img 
			width="80"
			height="100"
			src="' . $image . '"
			data-desktop-src="' . $image . '"
			data-desktop-preview="' . $image . '" 
			data-mobile-src="' . $image . '"
			data-mobile-preview="' . $image . '"
			class="thumbnail-img-desktop" 
			alt="' . $colorname . '"
			title="' . $colorname . '"
			onerror=this.src=' . $noImageFound . '
		>
    </picture>';
	// End - FIX CLS and other issues with all the pages in SL6 not only index - CL - 1192022 -1123am

}

function product_images($images_mian, $images_others = false, $images_others1 = false, $images_style = false, $colorname = false, $styleimagestatus = false, $h, $class, $structuredWithColor, $brandLogo = '', $productName = '', $productStyle, $productPrice, $isWhiteInfo = '', $customColor = false, $showColored = false) //  Start- update to mobile image display with info - CL - 6/7/2021 Start - add an option in the product module to display the product info on the models image - RM - 07/07/2021 // Start - Please fix the load image - AP - 10/28/2021
{ // Start - Data structure not basing image on color - John - 08/20/2020 // Start - New front end design for item detail page - John - 09/14/2020
	if ($h == -1) {
		$mImage2 = "";
		if (file_exists(dir_path . $images_mian) && $images_mian != "") {
			$mImage2 = $images_mian;
		}
		if (file_exists(dir_path . $images_others) && $images_others != "") {
			$mImage2 = $images_others;
		}
		if (file_exists(dir_path . $images_others1) && $images_others1 != "") {
			$mImage2 = $images_others1;
		}

		// Start - New front end design for item detail page - From Christian - 09/07/2020

		$stid = getStyleIdbyslug($_REQUEST["stid"]);
		$reviewlist = getReviewlist($stid);
		$totalReviews = getTCustomerRev($stid);
		$cstar1 = 0;
		$tstar1 = "";
		$cstar2 = 0;
		$tstar2 = "";
		$cstar3 = 0;
		$tstar3 = "";
		$cstar4 = 0;
		$tstar4 = "";
		$cstar5 = 0;
		$tstar5 = "";
		/*echo '<pre>';
																										print_r($reviewlist);*/
		foreach ($reviewlist as $k => $crev) {
			if ($crev['vote'] > 0 && $crev['vote'] <= 1) {
				$cstar1 = $cstar1 + 1;
				$tstar1 += $crev['vote'];
			}
			if ($crev['vote'] > 1 && $crev['vote'] <= 2) {
				$cstar2 = $cstar2 + 1;
				$tstar2 += $crev['vote'];
			}
			if ($crev['vote'] > 2 && $crev['vote'] <= 3) {

				$cstar3 = $cstar32 + 1;
				$tstar3 += $crev['vote'];
			}
			if ($crev['vote'] > 3 && $crev['vote'] <= 4) {
				$cstar4 = $cstar4 + 1;
				$tstar4 += $crev['vote'];
			}
			if ($crev['vote'] > 4 && $crev['vote'] <= 5) {
				$cstar5 = $cstar5 + 1;
				$tstar5 = $crev['vote'];
			}
		}
		// Start - Live pagespeed report. please do adjustments - CL -  7/26/2021

		// End - Live pagespeed report. please do adjustments - CL -  7/26/2021

		// End - New front end design for item detail page - From Christian - 09/07/2020

		echo '<div class="product-image">';
		// Start -  FIX CLS and other issues with all the pages in SL6 not only inde -  Remove extra div here
		$isWhiteInfo = ($isWhiteInfo == 1) ? 'product-image-info--white' : ''; //Start - add an option in the product module to display the product info on the models image - RM - 07/07/2021
		//  Start- update to mobile image display with info - CL - 6/7/2021
		$productImageInfo = ' <div class="product-image-info ' . $isWhiteInfo . '"> <!-- Start - add an option in the product module to display the product info on the models image - RM - 07/07/2021 -->
		<div class="product-image-info__style">
		<p class="label">Style</p>
		<p class="value">' . $productStyle . '</p>
		</div>
		
		<div class="product-image-info__price">
		<p class="label">Starting at</p> <!--  Start- update to mobile image display with info - CL - 6/28/2021 -->
		<p class="value">$' . $productPrice . '</p>
		</div>
		</div>';
		// End - update to mobile image display with info - CL - 6/7/2021

		if ($styleimagestatus == 0) {
			// <!-- Start - PageSpeed insights - WL - 10/16/2020 -->
			// Start - Images displaying in incorrect path that causing image blur - CL - 07/20/2021
			echo '<div class="product-item-image ' . $class . '" id="mainimg">';
			// Start - possibly discuss about adding zoom tool to pdetail PC only - CL - 3/2/2022
			$mainImage = $showColored ? $images_mian : $images_style;
			echo previewImageTemplate(
				$structuredWithColor,
				newProductImagePath($mainImage, 'fashion-wear'), // Start - Please fix the load image - AP - 11/04/2021
				newProductImagePath($mainImage, 'fashion-wear-m'),
				newProductImagePath($mainImage, 'high-reso'),
				$colorname,
				true
			);
			// End - possibly discuss about adding zoom tool to pdetail PC only - CL - 3/2/2022

			echo $productImageInfo . '</div>'; //  Start- update to mobile image display with info - CL - 6/7/2021 -  Start - Update Structured price when color is clicked - John - 08/20/2020
			// End - Images displaying in incorrect path that causing image blur - CL - 07/20/2021
		} else {
			// Start - Images displaying in incorrect path that causing image blur - CL - 07/20/2021
			echo '<div class="product-item-image ' . $class . '" id="mainimg">';

			// Start - possibly discuss about adding zoom tool to pdetail PC only - CL - 3/2/2022
			echo previewImageTemplate(
				$structuredWithColor,
				newProductImagePath($mImage2, 'fashion-wear'),
				newProductImagePath($mImage2, 'fashion-wear-m'),
				newProductImagePath($mImage2, 'high-reso'),
				$colorname,
				true
			);
			// End - possibly discuss about adding zoom tool to pdetail PC only - CL - 3/2/2022

			echo $productImageInfo . '</div>'; //  Start- update to mobile image display with info - CL - 6/7/2021 - Start - Update Structured price when color is clicked - John - 08/20/2020
			// End - Images displaying in incorrect path that causing image blur - CL - 07/20/2021
		}
		// <!-- End - PageSpeed insights - WL - 10/16/2020 -->
		// Start -  FIX CLS and other issues with all the pages in SL6 not only inde -  Remove extra div here
		echo '<div class="detail-thumb" data-test="functions">
				<ul class="imgsidebar prd-carousel">'; // Start - New front end design for item detail page - From Christian - 09/07/2020

		$mImage = "";
		if ($styleimagestatus == 0) {
			// if (file_exists(dir_path . $images_style) && $images_style != "") {
			if (file_exists(str_replace(base_url_site, '', newProductImagePath($images_style, 'fashion-wear'))) && $images_style != "") { // Start - possibly discuss about adding zoom tool to pdetail PC only - CL - 3/2/2022
				// Start - Images displaying in incorrect path that causing image blur - CL - 07/20/2021
				echo '<li class="' . ($customColor ? '' : 'prd-active') . '"><a href="javascript:void(0);" data-model="1">'; // Start - Please fix the load image - AP - 10/28/2021

				// Start - possibly discuss about adding zoom tool to pdetail PC only - CL - 3/2/2022
				echo thumbnailImageTemplate(
					$structuredWithColor,
					newProductImagePath($images_style, 'thumbnail'),
					newProductImagePath($images_style, 'thumbnail-m'),
					newProductImagePath($images_style, 'fashion-wear'),
					newProductImagePath($images_style, 'fashion-wear-m'),
					newProductImagePath($images_style, 'high-reso'),
					$colorname,
					true
				);
				// Start - possibly discuss about adding zoom tool to pdetail PC only - CL - 3/2/2022

				echo '</a> </li>'; //<!-- Start - update to mobile image display with info - CL - 6/28/2021 - Start -  BulkApparel pagespeed - CL - 05/04/2021 --> <!-- Start - Resize and optimize images - AP - 06/25/2021 - End - Images displaying in incorrect path that causing image blur - CL - 07/20/2021
			}
		}

		// <!-- Start - PageSpeed insights - WL - 10/16/2020 -->
		// if (file_exists(dir_path . $images_mian) && $images_mian != "") {
		if (file_exists(str_replace(base_url_site, '', newProductImagePath($images_mian, 'fashion-wear'))) && $images_mian != "") { // Start - possibly discuss about adding zoom tool to pdetail PC only - CL - 3/2/2022
			$mImage = $images_mian;
			// Start - Images displaying in incorrect path that causing image blur - CL - 07/20/2021
			echo '<li class="' . ($customColor ? 'prd-active' : '') . '"> <a href="javascript:void(0);">'; // Start - Please fix the load image - AP - 10/28/2021
			// Start - possibly discuss about adding zoom tool to pdetail PC only - CL - 3/2/2022
			echo thumbnailImageTemplate(
				$structuredWithColor,
				newProductImagePath($images_mian, 'thumbnail'),
				newProductImagePath($images_mian, 'thumbnail-m'),
				newProductImagePath($images_mian, 'fashion-wear'),
				newProductImagePath($images_mian, 'fashion-wear-m'),
				newProductImagePath($images_mian, 'high-reso'),
				$colorname,
				true
			);
			// End - possibly discuss about adding zoom tool to pdetail PC only - CL - 3/2/2022

			echo '</a></li>'; //<!-- Start -  BulkApparel pagespeed - CL - 05/04/2021 --> // Start - Update Structured price when color is clicked - John - 08/20/2020 // Start - Resize and optimize images - AP - 06/25/2021 // End - Images displaying in incorrect path that causing image blur - CL - 07/20/2021
		}
		// if (file_exists(dir_path . $images_others) && $images_others != "") {
		if (file_exists(str_replace(base_url_site, '', newProductImagePath($images_others, 'fashion-wear'))) && $images_others != "") { // Start - possibly discuss about adding zoom tool to pdetail PC only - CL - 3/2/2022
			$mImage = $images_others;
			// Start - Images displaying in incorrect path that causing image blur - CL - 07/20/2021
			// Start - possibly discuss about adding zoom tool to pdetail PC only - CL - 3/2/2022
			echo '<li> <a href="javascript:void(0);">';
			echo thumbnailImageTemplate(
				false,
				newProductImagePath($images_others, 'thumbnail'),
				newProductImagePath($images_others, 'thumbnail-m'),
				newProductImagePath($images_others, 'fashion-wear'),
				newProductImagePath($images_others, 'fashion-wear-m'),
				newProductImagePath($images_others, 'high-reso'),
				$colorname,
				true
			);
			// End - possibly discuss about adding zoom tool to pdetail PC only - CL - 3/2/2022
			echo '</a></li>'; //<!-- Start -  BulkApparel pagespeed - CL - 05/04/2021 --> // Start - Resize and optimize images - AP - 06/25/2021 // End - Images displaying in incorrect path that causing image blur - CL - 07/20/2021
		}
		// if (file_exists(dir_path . $images_others1) && $images_others1 != "") {
		if (file_exists(str_replace(base_url_site, '', newProductImagePath($images_others1, 'fashion-wear'))) && $images_others1 != "") { // Start - possibly discuss about adding zoom tool to pdetail PC only - CL - 3/2/2022
			$mImage = $images_others1;
			// Start - Images displaying in incorrect path that causing image blur - CL - 07/20/2021
			// Start - possibly discuss about adding zoom tool to pdetail PC only - CL - 3/2/2022
			echo '<li> <a href="javascript:void(0);">';
			echo thumbnailImageTemplate(
				false,
				newProductImagePath($images_others1, 'thumbnail'),
				newProductImagePath($images_others1, 'thumbnail-m'),
				newProductImagePath($images_others1, 'fashion-wear'),
				newProductImagePath($images_others1, 'fashion-wear-m'),
				newProductImagePath($images_others1, 'high-reso'),
				$colorname,
				true
			);
			// End - possibly discuss about adding zoom tool to pdetail PC only - CL - 3/2/2022
			echo '</a></li>'; //<!-- Start -  BulkApparel pagespeed - CL - 05/04/2021 --> // Start - Resize and optimize images - AP - 06/25/2021 // End - Images displaying in incorrect path that causing image blur - CL - 07/20/2021
		}
		// <!-- End - PageSpeed insights - WL - 10/16/2020 -->
		if ($images_mian == "" && $images_others == "" && $images_others1 == "") {
			// Start -  SL6 image issues when color image missing it shows last color instead of missing image placeholder - CL - 11/3/2021
			// Start - possibly discuss about adding zoom tool to pdetail PC only - CL - 3/2/2022
			echo '<li class="no-image-available"> <a href="javascript:void(0);">';
			echo thumbnailImageTemplate(
				false,
				newProductImagePath("", 'thumbnail'),
				newProductImagePath("", 'thumbnail-m'),
				newProductImagePath("", 'fashion-wear'),
				newProductImagePath("", 'fashion-wear-m'),
				newProductImagePath("", 'high-reso'),
				$colorname,
				true
			);
			// End - possibly discuss about adding zoom tool to pdetail PC only - CL - 3/2/2022
			echo '</a></li>';
			// End -  SL6 image issues when color image missing it shows last color instead of missing image placeholder - CL - 11/3/2021
		}
		echo '</ul>
			</div>';

		echo '</div>';
	} else {

		$mImage1 = "";
		///	if(file_exists(dir_path.$images_mian) || file_exists(dir_path.$images_others) || file_exists(dir_path.$images_others1)){
		if (file_exists(dir_path . $images_mian) && $images_mian != "") {
			$mImage1 = $images_mian;
		}
		if (file_exists(dir_path . $images_others) && $images_others != "") {
			$mImage1 = $images_others;
		}
		if (file_exists(dir_path . $images_others1) && $images_others1 != "") {
			$mImage1 = $images_others1;
		}

		echo '<div class="product-image">';
		echo '<div>' . $productReviews; // Start - New front end design for item detail page - From Christian - 09/07/2020

		if ((file_exists(dir_path . $images_mian) && $images_mian != "") || (file_exists(dir_path . $images_others) && $images_others != "") || (file_exists(dir_path . $images_others1) && $images_others1 != "")) {
			// <!-- Start - PageSpeed insights - WL - 10/16/2020 -->
			// Start - Images displaying in incorrect path that causing image blur - CL - 07/20/2021
			echo '<div class="product-item-image ' . $class . '" id="mainimg">';
			echo legacyPreviewImageTemplate(
				$mImage1,
				$colorname,
				true
			);

			echo $productImageInfo;
			echo '</div>'; //  Start- update to mobile image display with info - CL - 6/7/2021
			// End - Images displaying in incorrect path that causing image blur - CL - 07/20/2021
		} else {
			// Start - Images displaying in incorrect path that causing image blur - CL - 07/20/2021
			echo '<div class="product-item-image ' . $class . '" id="mainimg">';
			echo legacyPreviewImageTemplate(
				fnSMainImages($images_style),
				$colorname,
				true
			);
			echo $productImageInfo;
			echo '</div>'; //  Start- update to mobile image display with info - CL - 6/7/2021
			// End - Images displaying in incorrect path that causing image blur - CL - 07/20/2021
		}
		// <!-- Start - PageSpeed insights - WL - 10/16/2020 -->

		echo '</div>'; // Start - New front end design for item detail page - From Christian - 09/07/2020
		echo '<div class="detail-thumb">
				<ul class="imgsidebar">';

		$mImage = "";
		if ($styleimagestatus == 0) {
			if (file_exists(dir_path . $images_style) && $images_style != "") {
				// Start - Images displaying in incorrect path that causing image blur - CL - 07/20/2021
				echo '<li><a href="javascript:void(0);">';
				echo legacyThumbnailImageTemplate(fnSMainImages($images_style), $colorname, true);
				echo '</a></li>'; //Start - Our URL color link works good but needs some fixing - RM - 10/30/2020 
				// End - Images displaying in incorrect path that causing image blur - CL - 07/20/2021
			}
		}

		// <!-- Start - PageSpeed insights - WL - 10/16/2020 -->
		if (file_exists(dir_path . $images_mian) && $images_mian != "") {
			$mImage = $images_mian;
			// Start - Images displaying in incorrect path that causing image blur - CL - 07/20/2021
			echo '<li><a href="javascript:void(0);">';
			echo legacyThumbnailImageTemplate(fnCPMainImages($images_mian), $colorname, true);
			echo '</a></li>';  //Start - Our URL color link works good but needs some fixing - RM - 10/30/2020
			// End - Images displaying in incorrect path that causing image blur - CL - 07/20/2021
		}
		if (file_exists(dir_path . $images_others) && $images_others != "") {
			$mImage = $images_others;
			// Start - Images displaying in incorrect path that causing image blur - CL - 07/20/2021
			echo '<li><a href="javascript:void(0);">';
			echo legacyThumbnailImageTemplate(fnCPMainImages($images_others), $colorname, true);
			echo '</a></li>';
			// End - Images displaying in incorrect path that causing image blur - CL - 07/20/2021
		}
		if (file_exists(dir_path . $images_others1) && $images_others1 != "") {
			$mImage = $images_others1;
			// Start - Images displaying in incorrect path that causing image blur - CL - 07/20/2021
			echo '<li><a href="javascript:void(0);">';
			echo legacyThumbnailImageTemplate(fnCPMainImages($images_others1), $colorname, true);
			echo '</a></li>';
			// End - Images displaying in incorrect path that causing image blur - CL - 07/20/2021
		}
		// <!-- End - PageSpeed insights - WL - 10/16/2020 -->
		if ($images_mian == "" && $images_others == "" && $images_others1 == "") {
			echo '<li>&nbsp;</li>';
		}
		echo '</ul>
			</div>';

		echo '</div>';
	}
}



/*function product_images($images_mian,$images_others=false,$images_others1=false,$images_style=false,$colorname=false,$styleimagestatus=false,$h,$class){
if($h==-1) {
$mImage2="";
if(file_exists(dir_path.$images_mian) && $images_mian!=""){
$mImage2=$images_mian;
}
if(file_exists(dir_path.$images_others) && $images_others!=""){
$mImage2=$images_others;
}
if(file_exists(dir_path.$images_others1) && $images_others1!=""){
$mImage2=$images_others1;
}

echo '<div class="product-image">';
if($styleimagestatus==0) {
				echo '<div class="product-item-image '.$class.'" id="mainimg"><img itemprop="image" class="pimg" src="'.base_url_images.$images_style.'" alt="'.$colorname.'" title="'.$colorname.'"></div>';
	} else {
	echo '<div class="product-item-image '.$class.'" id="mainimg"><img itemprop="image" class="pimg" src="'.base_url_images.$mImage2.'" alt="'.$colorname.'" title="'.$colorname.'"></div>';
	}
				echo '<div class="detail-thumb">
				<ul class="imgsidebar">';

					$mImage="";
		if($styleimagestatus==0) {
					if(file_exists(dir_path.$images_style) && $images_style!=""){
					echo'<li><a href="javascript:void(0);"><img src="'.base_url_images.$images_style.'" alt="'.$colorname.'" title="'.$colorname.'" ></a></li>';
				}
				}

					if(file_exists(dir_path.$images_mian) && $images_mian!=""){
					$mImage=$images_mian;
					echo'<li><a href="javascript:void(0);"><img src="'.base_url_images.$images_mian.'" alt="'.$colorname.'" title="'.$colorname.'"></a></li>';
					}
					if(file_exists(dir_path.$images_others) && $images_others!=""){
					$mImage=$images_others;
					echo'<li><a href="javascript:void(0);"><img src="'.base_url_images.$images_others.'" alt="'.$colorname.'" title="'.$colorname.'"></a></li>';
					}
					if(file_exists(dir_path.$images_others1) && $images_others1!=""){
					$mImage=$images_others1;
					echo'<li><a href="javascript:void(0);"><img src="'.base_url_images.$images_others1.'" alt="'.$colorname.'" title="'.$colorname.'"></a></li>';
					}
				if($images_mian=="" && $images_others=="" && $images_others1==""){
				echo'<li>&nbsp;</li>';
				}
				echo'</ul>
			</div>';

				echo '</div>';

} else {

		$mImage1="";
		///	if(file_exists(dir_path.$images_mian) || file_exists(dir_path.$images_others) || file_exists(dir_path.$images_others1)){
					if(file_exists(dir_path.$images_mian) && $images_mian!=""){
				$mImage1=$images_mian;
					}
					if(file_exists(dir_path.$images_others) && $images_others!=""){
					$mImage1=$images_others;
					}
					if(file_exists(dir_path.$images_others1) && $images_others1!=""){
					$mImage1=$images_others1;
					}

	 echo '<div class="product-image">';

			if((file_exists(dir_path.$images_mian) && $images_mian!="")  || (file_exists(dir_path.$images_others)  && $images_others!="") || (file_exists(dir_path.$images_others1)  && $images_others1!="")){

			echo '<div class="product-item-image '.$class.'" id="mainimg"><img  class="pimg" src="'.base_url_images.$mImage1.'" alt="'.$colorname.'" title="'.$colorname.'"></div>';
			} else {
			echo '<div class="product-item-image '.$class.'" id="mainimg"><img  class="pimg" src="'.base_url_images.$images_style.'" alt="'.$colorname.'" title="'.$colorname.'"></div>';
			}

			echo '<div class="detail-thumb">
				<ul class="imgsidebar">';

					$mImage="";
if($styleimagestatus==0) {
			if(file_exists(dir_path.$images_style) && $images_style!=""){
					echo'<li><a href="javascript:void(0);"><img src="'.base_url_images.$images_style.'" aalt="'.$colorname.'" title="'.$colorname.'" ></a></li>';
				}
		}
					if(file_exists(dir_path.$images_mian) && $images_mian!=""){
					$mImage=$images_mian;
					echo'<li><a href="javascript:void(0);"><img src="'.base_url_images.$images_mian.'" aalt="'.$colorname.'" title="'.$colorname.'" ></a></li>';
					}
					if(file_exists(dir_path.$images_others) && $images_others!=""){
					$mImage=$images_others;
					echo'<li><a href="javascript:void(0);"><img src="'.base_url_images.$images_others.'" alt="'.$colorname.'" title="'.$colorname.'""></a></li>';
					}
					if(file_exists(dir_path.$images_others1) && $images_others1!=""){
					$mImage=$images_others1;
					echo'<li><a href="javascript:void(0);"><img src="'.base_url_images.$images_others1.'" alt="'.$colorname.'" title="'.$colorname.'"></a></li>';
					}
				if($images_mian=="" && $images_others=="" && $images_others1==""){
				echo'<li>&nbsp;</li>';
				}
				echo'</ul>
			</div>';

		echo '</div>';


}
}*/

//Start Cart Page

function totalCartItems()
{
	// static $totalCartItemsResult = null;
	// if (!is_null($totalCartItemsResult))
	// 	return $totalCartItemsResult;

	$total_items = "0";
	$orderPriceCalc = OrderPriceCalc();
	if (count($orderPriceCalc) > 0) {
		foreach ($orderPriceCalc as $k => $val) {
			$total_items = $total_items + $val['qty'];
		}
	}

	$totalCartItemsResult = $total_items;
	return $total_items;
}

function totalCartPrice()
{
	// static $totalCartPriceResult = null;
	// if (!is_null($totalCartPriceResult))
	// 	return $totalCartPriceResult;

	$totalPrice = 0;
	$orderPriceCalc = OrderPriceCalc();
	if (count($orderPriceCalc) > 0) {
		foreach ($orderPriceCalc as $k => $val) {
			// echo $val['totalPrice']."<Br>";
			$totalPrice = ($totalPrice + ($val['customerPrice'] * $val['qty']));
		}
	}
	// die();

	$totalCartPriceResult = str_replace(",", "", $totalPrice);
	return $totalCartPriceResult;
}


function OrderPriceCalc()
{

	//var_dump($_SESSION['currentOrder']);
	//exit();
	// static $orderPriceCalcResult = null;
	// if (!is_null($orderPriceCalcResult))
	// 	return $orderPriceCalcResult;
	$orderArr = array();
	$j = 0;

	/*			  echo "<pre>";
	 print_r($_SESSION['currentOrder']);
	 die();*/
	if (!empty($_SESSION['currentOrder']) && count($_SESSION['currentOrder']) > 0) {
		$ids = array_map(function ($order) {
			return $order['pid'];
		}, $_SESSION['currentOrder']);

		$products = ftechPData($ids);
		foreach ($_SESSION['currentOrder'] as $k => $val1) {
			$product = array_filter($products, function ($product) use ($val1) {
				return $val1['pid'] == $product['sku'];
			});
			foreach ($product as $val) {
				$orderArr[$j]['customerPrice'] = $val['customerPrice'];
				$orderArr[$j]['sizeName'] = $val['sizeName'];
				$orderArr[$j]['color1'] = $val['color1'];
				$orderArr[$j]['color2'] = $val['color2'];
				$orderArr[$j]['colorSwatchImage'] = $val['colorSwatchImage'];
				$orderArr[$j]['unitWeight'] = $val['unitWeight'];
				$orderArr[$j]['baseCategory'] = $val['baseCategory'];
				$orderArr[$j]['title'] = $val['title'];
				$orderArr[$j]['customTitle'] = $val['customTitle'];
				$orderArr[$j]['styleImage'] = $val['styleImage'];
				$orderArr[$j]['colorFrontImage'] = $val['colorFrontImage'];
				$orderArr[$j]['colorSideImage'] = $val['colorSideImage'];
				$orderArr[$j]['colorBackImage'] = $val['colorBackImage'];
				$orderArr[$j]['warehouses'] = $val['warehouses'];
				$orderArr[$j]['styleName'] = $val['styleName'];
				$orderArr[$j]['styleID'] = $val['styleID'];
				// Start - Free shipping exclusion - 06/11/2020 11:33 AM
				$orderArr[$j]['isfreeshipping'] = $val['isfreeshipping'];
				$orderArr[$j]['iscoupon'] = $val['iscoupon'];
				$orderArr[$j]['isbulkdiscount'] = $val['isbulkdiscount'];
				// End - Free shipping exclusion - 06/11/2020 11:33 AM
				$orderArr[$j]['sizeOrder'] = $val['sizeOrder']; // Start - cart size ranking order fix - AP - 02/01/2021
				$orderArr[$j]['brandName'] = $val['brandName']; //Start - PayPal receipt shows product description incorrectly with missing info - RM - 02/16/2021
				$orderArr[$j]['colorName'] = $val['colorName']; // Start - Send Transaction details to authnet like paypal - AP - 02/17/2021
				$orderArr[$j]['gtin'] = $val['gtin'];

				//Start - alpha adjustments - RM - 02/12/2024 
				$orderArr[$j]['cartGroupID'] = $val['cartGroupID'];
				$orderArr[$j]['alphaFrontImage'] = $val['alphaFrontImage'];
				$orderArr[$j]['alphaSideImage'] = $val['alphaSideImage'];
				$orderArr[$j]['alphaBackImage'] = $val['alphaBackImage'];
				//End - alpha adjustments - RM - 02/12/2024

			}
			$orderArr[$j]['totalPrice'] = ($val['customerPrice'] * $val1['qty']);
			$orderArr[$j]['qty'] = $val1['qty'];
			$orderArr[$j]['sku'] = $val1['pid'];
			$j++;
		}
	}

	/*					  echo "<pre>";
	 print_r($orderArr);
	 die();*/
	$orderPriceCalcResult = $orderArr;
	return $orderPriceCalcResult;
}

function ftechPData($sku)
{
	global $db;
	// static $skudetails = null;

	// if (is_null($skudetails)) {
	// Start - Cart optimization - John - 07/10/2020 7:50 AM
	if (is_array($sku) && count($sku) > 0) {
		$ids = implode("', '", $sku);
		$skudetails = $db->rawQuery("select pd.customerPrice,pd.sizeName,pd.color1,pd.color2,pd.colorSwatchImage,pd.unitWeight,st.baseCategory,st.title,st.customTitle,
			st.styleImage,
			pd.colorFrontImage,
			pd.colorSideImage,
			pd.colorBackImage,
			pd.warehouses,st.styleName,st.styleID,pd.qty,pd.sku,pd.isfreeshipping,pd.iscoupon,pd.isbulkdiscount,pd.sizeOrder,st.brandName,pd.colorName,pd.gtin, CASE WHEN ci_shipping_groups.id IS NOT NULL THEN ci_shipping_groups.id ELSE 1 END AS cartGroupID, 
			pd.alphaFrontImage,
			pd.alphaSideImage,
			pd.alphaBackImage FROM ci_products as pd inner join ci_styles as st on st.styleID=pd.styleID LEFT JOIN ci_shipping_groups ON ci_shipping_groups.id = pd.cartGroupID AND ci_shipping_groups.enabled = (1) where pd.sku IN ('{$ids}')"); // Start - cart size ranking order fix - AP - 02/01/2021 - Start - PayPal receipt shows product description incorrectly with missing info - RM - 02/16/2021 // Start - Send Transaction details to authnet like paypal - AP - 02/17/2021 //Start - alpha adjustments - RM - 02/12/2024
	} else {
		$skudetails = $db->rawQuery("select pd.customerPrice,pd.sizeName,pd.color1,pd.color2,pd.colorSwatchImage,pd.unitWeight,st.baseCategory,st.title,st.customTitle,st.styleImage,
			pd.colorFrontImage,
			pd.colorSideImage,
			pd.colorBackImage,
			pd.warehouses,st.styleName,st.styleID,pd.qty,pd.isfreeshipping,pd.iscoupon,pd.isbulkdiscount,pd.sizeOrder,st.brandName,pd.colorName,pd.gtin,
			CASE WHEN ci_shipping_groups.id IS NOT NULL THEN ci_shipping_groups.id ELSE 1 END AS cartGroupID,
			pd.alphaFrontImage,
			pd.alphaSideImage,
			pd.alphaBackImage FROM ci_products as pd inner join ci_styles as st on st.styleID=pd.styleID LEFT JOIN ci_shipping_groups ON ci_shipping_groups.id = pd.cartGroupID AND ci_shipping_groups.enabled = (1) where pd.sku = ? ", array($sku)); // Start - cart size ranking order fix - AP - 02/01/2021 Start - PayPal receipt shows product description incorrectly with missing info - RM - 02/16/2021 // Start - Send Transaction details to authnet like paypal - AP - 02/17/2021 //Start - alpha adjustments - RM - 02/12/2024
	}
	// End - Cart optimization - John - 07/10/2020 7:50 A
	// }

	if (!empty($skudetails)) {
		return $skudetails;
	} else {
		return 0;
	}
}


//End Cart Page
/****Sync Data from EDI API********************/

function syncnow($method)
{

	$end_url = API_ENDPOINT;
	$customer_number = UNAME;
	$api_key = PWD;
	$uri = $end_url . $method;

	$ch1 = curl_init($uri);
	/*echo $customer_number.':'.$api_key;
die();*/
	$access_key = base64_encode($customer_number . ':' . $api_key);
	curl_setopt($ch1, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $access_key));

	curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, 1);

	$retrive_response1 = curl_exec($ch1);
	curl_close($ch1);

	return $retrive_response1;
}

function fnCheckCategoryExistorNot($tblname)
{
	global $db;
	$tbleempty = $db->rawQueryOne("truncate table $tblname ");
	return $tbleempty;
}

/**
		Make a nested path , creating directories down the path
		Recursion !!
 */
function make_path($path)
{
	$dir = pathinfo($path, PATHINFO_DIRNAME);

	if (is_dir($dir)) {
		return true;
	} else {
		if (make_path($dir)) {
			if (mkdir($dir)) {
				chmod($dir, 0777);
				return true;
			}
		}
	}

	return false;
}


function bestsellers($limit = false)
{
	global $db;
	$params = array();
	$bestsellers = $db->rawQuery("SELECT slug,customeseo,slugCategory,styleImage,brandslug,customTitle,brandName,styleID,brandImage,title,pPrice,pColors,pTotalColors,pmodelImage,styleImageStatus,bestsellerrank FROM `ci_styles`  where bestsellerrank<>0 and isExistProduct=1 group by brandName  order by bestsellerrank ASC limit 0,$limit");
	return $bestsellers;
}

//New Item Card Design and Add-To-Cart Quick Popup - SF - 07282025 
function bestsellersLatest($limit = false)
{
	global $db;

	$userID = $_SESSION["uid"];

	// Ensure safe integer for limit
	$limit = is_numeric($limit) && $limit > 0 ? (int) $limit : 10;

	$sql = "
		SELECT 
			slug,
			ci_styles.id,
			customeseo,
			slugCategory,
			styleImage,
			brandslug,
			customTitle,
			brandName,
			styleID,
			brandImage,
			title,
			pPrice,
			pColors,
			pTotalColors,
			pmodelImage,
			styleImageStatus,
			bestsellerrank,
			ribbonText,
			ribbonPosition,
			ribbonShadow,
			ribbonStyle,
			ribbonColor,
			ribbonTextColor,
			customRibbon,
			isCustomRibbon,
			overviewImage,
			ci_styles.cartGroupID,
			hoverImage,
			imageVersion, 
			vendor,
			COALESCE((
				SELECT 1
				FROM ci_favorites
				WHERE ci_favorites.styleID = ci_styles.styleID
				AND ci_favorites.userID = ?
				LIMIT 1
			), 0) AS isfavorite
		FROM ci_styles
		WHERE bestsellerrank <> 0
			AND isExistProduct = 1
		ORDER BY bestsellerrank ASC
		LIMIT ?
	";

	$params = [$userID, $limit];

	$bestsellers = $db->rawQuery($sql, $params);

	return $bestsellers;
}
//New Item Card Design and Add-To-Cart Quick Popup - SF - 07282025 

function getCartRecommendedItems($limit = false, $randomize = true)
{ // Start - Add customer favorites on tracking page - CL - 4182024
	global $db;
	$params = array();

	// Start - Add customer favorites on tracking page - CL - 4182024
	$limitSql = "";
	if ($limit) {
		$limitSql = "LIMIT $limit";
	}
	// End - Add customer favorites on tracking page - CL - 4182024

	$orderBy = '';
	if ($randomize) {
		$orderBy = "order by RAND()";
	}

	// New Item Card Design and Add-To-Cart Quick Popup - SF - 07/30/2025
	// Default to 0 if user is not logged in
	$userID = $_SESSION['uid'] ?? null;

	// New Item Card Design and Add-To-Cart Quick Popup - SF - 07/30/2025
	$selectFavorite = '';
	$isFavoriteSelect = '0 AS isfavorite';
	if (!empty($userID)) {
		$isFavoriteJoin = "LEFT JOIN ci_favorites 
			ON ci_favorites.styleID = style.styleID 
			AND ci_favorites.userID = {$userID}";
		$selectFavorite = ",CASE 
			WHEN ci_favorites.userID IS NOT NULL THEN 1 
			ELSE 0 
		END AS isfavorite";
	}
	// Default to 0 if user is not logged in
	// New Item Card Design and Add-To-Cart Quick Popup - SF - 07/30/2025


	$recommended = $db->rawQuery("SELECT *, CASE WHEN ci_shipping_groups.enabled = 1 THEN ci_shipping_groups.id ELSE 1 END AS cartGroupID $selectFavorite FROM `ci_cart_recommended_items` as cartrecommended INNER JOIN ci_styles as style ON cartrecommended.styleid = style.id INNER JOIN ci_shipping_groups ON ci_shipping_groups.id = style.cartGroupID $isFavoriteJoin 
	GROUP BY style.styleID
	$orderBy 
	$limitSql"); //Start - Make cart recommended items Random sort order, every refresh - RM - 02/10/2022 // Start - Add customer favorites on tracking page - CL - 4182024

	return $recommended;
}

//Start Update "More Items to Explore" on Cart page - SF - 06/09/2025
function getMoreItemToExplore($excludeStyleIds = [], $limit = false, $cart_data = [])
{
	global $db;
	$params = [];

	$userID = $_SESSION['uid'] ?? null; // New Item Card Design and Add-To-Cart Quick Popup - SF - 07/30/2025

	// Extract cart group IDs
	$groupIDs = [];
	if (!empty($cart_data['group'])) {
		$groupIDs = array_map('intval', array_keys($cart_data['group']));
	}

	//Start - Gangsheet Integration - RM - 07/14/2025
	$groupIDs = array_filter($groupIDs, function ($value) {
		return $value !== 10;
	});
	$groupIDs = array_values($groupIDs);
	//End - Gangsheet Integration - RM - 07/14/2025

	// Helper query builder
	$runQuery = function ($filterByGroupIDs) use ($db, $excludeStyleIds, $limit, $groupIDs, $userID) {
		$params = [];
		$wheres = [];

		// Exclude style IDs
		if (!empty($excludeStyleIds)) {
			$placeholders = implode(',', array_fill(0, count($excludeStyleIds), '?'));
			$wheres[] = "style.styleID NOT IN ($placeholders)";
			$params = array_merge($params, $excludeStyleIds);
		}

		// Filter by group IDs
		if ($filterByGroupIDs && !empty($groupIDs)) {
			$placeholders = implode(',', array_fill(0, count($groupIDs), '?'));
			$wheres[] = "style.cartGroupID IN ($placeholders)";
			$params = array_merge($params, $groupIDs);
		}

		// Filter by brandstatus
		$wheres[] = "style.brandstatus = 0";

		$condition = count($wheres) ? "WHERE " . implode(" AND ", $wheres) : "";
		$limitSql = $limit ? "LIMIT " . intval($limit) : "";

		// New Item Card Design and Add-To-Cart Quick Popup - SF - 07/30/2025
		$selectFavorite = '';
		$isFavoriteSelect = '0 AS isfavorite';
		if (!empty($userID)) {
			$isFavoriteJoin = "LEFT JOIN ci_favorites 
				ON ci_favorites.styleID = style.styleID 
				AND ci_favorites.userID = {$userID}";
			$selectFavorite = ",CASE 
				WHEN ci_favorites.userID IS NOT NULL THEN 1 
				ELSE 0 
			END AS isfavorite";
		}
		// New Item Card Design and Add-To-Cart Quick Popup - SF - 07/30/2025

		// Start- apply s3bucket for all images - CL - 1152025
		return $db->rawQuery("
            SELECT *, 
                style.styleID AS styleIDMain, 
								style.cartGroupID AS cartGroupID,
								style.imageVersion,
                CASE WHEN ci_shipping_groups.enabled THEN ci_shipping_groups.id ELSE 1 END AS cartGroupID
				$selectFavorite
            FROM ci_cart_recommended_items AS cartrecommended 
            INNER JOIN ci_styles AS style ON cartrecommended.styleid = style.id 
            INNER JOIN ci_shipping_groups ON ci_shipping_groups.id = style.cartGroupID
			$isFavoriteJoin
            $condition
						GROUP BY style.styleID
            ORDER BY RAND() $limitSql
        ", $params);
		// End - apply s3bucket for all images - CL - 1152025
	};

	// Primary query
	$recommended = $runQuery(true);
	$styleIDsReturned = array_column($recommended, 'styleIDMain');

	// Fallback if less than 5 — query from ci_styles directly
	if (count($recommended) < 5) {
		$needed = 20 - count($recommended);

		$fallbackParams = [];
		$fallbackWhere = [];

		// Exclude styleIDs already returned
		if (!empty($styleIDsReturned)) {
			$placeholders = implode(',', array_fill(0, count($styleIDsReturned), '?'));
			$fallbackWhere[] = "style.styleID NOT IN ($placeholders)";
			$fallbackParams = $styleIDsReturned;
		}

		// Optional: respect cartGroupIDs if available
		if (!empty($groupIDs)) {
			$placeholders = implode(',', array_fill(0, count($groupIDs), '?'));
			$fallbackWhere[] = "style.cartGroupID IN ($placeholders)";
			$fallbackParams = array_merge($fallbackParams, $groupIDs);
		}

		// Only enabled shipping groups
		$fallbackWhere[] = "ci_shipping_groups.enabled = 1";

		// Filter by brandstatus
		$fallbackWhere[] = "style.brandstatus = 0";

		$fallbackWhereClause = count($fallbackWhere) ? "WHERE " . implode(" AND ", $fallbackWhere) : "";

		// New Item Card Design and Add-To-Cart Quick Popup - SF - 07/30/2025
		$selectFavorite = '';
		$isFavoriteSelect = '0 AS isfavorite';
		if (!empty($userID)) {
			$isFavoriteJoin = "LEFT JOIN ci_favorites 
				ON ci_favorites.styleID = style.styleID 
				AND ci_favorites.userID = {$userID}";
			$selectFavorite = ",CASE 
				WHEN ci_favorites.userID IS NOT NULL THEN 1 
				ELSE 0 
			END AS isfavorite";
		}
		// New Item Card Design and Add-To-Cart Quick Popup - SF - 07/30/2025

		// Start- apply s3bucket for all images - CL - 1152025
		$fallbackQuery = "
            SELECT *, 
                style.styleID AS styleIDMain, 
                style.cartGroupID AS cartGroupID,
								style.imageVersion,
				$selectFavorite
            FROM ci_styles AS style
            INNER JOIN ci_shipping_groups ON ci_shipping_groups.id = style.cartGroupID
			$isFavoriteJoin
            $fallbackWhereClause
						GROUP BY style.styleID
            ORDER BY RAND()
            LIMIT " . intval($needed);
		// End- apply s3bucket for all images - CL - 1152025
		$fallbackResults = $db->rawQuery($fallbackQuery, $fallbackParams);

		// Merge unique styles
		foreach ($fallbackResults as $item) {
			if (!in_array($item['styleIDMain'], $styleIDsReturned)) {
				$recommended[] = $item;
				$styleIDsReturned[] = $item['styleIDMain'];
				// if (count($recommended) >= 5) break;
			}
		}
	}

	return [
		"recommended" => $recommended,
		"cartgroup" => $groupIDs
	];
}
//End Update "More Items to Explore" on Cart page - SF - 06/09/2025

// New Item Card Design and Add-To-Cart Quick Popup - SF - 07292025
function getAllStyles($catid, $orderby = false, $take = null)
{
	global $db;

	$userID = $_SESSION["uid"];

	// SQL parts
	$where = " AND FIND_IN_SET(?, categories)";
	$orderClause = $orderby ? " ORDER BY bestsellerrank ASC, pPrice ASC" : "";

	$limitClause = "";
	$params = [$userID, $catid]; // MUST match ? placeholders in order

	if (is_numeric($take) && $take > 0) {
		$limitClause = " LIMIT ?";
		$params[] = (int) $take;
	}

	$sql = "
		SELECT  
			slug,
			ci_styles.id,
			customeseo,
			slugCategory,
			customTitle,
			styleImage,
			brandName,
			styleID,
			brandImage,
			title,
			pPrice,
			pColors,
			pTotalColors,
			pmodelImage,
			styleImageStatus,
			bestsellerrank,
			ribbonText,
			ribbonPosition,
			ribbonShadow,
			ribbonStyle,
			ribbonColor,
			ribbonTextColor,
			customRibbon,
			isCustomRibbon,
			overviewImage,
			ci_styles.cartGroupID,
			hoverImage,
			vendor,
			imageVersion,
			COALESCE((
				SELECT 1
				FROM ci_favorites
				WHERE ci_favorites.styleID = ci_styles.styleID
				AND ci_favorites.userID = ?
				LIMIT 1
			), 0) AS isfavorite
		FROM ci_styles
		WHERE bestsellerrank <> 0
			AND isExistProduct = 1
			AND pPrice <> '0.00'
			{$where}
			{$orderClause}
			{$limitClause}
	";

	$gstyles = $db->rawQuery($sql, $params);

	return $gstyles;
}
// New Item Card Design and Add-To-Cart Quick Popup - SF - 07292025

function getAllBStyles()
{
	global $db;
	$orders = " order by bestsellerrank,brandName ASC";
	$gstyles = $db->rawQuery("SELECT  slug,customeseo,slugCategory,styleImage,customTitle,styleName,brandName,styleID,brandImage,title,pPrice,pColors,pTotalColors FROM `ci_styles` where 1 and bestsellerrank<>0 and isExistProduct=1 and pPrice<>'0.00'  $orders ");
	return $gstyles;
}


function get_attach_categories()
{
	global $db;
	$categories = $db->rawQuery("select * from ci_category_local  where showOnHome=? order by homepagedispOrder asc ", array(1));
	if (!empty($categories)) {
		return $categories;
	} else {
		return false;
	}
}

function showcategoryhomepage()
{
	global $db;
	$parentCat = get_attach_categories();
	foreach ($parentCat as $i => $val) {
		//echo $val['catEDIid']."--";
		//print_r($val);
		$all_styles = getAllStyles($val['catEDIid'], true);
		$i = 0;
		foreach ($all_styles as $item) {
			if ($i < 4) {
				$prod[$val['catEDIid']]['categoryId'] = $val['catEDIid'];  //Start -  Custom pages pagination - CL - 12202021
				if (isset($val['CustomTitleHmPage']) && !empty($val['CustomTitleHmPage'])) {
					$prod[$val['catEDIid']]['name'] = $val['CustomTitleHmPage'];
				} else {
					$prod[$val['catEDIid']]['name'] = $val['name'];
				}
				$prod[$val['catEDIid']]['sub_data_row'][] = $item;
			}
			$i++;
		}
	}
	return $prod;
}


// Add to wishlist

function already_product_added_in_wishlist($sku, $styleid)
{
	global $db;
	$uid = $_SESSION['uid'];
	$userWhere = "";
	if (isset($uid) && !empty($uid)) {
		$userWhere = " and userid=" . $uid;
	}
	$cwishlist = $db->rawQueryOne("select * from ci_wishlist where sku= '" . $sku . "' and styleid = '" . $styleid . "' $userWhere");
	if (!empty($cwishlist) > 0) {
		return 1;
	} else {
		return 0;
	}
}



/*@Purpose Check the frontend user already login or not!
 */


function linklogin()
{
	if (isset($_SESSION['login']) && !empty($_SESSION['login']) && $_SESSION['login'] == 'f') {
		return 'dashboard';
	} else {
		return 'login';
	}
}

function linkcheck()
{
	if (isset($_SESSION['login']) && !empty($_SESSION['login']) && $_SESSION['login'] == 'f') {
		return true;
	} else {
		return false;
	}
}


function get_selected($params)
{
	global $db;
	$sql = "select * from ci_customer where id='" . $_SESSION['uid'] . "' and email='" . $_SESSION['uemail'] . "' and status='1'";
	$results = $db->rawQuery($sql);
	if (count($results) > 0) {
		return $results[0][$params];
	} else {
		return '';
	}
}

function get_address($cid, $address_type)
{
	$results = get_users_address_info($cid, $address_type);
	//$sql="select * from ci_address where cid='".$cid."' and status='1' and addressType='".$address_type."'";
	//$results =  $db->rawQuery($sql);

	if (count($results) > 0) {
		$address = "";
		$address .= str_replace('^', ' ', $results[0]['customer']) . '<br>';
		if (isset($results[0]['company']) && $results[0]['company'] != "") {
			$address .= $results[0]['company'] . '<Br>';
		}
		//$address.=$results[0]['email'].'<br>';
		if (isset($results[0]['attn']) && $results[0]['attn'] != "") {
			$address .= $results[0]['attn'] . ',&nbsp;';
		}
		$address .= $results[0]['address'] . '<br>';
		if (isset($results[0]['address2']) && $results[0]['address2'] != "") {
			$address .= $results[0]['address2'] . ($results[0]['address2'] != '' ? '<br>' : '');
		}
		$address .= $results[0]['city'] . ',&nbsp;';
		$address .= $results[0]['state'] . ',&nbsp;';
		$address .= $results[0]['zip'] . '<br>';
		// $address.=$results[0]['addressType'].'<br>';
		$address .= ($results[0]['addressType'] == 2 ? $results[0]['sellerPermit'] . '<br>' : '');
		$address .= ($results[0]['telAdd'] != '' ? $results[0]['telAdd'] . '<br>' : '');
		return $address;
	} else {
		return '';
	}
}

function get_address_order($cid, $address_type, $ordid)
{
	$results = get_users_address_info_order($cid, $address_type, $ordid);

	$billing = get_users_address_info_order($cid, 0, $ordid); // START Display company name in orderconfirm page - SF - 06122025

	//$sql="select * from ci_address where cid='".$cid."' and status='1' and addressType='".$address_type."'";
	//$results =  $db->rawQuery($sql);
	if (!empty($results) && is_array($results) && count($results) > 0) {
		$address = "";
		$address .= str_replace('^', ' ', $results[0]['customer']) . '<br>';
		// START Display company name in orderconfirm page - SF - 06122025
		if (isset($results[0]['company']) && $results[0]['company'] != "") {
			$address .= $results[0]['company'] . '<Br>';
		} elseif (!empty($billing[0]['company'])) {
			$address .= $billing[0]['company'] . '<br>';
		}
		// START Display company name in orderconfirm page - SF - 06122025
		$address .= $results[0]['email'] . '<br>';
		if (isset($results[0]['attn']) && $results[0]['attn'] != "") {
			$address .= $results[0]['attn'] . ',&nbsp;';
		}
		$address .= $results[0]['address'] . '<br>';
		if (isset($results[0]['address2']) && $results[0]['address2'] != "") {
			$address .= $results[0]['address2'] . ($results[0]['address2'] != '' ? '<br>' : '');
		}
		$address .= $results[0]['city'] . ',&nbsp;';
		$address .= $results[0]['state'] . ',&nbsp;';
		$address .= $results[0]['zip'] . '<br>';
		// $address.=$results[0]['addressType'].'<br>';
		//$address .= ($results[0]['addressType'] == 2 ? $results[0]['sellerPermit'] . '<br>' : ''); //Start - Verify if resale info always shows when available for admin order detail - RM - 01/21/2021
		$address .= ($results[0]['telAdd'] != '' ? $results[0]['telAdd'] . '<br>' : '');

		$address .= ($results[0]['addressType'] == 0 ? $results[0]['sellerPermit'] . '<br>' : ''); //Start - Verify if resale info always shows when available for admin order detail - RM - 01/21/2021


		return $address;
	} else {
		return 'N/A';
	}
}

function getLeftAdminPanel($page)
{

	// Start - Relayout customer edit page - CL - 10202020-143PM
	$html = "";
	$html .= "<div class='account__div account__sidebar'>";
	$html .= "<div class='account__sidebar-header'>";
	$html .= "<h2>";
	$html .= ($page == 'dashboard' ? 'My Account' : '');
	$html .= (($page == 'myorders' || $page == 'orderdetails') ? 'My Orders' : '');
	$html .= ($page == 'edit_account' ? 'Edit Account' : '');
	//$html.=($page=='trackorder'?'Track Orders':'');
	$html .= ($page == 'email_preferences' ? 'Email-Preferences' : '');
	$html .= ($page == 'update_password' ? 'Update Password' : ''); // Start - Edit customer information page adjustments - CL - 06/16/2021
	$html .= ($page == 'newslettersettings' ? 'Newsletter Settings' : ''); // Start - Add in customer dash a way to remove yourself from emails marketing - CL - 01/11/2021
	$html .= "</h2>";
	$html .= "<button class='btn btn--burger' id='account-btn'> <span></span> </button>";
	$html .= "</div>";

	$html .= "<ul class='account__sidebar-list' id='account-sidebar' data-open='open'>";
	$html .= "<li class='account__sidebar-item " . ($page == 'dashboard' ? 'acc-active' : '') . "'><a href='dashboard'><div class='account__sidebar-icon'><svg height='512pt' viewBox='0 0 512 512' width='512pt' xmlns='http://www.w3.org/2000/svg'><path d='M197.332 170.668h-160C16.746 170.668 0 153.922 0 133.332v-96C0 16.746 16.746 0 37.332 0h160c20.59 0 37.336 16.746 37.336 37.332v96c0 20.59-16.746 37.336-37.336 37.336zM37.332 32A5.336 5.336 0 0032 37.332v96a5.337 5.337 0 005.332 5.336h160a5.338 5.338 0 005.336-5.336v-96A5.337 5.337 0 00197.332 32zm0 0M197.332 512h-160C16.746 512 0 495.254 0 474.668v-224c0-20.59 16.746-37.336 37.332-37.336h160c20.59 0 37.336 16.746 37.336 37.336v224c0 20.586-16.746 37.332-37.336 37.332zm-160-266.668A5.337 5.337 0 0032 250.668v224A5.336 5.336 0 0037.332 480h160a5.337 5.337 0 005.336-5.332v-224a5.338 5.338 0 00-5.336-5.336zm0 0M474.668 512h-160c-20.59 0-37.336-16.746-37.336-37.332v-96c0-20.59 16.746-37.336 37.336-37.336h160c20.586 0 37.332 16.746 37.332 37.336v96C512 495.254 495.254 512 474.668 512zm-160-138.668a5.338 5.338 0 00-5.336 5.336v96a5.337 5.337 0 005.336 5.332h160a5.336 5.336 0 005.332-5.332v-96a5.337 5.337 0 00-5.332-5.336zm0 0M474.668 298.668h-160c-20.59 0-37.336-16.746-37.336-37.336v-224C277.332 16.746 294.078 0 314.668 0h160C495.254 0 512 16.746 512 37.332v224c0 20.59-16.746 37.336-37.332 37.336zM314.668 32a5.337 5.337 0 00-5.336 5.332v224a5.338 5.338 0 005.336 5.336h160a5.337 5.337 0 005.332-5.336v-224A5.336 5.336 0 00474.668 32zm0 0' /></svg></div><h3>Dashboard</h3></a></li>";
	$html .= "<li class='account__sidebar-item " . (($page == 'myorders' || $page == 'orderdetails') ? 'acc-active' : '') . "'><a href='dashboard?mode=order_history'><div class='account__sidebar-icon'> <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1000 1000'> <path d='M243.1 696.4v48.9h123.2c-.6-8.1-.9-16.2-.9-24.5 0-8.2.3-16.4.9-24.5H243.1zm189.7-171.2H243.1v48.9h158.2c9-17.3 19.6-33.7 31.5-48.9zM536.7 11.4H389.9v48.9h146.8V11.4zM454 941.1H120.8c-13.5 0-24.5-11-24.5-24.5V84.8c0-13.5 11-24.5 24.5-24.5h117.3c15.5 5.3 29.1 18.6 29.5 48.9.5 53.5 73.4 48.9 73.4 48.9h244.6s68.5 0 73.4-56c2.2-25.3 14.8-36.9 29-41.8h117.8c13.5 0 24.5 11 24.5 24.5v353.9c17.3 9 33.7 19.6 48.9 31.5V60.4c0-27-21.9-48.9-48.9-48.9H683.5S610.1-3 610.1 60.4c0 33.6-20.6 45.3-40 48.9H364c-21.1-2.6-47.4-13.1-47.4-48.9 0-59.9-73.4-48.9-73.4-48.9H96.3c-27 0-48.9 21.9-48.9 48.9v880.7c0 27 21.9 48.9 48.9 48.9h417.6c-21.9-13.8-42-30.3-59.9-48.9zm229.5-587.2H243.1v48.9h440.4v-48.9zm0 97.9c-148.6 0-269.1 120.5-269.1 269.1 0 148.6 120.5 269.1 269.1 269.1s269.1-120.5 269.1-269.1c0-148.6-120.5-269.1-269.1-269.1zm146.8 293.6H659V574.1h48.9v122.3h122.3v49z'/> </svg> </div><h3> Order History </h3> </a> </li>"; /*Start - clicking on order history in cust dashboard sends you to old setup - RM - 02/17/2021*/
	//$html.="<li><a ".($page=list'?'class="active-list"':'')." href='wishlist'>My Wishlist</a></li>";
	$html .= "<li class='account__sidebar-item " . ($page == 'edit_account' ? 'acc-active' : '') . "'> <a href='edit_account'> <div class='account__sidebar-icon'> <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 19.738 19.738'> <g> <path d='M18.18 19.738h-2c0-3.374-2.83-6.118-6.311-6.118s-6.31 2.745-6.31 6.118h-2c0-4.478 3.729-8.118 8.311-8.118 4.581 0 8.31 3.64 8.31 8.118zM9.87 10.97a5.492 5.492 0 01-5.484-5.485A5.49 5.49 0 019.87 0c3.025 0 5.486 2.46 5.486 5.485S12.895 10.97 9.87 10.97zm0-8.97C7.948 2 6.385 3.563 6.385 5.485S7.948 8.97 9.87 8.97c1.923 0 3.486-1.563 3.486-3.485S11.791 2 9.87 2z'/> </g> </svg> </div><h3> Personal Information </h3> </a> </li>";
	//$html.="<li><a ".($page=='trackorder'?'class="active-list"':'')." href='trackorder'>Track Orders</a></li>";
	// Start - Edit customer information page adjustments - CL - 06/11/2021 -->
	$html .= "<li class='account__sidebar-item " . ($page == 'update_password' ? 'acc-active' : '') . "'> <a href='update_password'> <div class='account__sidebar-icon'> <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24'><path d='M17 7h5v10h-5v2a1 1 0 001 1h2v2h-2.5c-.55 0-1.5-.45-1.5-1 0 .55-.95 1-1.5 1H12v-2h2a1 1 0 001-1V5a1 1 0 00-1-1h-2V2h2.5c.55 0 1.5.45 1.5 1 0-.55.95-1 1.5-1H20v2h-2a1 1 0 00-1 1v2M2 7h11v2H4v6h9v2H2V7m18 8V9h-3v6h3M8.5 12A1.5 1.5 0 007 10.5 1.5 1.5 0 005.5 12 1.5 1.5 0 007 13.5 1.5 1.5 0 008.5 12m4.5-1.11c-.61-.56-1.56-.51-2.12.11-.56.6-.51 1.55.12 2.11.55.52 1.43.52 2 0v-2.22z'/></svg> </div><h3> Update Password </h3> </a> </li>";
	//  End - Edit customer information page adjustments - CL - 06/11/2021 -->

	//Start - Add in customer dash a way to remove yourself from emails marketing - RM - 01/10/2022
	$html .= "<li class='account__sidebar-item " . ($page == 'newslettersettings' ? 'acc-active' : '') . "'> <a href='newslettersettings'> <div class='account__sidebar-icon'><svg style='width:24px;height:24px' viewBox='0 0 24 24'>
    <path fill='currentColor' d='M22 5.5H9C7.9 5.5 7 6.4 7 7.5V16.5C7 17.61 7.9 18.5 9 18.5H22C23.11 18.5 24 17.61 24 16.5V7.5C24 6.4 23.11 5.5 22 5.5M22 9.17L15.5 12.5L9 9.17V7.5L15.5 10.81L22 7.5V9.17M5 16.5C5 16.67 5.03 16.83 5.05 17H1C.448 17 0 16.55 0 16S.448 15 1 15H5V16.5M3 7H5.05C5.03 7.17 5 7.33 5 7.5V9H3C2.45 9 2 8.55 2 8S2.45 7 3 7M1 12C1 11.45 1.45 11 2 11H5V13H2C1.45 13 1 12.55 1 12Z' />
</svg> </div><h3> Newsletter Settings </h3> </a> </li>";
	//End - Add in customer dash a way to remove yourself from emails marketing - RM - 01/10/2022

	$html .= "<li class='account__sidebar-item acc-logout " . ($page == 'logout' ? 'acc-active' : '') . "'> <a href='logout'> <h3 class='account__sidebar-icon'> Logout </h3> </a> </li>";

	$html .= "</ul>";
	$html .= "</div>";
	echo $html;
	// End -  Relayout customer edit page - CL - 10202020-143PM
}

function get_users_address_info($cid, $address_type)
{
	global $db;
	$sql = "select * from ci_address where cid='" . $cid . "' and status='1' and addressType='" . $address_type . "' and ordId=0";
	/*echo $sql;
	die();*/
	$results = $db->rawQuery($sql);
	if (count($results) > 0) {
		return $results;
	} else {
		return '';
	}
}

function get_users_address_info_order($cid, $address_type, $ordid)
{
	global $db;
	$sql = "select * from ci_address where cid='" . $cid . "' and status='1' and addressType='" . $address_type . "' and ordId='" . $ordid . "'";
	$results = $db->rawQuery($sql);
	if (count($results) > 0) {
		return $results;
	} else {
		return '';
	}
}

function get_auth_address_info($cid, $address_type)
{
	global $db;

	$sql = "select * from ci_customer_address where customerId=? and type=? and isSelected=1";

	$results = $db->rawQuery($sql, [$cid, $address_type]);

	if (count($results) > 0) {
		return $results;
	} else {
		return '';
	}
}

function get_address_byfield($address_type, $field)
{
	$cid = $_SESSION['uid'];
	$results = get_users_address_info($cid, $address_type);
	if (!empty($results) && count($results) > 0) {
		return $results[0][$field];
	} else {
		return '';
	}
}


function isLogin()
{
	/*login users code check here!*/
	if (empty($_SESSION)) {
		$current_url = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$encoded_url = urlencode($current_url);
		$login_url = 'https://' . $_SERVER['HTTP_HOST'] . '/login?redirect_url=' . $encoded_url;
		header('Location:' . $login_url);
		exit();
		// echo'<script>window.location.replace("login");</script>';
	}
}

function getEmailPrefrences()
{
	global $db;
	$cid = $_SESSION['uid'];
	$sql = "select * from ci_email_subscriptions where cid='" . $cid . "' ";
	$results = $db->rawQueryOne($sql);
	if (count($results) > 0) {
		return $results;
	} else {
		return false;
	}
}


function slugify($string, $replace = array(), $delimiter = '-')
{
	// https://github.com/phalcon/incubator/blob/master/Library/Phalcon/Utils/Slug.php
	if (!extension_loaded('iconv')) {
		throw new Exception('iconv module not loaded');
	}
	// Save the old locale and set the new locale to UTF-8
	$oldLocale = setlocale(LC_ALL, '0');
	setlocale(LC_ALL, 'en_US.UTF-8');
	$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
	if (!empty($replace)) {
		$clean = str_replace((array) $replace, ' ', $clean);
	}
	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
	$clean = strtolower($clean);
	$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
	$clean = trim($clean, $delimiter);
	// Revert back to the old locale
	setlocale(LC_ALL, $oldLocale);
	return $clean;
}




function getCmsPage($pagetitle)
{
	global $db;
	$sql = "select * from ci_pages where pagetitle ='" . $pagetitle . "' and pageCustom='0' and pagestatus='1'";
	$results = $db->rawQueryOne($sql);
	if (!empty($results)) {
		return $results;
	} else {
		return []; //'N/A';
	}
}



function selfURL()
{
	$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on" ? "s" : "");
	$protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/") . $s;
	$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":" . $_SERVER["SERVER_PORT"]);
	$port = "";
	return $protocol . "://" . $_SERVER['SERVER_NAME'] . $port . $_SERVER['REQUEST_URI'];
}

function strleft($s1, $s2)
{
	return substr($s1, 0, strpos($s1, $s2));
}




function getmetaData($data)
{
	global $db;
	$activePage = selfURL();
	$sql = "select * from ci_pages where pageLink = ?";
	$results = $db->rawQueryOne($sql, [$activePage]);
	if (!empty($results) && count($results) > 0) {
		return $results[$data];
	} else {
		return false;
	}
}

function getmetaProductData($data, $styleid)
{
	global $db;

	$sql = "select * from ci_styles where styleID ='" . $styleid . "'";
	$results = $db->rawQueryOne($sql);

	if (!empty($results) && count($results) > 0) {
		if (isset($results[$data]) && $results[$data] != "") {
			return $results[$data];
		} else {
			return $results['brandName'] . " " . $results['styleName'] . " " . $results['title'];
		}
	} else {
		return false;
	}
}

function getProductDescription($styleId)
{
	global $db;
	$result = $db->rawQueryOne("SELECT description FROM ci_styles WHERE styleID = '$styleId'");
	return $result['description'];
}

function getmetaCategoryData($data, $catid)
{
	if ($catid == null)
		return false;

	global $db;
	$sql = "select * from ci_category_meta where categoryID ='" . $catid . "' AND is_active = 1";
	$results = $db->rawQueryOne($sql);
	if (!empty($results)) {
		if (isset($results[$data]) && $results[$data] != "") {
			return $results[$data];
		} else {
			return $results['name'];
		}
	} else {
		return false;
	}
}


/* Start Abondoned Cart */
function updateCartValidate()
{
	global $db;
	if (isset($_COOKIE["csid"]) && $_COOKIE["csid"] != "") {
		// Start - cart migration when login - AP - 03/31/2021
		$results = $db->rawQuery("SELECT abd_pid, abd_qty, ci_products.customerPrice FROM ci_abdoncart INNER JOIN ci_products ON ci_abdoncart.abd_pid = ci_products.sku WHERE abd_cid = ?", [$_SESSION['uid']]);
		$resultsGuest = $db->rawQuery("SELECT abd_pid, abd_qty, ci_products.customerPrice FROM ci_abdoncart INNER JOIN ci_products ON ci_abdoncart.abd_pid = ci_products.sku WHERE abd_cokiesid = ?", [$_COOKIE["csid"]]);
		$totalQuantity = 0;
		$totalPrice = 0;
		if (!empty($resultsGuest)) {
			$items = array_map(function ($item) use (&$totalQuantity, &$totalPrice) {
				$totalQuantity += $item['abd_qty'];
				$totalPrice += ($item['customerPrice'] * $item['abd_qty']);

				return [
					'sku' => $item['abd_pid'],
					'qty' => $item['abd_qty']
				];
			}, $results);

			if ($totalQuantity > 0) { //Start - Retrieve migration issue - RM - 04/05/2021
				$db->insert('ci_customer_saved_carts', [
					'userid' => $_SESSION['uid'],
					'cartname' => 'Cart - ' . date('M d, Y'),
					'quantity' => $totalQuantity,
					'totalamount' => $totalPrice,
					'items' => json_encode($items),
					'datecreated' => date('Y-m-d')
				]);
			} //Start - Retrieve migration issue - RM - 04/05/2021

			$db->where('abd_cid', $_SESSION["uid"]);
			$db->delete('ci_abdoncart');
		}
		// End - cart migration when login - AP - 03/31/2021

		$data = array('abd_cid' => $_SESSION["uid"], 'abd_cokiesid' => '');
		$db->where('abd_cokiesid', $_COOKIE["csid"]);
		$update = $db->update("ci_abdoncart", $data);

		// Start - abononedclean.php please update to save in a new table the deleted items. This file will run from cron every 45 min. - AP - 09/20/2021
		$db->where('abd_cokiesid', $_COOKIE["csid"]);
		$update = $db->update("ci_abdoncart_shadow", array_merge($data, ['updated_at' => date('Y-m-d H:i:s')])); // Start - Authnet response implementation - AP - 02/28/2022
		// End - abononedclean.php please update to save in a new table the deleted items. This file will run from cron every 45 min. - AP - 09/20/2021

		unset($_COOKIE['csid']);
		//setcookie("csid", null, -1);
		setcookie("csid", '', time() + 3600 * 24 * 7, "/");
		if (isset($_SERVER['HTTP_COOKIE'])) {
			$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
			foreach ($cookies as $cookie) {
				$parts = explode('=', $cookie);
				$name = trim($parts[0]);
				setcookie('csid', '', time() + 3600 * 24 * 7);
				setcookie('csid', '', time() + 3600 * 24 * 7, '/');
			}
		}
	}
	return true;
}

// Used when login to merge account and guest' cart items
function mergeCartItems()
{
	global $db;

	if (!isset($_SESSION["uid"]) || empty($_SESSION["uid"]))
		return false;

	$sql = "SELECT * FROM ci_abdoncart WHERE abd_cid = ?";
	$results = $db->rawQuery($sql, [$_SESSION["uid"]]);

	if (empty($results))
		return;

	$data = array_reduce($results, function ($group, $item) {
		if (!isset($group[$item['abd_pid']]))
			$group[$item['abd_pid']] = [];

		array_push($group[$item['abd_pid']], $item);

		return $group;
	}, []);

	$data = array_filter($data, function ($item) {
		return count($item) > 1;
	});

	if (empty($data))
		return;

	foreach ($data as $items) {
		$totalQty = array_sum(array_column($items, 'abd_qty'));

		$cartItem = array_shift($items);

		$db->rawQuery("UPDATE ci_abdoncart SET abd_qty = ? WHERE abd_id = ?", [$totalQty, $cartItem['abd_id']]);
		$db->rawQuery("UPDATE ci_abdoncart_shadow SET abd_qty = ? WHERE abd_id = ?", [$totalQty, $cartItem['abd_id']]); // Start - abononedclean.php please update to save in a new table the deleted items. This file will run from cron every 45 min. - AP - 09/20/2021
		$db->rawQuery("UPDATE ci_abdoncart_shadow SET abd_qty = ?, updated_at = ? WHERE abd_id = ?", [$totalQty, date('Y-m-d H:i:s'), $cartItem['abd_id']]); // Start - abononedclean.php please update to save in a new table the deleted items. This file will run from cron every 45 min. - AP - 09/20/2021  // Start - Authnet response implementation - AP - 02/28/2022
		$db->rawQuery("DELETE FROM ci_abdoncart WHERE abd_id IN ('" . implode("', '", array_column($items, 'abd_id')) . "')");
	}
}


function validateCart()
{
	global $db;
	$where = "";
	$params = [];
	if (isset($_COOKIE["csid"]) && $_COOKIE["csid"] != "") {
		$where = " and abd_cokiesid = ?";
		$params = [$_COOKIE["csid"]];
	} else {
		$where = " and abd_cid = ?";
		$params = [$_SESSION["uid"]];
	}
	$custOrder = array();
	unset($_SESSION['currentOrder']);
	if ((isset($_COOKIE["csid"]) && $_COOKIE["csid"] != "") || (isset($_SESSION["uid"]) && $_SESSION["uid"] != "")) {
		$sql = "select * from ci_abdoncart where 1 $where order by abd_id desc ";
		$results = $db->rawQuery($sql, $params);
		if (count($results) > 0) {
			foreach ($results as $key => $item) {
				if ($item['abd_qty'] != 0) { //Start - I added items using bulk add items below and it added 0 in the cart - RM - 01/18/2021
					$custOrder[$key]['oid'] = $item['abd_oid'];
					$custOrder[$key]['pid'] = $item['abd_pid'];
					$custOrder[$key]['qty'] = $item['abd_qty'];

					//Start - Gangsheet Integration - RM - 05/15/2025
					if (!empty($item['design_id'])) {
						$custOrder[$key]['design_id'] = $item['design_id'];
						$custOrder[$key]['design_name'] = (isset($item['design_name'])) ? $item['design_name'] : '';
					}
					//End - Gangsheet Integration - RM - 05/15/2025

					//Start - transfer by size DTF - RM - 07/29/2025
					if (!empty($item['customWidth']) && !empty($item['customHeight'])) {
						$custOrder[$key]['customWidth'] = $item['customWidth'];
						$custOrder[$key]['customHeight'] = $item['customHeight'];
					}
					//End - transfer by size DTF - RM - 07/29/2025

				} //Start - I added items using bulk add items below and it added 0 in the cart - RM - 01/18/2021
			}
			//session_start();

			$_SESSION['currentOrder'] = $custOrder;
		}
	}
}

function addToDBAbdonUser($session)
{
	global $db;

	$timestamp = time();
	$exdate = strtotime("+20 day", $timestamp);

	// Start - When you add same SKU twice in the cart it doesn't put them together, it keeps them on separate lines - AP - 04/19/2021
	$pids = array_map(function ($itm) {
		return $itm['pid'];
	}, $session['currentOrder']);
	// End - When you add same SKU twice in the cart it doesn't put them together, it keeps them on separate lines - AP - 04/19/2021

	$pids = implode("', '", $pids);
	$oid = $session['currentOrder'][0]['oid'];

	$sql = "select abd_id, abd_oid, abd_pid from ci_abdoncart where abd_oid = ? and abd_pid IN ('" . $pids . "')";
	$results = $db->rawQuery($sql, [$oid]);
	$forInsertion = [];

	if (isset($session['uid']) && !empty($session['uid'])) {
		foreach ($session['currentOrder'] as $key => $item) {
			$filtered = array_filter($results, function ($row) use ($item) {
				return $row['abd_pid'] == $item['pid'];
			});

			//Start - Gangsheet Integration - RM - 05/15/2025
			if (!empty($item['designId'])) {
				$filtered = [];
			}
			//End - Gangsheet Integration - RM - 05/15/2025

			if (count($filtered) > 0) {
				$insertArray = array();
				$insertArray['abd_oid'] = $item['oid'];
				$insertArray['abd_pid'] = $item['pid'];
				$insertArray['abd_qty'] = $item['qty'];
				$insertArray['abd_cid'] = $session['uid'];

				//Start - Gangsheet Integration - RM - 05/15/2025
				if (!empty($item['designId'])) {
					$insertArray['design_id'] = $item['designId'];
					$insertArray['design_name'] = (isset($item['designName']) && !empty($item['designName'])) ? $item['designName'] : '';
				}
				//End - Gangsheet Integration - RM - 05/15/2025

				//Start - transfer by size DTF - RM - 07/29/2025
				if (!empty($item['customWidth']) && !empty($item['customHeight'])) {
					$insertArray['customWidth'] = $item['customWidth'];
					$insertArray['customHeight'] = $item['customHeight'];
				}
				//End - transfer by size DTF - RM - 07/29/2025

				$db->where('abd_oid', $insertArray['abd_oid'], $operator = '=', $cond = 'AND');
				$db->where('abd_pid', $insertArray['abd_pid'], $operator = '=', $cond = 'AND');
				$db->update("ci_abdoncart", $insertArray);

				$insertArray['updated_at'] = date('Y-m-d H:i:s'); // Start - Authnet response implementation - AP - 02/28/2022
				// Start - abononedclean.php please update to save in a new table the deleted items. This file will run from cron every 45 min. - AP - 09/20/2021
				$db->where('abd_oid', $insertArray['abd_oid'], $operator = '=', $cond = 'AND');
				$db->where('abd_pid', $insertArray['abd_pid'], $operator = '=', $cond = 'AND');
				$db->update("ci_abdoncart_shadow", $insertArray);
				// End - abononedclean.php please update to save in a new table the deleted items. This file will run from cron every 45 min. - AP - 09/20/2021
			} else {
				$insertArray = array();
				$insertArray['abd_oid'] = $item['oid'];
				$insertArray['abd_pid'] = $item['pid'];
				$insertArray['abd_qty'] = $item['qty'];
				$insertArray['abd_cid'] = $session['uid'];
				$insertArray['abd_expired'] = $exdate;

				//Start - Gangsheet Integration - RM - 05/15/2025
				if (!empty($item['designId'])) {
					$insertArray['design_id'] = $item['designId'];
					$insertArray['design_name'] = (isset($item['designName']) && !empty($item['designName'])) ? $item['designName'] : '';
				}
				//End - Gangsheet Integration - RM - 05/15/2025

				//Start - transfer by size DTF - RM - 07/29/2025
				if (!empty($item['customWidth']) && !empty($item['customHeight'])) {
					$insertArray['customWidth'] = $item['customWidth'];
					$insertArray['customHeight'] = $item['customHeight'];
				}
				//End - transfer by size DTF - RM - 07/29/2025


				array_push($forInsertion, $insertArray);

				//$db->insert("ci_abdoncart",$insertArray);
				/* echo "Last executed query was ". $db->getLastQuery();
	 die();*/
			}
		}
		if (!empty($forInsertion)) {
			
			$db->insertMulti("ci_abdoncart", $forInsertion);
			// Start - Authnet response implementation - AP - 02/28/2022
			$db->insertMulti("ci_abdoncart_shadow", array_map(function ($item) {
				$item['phpSession'] = session_id();
				// Start - Authnet response implementation - AP - 02/28/2022
				$item['ipAddress'] = get_ip_address(); // Start - Authnet response implementation - AP - 02/28/2022

				// Start - for abandoned carts. We should also send an email a few hours after they abandon - CL - 332026
				$item['created_at'] = date('Y-m-d H:i:s');
				$item['updated_at'] = date('Y-m-d H:i:s');
				// End - for abandoned carts. We should also send an email a few hours after they abandon - CL - 332026
				// End - Authnet response implementation - AP - 02/28/2022
				return $item;
			}, $forInsertion));
			// End - Authnet response implementation - AP - 02/28/2022
		}
	}

	
	return true;
}

function updateCookiesData($arr, $csid)
{
	global $db;
	if (isset($csid) && $csid != "") {
		foreach ($arr as $key => $item) {
			$sql = "select * from ci_abdoncart where abd_oid = ? and abd_pid = ? and abd_cokiesid = ?";
			$results = $db->rawQueryOne($sql, [$item['oid'], $item['pid'], $csid]);
			if (count($results) > 0) {
				$insertArray = array();
				$insertArray['abd_oid'] = $item['oid'];
				$insertArray['abd_pid'] = $item['pid'];
				$insertArray['abd_qty'] = $item['qty'];
				$db->where('abd_oid', $insertArray['abd_oid'], $operator = '=', $cond = 'AND');
				$db->where('abd_pid', $insertArray['abd_pid'], $operator = '=', $cond = 'AND');
				$db->where('abd_cokiesid', $csid, $operator = '=', $cond = 'AND');
				$db->update("ci_abdoncart", $insertArray);

				$insertArray['updated_at'] = date('Y-m-d H:i:s'); // Start - Authnet response implementation - AP - 02/28/2022
				// Start - abononedclean.php please update to save in a new table the deleted items. This file will run from cron every 45 min. - AP - 09/20/2021
				$db->where('abd_oid', $insertArray['abd_oid'], $operator = '=', $cond = 'AND');
				$db->where('abd_pid', $insertArray['abd_pid'], $operator = '=', $cond = 'AND');
				$db->where('abd_cokiesid', $csid, $operator = '=', $cond = 'AND');
				$db->update("ci_abdoncart_shadow", $insertArray);
				// End - abononedclean.php please update to save in a new table the deleted items. This file will run from cron every 45 min. - AP - 09/20/2021
			}
		}
	}
	return true;
}

function updateSesstionData($arr, $csid)
{
	global $db;
	if (isset($csid) && $csid != "") {
		foreach ($arr as $key => $item) {
			$sql = "select * from ci_abdoncart where abd_oid = ? and abd_pid = ? and abd_cid = ?";
			$results = $db->rawQueryOne($sql, [$item['oid'], $item['pid'], $csid]);
			if (count($results) > 0) {
				$insertArray = array();
				$insertArray['abd_oid'] = $item['oid'];
				$insertArray['abd_pid'] = $item['pid'];
				$insertArray['abd_qty'] = $item['qty'];
				$db->where('abd_oid', $insertArray['abd_oid'], $operator = '=', $cond = 'AND');
				$db->where('abd_pid', $insertArray['abd_pid'], $operator = '=', $cond = 'AND');
				$db->where('abd_cid', $csid, $operator = '=', $cond = 'AND');
				$db->update("ci_abdoncart", $insertArray);

				$insertArray['updated_at'] = date('Y-m-d H:i:s'); // Start - Authnet response implementation - AP - 02/28/2022
				// Start - abononedclean.php please update to save in a new table the deleted items. This file will run from cron every 45 min. - AP - 09/20/2021
				$db->where('abd_oid', $insertArray['abd_oid'], $operator = '=', $cond = 'AND');
				$db->where('abd_pid', $insertArray['abd_pid'], $operator = '=', $cond = 'AND');
				$db->where('abd_cid', $csid, $operator = '=', $cond = 'AND');
				$db->update("ci_abdoncart_shadow", $insertArray);
				// End - abononedclean.php please update to save in a new table the deleted items. This file will run from cron every 45 min. - AP - 09/20/2021
			}
		}
	}
	return true;
}


function addToDBAbdonNonUser($session)
{
	global $db;

	$timestamp = time();
	$exdate = strtotime("+20 day", $timestamp);

	if (isset($_COOKIE["csid"]) && $_COOKIE["csid"] != "") {
		$oid = $session['currentOrder'][0]['oid'];
		$pids = array_map(function ($itm) {
			return $itm['pid'];
		}, $session['currentOrder']);
		$pids = implode("', '", $pids);
		$sql = "select abd_id, abd_oid, abd_pid from ci_abdoncart where abd_oid = ? and abd_pid IN ('" . $pids . "')";
		$results = $db->rawQuery($sql, [$oid]);

		$id = $_COOKIE["csid"];
		$forInsertion = [];
		foreach ($session['currentOrder'] as $key => $item) {
			$filtered = array_filter($results, function ($row) use ($item) {
				return $row['abd_pid'] == $item['pid'];
			});

			//Start - Gangsheet Integration - RM - 05/15/2025
			if (!empty($item['designId'])) {
				$filtered = [];
			}
			//End - Gangsheet Integration - RM - 05/15/2025

			if (count($filtered) > 0) {
				$insertArray = array();
				$insertArray['abd_oid'] = $item['oid'];
				$insertArray['abd_pid'] = $item['pid'];
				$insertArray['abd_qty'] = $item['qty'];
				$insertArray['abd_cokiesid'] = $_COOKIE["csid"];

				//Start - Gangsheet Integration - RM - 05/15/2025
				if (!empty($item['designId'])) {
					$insertArray['design_id'] = $item['designId'];
					$insertArray['design_name'] = (isset($item['designName']) && !empty($item['designName'])) ? $item['designName'] : '';
				}
				//End - Gangsheet Integration - RM - 05/15/2025

				//Start - transfer by size DTF - RM - 07/29/2025
				if (!empty($item['customWidth']) && !empty($item['customHeight'])) {
					$insertArray['customWidth'] = $item['customWidth'];
					$insertArray['customHeight'] = $item['customHeight'];
				}
				//End - transfer by size DTF - RM - 07/29/2025

				$db->where('abd_oid', $insertArray['abd_oid'], $operator = '=', $cond = 'AND');
				$db->where('abd_pid', $insertArray['abd_pid'], $operator = '=', $cond = 'AND');
				$db->update("ci_abdoncart", $insertArray);

				$insertArray['updated_at'] = date('Y-m-d H:i:s'); // Start - Authnet response implementation - AP - 02/28/2022
				// Start - abononedclean.php please update to save in a new table the deleted items. This file will run from cron every 45 min. - AP - 09/20/2021
				$db->where('abd_oid', $insertArray['abd_oid'], $operator = '=', $cond = 'AND');
				$db->where('abd_pid', $insertArray['abd_pid'], $operator = '=', $cond = 'AND');
				$db->update("ci_abdoncart_shadow", $insertArray);
				// End - abononedclean.php please update to save in a new table the deleted items. This file will run from cron every 45 min. - AP - 09/20/2021
			} else {
				$insertArray = array();
				$insertArray['abd_oid'] = $item['oid'];
				$insertArray['abd_pid'] = $item['pid'];
				$insertArray['abd_qty'] = $item['qty'];
				$insertArray['abd_cokiesid'] = $id;
				$insertArray['abd_expired'] = $exdate;

				//Start - Gangsheet Integration - RM - 05/15/2025
				if (!empty($item['designId'])) {
					$insertArray['design_id'] = $item['designId'];
					$insertArray['design_name'] = (isset($item['designName']) && !empty($item['designName'])) ? $item['designName'] : '';
				}
				//End - Gangsheet Integration - RM - 05/15/2025

				//Start - transfer by size DTF - RM - 07/29/2025
				if (!empty($item['customWidth']) && !empty($item['customHeight'])) {
					$insertArray['customWidth'] = $item['customWidth'];
					$insertArray['customHeight'] = $item['customHeight'];
				}
				//End - transfer by size DTF - RM - 07/29/2025

				//    $insertArray['refId'] = $_COOKIE['RefID']; // Start - lets add a new field to cookies - AP - 05/07/2021
				array_push($forInsertion, $insertArray);
				//$db->insert("ci_abdoncart",$insertArray);

			}
		}
	}
	// Start - abononedclean.php please update to save in a new table the deleted items. This file will run from cron every 45 min. - AP - 09/20/2021
	if (!empty($forInsertion)) {
		$db->insertMulti("ci_abdoncart", $forInsertion);
		// Start - check out and cart empty cart refunction - AP - 11/09/2021
		$db->insertMulti("ci_abdoncart_shadow", array_map(function ($item) {
			$item['phpSession'] = session_id();
			// Start - Authnet response implementation - AP - 02/28/2022
			$item['ipAddress'] = get_ip_address();
			$item['created_at'] = date('Y-m-d H:i:s');
			$item['updated_at'] = date('Y-m-d H:i:s');
			// End - Authnet response implementation - AP - 02/28/2022
			return $item;
		}, $forInsertion));
		// End - check out and cart empty cart refunction - AP - 11/09/2021
	}
	// End - abononedclean.php please update to save in a new table the deleted items. This file will run from cron every 45 min. - AP - 09/20/2021
	return true;
}

/* End Abondoned Cart */

function checkShipexist($uid)
{
	global $db;
	$cshipdetails = $db->rawQueryOne("select * from ci_address where cid=? and addressType=1 and ordId=0", array($uid));
	if (!empty($cshipdetails))
		return true;
	else
		return false;
}

function checkBillexist($uid)
{
	global $db;
	$cshipdetails = $db->rawQueryOne("select * from ci_address where cid=? and addressType=0  and ordId=0", array($uid));
	if (!empty($cshipdetails))
		return true;
	else
		return false;
}

function getUserBillingInfo($uid)
{
	global $db;

	return $db->rawQueryOne("select * from ci_address where cid=? and addressType=0", array($uid));
}

function getOrderDetails($oid)
{
	global $db;
	if (!empty($_SESSION['uid'])) {
		$user_loged_id = $_SESSION['uid'];
	} else if (!empty($_SESSION['cid'])) {
		$user_loged_id = $_SESSION['cid'];
	}
	$sql1 = 'select * from ci_customer_orders where customerOrderID=? AND customerId=?';
	// $sql1='select * from ci_customer_orders where customerOrderID="'.$oid.'" AND customerId="'.$user_loged_id.'"';
	$orderdetails = $db->rawQueryOne($sql1, [$oid, $user_loged_id]);
	//print_r($orderdetails);die;
	if (!empty($orderdetails))
		return $orderdetails;
	else
		return false;
}


function getAllOrderPDetails($oid)
{
	global $db;
	$orderdetails = $db->rawQuery("select ci_order_products.*, 
	ci_products.colorFrontImage AS pColorFrontImage, 
	ci_products.colorSideImage AS pColorSideImage, 
	ci_products.colorBackImage AS pColorBackImage, 
	ci_products.alphaFrontImage, 
	ci_products.alphaSideImage, 
	ci_products.alphaBackImage, 
	ci_products.cartGroupID,
	ci_products.isfreeshipping AS isfreeshipping, CASE WHEN ci_google_merchant.id IS NOT NULL THEN ci_google_merchant.id ELSE ci_google_merchant_static.id END AS merchantId, ci_products.brandName, ci_products.styleName, ci_products.colorName, CASE WHEN ci_sns_warehouses.id IS NOT NULL THEN ci_sns_warehouses.customerPrice WHEN ci_alpha_warehouses.id IS NOT NULL THEN ci_alpha_warehouses.price ELSE 0 END AS cog
	FROM ci_order_products 
	INNER JOIN ci_products ON ci_products.sku = ci_order_products.sku 
	INNER JOIN ci_styles ON ci_styles.styleID = ci_products.styleID
	LEFT JOIN ci_google_merchant ON ci_google_merchant.gtin = ci_products.gtin 
	LEFT JOIN ci_google_merchant_static ON ci_google_merchant.customLabel4 = ci_products.gtin 
	LEFT JOIN ci_sns_warehouses ON ci_sns_warehouses.gtin = ci_products.gtin 
	LEFT JOIN ci_alpha_warehouses ON ci_alpha_warehouses.gtin = ci_products.gtin where ci_order_products.orderId=? GROUP BY ci_order_products.opid ", array($oid)); //Start - alpha adjustments - RM - 02/13/2024 - add cartGroupID, alphaFrontImage, alphaSideImage and alphaBackImage column   Integrate SanMar API - CL - 9132024
	if (!empty($orderdetails))
		return $orderdetails;
	else
		return false;
}

function getSlugProduct($styleId)
{
	global $db;
	$cshipdetails = $db->rawQueryOne("select slug from ci_styles where styleID=? ", array($styleId));
	return $cshipdetails['slug'];
}
function getSlugCatProduct($styleId)
{
	global $db;
	$cshipdetails = $db->rawQueryOne("select slugCategory from ci_styles where styleID=? ", array($styleId));
	return $cshipdetails['slugCategory'];
}


function in_array_r($needle, $haystack, $strict = false)
{
	foreach ($haystack as $key => $item) {
		if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
			return 1;
		}
	}
	return 0;
}

function get_key($needle, $haystack, $strict = false)
{
	foreach ($haystack as $key => $item) {
		if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && get_key($needle, $item, $strict))) {
			return $key;
		}
	}
	return false;
}

/****** Google Analaytics ***********/
function getGAnalaytics()
{
	global $db;
	$analyticcodes = $db->rawQueryOne("select analyticcode from ci_google_analytics where id=1 ");
	// return '';
	return $analyticcodes['analyticcode'];
}

/****** Google Analaytics ***********/
function getCheckGuestAccount()
{
	global $db;
	$gaccount = $db->rawQueryOne("select mode from ci_website_guestaccount where id=1 ");
	return $gaccount['mode'];
}

/****** Header Search get category Id ***********/
function chkSearchCategoryExit($catname)
{
	global $db;
	$scategory = $db->rawQueryOne("select categoryID from ci_category where name like '%" . addslashes($catname) . "%' ");
	if (!empty($scategory['categoryID'])) {

		return $scategory['categoryID'];
	} else {
		$slcategory = $db->rawQueryOne("select catEDIid from ci_category_local where name like '%" . addslashes($catname) . "%' ");
		if (!empty($slcategory['catEDIid'])) {
			return $slcategory['catEDIid'];
		} else {
			return false;
		}
	}
}


function chkStyleSlugExit($slugname)
{
	global $db;
	$sslug = $db->rawQueryOne("SELECT slug FROM `ci_styles` where slug=? ", array($slugname));
	if (count($sslug) > 0) {
		return true;
	} else {
		return false;
	}
}

function getStyleIdbyslug($slugname)
{
	global $db;
	$sslug = $db->rawQueryOne("SELECT styleID FROM `ci_styles` where customeseo=? ", array($slugname));
	if (!empty($sslug)) {
		return $sslug['styleID'];
	} else {
		$sslug1 = $db->rawQueryOne("SELECT styleID FROM `ci_styles` where slug=? ", array($slugname));
		return $sslug1['styleID'];
	}
}


function chkUserExist($uid)
{
	global $db;
	$suser = $db->rawQueryOne("SELECT id FROM `ci_email_subscriptions` where cid=? ", array($uid));
	return $suser['id'];
}

function getBrandNameByStyleID($stid)
{
	global $db;
	$suser = $db->rawQueryOne("SELECT brandName FROM `ci_styles` where styleID=? ", array($stid));
	return $suser['brandName'];
}

function getBrandImgByStyleID($stid)
{
	global $db;
	$suser = $db->rawQueryOne("SELECT brandImage FROM `ci_styles` where styleID=? ", array($stid));
	return $suser['brandImage'];
}

function getcolorNameBySku($sku)
{
	global $db;
	$suser = $db->rawQueryOne("SELECT colorName FROM `ci_products` where sku='" . $sku . "' ");
	return $suser['colorName'];
}

function array_sort_by_column(&$arr, $col, $dir = SORT_ASC)
{
	$sort_col = array();
	foreach ($arr as $key => $row) {
		$sort_col[$key] = $row[$col];
	}
	array_multisort($sort_col, $dir, $arr);
}


//Getting saving value on style details page - color prices
function getColorPriceInfo($stid)
{
	global $db;
	$sql = "select colorPriceCodeName,min(customerPrice) as minPrice from ci_products where styleID='" . $stid . "' AND ci_products.isDS = 0 AND ci_products.colorPriceCodeName <> 'Discontinued' AND ci_products.qty > 0 group by colorPriceCodeName order by CAST(customerPrice AS DECIMAL(10,2)) DESC"; // Start - don't include zero QTY on savings section on product details page - AP - 09/24/2021
	$results = $db->rawQuery($sql);
	if (count($results) > 0) {
		array_sort_by_column($results, 'minPrice');

		//Start - alpha adjustments - RM - 02/16/2024
		$uniqueMinPrices = array_unique(array_column($results, "minPrice"));
		if (count($uniqueMinPrices) === 1) {

			usort($results, function ($a, $b) {
				if ($a['colorPriceCodeName'] == "White") {
					return -1; // $a comes first
				} elseif ($b['colorPriceCodeName'] == "White") {
					return 1; // $b comes first
				} else {
					return 0; // no change in order
				}
			});
		}
		//End - alpha adjustments - RM - 02/16/2024

		//sortBy("minPrice", &$results, $direction = 'asc');
		return $results;
	} else {
		return false;
	}
}


function getDiscountOfferInfo()
{
	global $db;
	$sql = "select * from ci_discountoffers where 1 order by id asc";
	$results = $db->rawQuery($sql);
	if (count($results) > 0) {
		return $results;
	} else {
		return false;
	}
}

function getSizesByStyleId($stid)
{
	global $db;
	//$sql="SELECT sku,sizeName,styleID,qty FROM `ci_products` WHERE styleID=$stid and sizeStatus=0 group by sizeName order by sizeOrder ASC";
	// $sql="SELECT sku,sizeName,styleID,qty,doNotDisplay FROM `ci_products` INNER JOIN ci_shipping_groups ON ci_shipping_groups.id = ci_products.cartGroupID AND ci_shipping_groups.enabled = 1 WHERE styleID=? and sizeStatus=0 AND isDS = 0 AND colorStatus = 0 group by sizeName order by LENGTH(sizeOrder), sizeOrder ASC"; //Start - Fix this issue on SL6 about do not display I think - RM - 12/20/2021 Start - Adjustments Alpha - RM - 02/20/2024 related task on new checkout shipping groups
	$sql = <<<SQL
	SELECT
		sku,
		sizeName,
		styleID,
		qty,
		doNotDisplay
	FROM `ci_products`
	WHERE styleID = ?
	AND sizeStatus = 0
	AND isDS = 0
	AND colorStatus = 0
	-- AND EXISTS (
	-- 	SELECT 1 FROM ci_shipping_groups
	-- 	WHERE ci_shipping_groups.id = ci_products.cartGroupID
	-- 	AND ci_shipping_groups.enabled = (1)
	-- )
	GROUP BY
		sizeName
	ORDER BY
		LENGTH(sizeOrder),
		sizeOrder ASC
SQL;

	$results = $db->rawQuery($sql, [$stid]);
	if (count($results) > 0) {
		return $results;
	} else {
		return false;
	}
}


function getColorsByStyleId($stid)
{
	global $db;

	//Start - alpha adjustments - RM - 02/12/2024
	$alphaImport = adminSettings('onlynewalphaimport');
	$removeAlphaOnExistingStyle = "";
	if (isset($alphaImport['onlynewalphaimport']) && $alphaImport['onlynewalphaimport'] == 0) {
		$removeAlphaOnExistingStyle = " AND withAlphaOnExistStyle != 1";
	}
	//End - alpha adjustments - RM - 02/12/2024

	$sql = "SELECT 
	colorName,
	colorSwatchImage,
	color1,
	color2, 
	colorFrontImage,
	colorSideImage,
	colorBackImage,
	alphaFrontImage,
	alphaSideImage,
	alphaBackImage,
	MIN(ci_products.cartGroupID) AS cartGroupID, -- Start - Integrate SanMar API - CL - 9232024
	(select count(*) FROM ci_products AS p where p.qty > 0 and p.colorName = ci_products.colorName and p.styleID = ?) as stock, CASE WHEN ci_styles.cartGroupID = 1 AND ci_products.cartGroupID = 2 THEN 1 ELSE 0 END as withAlphaOnExistStyle FROM `ci_products` INNER JOIN ci_styles on ci_styles.styleID = ci_products.styleID WHERE ci_products.styleID=? and colorStatus=0 AND sizeStatus = 0 AND isDS = 0 AND doNotDisplay = 0 group by colorName HAVING stock > 0 $removeAlphaOnExistingStyle order by colorName DESC "; // Start - When we remove a color from the top, we have to make sure that the cron cache also removes that color. I think the file needs an update. - AP - 08/04/2021 // Start - pbulk cache match what we display colors above vs pbulk - AP - 12/17/2021 //Start - alpha adjustments - RM - 02/12/2024
	// $sql="SELECT colorName,colorSwatchImage,color1,color2 FROM `ci_products` WHERE styleID=$stid and colorStatus=0 group by colorName order by colorName DESC ";
	$results = $db->rawQuery($sql, [$stid, $stid]);
	if (count($results) > 0) {
		return $results;
	} else {
		return false;
	}
}

function getSizePByStyleId($stid, $clname)
{
	global $db;
	//$clname = "Mid Grey Heather/ Black";
	//$sql="SELECT customerPrice,qty,colorName,sizeName,styleID,sku,colorFrontImage,gtin FROM `ci_products` WHERE styleID=$stid and colorName='".addslashes($clname)."' AND doNotDisplay = 0 order by sizeOrder ASC"; // Start - Nicer added to cart popup - John - 07/27/2020
	// $sql="SELECT customerPrice,qty,colorName,sizeName,styleID,ci_products.color1, ci_products.color2,sku,colorFrontImage,gtin,doNotDisplay FROM `ci_products` INNER JOIN ci_shipping_groups ON ci_shipping_groups.id = ci_products.cartGroupID AND ci_shipping_groups.enabled = 1 WHERE styleID=? and colorName=? AND isDS = 0 AND sizeStatus = 0 AND colorStatus = 0 order by LENGTH(sizeOrder), sizeOrder ASC";//Start - Fix this issue on SL6 about do not display I think - RM - 12/20/2021 - Start - Live fix issue - CL - 9142023 Start - Adjustments Alpha - RM - 02/20/2024 related task on new checkout shipping groups
	$sql = <<<SQL
	SELECT
		customerPrice,
		qty,
		colorName,
		sizeName,
		styleID,
		ci_products.color1,
		ci_products.color2,
		sku,
		colorFrontImage,
		gtin,
		doNotDisplay
	FROM `ci_products`
	WHERE styleID = ?
	AND colorName = ?
	AND isDS = 0
	AND sizeStatus = 0
	AND colorStatus = 0
	-- AND EXISTS (
	-- 	SELECT 1 FROM ci_shipping_groups
	-- 	WHERE ci_shipping_groups.id = ci_products.cartGroupID
	-- 	AND ci_shipping_groups.enabled = (1)
	-- )
	ORDER BY
		LENGTH(sizeOrder),
		sizeOrder ASC
SQL;

	$results = $db->rawQuery($sql, [$stid, $clname]);

	if (count($results) > 0) {
		return $results;
	} else {
		return false;
	}
}

function getSizePByStyleIdColorCode($stid, $colorCode)
{
	global $db;
	//$clname = "Mid Grey Heather/ Black";
	//$sql="SELECT customerPrice,qty,colorName,sizeName,styleID,sku,colorFrontImage,gtin FROM `ci_products` WHERE styleID=$stid and colorName='".addslashes($clname)."' AND doNotDisplay = 0 order by sizeOrder ASC"; // Start - Nicer added to cart popup - John - 07/27/2020
	// $sql="SELECT customerPrice,qty,colorName,sizeName,styleID,sku,colorFrontImage,gtin,doNotDisplay FROM `ci_products` INNER JOIN ci_shipping_groups ON ci_shipping_groups.id = ci_products.cartGroupID AND ci_shipping_groups.enabled = 1 WHERE styleID=? and colorCode=? AND isDS = 0 AND sizeStatus = 0 AND colorStatus = 0 order by LENGTH(sizeOrder), sizeOrder ASC";//Start - Fix this issue on SL6 about do not display I think - RM - 12/20/2021 Start - Adjustments Alpha - RM - 02/20/2024 related task on new checkout shipping groups
	$sql = <<<SQL
	SELECT
		customerPrice,
		qty,
		colorName,
		sizeName,
		styleID,
		sku,
		colorFrontImage,
		gtin,
		doNotDisplay
	FROM `ci_products`
	WHERE styleID = ?
	AND colorCode = ?
	AND isDS = 0
	AND sizeStatus = 0
	AND colorStatus = 0
	-- AND EXISTS (
	-- 	SELECT 1 FROM ci_shipping_groups
	-- 	WHERE ci_shipping_groups.id = ci_products.cartGroupID
	-- 	AND ci_shipping_groups.enabled = (1)
	-- )
	ORDER BY
		LENGTH(sizeOrder),
		sizeOrder ASC
SQL;

	$results = $db->rawQuery($sql, [$stid, $colorCode]);

	if (count($results) > 0) {
		$listsizes1 = getSizesByStyleId($stid);
		foreach ($listsizes1 as $ku => $vals) {
			$findarr[] = $vals['sizeName'];
		}
		/*print_r($findarr);
	die();
		$findarr = array("S","M","L","1XL","2XL","3XL","4XL");*/
		//echo "<pre>results=";print_r($results);
		$newArr = array();
		//$k =0;
		foreach ($results as $results1) {

			if (in_array($results1['sizeName'], $findarr)) {
				//$key = array_search($results1['sizeName'], $findarr);
				//if ($key !== false) {
				$ddd = array_keys($findarr, $results1['sizeName']);
				$newkey = $ddd[0];
				$newArr[$newkey]['customerPrice'] = $results1['customerPrice'];
				$newArr[$newkey]['qty'] = $results1['qty'];
				$newArr[$newkey]['colorName'] = $results1['colorName'];
				$newArr[$newkey]['sizeName'] = $results1['sizeName'];
				$newArr[$newkey]['styleID'] = $results1['styleID'];
				$newArr[$newkey]['sku'] = $results1['sku'];
				$newArr[$newkey]['gtin'] = $results1['gtin'];
				$newArr[$newkey]['colorFrontImage'] = $results1['colorFrontImage']; // Start - Nicer added to cart popup - John - 07/27/2020

				$newArr[$newkey]['doNotDisplay'] = $results1['doNotDisplay']; //Start - Fix this issue on SL6 about do not display I think - RM - 12/20/2021

			} /*else{
		 $newArr[$k]['sizeName'] = $results1['sizeName'];
	 }*/
			//$k++;
		}
		//echo "<pre>newArr=";print_r($newArr);//die;
		//echo "<br/>";
		return $newArr;
	} else {
		return false;
	}
}

function postOrdertoEDI($end_url, $method, $customer_number, $api_key, $fields)
{

	$uri = $end_url . $method;
	$ch = curl_init($uri);

	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	curl_setopt($ch, CURLOPT_USERPWD, $customer_number . ":" . $api_key);
	# Return response instead of printing.
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	# Send request.
	$result = curl_exec($ch);
	curl_close($ch);

	return $result;
}

function fnCheckPrice($whre, $p1, $p2)
{
	global $db;
	if ($p2 == "") {
		$sql = "SELECT styleID FROM ci_styles where 1 and bestsellerrank<>0 and isExistProduct=1 and pPrice>=" . $p1 . " $whre";
	} else {
		$sql = "SELECT styleID FROM ci_styles where 1 and bestsellerrank<>0 and isExistProduct=1 and (pPrice BETWEEN " . intval($p1) . " AND " . intval($p2) . ") $whre";
	}

	$results = $db->rawQuery($sql);
	if (count($results) > 0) {
		return 1;
	} else {
		return false;
	}
}


function checkProducExist($stid)
{
	global $db;
	$sproduct = $db->rawQuery("SELECT count(styleID) as total FROM `ci_products` where styleID='" . $stid . "' group by styleID ");
	if ($sproduct[0]['total'] > 0) {
		return true;
	} else {
		return false;
	}
}

function checkSkuExist($sku)
{
	global $db;
	$sproduct = $db->rawQueryOne("SELECT sku FROM `ci_products` where sku='" . $sku . "' ");
	if (count($sproduct) > 0) {
		return true;
	} else {
		return false;
	}
}


function checkTestSkuExist($sku)
{
	global $db;
	$sproduct = $db->rawQueryOne("SELECT sku FROM `ci_products_insert` where sku='" . $sku . "' ");
	if (count($sproduct) > 0) {
		return true;
	} else {
		return false;
	}
}

function getTransistNwarehouses($zipcode)
{
	global $db;
	$dtransist = $db->rawQueryOne("SELECT * FROM ci_daysintasist WHERE zipCode = '" . $zipcode . "'");
	$days['TX'] = $dtransist['daysInTransit_TX'];
	$days['IL'] = $dtransist['daysInTransit_IL'];
	$days['NJ'] = $dtransist['daysInTransit_NJ'];
	$days['NV'] = $dtransist['daysInTransit_NV'];
	$days['KS'] = $dtransist['daysInTransit_KS'];
	$days['GA'] = $dtransist['daysInTransit_GA'];
	asort($days);
	$value = end($days);
	$key = key($days);
	return $key;
}


function getTransistNwarehousesDay($zipcode)
{
	global $db;
	$dtransist = $db->rawQueryOne("SELECT * FROM ci_daysintasist WHERE zipCode = '" . $zipcode . "'");
	$days['TX'] = $dtransist['daysInTransit_TX'];
	$days['IL'] = $dtransist['daysInTransit_IL'];
	$days['NJ'] = $dtransist['daysInTransit_NJ'];
	$days['NV'] = $dtransist['daysInTransit_NV'];
	$days['KS'] = $dtransist['daysInTransit_KS'];
	$days['GA'] = $dtransist['daysInTransit_GA'];

	$fdays = min(array_filter($days));
	return $fdays;
}

function getNamebyPara($tblname, $gcol, $col, $val)
{
	global $db;
	$taxinfo = $db->rawQueryOne("SELECT $gcol FROM $tblname WHERE $col like '%" . $val . "%' and country_id=224");
	return $taxinfo[$gcol];
}

function getNamebyParaC($tblname, $gcol, $col, $val, $col1, $val1)
{
	global $db;

	$taxinfo = $db->rawQueryOne("SELECT $gcol FROM $tblname WHERE $col like '%" . $val . "' and $col1=$val1");
	return $taxinfo[$gcol];
}


function getStates($country_id)
{
	global $db;
	$sql = "SELECT * FROM `ci_states` WHERE country_id=$country_id and status=1 order by state_name ASC";
	$results = $db->rawQuery($sql);
	if (count($results) > 0) {
		return $results;
	} else {
		return false;
	}
}

function getTaxbyOrderId($oid)
{
	global $db;
	$taxinfo = $db->rawQueryOne("select tax from ci_customer_orders where customerOrderID=?  ", array($oid));
	return $taxinfo['tax'];
}

function GetStatusUPS($code)
{
	if ($code == "I") {
		return "In Transit";
	} else if ($code == "D") {
		return "Delivered";
	} else if ($code == "X") {
		return "Exception";
	} else if ($code == "P") {
		return "Pickup";
	} else if ($code == "M") {
		return "Manifest Pickup for Mail Innovations";
	} else {
		return "NA";
	}
}

function getProReviewlist($custId)
{
	global $db;
	$sql = "SELECT op.styleID,op.styleImage,co.orderDate,op.styleName,op.title FROM ci_order_products op inner join ci_customer_orders co on co.customerOrderID=op.orderId  where co.customerId='" . $custId . "' group by op.styleID order by co.customerOrderID desc";
	$results = $db->rawQuery($sql);
	if (count($results) > 0) {
		return $results;
	} else {
		return false;
	}
}

function getRatingByProductId($productId)
{
	global $db;
	$query = "SELECT SUM(vote) as vote, COUNT(vote) as count from ci_rating WHERE styleID = $productId and status=0";
	//echo $query;
	$resultSet = $db->rawQueryOne($query);

	if ($resultSet['count'] > 0) {
		return ($resultSet['vote'] / $resultSet['count']);
	} else {
		return 0;
	}
}

function getRatingByProductIdnId($productId, $revid)
{
	global $db;
	$query = "SELECT SUM(vote) as vote, COUNT(vote) as count from ci_rating WHERE styleID = $productId and id = $revid  and status=0";

	$resultSet = $db->rawQueryOne($query);

	if ($resultSet['count'] > 0) {
		return ($resultSet['vote'] / $resultSet['count']);
	} else {
		return 0;
	}
}

function getRatingByCusProductId($productId, $custId)
{
	global $db;
	$query = "SELECT SUM(vote) as vote, COUNT(vote) as count from ci_rating WHERE styleID = $productId and customerId=$custId";
	//echo $query;
	$resultSet = $db->rawQueryOne($query);

	if ($resultSet['count'] > 0) {
		return ($resultSet['vote'] / $resultSet['count']);
	} else {
		return 0;
	}
}

function checkCReview($stid, $cid)
{
	global $db;
	$cRev = $db->rawQueryOne("select styleID from ci_rating where styleID=? and customerId=? ", array($stid, $cid));
	if (isset($cRev['styleID']) && $cRev['styleID']) {
		return true;
	} else {
		return false;
	}
}
function CReviewtext($stid, $cid)
{
	global $db;
	$cRev = $db->rawQueryOne("select creview from ci_rating where styleID=? and customerId=? ", array($stid, $cid));
	return $cRev['creview'];
}

function CReviewhead($stid, $cid)
{
	global $db;
	$cRev = $db->rawQueryOne("select creviewheading from ci_rating where styleID=? and customerId=? ", array($stid, $cid));
	return $cRev['creviewheading'];
}

function getCustomerName($cid)
{
	global $db;
	$cRev = $db->rawQueryOne("select * from ci_customer where id=? ", array($cid));
	if (isset($cRev['firstname']) && $cRev['firstname'] != "") {
		return $cRev['firstname'];
	} else {
		return "Verified Purchase";
	}
}

function getCustomerNameValidate($cid)
{
	global $db;
	$cRev = $db->rawQueryOne("select * from ci_customer where id=? ", array($cid));
	if (isset($cRev['firstname']) && $cRev['firstname'] != "") {
		return $cRev['firstname'] . ' ' . $cRev['lastname'];
	} else {
		return "Verified Purchase";
	}
}


function getReviewlist($stid)
{
	global $db;
	$sql = "SELECT * FROM ci_rating WHERE styleID='" . $stid . "' and status=0 and creview != '' order by id desc"; //Start - admin manage review adjustment - RM - 11/30/2021
	$results = $db->rawQuery($sql);
	if (count($results) > 0) {
		return $results;
	} else {
		return false;
	}
}

function getReviewlistWithoutEmpty($stid)
{
	global $db;
	$sql = "SELECT * FROM ci_rating WHERE styleID='" . $stid . "' and status=0 and creview != '' order by id desc";
	$results = $db->rawQuery($sql);
	if (count($results) > 0) {
		return $results;
	} else {
		return false;
	}
}

function getCountRec($stid, $revid)
{
	global $db;
	$sql = "SELECT sum(crecommend) as totalRec FROM ci_recommend WHERE styleID='" . $stid . "' and revId='" . $revid . "'";
	$results = $db->rawQuery($sql);
	if (isset($results[0]['totalRec']) && $results[0]['totalRec'] != 0) {
		return $results[0]['totalRec'];
	} else {
		return 0;
	}
}

function getTCountRec($stid)
{
	global $db;
	$sql = "SELECT sum(crecommend) as totalRec FROM ci_recommend WHERE styleID='" . $stid . "'";
	$results = $db->rawQuery($sql);
	if (isset($results[0]['totalRec']) && $results[0]['totalRec'] != 0) {
		return $results[0]['totalRec'];
	} else {
		return 0;
	}
}

function getTCustomerRev($stid)
{
	global $db;
	//$sql="SELECT count(id) as totalRec FROM ci_rating WHERE styleID='".$stid."' and (creview<>'' or creviewheading<>'') and status=0";
	$sql = "SELECT count(id) as totalRec FROM ci_rating WHERE styleID='" . $stid . "' and status=0"; //Start - Error in manage product review - Roi - 08/06/2020 6:57am
	$results = $db->rawQuery($sql);
	if (isset($results[0]['totalRec']) && $results[0]['totalRec'] != 0) {
		return $results[0]['totalRec'];
	} else {
		return 0;
	}
}

function chkProReviewlistbyStyleId($custId, $styleId)
{
	global $db;
	$sql = "SELECT * FROM ci_order_products op inner join ci_customer_orders co on co.customerOrderID=op.orderId where customerId='" . $custId . "' and styleID='" . $styleId . "'  group by op.styleID order by orderDate desc";
	$results = $db->rawQuery($sql);
	if (count($results) > 0) {
		return true;
	} else {
		return false;
	}
}

function getCVoteRev($stid)
{
	global $db;
	$sql = "SELECT count(vote) as totalRec FROM ci_rating WHERE styleID='" . $stid . "' and vote<>'0'  and status=0";
	$results = $db->rawQuery($sql);
	if (isset($results[0]['totalRec']) && $results[0]['totalRec'] != 0) {
		return $results[0]['totalRec'];
	} else {
		return 0;
	}
}

function fetchQty($skus)
{
	global $db;

	$skus = implode("', '", $skus);

	return $db->rawQuery("select sku, qty from ci_products where sku IN ('{$skus}')");
}

function getTVoteRev($stid)
{
	global $db;
	$sql = "SELECT sum(vote) as totalRec FROM ci_rating WHERE styleID='" . $stid . "' and vote<>'0'  and status=0";
	$results = $db->rawQuery($sql);
	if (isset($results[0]['totalRec']) && $results[0]['totalRec'] != 0) {
		return $results[0]['totalRec'];
	} else {
		return 0;
	}
}

function checkQty($sku, $uqty)
{
	global $db;
	$cRev = $db->rawQueryOne("select qty from ci_products where sku=?  ", array($sku));

	//Start - I added items using bulk add items below and it added 0 in the cart - RM - 01/18/2021
	if ($cRev['qty'] == 0) {
		return $uqty;
	}
	//End - I added items using bulk add items below and it added 0 in the cart - RM - 01/18/2021

	if ($uqty > $cRev['qty']) {
		return $cRev['qty'];
	} else {
		return $uqty;
	}
}

function getFooterSection()
{
	global $db;
	$sql = "SELECT * FROM ci_footersection order by section asc";
	$results = $db->rawQuery($sql);
	if (count($results) > 0) {
		return $results;
	}
}


function filtersOrders()
{

	global $db;
	$sql = "SELECT * FROM ci_site_filter_order where FilterStatus=1 order by FilterOrder asc";
	$results = $db->rawQuery($sql);
	if (count($results) > 0) {
		return $results;
	} else {
		return 0;
	}
}

// Start - Integrate SanMar API - CL - 9202024 
function checkReturnOrder($returnId)
{
	global $db;

	$return = explode('_', $returnId);
	$query = <<<EOD
SELECT ci_returns.*, 
ci_styles.customTitle, 
ci_products.colorFrontImage, 
ci_products.colorBackImage, 
ci_products.colorSideImage, 
ci_products.alphaFrontImage, 
ci_products.alphaBackImage, 
ci_products.alphaSideImage, 
ci_styles.styleImage, 
ci_products.cartGroupID 
FROM ci_returns
INNER JOIN ci_products ON ci_products.gtin = ci_returns.gtin
INNER JOIN ci_styles ON ci_styles.styleID = ci_products.styleID
WHERE orderId = '$return[0]'
AND dateRequested = '$return[1]'
EOD;
	return $db->rawQuery($query);
} // End - Integrate SanMar API - CL - 9202024 



function checkUserOrder($userid, $orderid)
{
	global $db;
	$cRev = $db->rawQueryOne("select customerOrderID from ci_customer_orders where customerOrderID=? and customerId=?  ", array($orderid, $userid));
	if (count($cRev) > 0) {
		return true;
	} else {
		return false;
	}
}

function getProductCustomTitle($styleID)
{
	global $db;
	$cRev = $db->rawQueryOne("select customTitle from ci_styles where styleID=?  ", array($styleID));
	if (!empty($cRev)) {
		return $cRev['customTitle'];
	}
}

function getCouponAmount($ky)
{
	global $db;
	$sql = "select * from ci_coupons where ccode='" . $ky . "'";
	$results = $db->rawQueryOne($sql);
	return $results;
}

//Start - gift certificate codes that can be used - Roi - 06/17/2020 6:27am
function getGCAmount($ky)
{
	global $db;
	$sql = "select * from ci_gift_certificates where gccode='" . $ky . "'";
	$results = $db->rawQueryOne($sql);
	return $results;
}
//End - gift certificate codes that can be used - Roi - 06/17/2020 6:27am


function getCheckStyleIsCoupon($styleID)
{
	global $db;
	$cRev = $db->rawQueryOne("select iscoupon from ci_styles where styleID=?  ", array($styleID));
	if ($cRev['iscoupon'] == 1) {
		return 1;
	} else {
		return 0;
	}
}

function getCheckStyleIsBulk($styleID)
{
	global $db;
	$cRev = $db->rawQueryOne("select isbulkdiscount from ci_styles where styleID=?  ", array($styleID));
	if ($cRev['isbulkdiscount'] == 1) {
		return 1;
	} else {
		return 0;
	}
}


function fnlowestStyleprice($styleID)
{
	global $db;
	$cRev = $db->rawQueryOne("select customerPrice from ci_products where styleID=? AND isDS = 0 order by CAST(customerPrice AS DECIMAL(10,2)) ASC limit 1", array($styleID));
	return $cRev['customerPrice'];
}

function fnlowestStyleprice2($styleID, $clrname)
{
	global $db;
	$cRev = $db->rawQueryOne("select customerPrice from ci_products where styleID=?  and colorName='" . addslashes($clrname) . "' AND isDS = 0 order by CAST(customerPrice AS DECIMAL(10,2)) ASC limit 1", array($styleID));
	return $cRev['customerPrice'];
}


function checkConjuctionCoupon($secoupons)
{
	global $db;
	$chkconjuction = 0;
	foreach ($secoupons as $ky => $cval) {
		$couponDetails = getCouponAmount($ky);
		if ($couponDetails['individualonly'] == 1) {
			$chkconjuction = $couponDetails['ccode'];
		}
	}
	return $chkconjuction;
}


function getCouponUsedByUser($ccode, $userid)
{
	global $db;
	$sql = "select * from ci_couponusedbyuser where couponcode='" . $ccode . "' and userid='" . $userid . "'";
	$results = $db->rawQueryOne($sql);
	if ($results['used'] != "" && $results['used'] != 0) {
		return $results['used'];
	} else {
		return 0;
	}
}

//Start - gift certificate codes that can be used - Roi - 06/17/2020 6:30am
function getGCUsedByUser($gccode, $userid)
{
	global $db;
	$sql = "select * from ci_gcusedbyuser where gccode='" . $gccode . "' and userid='" . $userid . "'";
	$results = $db->rawQueryOne($sql);
	if ($results['used'] != "" && $results['used'] != 0) {
		return $results['used'];
	} else {
		return 0;
	}
}
//End - gift certificate codes that can be used - Roi - 06/17/2020 6:30am

/*function fnCheckSatSun($fdays) {
	$now = strtotime("now");
	$end_date = strtotime("+".$fdays." days");
	$wval=array();
	while (date("Y-m-d", $now) != date("Y-m-d", $end_date)) {
		$day_index = date("w", $now);
		//echo date("w", $now)."<Br>";
		if ($day_index == 0 || $day_index == 6) {
		$wval[]=date("D", $now);
		//echo date("D", $now)."<Br>";
		//$jk=$i+1;
			// Print or store the weekends here
		}

		$now = strtotime(date("Y-m-d", $now) . "+1 day");

	}


	if(in_array("Sat",$wval) && in_array("Sat",$wval)) {
	return ($fdays+1);
	} else if(in_array("Sat",$wval)) {
	return ($fdays+2);
	} else if(in_array("Sun",$wval)) {
	return ($fdays+1);
	} else {
	return ($fdays);
	}
}*/


/*function fnDaysT($fdays1,$item) {
	global $db;
	$rsest="";
	$fdays=fnCheckSatSun($fdays1);
	$wday=date('D', strtotime("+".$fdays." days"));
	if($wday == 'Sat') {
	$sndays=date('Y-m-d', strtotime("+".($fdays+2)." days"));
	$chkhdate = $db->rawQueryOne ("select hdate from ci_holidaylist where hdate=? ", array($sndays));
	if(isset($chkhdate['hdate']) && $chkhdate['hdate']) {
	$ndays=$fdays+2;
	$hwdate=date('D', strtotime("+".($fdays+1)." day"));
			if($hwdate == 'Sat') {
			$rsest="<strong>Est. Delivery - </strong>".date('l, F d', strtotime("+".($ndays+2)." days"))." <br /> <strong>Total Items - </strong>".totalCartItems()." ".$item;
			} else if($hwdate == 'Sun') {
			$rsest="<strong>Est. Delivery - </strong>".date('l, F d', strtotime("+".($ndays+1)." days"))." <br /> <strong>Total Items - </strong>".totalCartItems()." ".$item;
			} else {
			$rsest="<strong>Est. Delivery - </strong>".date('l, F d', strtotime("+".($ndays+1)." days"))." <br /> <strong>Total Items - </strong>".totalCartItems()." ".$item;
			}


	} else {
	$rsest="<strong>Est. Delivery - </strong>".date('l, F d', strtotime("+".($fdays+2)." days"))." <br /> <strong>Total Items - </strong>".totalCartItems()." ".$item;
	}


	} else if($wday == 'Sun') {
	$sndays=date('Y-m-d', strtotime("+".($fdays+1)." days"));
	$chkhdate = $db->rawQueryOne ("select hdate from ci_holidaylist where hdate=? ", array($sndays));
	if(isset($chkhdate['hdate']) && $chkhdate['hdate']) {
	$ndays=$fdays+1;
	$hwdate=date('D', strtotime("+".($fdays+1)." day"));
			if($hwdate == 'Sat') {
			$rsest="<strong>Est. Delivery - </strong>".date('l, F d', strtotime("+".($ndays+2)." days"))." <br /> <strong>Total Items - </strong>".totalCartItems()." ".$item;
			} else if($hwdate == 'Sun') {
			$rsest="<strong>Est. Delivery - </strong>".date('l, F d', strtotime("+".($ndays+1)." days"))." <br /> <strong>Total Items - </strong>".totalCartItems()." ".$item;
			} else {
			$rsest="<strong>Est. Delivery - </strong>".date('l, F d', strtotime("+".($ndays+1)." days"))." <br /> <strong>Total Items - </strong>".totalCartItems()." ".$item;
			}


	} else {
	$rsest="<strong>Est. Delivery - </strong>".date('l, F d', strtotime("+".($fdays+1)." days"))." <br /> <strong>Total Items - </strong>".totalCartItems()." ".$item;
	}
	} else {
	$ddate=date('Y-m-d', strtotime("+".($fdays)." days"));

	$chkhdate = $db->rawQueryOne ("select hdate from ci_holidaylist where hdate=? ", array($ddate));
	if(isset($chkhdate['hdate']) && $chkhdate['hdate']) {
	$ndays=$fdays+1;
	$hwdate=date('D', strtotime("+".($fdays+1)." day"));
			if($hwdate == 'Sat') {
			$rsest="<strong>Est. Delivery - </strong>".date('l, F d', strtotime("+".($ndays+2)." days"))." <br /> <strong>Total Items - </strong>".totalCartItems()." ".$item;
			} else if($hwdate == 'Sun') {
			$rsest="<strong>Est. Delivery - </strong>".date('l, F d', strtotime("+".($ndays+1)." days"))." <br /> <strong>Total Items - </strong>".totalCartItems()." ".$item;
			} else {
			$rsest="<strong>Est. Delivery - </strong>".date('l, F d', strtotime("+".($fdays+1)." days"))." <br /> <strong>Total Items - </strong>".totalCartItems()." ".$item;
			}


	} else {
	$rsest="<strong>Est. Delivery - </strong>".date('l, F d', strtotime("+".($fdays)." days"))." <br /> <strong>Total Items - </strong>".totalCartItems()." ".$item;
	}
	}

	return $rsest;
} */

function fnCheckSatSun($fdays)
{
	$now = strtotime("now");
	$end_date = strtotime("+" . $fdays . " days");
	$wval = array();
	$day_today = date("D", $now);
	/*echo "day_index==".$day_today;
	echo "<br/>";
	echo "now==".date("Y-m-d", $now);
	echo "<br/>";
	echo "end_date==".date("Y-m-d", $end_date);
	$i=1;*/
	while (date("Y-m-d", $now) != date("Y-m-d", $end_date)) {
		//echo "i===".$i."<br/>";
		$day_index = date("w", $now);
		//echo date("w", $now)."<Br>";
		if ($day_index == 0 || $day_index == 6) {
			$wval[] = date("D", $now);
		}
		$now = strtotime(date("Y-m-d", $now) . "+1 day");
		//$i++;
	}
	//echo "<pre>wval===";print_r($wval);

	if (in_array("Sat", $wval) && in_array("Sun", $wval)) {
		if ($day_today == "Sat") {
			return ($fdays + 2);
		} else if ($day_today == "Sun") {
			return ($fdays);
		} else {
			return ($fdays + 2);
		}
	} else if (in_array("Sat", $wval)) {
		if ($day_today == "Sat") { //if today is Saturday
			return ($fdays + 2);
		} else {
			return ($fdays + 2);
		}
	} else if (in_array("Sun", $wval)) {
		if ($day_today == "Sun") { //if today is Sunday
			return ($fdays + 1);
		} else {
			return ($fdays + 1);
		}
	} else {
		return ($fdays);
	}
}

function fnDaysT($fdays1, $item)
{
	global $db;
	$rsest = "";

	$currd = time();
	$dayafter = strtotime("12:00 PM");
	$todaymid = strtotime('11:59:59 PM');
	//echo date('d-m-Y h:i:s',$currd);


	if ($currd >= $dayafter && $todaymid >= $currd) {
		$adnext = 1;
	} else {
		$adnext = 0;
	}


	$fdays = fnCheckSatSun($fdays1 + $adnext);
	$wday = date('D', strtotime("+" . $fdays . " days"));




	if ($wday == 'Sat') {
		$sndays = date('Y-m-d', strtotime("+" . ($fdays + 2) . " days"));
		$chkhdate = $db->rawQueryOne("select hdate from ci_holidaylist where hdate=? ", array($sndays));
		if (isset($chkhdate['hdate']) && $chkhdate['hdate']) {
			$ndays = $fdays + 2;
			$hwdate = date('D', strtotime("+" . ($fdays + 2) . " days"));
			if ($hwdate == 'Sat') {
				$rsest = "<strong>Est. Delivery - </strong>" . "<span style='color:#009900'>" . date('l, F d', strtotime("+" . ($ndays + 2) . " days")) . "</span> <br /> <strong>Total Items - </strong>" . totalCartItems() . " " . $item;
			} else if ($hwdate == 'Sun') {
				$rsest = "<strong>Est. Delivery - </strong>" . "<span style='color:#009900'>" . date('l, F d', strtotime("+" . ($ndays + 1) . " days")) . "</span> <br /> <strong>Total Items - </strong>" . totalCartItems() . " " . $item;
			} else {
				$rsest = "<strong>Est. Delivery - </strong>" . "<span style='color:#009900'>" . date('l, F d', strtotime("+" . ($ndays + 1) . " days")) . "</span> <br /> <strong>Total Items - </strong>" . totalCartItems() . " " . $item;
			}
		} else {
			$rsest = "<strong>Est. Delivery - </strong>" . "<span style='color:#009900'>" . date('l, F d', strtotime("+" . ($fdays + 2) . " days")) . "</span> <br /> <strong>Total Items - </strong>" . totalCartItems() . " " . $item;
		}
	} else if ($wday == 'Sun') {
		$sndays = date('Y-m-d', strtotime("+" . ($fdays + 1) . " days"));
		$chkhdate = $db->rawQueryOne("select hdate from ci_holidaylist where hdate=? ", array($sndays));
		if (isset($chkhdate['hdate']) && $chkhdate['hdate']) {
			$ndays = $fdays + 1;
			$hwdate = date('D', strtotime("+" . ($fdays + 1) . " day"));
			if ($hwdate == 'Sat') {
				$rsest = "<strong>Est. Delivery - </strong>" . "<span style='color:#009900'>" . date('l, F d', strtotime("+" . ($ndays + 2) . " days")) . "</span> <br /> <strong>Total Items - </strong>" . totalCartItems() . " " . $item;
			} else if ($hwdate == 'Sun') {
				$rsest = "<strong>Est. Delivery - </strong>" . "<span style='color:#009900'>" . date('l, F d', strtotime("+" . ($ndays + 1) . " days")) . "</span> <br /> <strong>Total Items - </strong>" . totalCartItems() . " " . $item;
			} else {
				$rsest = "<strong>Est. Delivery - </strong>" . "<span style='color:#009900'>" . date('l, F d', strtotime("+" . ($ndays + 1) . " days")) . "</span> <br /> <strong>Total Items - </strong>" . totalCartItems() . " " . $item;
			}
		} else {
			$rsest = "<strong>Est. Delivery - </strong>" . "<span style='color:#009900'>" . date('l, F d', strtotime("+" . ($fdays + 1) . " days")) . "</span> <br /> <strong>Total Items - </strong>" . totalCartItems() . " " . $item;
		}
	} else {
		if ($fdays == 1) {
			$ddate = date('Y-m-d', strtotime("+" . ($fdays) . " day"));
		} else {
			$ddate = date('Y-m-d', strtotime("+" . ($fdays) . " days"));
		}

		$chkhdate = $db->rawQueryOne("select hdate from ci_holidaylist where hdate=? ", array($ddate));
		if (isset($chkhdate['hdate']) && $chkhdate['hdate']) {
			if ($fdays == 1) {
				$hwdate = date('D', strtotime("+" . ($fdays) . " day"));
			} else {
				$hwdate = date('D', strtotime("+" . ($fdays) . " days"));
			}
			if ($hwdate == 'Sat') {
				$rsest = "<strong>Est. Delivery - </strong>" . "<span style='color:#009900'>" . date('l, F d', strtotime("+" . ($fdays + 2) . " days")) . "</span> <br /> <strong>Total Items - </strong>" . totalCartItems() . " " . $item;
			} else if ($hwdate == 'Sun') {
				$rsest = "<strong>Est. Delivery - </strong>" . "<span style='color:#009900'>" . date('l, F d', strtotime("+" . ($fdays + 1) . " days")) . "</span> <br /> <strong>Total Items - </strong>" . totalCartItems() . " " . $item;
			} else {
				$rsest = "<strong>Est. Delivery - </strong>" . "<span style='color:#009900'>" . date('l, F d', strtotime("+" . ($fdays) . " days")) . "</span> <br /> <strong>Total Items - </strong>" . totalCartItems() . " " . $item;
			}
		} else {
			$rsest = "<strong>Est. Delivery - </strong>" . "<span style='color:#009900'>" . date('l, F d', strtotime("+" . ($fdays) . " days")) . "</span> <br /> <strong>Total Items - </strong>" . totalCartItems() . " " . $item;
		}
	}
	return $rsest;
}


function fnDaysTTest($fdays1, $item)
{
	global $db;
	$rsest = "";
	/*date_default_timezone_set('America/Los_Angeles');
echo date_default_timezone_get() . ' => ' . date('e') . ' => ' . date('T');
	*/
	$currd = time();
	$dayafter = strtotime("12:00:01");
	$todaymid = strtotime('23:59:59');
	/*echo date('d-m-Y h:i:s',$currd)."-".$currd;
echo "<Br>";
echo date('d-m-Y h:i:s',$dayafter)."-".$dayafter;
echo "<Br>";
echo date('d-m-Y h:i:s',$todaymid)."-".$todaymid;
die();
*/
	if ($currd >= $dayafter && $todaymid >= $currd) {
		$adnext = 1;
	} else {
		$adnext = 0;
	}


	$fdays1 = 1; //Start - Add a day to estimated dates like we did last time - RM - 11/09/2020
	/*	echo $adnext;
	die();*/
	$fdays = fnCheckSatSun($fdays1 + $adnext);
	$wday = date('D', strtotime("+" . $fdays . " days"));




	if ($wday == 'Sat') {
		$sndays = date('Y-m-d', strtotime("+" . ($fdays + 2) . " days"));
		$chkhdate = $db->rawQueryOne("select hdate from ci_holidaylist where hdate=? ", array($sndays));
		if (isset($chkhdate['hdate']) && $chkhdate['hdate']) {
			$ndays = $fdays + 2;
			$hwdate = date('D', strtotime("+" . ($fdays + 2) . " days"));
			if ($hwdate == 'Sat') {
				$rsest = "<span style='color:#009900'>" . date('l, F d', strtotime("+" . ($ndays + 2) . " days")) . "</span>";
			} else if ($hwdate == 'Sun') {
				$rsest = "<span style='color:#009900'>" . date('l, F d', strtotime("+" . ($ndays + 1) . " days")) . "</span>";
			} else {
				$rsest = "<span style='color:#009900'>" . date('l, F d', strtotime("+" . ($ndays + 1) . " days")) . "</span>";
			}
		} else {
			$rsest = "<span style='color:#009900'>" . date('l, F d', strtotime("+" . ($fdays + 2) . " days")) . "</span>";
		}
	} else if ($wday == 'Sun') {
		$sndays = date('Y-m-d', strtotime("+" . ($fdays + 1) . " days"));
		$chkhdate = $db->rawQueryOne("select hdate from ci_holidaylist where hdate=? ", array($sndays));
		if (isset($chkhdate['hdate']) && $chkhdate['hdate']) {
			$ndays = $fdays + 1;
			$hwdate = date('D', strtotime("+" . ($fdays + 1) . " day"));
			if ($hwdate == 'Sat') {
				$rsest = "<span style='color:#009900'>" . date('l, F d', strtotime("+" . ($ndays + 2) . " days")) . "</span>";
			} else if ($hwdate == 'Sun') {
				$rsest = "<span style='color:#009900'>" . date('l, F d', strtotime("+" . ($ndays + 1) . " days")) . "</span>";
			} else {
				$rsest = "<span style='color:#009900'>" . date('l, F d', strtotime("+" . ($ndays + 1) . " days")) . "</span>";
			}
		} else {
			$rsest = "<span style='color:#009900'>" . date('l, F d', strtotime("+" . ($fdays + 1) . " days")) . "</span>";
		}
	} else {
		if ($fdays == 1) {
			$ddate = date('Y-m-d', strtotime("+" . ($fdays) . " day"));
		} else {
			$ddate = date('Y-m-d', strtotime("+" . ($fdays) . " days"));
		}

		$chkhdate = $db->rawQueryOne("select hdate from ci_holidaylist where hdate=? ", array($ddate));
		if (isset($chkhdate['hdate']) && $chkhdate['hdate']) {
			if ($fdays == 1) {
				$hwdate = date('D', strtotime("+" . ($fdays) . " day"));
			} else {
				$hwdate = date('D', strtotime("+" . ($fdays) . " days"));
			}
			if ($hwdate == 'Sat') {
				$rsest = "<span style='color:#009900'>" . date('l, F d', strtotime("+" . ($fdays + 2) . " days")) . "</span>";
			} else if ($hwdate == 'Sun') {
				$rsest = "<span style='color:#009900'>" . date('l, F d', strtotime("+" . ($fdays + 1) . " days")) . "</span>";
			} else {
				$rsest = "<span style='color:#009900'>" . date('l, F d', strtotime("+" . ($fdays) . " days")) . "</span>";
			}
		} else {
			$rsest = "<span style='color:#009900'>" . date('l, F d', strtotime("+" . ($fdays) . " days")) . "</span>";
		}
	}
	return $rsest;
}


function deleteDir($dirPath)
{
	if (!is_dir($dirPath)) {
		return;
		throw new InvalidArgumentException("$dirPath must be a directory");
	}
	if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
		$dirPath .= '/';
	}
	$files = glob($dirPath . '*', GLOB_MARK);
	foreach ($files as $file) {
		if (is_dir($file)) {
			deleteDir($file);
		} else {
			unlink($file);
		}
	}
	rmdir($dirPath);
}

function getColorsMIMageByStyleId($stid)
{
	global $db;
	$sql = "SELECT colorFrontImage,colorSideImage,colorBackImage FROM `ci_products` WHERE (colorFrontImage<>'' or colorSideImage<>'' or colorBackImage<>'') and   styleID=$stid  group by colorName order by colorName DESC ";
	$results = $db->rawQuery($sql);
	if (count($results) > 0) {
		return $results;
	} else {
		return false;
	}
}
// Start - Rename image file path - CL - 9222021

// Start - New Image size upload list and Fixes - CL - 07/05/2021 
function getProductModelImage($image, $size)
{
	return newImagesConnector($image, "Images/Style/", $size);
}
// End - New Image size upload list and Fixes - CL - 07/05/2021 

// Start - New Image size upload list and Fixes - CL - 07/01/2021 
function getProductColorImage($image, $size)
{
	return newImagesConnector($image, "Images/Color/", $size);
}
// End - New Image size upload list and Fixes - CL - 07/01/2021 

$imagePathPrefixes = array('Images/Style/', 'Images/Color/'); // Start - incorrect file path for search live image - CL - 11/10/2021

function fnSMainImages($simage)
{
	return newImagesConnector($simage, "Images/Style/", [480, 600]);
	// return base_url_smimages.str_replace("Images/Style/","",$simage);
}
function fnCPMainImages($simage)
{
	return newImagesConnector($simage, "Images/Color/", [480, 600]);
	// return base_url_cpimages.str_replace("Images/Color/","",$simage);
}
function fnProImages($simage)
{
	return newImagesConnector($simage, "Images/Style/", [232, 290]);
	// return base_url_scimages.str_replace("Images/Style/","",$simage);
}
function fnComPImages($simage)
{
	return newImagesConnector($simage, "Images/Style/", [200, 250]);
	// return base_url_pcomimages.str_replace("Images/Style/","",$simage);
}

// Start - incorrect file path for search live image - CL - 11/10/2021
function fnSearchImages($simage)
{
	global $imagePathPrefixes;
	return newImagesConnector($simage, $imagePathPrefixes, [116, 145]);
}
// End - incorrect file path for search live image - CL - 11/10/2021

function newImagesConnector($image, $prefix, $size, $source = 'sns')
{ // Start - pbulkcache uses the wrong folder for alpha images - AP - 05/03/2024
	global $noImageFound; //Start -  SL6 image issues when color image missing it shows last color instead of missing image placeholder - CL - 11/3/2021
	list($width, $height) = $size;
	$fileName = str_replace(['Images/Color/', 'Images/Style/'], '', $image);

	if ($image == "")
		return $noImageFound; //Start -  SL6 image issues when color image missing it shows last color instead of missing image placeholder - CL - 11/3/2021

	if ($width == 56 && $height == 70) {
		return thumbItemDetailImageMobile($fileName, $source); // Start - pbulkcache uses the wrong folder for alpha images - AP - 05/03/2024
	} else if ($width == 80 && $height == 100) {
		return thumbItemDetailImageDesktop($fileName);
	}
	// Start - incorrect file path for search live image - CL - 11/10/2021
	else if ($width == 116 && $height == 145) {
		return searchImage($fileName);
	}
	// End - incorrect file path for search live image - CL - 11/10/2021
	else if ($width == 200 && $height == 250) {
		return comparableImageDesktop($fileName);
	} else if ($width == 232 && $height == 290) {
		return bulkBlankShirtsImage($fileName);
	} else if ($width == 328 && $height == 415) {
		return itemDetailImageMobile($fileName);
	} else if ($width == 480 && $height == 600) {
		return itemDetailImageDesktop($fileName);
	}

	return base_url_site . "styleImages/SCImages/wholesale-shirts-{$width}-{$height}/{$fileName}";
}

// Start - incorrect file path for search live image - CL - 11/10/2021
function searchImage($image)
{
	return image_url_search . $image;
}
// End - incorrect file path for search live image - CL - 11/10/2021

function thumbItemDetailImageMobile($image, $source = 'sns')
{ // Start - pbulkcache uses the wrong folder for alpha images - AP - 05/03/2024
	$folder = image_url_thumbnail_m;

	if ($source == 'alpha') {
		$folder = str_replace('/image/', '/image/alpha-colors/', $folder);
	}

	return $folder . $image;
}
function thumbItemDetailImageDesktop($image)
{
	return image_url_thumbnail . $image;
}
function comparableImageDesktop($image)
{
	return image_url_popular_items . $image;
}
function bulkBlankShirtsImage($image)
{
	return image_url_bulk_blank_shirts . $image;
}
function itemDetailImageMobile($image)
{
	return image_url_fashion_wear_m . $image;
}
function itemDetailImageDesktop($image)
{
	return image_url_fashion_wear . $image;
}
// End - Rename image file path - CL - 9222021


function chkWarehoses($sku)
{
	global $db;
	$sql = "select warehouses from ci_products where sku='" . $sku . "'";
	$results = $db->rawQueryOne($sql);
	$wareh = json_decode($results['warehouses']);

	if ($wareh != "" && $wareh != 0) {
		//$wareh=json_decode($results['warehouses']);
		foreach ($wareh as $kw => $wh) {
			if ($wh->qty > 0 && $wh->warehouseAbbr != "DS") {

				$warehouse[$wh->warehouseAbbr] = $wh->qty;
			}
		}
		return $warehouse;
	} else {
		return 0;
	}
}


function getDaysTransistDaysMultiple($days, $warehouses, $qty)
{
	global $db;
	//echo $zipcode;

	$totalQty = 0;
	$totalQty2 = 0;
	$totalQty3 = 0;
	//$whtransist = array_intersect_key($days, $warehouses);

	$wrhs = array();
	$wrhs2 = array();
	asort($days);


	$j = 1;


	foreach ($days as $kw => $vwa) {
		$totalQty = $totalQty + $warehouses[$kw];
		if ($qty < $warehouses[$kw]) {
			$wrhs[$kw] = $vwa;
		} else {
			$totalQty2 = $totalQty2 + $warehouses[$kw];
			if ($qty > $totalQty3) {
				$wrhs2[$kw] = $vwa;
			}
			$totalQty3 = $totalQty3 + $warehouses[$kw];
		}

		$j++;
	}


	//}
	/*print_r($wrhs);
echo "<Br>";
print_r($wrhs2);
die();*/

	//echo $j;

	if (count($wrhs) == 1) {
		$maxdays = min(array_filter($wrhs));
	} else if (count($wrhs) > 1) {
		$maxdays = max(array_filter($wrhs));
	} else {
		$maxdays = max(array_filter($wrhs2));
	}

	return $maxdays;
}



function getDaysTransistDays($zipcode)
{
	global $db;
	$dtransist = $db->rawQueryOne("SELECT * FROM ci_daysintasist WHERE zipCode = '" . $zipcode . "'");
	$days['TX'] = $dtransist['daysInTransit_TX'];
	$days['IL'] = $dtransist['daysInTransit_IL'];
	$days['NJ'] = $dtransist['daysInTransit_NJ'];
	$days['NV'] = $dtransist['daysInTransit_NV'];
	$days['KS'] = $dtransist['daysInTransit_KS'];
	$days['GA'] = $dtransist['daysInTransit_GA'];
	$cartitems = OrderPriceCalc();
	$k = 0;
	foreach ($cartitems as $key2 => $val2) {
		if (isset($val2['sku'])) {

			$warehouses = chkWarehoses($val2['sku']);
			$maxqty = max(array_filter($warehouses));

			if ($val2['qty'] >= $maxqty) {
				$maxdt = getDaysTransistDaysMultiple($days, $warehouses, $val2['qty']);

				$k = 1;
			} else {

				foreach ($warehouses as $kw => $vwa) {
					if ($val2['qty'] <= $vwa) {
						$warehouses1[$kw] = $vwa;
					}
				}
				$k = 0;
			}
			if (isset($warehouses1) && !empty($warehouses1)) {
				$warehouses = "";
				$warehouses = $warehouses1;
			}
			/*print_r($warehouses1);
			die();*/
			if ($warehouses == 0) {
				$warehouses = array();
			}
			$whtransist = array_intersect_key($days, $warehouses);
			if (!empty($whtransist)) {
				if (count($whtransist) > 1 && $k == 1) {
					$afdays[] = $maxdt;
				} else if (count($whtransist) > 1 && $k == 0) {
					$afdays[] = min(array_filter($whtransist));
				} else {
					$whtransistArr = array_values($whtransist);
					$afdays[] = $whtransistArr[0]; //if array has only 1 element
				}
			} else {
				//$afdays[] = array();
				$afdays[] = 3; //If product has no warehouse
			}
		}
	}
	return $afdays;
}

function getDaysTransistDays_test($zipcode, $productSku, $qty)
{

	global $db;
	$dtransist = $db->rawQueryOne("SELECT * FROM ci_daysintasist WHERE zipCode = '" . $zipcode . "'");
	$days['TX'] = $dtransist['daysInTransit_TX'];
	$days['IL'] = $dtransist['daysInTransit_IL'];
	$days['NJ'] = $dtransist['daysInTransit_NJ'];
	$days['NV'] = $dtransist['daysInTransit_NV'];
	$days['KS'] = $dtransist['daysInTransit_KS'];
	$days['GA'] = $dtransist['daysInTransit_GA'];

	$days2 = $days;

	//print_r($days);

	$warehouses = chkWarehoses($productSku);


	$maxqty = max(array_filter($warehouses));


	$k = 0;


	if ($qty > $maxqty) {

		$maxdt = getDaysTransistDaysMultiple($days, $warehouses, $qty);

		$k = 1;
	} else {

		asort($days2);
		$totalQty = 0;
		$totalQty2 = 0;
		$totalQty3 = 0;
		foreach ($days2 as $kw => $vwa) {
			//echo $kw."<br>";
			if ($qty > $totalQty3) {
				$warehouses1[$kw] = $warehouses[$kw];
			}
			$totalQty3 = $totalQty3 + $warehouses[$kw];
		}
		$k = 0;
	}
	if (isset($warehouses1) && !empty($warehouses1)) {
		$warehouses = "";
		$warehouses = $warehouses1;
	}

	/*	print_r($warehouses1);
die();*/
	if ($warehouses == 0) {
		$warehouses = array();
	}
	$whtransist = array_intersect_key($days, $warehouses);
	/*	print_r($whtransist);
	die();*/
	if (!empty($whtransist)) {
		if (count($whtransist) > 1 && $k == 1) {
			$afdays[] = $maxdt;
		} else if (count($whtransist) > 1 && $k == 0) {
			$afdays[] = max(array_filter($whtransist));
		} else {
			$whtransistArr = array_values($whtransist);
			$afdays[] = $whtransistArr[0]; //if array has only 1 element
		}
	} else {
		$afdays[] = 3; //If product has no warehouse
	}
	return $afdays;
}



function getBreadcurms($stid)
{
	global $db;
	$pdetails = $db->rawQueryOne("select brandName,styleName,customTitle,baseCategory,title,brandslug,slugCategory from ci_styles where styleID=? ", array($stid));
	return $pdetails;
}

function getPBrandName($slug)
{
	global $db;
	$pdetails = $db->rawQueryOne("select brandName from ci_styles where brandslug=? ", array($slug));
	return $pdetails['brandName'];
}


function getStyleDetailsbySTID($stid)
{
	global $db;
	$pdetails = $db->rawQueryOne("select * from ci_styles where styleID=? ", array($stid));
	return $pdetails;
}

function getSpeciesByStyleId($styleId)
{
	global $db;
	$sql_query = 'SELECT GROUP_CONCAT(specID) as specID,GROUP_CONCAT(sizeName) as size,GROUP_CONCAT(value) as value ,specName FROM `ci_specs` WHERE `styleID`="' . $styleId . '" group by specName';
	$pdetails = $db->rawQuery($sql_query);
	//pr($pdetails);
	return $pdetails;
}

function getSpecs($styleId)
{
	global $db;

	$specs = $db->rawQuery('SELECT sizeName, sizeOrder, specName, value FROM ci_specs WHERE styleID = ? AND specName NOT LIKE "%Tolerance%" ORDER BY specName, sizeOrder', [$styleId]);

	$result = array_reduce($specs, function ($chart, $item) {
		$chart['sizes'][] = ['name' => $item['sizeName'], 'order' => $item['sizeOrder']];

		if (!isset($chart['data'][$item['specName']]))
			$chart['data'][$item['specName']] = [];

		$chart['data'][$item['specName']][$item['sizeName']] = $item['value'];

		return $chart;
	}, ['sizes' => [], 'data' => []]);

	$sizes = array_map("unserialize", array_unique(array_map("serialize", $result['sizes'])));
	usort($sizes, function ($a, $b) {
		if ($a['order'] == $b['order'])
			return 0;

		return $a['order'] > $b['order'] ? 1 : -1;
	});
	$sizes = array_unique(array_column($sizes, 'name'));

	return [$sizes, $result['data']];
}

function pr($array)
{
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}

function loadSections($custom_page_id)
{

	global $db;

	$sql = "select * from ci_custompage_sections where custompageid='" . $custom_page_id . "' order by position";

	$results = $db->rawQuery($sql);

	if (count($results) > 0) {
		foreach ($results as $row) {
			$data[] = $row;
		}
		return $data;
	}

	return false;
}

function getStylesPerSectionFront($sectionId, $currentPage = 1, $itemsPerPage = 20)
{


	$start_time = microtime(true);

	global $db;
	$offset = ($currentPage - 1) * $itemsPerPage;

	// Start - New Item Card Design and Add-To-Cart Quick Popup - SF - 07/25/2025
	$userID = $_SESSION['uid'] ?? null;

	$selectFavorite = '';
	$isFavoriteSelect = '0 AS isfavorite';
	if ($userID) {
		$isFavoriteJoin = "LEFT JOIN ci_favorites 
			ON ci_favorites.styleID = style.styleID 
			AND ci_favorites.userID = {$userID}";
		$isFavoriteSelect = "CASE 
			WHEN ci_favorites.userID IS NOT NULL THEN 1 
			ELSE 0 
		END AS isfavorite";
	}
	// Start - New Item Card Design and Add-To-Cart Quick Popup - SF - 07/25/2025

	// on custom pages if items is no longer available should not be display - SF - 09162025
	$query = "SELECT 
        section.*, 
        style.*, 
        style.cartGroupID, 
        product.alphaFrontImage AS alphaFrontImageMain, 
        product.alphaBackImage AS alphaBackImageMain, 
        product.alphaSideImage AS alphaSideImageMain, 
        product.colorFrontImage AS colorFrontImageMain, 
        product.colorBackImage AS colorBackImageMain, 
        product.colorSideImage AS colorSideImageMain, 
        product.colorCode,
        CASE WHEN EXISTS (
            SELECT 1 
            FROM ci_products p
            INNER JOIN ci_shipping_groups sg 
                ON sg.id = p.cartGroupID
            --    AND sg.enabled = 1
            WHERE p.styleID = style.styleID
              AND p.colorstatus = 0
              AND p.sizestatus = 0
              AND p.isDS = 0
              AND p.qty > 0
        ) THEN 1 ELSE 0 END AS isAvailable,
        $isFavoriteSelect
    FROM ci_custompage_section_styles AS section 
    INNER JOIN ci_styles AS style 
        ON section.styleid = style.id 
    LEFT JOIN ci_products AS product 
        ON product.styleID = style.styleID 
       AND section.colorname = product.colorName 
    $isFavoriteJoin
    WHERE sectionid = ? 
      AND style.brandstatus = 0
      AND style.isExistProduct = 1
      AND style.pPrice >= 1
    GROUP BY style.styleID 
    HAVING isAvailable = 1   
    ORDER BY section.position 
    LIMIT ?, ?"; // Start - add "load more" on custom pages also. The same way they work on our regular pages - AP - 03/25/2022 //Start - added left join - We need an option to choose which product color we display on custom pages for each item - RM - 01/26/2023

	$products = $db->rawQuery($query, [$sectionId, $offset, $itemsPerPage]);

	$totalCount = $db->rawQueryOne("
    SELECT COUNT(*) AS total
		FROM (
			SELECT style.id,
				CASE WHEN EXISTS (
						SELECT 1 
						FROM ci_products p
						INNER JOIN ci_shipping_groups sg 
							ON sg.id = p.cartGroupID
						-- AND sg.enabled = 1
						WHERE p.styleID = style.styleID
						AND p.colorstatus = 0
						AND p.sizestatus = 0
						AND p.isDS = 0
						AND p.qty > 0
				) THEN 1 ELSE 0 END AS isAvailable
			FROM ci_custompage_section_styles AS section
			INNER JOIN ci_styles AS style 
				ON section.styleid = style.id
			WHERE section.sectionid = ?
			AND style.brandstatus = 0
			AND style.isExistProduct = 1
			AND style.pPrice >= 1
			GROUP BY style.styleID
			HAVING isAvailable = 1
		) AS t
	", [$sectionId])['total'];
	// on custom pages if items is no longer available should not be display - SF - 09162025

	$lastPage = ceil($totalCount / $itemsPerPage);

	$end_time = microtime(true);
	$execution_time = ($end_time - $start_time) * 1000;
	return [
		"data" => $products,
		"meta" => [
			"total" => $totalCount,
			"isLastPage" => $currentPage == $lastPage,
			"page" => $currentPage,
			"lastPage" => $lastPage,
			"execution_time" => $execution_time
		],
	];
}

// Start - Free shipping application - 07/06/2020 9:00 AM
function freeShippingSubtotal()
{
	global $db;

	$currentOrder = [];
	if (isset($_SESSION['currentOrder']) && !empty($_SESSION['currentOrder']))
		$currentOrder = $_SESSION['currentOrder'];

	$productIds = implode("', '", array_map(function ($item) {
		return $item['pid'];
	}, $currentOrder));

	$products = $db->rawQuery("SELECT sku, customerPrice FROM ci_products WHERE isfreeshipping = 1 AND sku IN ('$productIds')");

	$subtotal = 0;
	foreach ($currentOrder as $order) {
		$product = array_find($products, function ($product) use ($order) {
			return $product['sku'] == $order['pid'];
		});

		$subtotal += $product['customerPrice'] * $order['qty'];
	}

	return $subtotal;
}
// End - Free shipping application - 07/06/2020 9:00 AM

function withinRange($value, $lowerLimit, $upperLimit)
{
	return $value >= $lowerLimit && ($upperLimit > 0 ? ($value <= $upperLimit) : true);
}

function computeShippingFee($totalAmount, $shipMethod, $isFreeShip = 0)
{
	global $db;

	$lineItems = count(OrderPriceCalc());

	$totalQuantity = array_reduce(OrderPriceCalc(), function ($total, $item) {
		return $total + $item['qty'];
	}, 0);

	$defaultShippingOptionId = 5;

	$shippingOptions = $db->rawQuery("SELECT * FROM ci_shipping_options where status = 1 AND datedeleted IS NULL ORDER BY position ASC");

	$dynamicShippingOptions = array_values(array_filter($shippingOptions, function ($shippingOption) use ($defaultShippingOptionId) {
		return $shippingOption['freeship'] == 0 && $shippingOption['id'] != $defaultShippingOptionId;
	}));

	$freeShippingOptions = array_values(array_filter($shippingOptions, function ($shippingOption) {
		return $shippingOption['freeship'] == 1;
	}));

	$defaultShippingOption = array_values(array_filter($shippingOptions, function ($shippingOption) use ($defaultShippingOptionId) {
		return $shippingOption['id'] == $defaultShippingOptionId;
	}));
	if (empty($defaultShippingOption)) {
		$defaultShippingOption = $db->rawQueryOne("SELECT * FROM ci_shipping_options WHERE id = ?", [$defaultShippingOptionId]);
	} else
		$defaultShippingOption = $defaultShippingOption[0];

	if ($isFreeShip == 1) {
		$shippingcharge = 0;
	} elseif (freeShippingSubtotal() >= FREESHIPPING) {
		$freeShippingOptions = array_values(array_filter($freeShippingOptions, function ($dynamic_option) use ($lineItems, $totalQuantity) {
			return withinRange(totalCartPrice(), $dynamic_option['minrange'], $dynamic_option['maxrange'])
				&& withinRange($lineItems, $dynamic_option['minline'], $dynamic_option['maxline'])
				&& withinRange($totalQuantity, $dynamic_option['minqty'], $dynamic_option['maxqty']);
		}));

		$shippingcharge = 0;
		$shippingOption = array_search($shipMethod, array_column($freeShippingOptions, 'id'));
		if ($shippingOption !== false) {
			$shippingcharge = $shippingOptions[array_search($shipMethod, array_column($shippingOptions, 'id'))]['amount'];
		} else {
			$amounts = array_column($freeShippingOptions, 'amount');
			$index = array_search(min(empty($amounts) ? 0 : $amounts), $amounts);

			if ($index !== false) {
				$shipMethod = $freeShippingOptions[$index]['id'];
				$shippingcharge = $shippingOptions[array_search($shipMethod, array_column($shippingOptions, 'id'))]['amount'];
			} else {
				$shippingcharge = 0;
			}
		}
	} else {
		$dynamicShippingOptions = array_values(array_filter($dynamicShippingOptions, function ($dynamic_option) use ($lineItems, $totalQuantity) {
			return withinRange(totalCartPrice(), $dynamic_option['minrange'], $dynamic_option['maxrange'])
				&& withinRange($lineItems, $dynamic_option['minline'], $dynamic_option['maxline'])
				&& withinRange($totalQuantity, $dynamic_option['minqty'], $dynamic_option['maxqty']);
		}));

		$shippingcharge = 0;
		$shippingOption = array_search($shipMethod, array_column($dynamicShippingOptions, 'id'));
		if ($shippingOption !== false) {
			$shippingcharge = $shippingOptions[array_search($shipMethod, array_column($shippingOptions, 'id'))]['amount'];
		} else {
			$amounts = array_column($dynamicShippingOptions, 'amount');
			$index = array_search(min(empty($amounts) ? [0] : $amounts), $amounts);

			if ($index !== false) {
				$shipMethod = $dynamicShippingOptions[$index]['id'];
				$shippingcharge = $shippingOptions[array_search($shipMethod, array_column($shippingOptions, 'id'))]['amount'];
			} else {
				$shippingcharge = $defaultShippingOption['amount'];
			}
		}
	}



	// $shippingcharge = 0;
	// if ($isFreeShip == 1) {
	// 	$shippingcharge = 0;
	// } elseif (freeShippingSubtotal() >= FREESHIPPING) { // Start - although we put over 99 for free ship it should be >= 99 - AP - 05/19/2022
	// 	$shippingOption = getDynamicOption($shipMethod);

	// 	if (!empty($shippingOption) && $shippingOption['freeship'] == 1) {
	// 		if (isset($shipMethod) && !empty($shipMethod)) {
	// 			$shippingcharge = (shippingOptionStatus() == 1) ? SHIPPINGCHARGE : dynamicOption($shipMethod);
	// 		} else {
	// 			$shippingcharge = parseFloatValue(SHIPPINGCHARGE);
	// 		}
	// 	} else {
	// 		$shippingcharge = 0;
	// 	}
	// } else {
	// 	$shippingOption = getDynamicOption($shipMethod);

	// 	if (isset($shipMethod) && !empty($shipMethod)) {
	// 		$shippingcharge = (shippingOptionStatus() == 1 || $shippingOption['freeship'] == 1) ? SHIPPINGCHARGE : dynamicOption($shipMethod);
	// 	} else {
	// 		$shippingcharge = parseFloatValue(SHIPPINGCHARGE);
	// 	}
	// }

	$totalAmt = $totalAmount + $shippingcharge;

	return [$totalAmt, number_format($shippingcharge, 2)];
}

function array_find($xs, $f)
{
	foreach ($xs as $x) {
		if (call_user_func($f, $x) === true)
			return $x;
	}
	return null;
}


function updateCookiesDataSingle($arr, $csid, $oid, $pid, $qty, $item = [])
{ //Start - Gangsheet Integration - RM - 05/15/2025
	global $db;
	if (isset($csid) && $csid != "") {
		$insertArray = array();
		$insertArray['abd_oid'] = $oid;
		$insertArray['abd_pid'] = $pid;
		$insertArray['abd_qty'] = $qty;
		$db->where('abd_oid', $insertArray['abd_oid'], $operator = '=', $cond = 'AND');
		$db->where('abd_pid', $insertArray['abd_pid'], $operator = '=', $cond = 'AND');
		$db->where('abd_cokiesid', $csid, $operator = '=', $cond = 'AND');

		//Start - Gangsheet Integration - RM - 05/15/2025
		if (!empty($item) && $item->design_id != "") {
			$db->where('design_id', $item->design_id, $operator = '=', $cond = 'AND');
		}
		//End - Gangsheet Integration - RM - 05/15/2025

		$db->update("ci_abdoncart", $insertArray);

		$insertArray['updated_at'] = date('Y-m-d H:i:s'); // Start - Authnet response implementation - AP - 02/28/2022
		// Start - abononedclean.php please update to save in a new table the deleted items. This file will run from cron every 45 min. - AP - 09/20/2021
		$db->where('abd_oid', $insertArray['abd_oid'], $operator = '=', $cond = 'AND');
		$db->where('abd_pid', $insertArray['abd_pid'], $operator = '=', $cond = 'AND');
		$db->where('abd_cokiesid', $csid, $operator = '=', $cond = 'AND');

		//Start - Gangsheet Integration - RM - 05/15/2025
		if (!empty($item) && $item->design_id != "") {
			$db->where('design_id', $item->design_id, $operator = '=', $cond = 'AND');
		}
		//End - Gangsheet Integration - RM - 05/15/2025

		$db->update("ci_abdoncart_shadow", $insertArray);
		// End - abononedclean.php please update to save in a new table the deleted items. This file will run from cron every 45 min. - AP - 09/20/2021
	}
	return true;
}


function updateSesstionDataSingle($arr, $csid, $oid, $pid, $qty, $item = [])
{ //Start - Gangsheet Integration - RM - 05/15/2025
	global $db;
	if (isset($csid) && $csid != "") {
		$insertArray = array();
		$insertArray['abd_oid'] = $oid;
		$insertArray['abd_pid'] = $pid;
		$insertArray['abd_qty'] = $qty;
		$db->where('abd_oid', $insertArray['abd_oid'], $operator = '=', $cond = 'AND');
		$db->where('abd_pid', $insertArray['abd_pid'], $operator = '=', $cond = 'AND');
		$db->where('abd_cid', $csid, $operator = '=', $cond = 'AND');

		//Start - Gangsheet Integration - RM - 05/15/2025
		if (!empty($item) && $item->design_id != "") {
			$db->where('design_id', $item->design_id, $operator = '=', $cond = 'AND');
		}
		//End - Gangsheet Integration - RM - 05/15/2025

		$db->update("ci_abdoncart", $insertArray);

		$insertArray['updated_at'] = date('Y-m-d H:i:s');  // Start - for abandoned carts. We should also send an email a few hours after they abandon. - CL - 332026
		// Start - abononedclean.php please update to save in a new table the deleted items. This file will run from cron every 45 min. - AP - 09/20/2021
		$db->where('abd_oid', $insertArray['abd_oid'], $operator = '=', $cond = 'AND');
		$db->where('abd_pid', $insertArray['abd_pid'], $operator = '=', $cond = 'AND');
		$db->where('abd_cid', $csid, $operator = '=', $cond = 'AND');

		//Start - Gangsheet Integration - RM - 05/15/2025
		if (!empty($item) && $item->design_id != "") {
			$db->where('design_id', $item->design_id, $operator = '=', $cond = 'AND');
		}
		//End - Gangsheet Integration - RM - 05/15/2025

		$db->update("ci_abdoncart_shadow", $insertArray);
		// End - abononedclean.php please update to save in a new table the deleted items. This file will run from cron every 45 min. - AP - 09/20/2021
	}
	return true;
}

function dynamicMessage($page)
{
	global $db;
	$dynamicmessage = $db->rawQueryOne("select columndata from ci_admin_settings  where columnname='" . $page . "'");
	if (!empty($dynamicmessage)) {
		return $dynamicmessage['columndata'];
	} else {
		return "";
	}
}

function getmetaDataCustomPage($data)
{
	global $db;

	$activePage = trim($_SERVER['REQUEST_URI'], '/');

	//Start - Did we make the index page editable? I need to select products , and banners and if what will be in the left column like ShirtChamp - RM - 01/06/2021
	$param = null;
	if (empty($activePage)) {
		$sql = "select * from ci_custom_pages where ishomepage = '1'";
	} else {
		$param = [$activePage];
		$sql = "select * from ci_custom_pages where custompagelink =?"; // Start - This is for LIVE and Stage MySQL injection - AP - 02/09/2021
	}
	//End - Did we make the index page editable? I need to select products , and banners and if what will be in the left column like ShirtChamp - RM - 01/06/2021

	$results = $db->rawQueryOne($sql, $param); // Start - This is for LIVE and Stage MySQL injection - AP - 02/09/2021

	if (!empty($results) && count($results) > 0) {
		return $results[$data];
	} else {
		return false;
	}
}

function getSavedCarts()
{
	global $db;
	//$sql="select * from ci_customer_saved_carts where userid='".$_SESSION['uid']."' limit 5";
	$sql = "select * from ci_customer_saved_carts where userid='" . $_SESSION['uid'] . "' ORDER BY datecreated DESC limit 5";
	$results = $db->rawQuery($sql);
	if (count($results) > 0) {
		return $results;
	} else {
		return '';
	}
}

function getStockNotifications()
{

	global $db;

	$user_email = get_selected('email');

	$sql = "select ci_customer_stock_alerts.gtin,ci_customer_stock_alerts.id,ci_customer_stock_alerts.createdate,ci_products.brandName,ci_products.styleName,ci_products.colorName,ci_products.sizeName from ci_customer_stock_alerts INNER JOIN `ci_products` ON `ci_products`.`gtin` = `ci_customer_stock_alerts`.`gtin` where email='" . $user_email . "' and sent != 1";

	$results = $db->rawQuery($sql);
	if (count($results) > 0) {
		return $results;
	} else {
		return '';
	}
}

// Start - Favorite Items Adjustments on customer dashboard - CL - 1122024
function getMostOrderedItems($limit = 15)
{
	global $db;

	$fav_cust = "SELECT op.styleID FROM ci_order_products op inner join ci_customer_orders co on co.customerOrderID=op.orderId  where co.customerId='" . $_SESSION['uid'] . "' group by op.styleID order by co.customerOrderID desc";

	$fav_results = $db->rawQuery($fav_cust);

	if (count($fav_results) <= 0) {
		return;
	}

	$style_id_lists = [];

	foreach ($fav_results as $value) {
		array_push($style_id_lists, $value['styleID']);
	}

	$items = $db->rawQuery("SELECT slug,customeseo,slugCategory,styleImage,brandslug,customTitle,brandName,styleID,brandImage,title,pPrice,pColors,pTotalColors,pmodelImage,styleImageStatus,bestsellerrank,cartGroupID FROM `ci_styles` where styleID IN (" . implode(', ', $style_id_lists) . ") and pPrice > 0 and isExistProduct=1 limit 0,$limit");

	return $items;
}
// End - Favorite Items Adjustments on customer dashboard - CL - 1122024

function getFavoriteItems($limit = 15) // Start - Show the Cart Group (i) on every product card - CL - 362023
{
	global $db;
	// New Item Card Design and Add-To-Cart Quick Popup - SF - 07/28/2025
	$userID = $_SESSION['uid'];
	$params = [$userID];

	// Get favorite items with isfavorite = 1 and preserve bestsellerrank
	$query = "
		SELECT 
			s.slug,
			s.customeseo,
			s.slugCategory,
			s.styleImage,
			s.brandslug,
			s.customTitle,
			s.brandName,
			s.styleID,
			s.brandImage,
			s.title,
			s.pPrice,
			s.pColors,
			s.pTotalColors,
			s.pmodelImage,
			s.styleImageStatus,
			s.bestsellerrank,
			s.cartGroupID,
			1 AS isfavorite
		FROM ci_styles s
		INNER JOIN ci_favorites f ON s.styleID = f.styleID
		WHERE f.userID = ? AND s.isExistProduct = 1 AND s.cartGroupID != 10 -- Start - Gangsheet Integration - 08/15/2025
		ORDER BY s.bestsellerrank ASC
		LIMIT 0, $limit
	";

	$bestsellers = $db->rawQuery($query, $params);

	return $bestsellers;
	// New Item Card Design and Add-To-Cart Quick Popup - SF - 07/28/2025
}


function getCustomBannerBySlug($slug)
{
	global $db;
	$custom_banner = $db->rawQueryOne("select * from ci_custom_banners where slug='" . $slug . "'");
	if (!empty($custom_banner)) {
		return $custom_banner;
	} else {
		return "";
	}
}

function getCustomResults()
{
	global $db;
	$custom_result = $db->rawQueryOne("select * from ci_custom_results");
	if (!empty($custom_result)) {
		return $custom_result;
	} else {
		return "";
	}
}


function bestsellersByCustom()
{
	global $db;
	$params = array();

	$bestsellers = $db->rawQuery("SELECT style.slug,style.customeseo,style.slugCategory,style.styleImage,style.brandslug,style.customTitle,style.brandName,style.styleID,style.brandImage,style.title,style.pPrice,style.pColors,style.pTotalColors,style.pmodelImage,style.styleImageStatus,style.bestsellerrank,style.ribbonText,style.ribbonPosition,style.ribbonShadow,style.ribbonStyle,style.ribbonColor,style.ribbonTextColor,style.cartGroupID FROM ci_styles as style inner join ci_customresult_styles as custom on custom.styleid=style.styleID order by custom.position"); // Start - Show the Cart Group (i) on every product card - new checkout - CL 2152023-1234pm

	return $bestsellers;
}

function getItemsBySku($sku_lists)
{
	global $db;

	$sku_lists = explode(',', $sku_lists);

	//$sku_lists[] = "B00060008";

	$params = array();
	$query = "SELECT sku,sizeName,colorName,styleName,brandName,qty FROM `ci_products` where sku IN ('" . implode("', '", $sku_lists) . "')";

	$data = $db->rawQuery($query);

	if (!empty($data)) {
		return $data;
	} else {
		return [];
	}
}

function customSorting(&$items, $top, $index)
{
	// usort($items, function ($a, $b) use ($top, $index) {
	// 	if (in_array($a[$index], $top) && in_array($b[$index], $top))
	// 		return 0;

	// 	if (in_array($a[$index], $top))
	// 		return -1;

	// 	if (in_array($b[$index], $top))
	// 		return 1;

	// 	return $a[$index] > $b[$index] ? 1 : -1;
	// });
	$result = array_reduce($items, function ($result, $item) use ($top, $index) {
		if (in_array($item[$index], $top))
			array_push($result['top'], $item);
		else
			array_push($result['rest'], $item);
		return $result;
	}, ['top' => [], 'rest' => []]);

	usort($result['top'], function ($a, $b) use ($top, $index) {
		$pos_a = array_search($a[$index], $top);
		$pos_b = array_search($b[$index], $top);
		return $pos_a - $pos_b;
	});

	$items = array_merge($result['top'], $result['rest']);

	return $items;
}

function customSortingBrand(&$items, $top, $index)
{
	$result = array_reduce($items, function ($result, $item) use ($top) {
		if (in_array($item['brandslug'], $top))
			array_push($result['top'], $item);
		else
			array_push($result['rest'], $item);
		return $result;
	}, ['top' => [], 'rest' => []]);

	usort($result['top'], function ($a, $b) use ($top) {
		$pos_a = array_search($a['brandslug'], $top);
		$pos_b = array_search($b['brandslug'], $top);
		return $pos_a - $pos_b;
	});

	$items = array_merge($result['top'], $result['rest']);

	return $items;
}

function get_shopfor_total_multi($lists, $category_id, $where1 = false)
{
	global $db;
	$sTotal = 0;
	if ($where1 != false) {

		$lists[] = $category_id;

		$arraycondition = [];

		foreach ($lists as $value) {
			$arraycondition[] = 'FIND_IN_SET(' . $value . ', categories)';
		}

		$arraycondition = '(' . implode(' OR ', $arraycondition) . ')';

		$whereConditions .= " where " . $arraycondition;

		$whereConditions .= $where1;

		// Start - Double check filter issue and count - AP - 02/24/2021
		// $sql = "SELECT count(styleID) as total FROM `ci_styles` $whereConditions and pPrice!='0.00' and isExistProduct=1 and bestsellerrank<>0 ";
		$sql = "SELECT COUNT(*) as styleNum FROM (SELECT ci_styles.styleID FROM `ci_styles` INNER JOIN `ci_products` ON `ci_products`.`styleID` = `ci_styles`.`styleID`  $whereConditions and isExistProduct=1 AND ci_products.qty > 0 and bestsellerrank<>0 GROUP BY ci_styles.styleID) as aggr";

		$fabr = $db->rawQueryOne($sql);
		$sTotal = $fabr['styleNum'];

		// foreach ($fabr as $kk => $vv) {
		// 	$sTotal = $sTotal + $vv['total'];
		// }
		// End - Double check filter issue and count - AP - 02/24/2021

		if (intval($sTotal) > 0) {
			return $sTotal;
		} else {
			return 0;
		}
	}
}


function getTotalLBrandsMulti($lists, $brand, $where1 = false)
{
	global $db;
	$sTotal = 0;

	$lists[] = $brand;

	$whereConditions .= "brandslug IN ('" . implode("','", $lists) . "')";

	$whereConditions .= $where1;

	$sql = "SELECT count(styleID) as total FROM ci_styles where  " . $whereConditions . "  and pPrice!='0.00' and isExistProduct=1 and bestsellerrank<>0  order by  styleID ASC";

	$clor = $db->rawQuery($sql);

	foreach ($clor as $kk => $vv) {
		$sTotal = $sTotal + $vv['total'];
	}

	if (intval($sTotal) > 0) {
		return $sTotal;
	} else {
		return 0;
	}
}

function get_fabric_total_multi($lists, $fabricid, $where1 = false)
{
	global $db;
	$sTotal = 0;

	$lists[] = $fabricid;

	$arraycondition = [];

	foreach ($lists as $value) {
		$arraycondition[] = 'FIND_IN_SET(' . $value . ', categories)';
	}

	$arraycondition = '(' . implode(' OR ', $arraycondition) . ')';

	$whereConditions .= " where " . $arraycondition;

	$whereConditions .= $where1;

	// Start - Double check filter issue and count - AP - 02/24/2021
	// $sql = "SELECT count(styleID) as total FROM `ci_styles` $whereConditions and pPrice > 0 and isExistProduct=1";
	$sql = "SELECT COUNT(*) as styleNum FROM (SELECT ci_styles.styleID FROM `ci_styles` INNER JOIN `ci_products` ON `ci_products`.`styleID` = `ci_styles`.`styleID` $whereConditions and isExistProduct=1 AND ci_products.qty > 0 and bestsellerrank<>0 GROUP BY ci_styles.styleID) as aggr";

	$fabr = $db->rawQueryOne($sql);
	$sTotal = $fabr['styleNum'];

	// foreach ($fabr as $kk => $vv) {
	// 	$sTotal = $sTotal + $vv['total'];
	// }
	// End - Double check filter issue and count - AP - 02/24/2021

	if (intval($sTotal) > 0) {
		return $sTotal;
	} else {
		return 0;
	}
}

function get_color_total_multi($lists, $color, $where1 = false)
{
	global $db;

	$lists[] = $color;

	$whereConditions .= "pColorsId IN ('" . implode("','", $lists) . "')";

	$whereConditions .= $where1;

	$sql = "SELECT count(styleID) as total FROM ci_styles where " . $whereConditions . " and isExistProduct=1   order by  styleID ASC";

	$clor = $db->rawQuery($sql);

	foreach ($clor as $kk => $vv) {
		$sTotal = $sTotal + $vv['total'];
	}

	if (intval($sTotal) > 0) {
		return $sTotal;
	} else {
		return 0;
	}
}

function get_size_total_multi($lists, $sizeId, $where1 = false)
{
	global $db;

	$lists[] = $sizeId;

	$arraycondition = [];

	foreach ($lists as $value) {
		$arraycondition[] = "FIND_IN_SET('" . str_replace("!", " ", $value) . "', pSizesId)";
	}

	$arraycondition = '(' . implode(' OR ', $arraycondition) . ')';

	$whereConditions .= $arraycondition;

	$whereConditions .= $where1;

	// Start - Double check filter issue and count - AP - 02/24/2021
	// $sql = "SELECT count(styleID) as total FROM ci_styles where " . $whereConditions . " and isExistProduct=1   order by  styleID ASC";
	$sql = "SELECT COUNT(*) as styleNum FROM (SELECT ci_styles.styleID FROM `ci_styles` INNER JOIN `ci_products` ON `ci_products`.`styleID` = `ci_styles`.`styleID` WHERE $whereConditions and isExistProduct=1 AND ci_products.qty > 0 and bestsellerrank<>0 GROUP BY ci_styles.styleID) as aggr";

	$clor = $db->rawQueryOne($sql);
	$sTotal = $clor['styleNum'];

	// foreach ($clor as $kk => $vv) {
	// 	$sTotal = $sTotal + $vv['total'];
	// }
	// End - Double check filter issue and count - AP - 02/24/2021

	if (intval($sTotal) > 0) {
		return $sTotal;
	} else {
		return 0;
	}
}

function get_customstyle_total_multi($lists, $cstyleid, $where1 = false)
{
	global $db;
	$sTotal = 0;

	$lists[] = $cstyleid;

	$arraycondition = [];

	foreach ($lists as $value) {
		$arraycondition[] = 'FIND_IN_SET(' . $value . ', categories)';
	}

	$arraycondition = '(' . implode(' OR ', $arraycondition) . ')';

	$whereConditions .= " where " . $arraycondition;

	$whereConditions .= $where1;

	// Start - Double check filter issue and count - AP - 02/24/2021
	// $sql = "SELECT count(styleID) as total FROM `ci_styles` $whereConditions and pPrice>0 and isExistProduct=1 ";
	$sql = "SELECT COUNT(*) as styleNum FROM (SELECT ci_styles.styleID FROM `ci_styles` INNER JOIN `ci_products` ON `ci_products`.`styleID` = `ci_styles`.`styleID` $whereConditions and isExistProduct=1 AND ci_products.qty > 0 and bestsellerrank<>0 GROUP BY ci_styles.styleID) as aggr";

	$fabr = $db->rawQueryOne($sql);
	$sTotal = $fabr['styleNum'];

	// foreach ($fabr as $kk => $vv) {
	// 	$sTotal = $sTotal + $vv['total'];
	// }
	// End - Double check filter issue and count - AP - 02/24/2021

	if (intval($sTotal) > 0) {
		return $sTotal;
	} else {
		return 0;
	}
}

function get_fit_total_multi($lists, $fitId, $where1 = false)
{
	global $db;
	$sTotal = 0;

	$lists[] = $fitId;

	$arraycondition = [];

	foreach ($lists as $value) {
		$arraycondition[] = 'FIND_IN_SET(' . $value . ', categories)';
	}

	$arraycondition = '(' . implode(' OR ', $arraycondition) . ')';

	$whereConditions .= " where " . $arraycondition;

	$whereConditions .= $where1;

	// Start - Double check filter issue and count - AP - 02/24/2021
	// $sql = "SELECT count(styleID) as total FROM `ci_styles` $whereConditions and pPrice>0 and isExistProduct=1 ";
	$sql = "SELECT COUNT(*) as styleNum FROM (SELECT ci_styles.styleID FROM `ci_styles` INNER JOIN `ci_products` ON `ci_products`.`styleID` = `ci_styles`.`styleID` $whereConditions and isExistProduct=1 AND ci_products.qty > 0 and bestsellerrank<>0 GROUP BY ci_styles.styleID) as aggr";

	$fabr = $db->rawQueryOne($sql);
	$sTotal = $fabr['styleNum'];

	// foreach ($fabr as $kk => $vv) {
	// 	$sTotal = $sTotal + $vv['total'];
	// }
	// End - Double check filter issue and count - AP - 02/24/2021

	if (intval($sTotal) > 0) {
		return $sTotal;
	} else {
		return 0;
	}
}

function deleteItemZeroQTY($sku)
{

	global $db;
	$currentOrder = $_SESSION['currentOrder'];

	if (isset($sku) && $sku != "") {

		$arr = array();

		foreach ($currentOrder as $key => $val) {
			if ($sku != $val['pid']) {
				$arr[$key]['oid'] = $val['oid'];
				$arr[$key]['pid'] = $val['pid'];
				$arr[$key]['qty'] = $val['qty'];
			} else {
				if (isset($_SESSION["uid"]) || isset($_COOKIE["csid"])) {
					if (isset($_COOKIE["csid"]) && $_COOKIE["csid"] != "") {
						$delscart = $db->rawQuery("delete from ci_abdoncart where abd_oid = ? and abd_pid = ? and abd_cokiesid = ?", [$val['oid'], $val['pid'], $_COOKIE["csid"]]);
						$db->rawQuery('UPDATE ci_abdoncart_shadow SET ci_abdoncart_shadow.status = 3, ci_abdoncart_shadow.updated_at = ? WHERE abd_oid = ? AND abd_pid = ? AND abd_cokiesid = ?', [date('Y-m-d H:is:'), $val['oid'], $val['pid'], $_COOKIE["csid"]]); // Start - Authnet response implementation - AP - 02/28/2022
					} else {
						$delscart = $db->rawQuery("delete from ci_abdoncart where abd_oid = ? and abd_pid = ? and abd_cid = ?", [$val['oid'], $val['pid'], $_SESSION["uid"]]);
						$db->rawQuery('UPDATE ci_abdoncart_shadow SET ci_abdoncart_shadow.status = 3, ci_abdoncart_shadow.updated_at = ? WHERE abd_oid = ? AND abd_pid = ? AND abd_cokiesid = ?', [date('Y-m-d H:i:s'), $val['oid'], $val['pid'], $_SESSION["uid"]]); // Start - Authnet response implementation - AP - 02/28/2022
					}
				}
			}
		}

		$_SESSION['currentOrder'] = $arr;
	}

	unset($_SESSION["estimateDel"][$sku]);
}

// Start - Use Alpha Inventory in Bulkapparel. possible switch in admin - AP - 10/19/2020
define('INVENTORY_SNS', 1);
define('INVENTORY_ALP', 2);
function getInventoryVendor()
{
	global $db;
	$inventoryUsed = $db->rawQuery("SELECT columndata FROM ci_admin_settings WHERE columnname = 'inventoryvendor'");
	if ($inventoryUsed[0]['columndata'] == 'sns')
		return INVENTORY_SNS;
	// $table = 'ci_alpha_products';
	else
		return INVENTORY_ALP;
	// $table = 'ci_products';
}
// End - Use Alpha Inventory in Bulkapparel. possible switch in admin - AP - 10/19/2020

function dynamicOption($option_id)
{
	global $db;

	$shipping_option = $db->rawQueryOne("select amount from ci_shipping_options where id='" . $option_id . "'");

	if (!empty($shipping_option)) {
		return $shipping_option['amount'];
	} else {
		return SHIPPINGCHARGE;
	}
}

function getDynamicOption($option_id)
{
	global $db;

	$shipping_option = $db->rawQueryOne("select * from ci_shipping_options where id=?", [$option_id]);

	return $shipping_option;
}

function shippingOptionStatus()
{
	global $db;

	$shipping_option_status = $db->rawQueryOne("select columndata from ci_admin_settings where columnname='shippingoption'");

	if (!empty($shipping_option_status)) {
		return $shipping_option_status['columndata'];
	} else {
		return 1;
	}
}

function dynamicEstDel()
{
	global $db;

	//Start - can we add a way for orders under $50 to show an extra day - RM - 12/10/2020
	$estdelamount = $db->rawQueryOne("select columndata from ci_admin_settings where columnname='estdelamount'");

	if (totalCartPrice() >= $estdelamount['columndata']) {
		$estdel = $db->rawQueryOne("select columndata from ci_admin_settings where columnname='estdel'");
	} else {
		$estdel = $db->rawQueryOne("select columndata from ci_admin_settings where columnname='estdellower'");
	}
	//End - can we add a way for orders under $50 to show an extra day - RM - 12/10/2020

	if (!empty($estdel)) {
		return $estdel['columndata'];
	} else {
		return 1;
	}
}


function dynamicThemes()
{
	global $db;

	$theme = $db->rawQueryOne("select columndata from ci_admin_settings where columnname='themes'");

	$array_css = ['themes--default', 'themes--christmas', 'themes--new-year', 'themes--thanks-giving', 'themes--halloween', 'themes--valentines', 'themes--st-patrick-day', 'themes--independence-day']; // Start - Independence day theme -  Valentine themes mockup - CL - 1212021-1130am

	if (!empty($theme)) {
		return $array_css[$theme['columndata']];
	} else {
		return 'themes--default';
	}
}

function parseFloatValue($value)
{
	$numeric = filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	$floatValue = floatval($numeric);
	return round($floatValue, 2);
}

function getStylesByColorName($colorName)
{
	global $db;
	$colors = $db->rawQuery('SELECT DISTINCT styleID from ci_products where colorName = ?', array($colorName));
	$lists = [];
	if (!empty($colors)) {
		foreach ($colors as $key => $value) {
			array_push($lists, $value['styleID']);
		}
		return $lists;
	} else {
		return false;
	}
}

function getStylesByColorNameLoose($colorName)
{
	global $db;
	$colors = $db->rawQuery('SELECT DISTINCT styleID from ci_products where colorName LIKE "%' . $colorName . '%"', array());
	$lists = [];
	if (!empty($colors)) {
		foreach ($colors as $key => $value) {
			array_push($lists, $value['styleID']);
		}
		return $lists;
	} else {
		return false;
	}
}

function getStylesByColorGroup($colorGroup)
{
	global $db;
	$colors = $db->rawQuery('SELECT styleID from ci_products where ci_products.colorGroup = ? AND qty > 0 AND isDS = 0 AND colorStatus = 0 AND sizeStatus = 0 GROUP BY ci_products.styleID', array($colorGroup));

	return array_column($colors, 'styleID');
	$lists = [];
	if (!empty($colors)) {
		foreach ($colors as $key => $value) {
			array_push($lists, $value['styleID']);
		}
		return $lists;
	} else {
		return false;
	}
}

function getFeedbackCategory()
{
	global $db;
	$categories = $db->rawQuery("select * from ci_feedback_category order by id"); //Start - Why is Customer Support the first option in Feedback - RM - 02/15/2021
	if (!empty($categories)) {
		return $categories;
	} else {
		return false;
	}
}

function customRelatedProductEmail($comparableGroup = false, $stid = false, $limit = false)
{
	global $db;
	if (empty($comparableGroup) || empty($stid))
		return [];

	$sql = "SELECT slug,slugCategory,styleImage,customTitle,ci_styles.styleID,ci_styles.brandImage,ci_styles.brandName, title,pPrice,pColors,pTotalColors,styleImageStatus,pmodelImage,ci_styles.cartGroupID FROM `ci_styles` INNER JOIN ci_products ON ci_products.styleID = ci_styles.styleID where comparableGroup='" . $comparableGroup . "' and ci_styles.styleID<>$stid and pPrice>0 and isExistProduct=1 AND ci_products.qty > 0 GROUP BY ci_styles.styleID order by bestsellerrank asc LIMIT 0, $limit";

	$results = $db->rawQuery($sql);

	return $results;
}

function customerWhoViewProductEmail($companionGroup = false, $stid = false, $limit = false)
{
	global $db;
	if (empty($companionGroup) || empty($stid))
		return [];

	$sql = "SELECT slug,slugCategory,styleImage,customTitle,ci_styles.styleID,ci_styles.brandImage, ci_styles.brandName, title,pPrice,pColors,pTotalColors,styleImageStatus,pmodelImage,ci_styles.cartGroupID FROM `ci_styles` INNER JOIN ci_products ON ci_products.styleID = ci_styles.styleID where companionGroup='" . $companionGroup . "' and ci_styles.styleID<>$stid and pPrice>0 and isExistProduct=1 AND ci_products.qty > 0 GROUP BY ci_styles.styleID order by bestsellerrank asc LIMIT 0, $limit";

	$results = $db->rawQuery($sql);

	return $results;
}

function checkAddonShow($code)
{
	global $db;
	$addon = $db->rawQueryOne("select * from ci_emails_addon where code=? and isShow=?  ", array($code, 1));
	if (count($addon) > 0) {
		return true;
	} else {
		return false;
	}
}

function customProductEmail($limit = false)
{
	global $db;

	$sql = "select *, style.cartGroupID as cartGroupID from ci_products_email as productemail inner join ci_styles as style on productemail.styleid=style.id order by productemail.position ASC limit 0, $limit"; //Start - alpha adjustments - RM - 02/13/2024 added cartGroupID

	$results = $db->rawQuery($sql);

	return $results;
}

function checkBrandExists($slug)
{
	global $db;
	$brands = $db->rawQuery("SELECT brandName,brandslug FROM `ci_styles` where brandslug = '" . $slug . "' group by brandName order by brandName ASC");
	if (count($brands) > 0) {
		return true;
	} else {
		return false;
	}
}

function checkBrandExistsAndActive($slug)
{
	global $db;
	$brands = $db->rawQuery("SELECT brandName,brandslug FROM `ci_styles` where brandslug = '" . $slug . "' AND brandstatus = 0 group by brandName order by brandName ASC");
	if (count($brands) > 0) {
		return true;
	} else {
		return false;
	}
}

function getmetaDataBrandPage($data)
{
	global $db;

	$activePage = trim($_SERVER['REQUEST_URI'], '/');

	$sql = "select metatitle,metakeywords,metadescription from ci_brand_seo where brandslug =?";

	$results = $db->rawQueryOne($sql, [$activePage]);

	if (!empty($results) && count($results) > 0) {
		return $results[$data];
	} else {
		return false;
	}
}

function loadCustomLinks()
{

	global $db;

	$sql = "select * from ci_sublinks where isEnabled=1 order by position";

	$results = $db->rawQuery($sql);

	if (count($results) > 0) {
		foreach ($results as $row) {
			$data[] = $row;
		}
		return $data;
	}

	return false;
}

function loadBannerImages($bannerid)
{

	global $db;

	// START - ADS BANNER POSITION [FEEDBACK] - JA - 06202023
	// $sql = "select * from ci_adsbanner_images where adsbannerId=".$bannerid." and isdisabled = 0";
	$sql = "select * from ci_adsbanner_images where adsbannerId=" . $bannerid . " and isdisabled = 0 ORDER BY position ASC";
	// END - ADS BANNER POSITION [FEEDBACK] - JA - 06202023

	$results = $db->rawQuery($sql);

	if (count($results) > 0) {
		foreach ($results as $row) {
			$data[] = $row;
		}
		return $data;
	}

	return false;
}

function loadBannerDetails($bannerid)
{
	global $db;

	$banner = $db->rawQueryOne("select * from ci_adsbanner where id=" . $bannerid . "");

	if (!empty($banner)) {
		return $banner['speed'];
	} else {
		return false;
	}
}

function loadBannerDetailsHomepage()
{
	global $db;

	$banner = $db->rawQueryOne("select * from ci_adsbanner where sethomepage=1");

	if (!empty($banner)) {
		return $banner;
	} else {
		return false;
	}
}

function fetchBanners($slug)
{

	global $db;


	if ($slug == "pdetails") {
		$sql = "SELECT * FROM ci_banners AS details INNER JOIN ci_banner_images AS images ON details.id = images.bannerId WHERE details.chkproductdetails = 1 AND images.status = 1 ORDER BY CASE WHEN images.position IS NULL THEN 1 ELSE 0 END, images.position ASC";
	} else {
		$sql = "SELECT * FROM ci_banners AS details INNER JOIN ci_banner_images AS images ON details.id = images.bannerId WHERE images.status = 1 AND FIND_IN_SET('$slug', details.pageslugs) ORDER BY CASE WHEN images.position IS NULL THEN 1 ELSE 0 END, images.position ASC";
	}

	$results = $db->rawQuery($sql);

	return [
		"images" => $results,
		"speed" => !empty($results) ? $results[0]["speed"] : 0
	];
}

function loadSupportList($supportid)
{

	global $db;

	$sql = "select * from ci_support_lists where supportid='" . $supportid . "' order by position"; //Start - Help FAQ page issues - RM - 02/01/2022

	$results = $db->rawQuery($sql);

	if (count($results) > 0) {
		foreach ($results as $row) {
			$data[] = $row;
		}
		return $data;
	}

	return false;
}

function getSupportContent($id)
{
	global $db;
	$support = $db->rawQueryOne("select * from ci_support_pages where id='" . $id . "'");
	if (!empty($support)) {
		return $support;
	} else {
		return "";
	}
}

// Start - Make Bulkapparel works on IE Browser - CL - 06212021
function isInternetExplorer()
{
	$arr_browsers = ["Opera", "Edg", "Chrome", "Safari", "Firefox", "MSIE", "Trident"];

	$agent = $_SERVER['HTTP_USER_AGENT'];

	$user_browser = '';
	foreach ($arr_browsers as $browser) {
		if (strpos($agent, $browser) !== false) {
			$user_browser = $browser;
			break;
		}
	}
	if ($user_browser == 'MSIE' || $user_browser == 'Trident') {
		return true;
	} else {
		return false;
	}
}
// End - Make Bulkapparel works on IE Browser - CL - 06212021

function loadHelpCenterSearch($search)
{

	global $db;

	$sql = "select * from ci_support_lists WHERE title LIKE '%" . $search . "%'";
	$results = $db->rawQuery($sql);

	if (count($results) > 0) {
		foreach ($results as $row) {
			$data[] = $row;
		}
		return $data;
	}

	return false;
}

function getCategoryLocalFilter()
{
	global $db;

	$query = <<<SQL
		SELECT ci_category_local.catEDIid, ci_category_local.name, ci_category.slug
		FROM ci_category_local
		INNER JOIN ci_category ON ci_category.categoryID = ci_category_local.catEDIid
		WHERE ci_category_local.showOnHome = 1
SQL;

	return $db->rawQuery($query);
}

function getCategoryFilter($categoryLocals)
{
	global $db;

	// Supporting categories (fetch_products_multi.php adds these IDs in query)
	$supportingCategories = [
		['catEDIid' => 9],
		['catEDIid' => 18],
		['catEDIid' => 25],
		['catEDIid' => 102],
	];

	$categoryLocals = array_map(function ($categoryLocal) {
		return " FIND_IN_SET('{$categoryLocal['catEDIid']}', ci_styles.categories) ";
	}, array_merge($categoryLocals, $supportingCategories));

	$categoryLocals = implode(' OR ', $categoryLocals);

	$query = <<<SQL
		SELECT
			ci_styles.styleID,
			ci_styles.categories
		FROM ci_styles
		INNER JOIN ci_products ON ci_products.styleID = ci_styles.styleID
		WHERE ci_products.qty > 0
		AND ci_styles.isExistProduct = 1
		AND ci_styles.bestsellerrank <> 0
		AND ci_styles.pPrice >= 1
		AND ci_products.isDs = 0 -- Start - Must FIX filters before we put SL6 LIVE, I ran into a lot of issues on live this weekend when trying to use filters - RM - 01/03/2021
		AND ci_products.colorStatus = '0'
		AND ci_products.sizeStatus = '0'
		AND (
			$categoryLocals	
		)
		GROUP BY ci_styles.styleID
SQL;

	return $db->rawQuery($query);
}

function getShopForFilter($categoryLocals, $categoryDefault = "")
{
	global $db;

	$categoryLocals = array_map(function ($categoryLocal) {
		return " FIND_IN_SET('{$categoryLocal['categoryID']}', ci_styles.categories) ";
	}, $categoryLocals);

	$categoryLocals = implode(' OR ', $categoryLocals);

	//Start - Must FIX filters before we put SL6 LIVE, I ran into a lot of issues on live this weekend when trying to use filters - RM - 01/11/2022
	$queryDefault = "";
	if (!empty($categoryDefault)) {
		if (is_array($categoryDefault)) {

			foreach ($categoryDefault['main_category'] as $main_category) {
				$queryDefault .= customCategoryQuery($main_category);
			}

			foreach ($categoryDefault['categories'] as $category) {
				$queryDefault .= $category;
			}

			foreach ($categoryDefault['sizes'] as $size) {
				$queryDefault .= $size;
			}

			foreach ($categoryDefault['brands'] as $brand) {
				$queryDefault .= "AND ci_styles.brandslug = '$brand'";
			}

			foreach ($categoryDefault['pid'] as $pid) {
				$pricerange = explode("|", $pid);
				if (count($pricerange) > 1) {
					$queryDefault .= " AND (pPrice BETWEEN " . $pricerange[0] . " AND " . $pricerange[1] . ") ";
				} else {
					$queryDefault .= " AND (pPrice = " . $pricerange[0] . ") ";
				}
			}

			foreach ($categoryDefault['filterq'] as $filterq) {
				$queryDefault .= customFilterQuery($filterq);
			}
		} else {
			//$queryDefault = "AND FIND_IN_SET($categoryDefault, ci_styles.categories)";
			$queryDefault .= customCategoryQuery($categoryDefault);
		}
	}
	//End - Must FIX filters before we put SL6 LIVE, I ran into a lot of issues on live this weekend when trying to use filters - RM - 01/11/2022

	$query = <<<SQL
		SELECT
			ci_styles.styleID,
			ci_styles.categories
		FROM ci_styles
		INNER JOIN ci_products ON ci_products.styleID = ci_styles.styleID
		WHERE ci_products.qty > 0
		AND ci_styles.isExistProduct = 1
		AND ci_styles.bestsellerrank <> 0
		AND ci_styles.pPrice >= 1
		AND ci_products.isDs = 0 -- Start - Must FIX filters before we put SL6 LIVE, I ran into a lot of issues on live this weekend when trying to use filters - RM - 01/03/2021
		AND ci_products.colorStatus = '0'
		AND ci_products.sizeStatus = '0'
		$queryDefault
		AND (
			$categoryLocals	
		)
		GROUP BY ci_styles.styleID
SQL;

	return $db->rawQuery($query);
}

function getFabricFilter($categoryLocals, $categoryDefault = "")
{
	global $db;

	$categoryLocals = array_map(function ($categoryLocal) {
		return " FIND_IN_SET('{$categoryLocal['categoryID']}', ci_styles.categories) ";
	}, $categoryLocals);

	$categoryLocals = implode(' OR ', $categoryLocals);

	//Start - Must FIX filters before we put SL6 LIVE, I ran into a lot of issues on live this weekend when trying to use filters - RM - 01/11/2022
	$queryDefault = "";
	if (!empty($categoryDefault)) {
		if (is_array($categoryDefault)) {
			foreach ($categoryDefault['main_category'] as $main_category) {
				$queryDefault .= customCategoryQuery($main_category);
			}

			foreach ($categoryDefault['categories'] as $category) {
				$queryDefault .= $category;
			}

			foreach ($categoryDefault['sizes'] as $size) {
				$queryDefault .= $size;
			}

			foreach ($categoryDefault['brands'] as $brand) {
				$queryDefault .= "AND ci_styles.brandslug = '$brand'";
			}

			foreach ($categoryDefault['pid'] as $pid) {
				$pricerange = explode("|", $pid);
				if (count($pricerange) > 1) {
					$queryDefault .= " AND (pPrice BETWEEN " . $pricerange[0] . " AND " . $pricerange[1] . ") ";
				} else {
					$queryDefault .= " AND (pPrice = " . $pricerange[0] . ") ";
				}
			}

			foreach ($categoryDefault['filterq'] as $filterq) {
				$queryDefault .= customFilterQuery($filterq);
			}
		} else {
			//$queryDefault = "AND FIND_IN_SET($categoryDefault, ci_styles.categories)";
			$queryDefault .= customCategoryQuery($categoryDefault);
		}
	}
	//End - Must FIX filters before we put SL6 LIVE, I ran into a lot of issues on live this weekend when trying to use filters - RM - 01/11/2022

	$query = <<<SQL
		SELECT
			ci_styles.styleID,
			ci_styles.categories
		FROM ci_styles
		INNER JOIN ci_products ON ci_products.styleID = ci_styles.styleID
		WHERE ci_products.qty > 0
		AND ci_styles.isExistProduct = 1
		AND ci_styles.bestsellerrank <> 0
		AND ci_styles.pPrice >= 1
		AND ci_products.isDs = 0 -- Start - Must FIX filters before we put SL6 LIVE, I ran into a lot of issues on live this weekend when trying to use filters - RM - 01/03/2021
		AND ci_products.colorStatus = '0'
		AND ci_products.sizeStatus = '0'
		$queryDefault
		AND (
			$categoryLocals	
		)
		GROUP BY ci_styles.styleID
SQL;

	return $db->rawQuery($query);
}

function getColorFilter($categoryLocals, $categoryDefault = "")
{
	global $db;

	$categoryLocals = array_map(function ($categoryLocal) {
		return " FIND_IN_SET('{$categoryLocal['colorFamilyID']}', ci_styles.pColorsId) ";
	}, $categoryLocals);

	$categoryLocals = implode(' OR ', $categoryLocals);

	$queryDefault = "";
	if (!empty($categoryDefault)) {
		$queryDefault = "AND FIND_IN_SET($categoryDefault, ci_styles.categories)";
	}

	$query = <<<SQL
		SELECT
			ci_styles.styleID,
			ci_styles.categories,
			ci_styles.pColorsId
		FROM ci_styles
		INNER JOIN ci_products ON ci_products.styleID = ci_styles.styleID
		WHERE ci_products.qty > 0
		AND ci_styles.isExistProduct = 1
		AND ci_styles.bestsellerrank <> 0
		AND ci_styles.pPrice >= 1
		AND ci_products.colorStatus = '0'
		AND ci_products.sizeStatus = '0'
		$queryDefault
		AND (
			$categoryLocals	
		)
		GROUP BY ci_styles.styleID
SQL;

	return $db->rawQuery($query);
}

function getSizeFilter($categoryLocals, $categoryDefault = "")
{
	global $db;

	$categoryLocals = array_filter($categoryLocals, function ($categoryLocal) {
		return !empty($categoryLocal['sizeName']);
	});

	$categoryLocals = array_map(function ($categoryLocal) {
		$sizeName = addslashes($categoryLocal['sizeName']);
		return " FIND_IN_SET('{$sizeName}', ci_styles.pSizesId) ";
	}, $categoryLocals);

	$categoryLocals = implode(' OR ', $categoryLocals);

	//Start - Must FIX filters before we put SL6 LIVE, I ran into a lot of issues on live this weekend when trying to use filters - RM - 01/11/2022
	$queryDefault = "";
	if (!empty($categoryDefault)) {
		if (is_array($categoryDefault)) {
			foreach ($categoryDefault['main_category'] as $main_category) {
				$queryDefault .= customCategoryQuery($main_category);
			}

			foreach ($categoryDefault['categories'] as $category) {
				$queryDefault .= $category;
			}

			foreach ($categoryDefault['sizes'] as $size) {
				$queryDefault .= $size;
			}

			foreach ($categoryDefault['brands'] as $brand) {
				$queryDefault .= "AND ci_styles.brandslug = '$brand'";
			}

			foreach ($categoryDefault['pid'] as $pid) {
				$pricerange = explode("|", $pid);
				if (count($pricerange) > 1) {
					$queryDefault .= " AND (pPrice BETWEEN " . $pricerange[0] . " AND " . $pricerange[1] . ") ";
				} else {
					$queryDefault .= " AND (pPrice = " . $pricerange[0] . ") ";
				}
			}

			foreach ($categoryDefault['filterq'] as $filterq) {
				$queryDefault .= customFilterQuery($filterq);
			}
		} else {
			//$queryDefault = "AND FIND_IN_SET($categoryDefault, ci_styles.categories)";
			$queryDefault .= customCategoryQuery($categoryDefault);
		}
	}
	//End - Must FIX filters before we put SL6 LIVE, I ran into a lot of issues on live this weekend when trying to use filters - RM - 01/11/2022

	$query = <<<SQL
		SELECT
			ci_styles.styleID,
			ci_styles.categories,
			ci_styles.pSizesId
		FROM ci_styles
		INNER JOIN ci_products ON ci_products.styleID = ci_styles.styleID
		WHERE ci_products.qty > 0
		AND ci_styles.isExistProduct = 1
		AND ci_styles.bestsellerrank <> 0
		AND ci_styles.pPrice >= 1
		AND ci_products.isDs = 0 -- Start - Must FIX filters before we put SL6 LIVE, I ran into a lot of issues on live this weekend when trying to use filters - RM - 01/03/2021
		AND ci_products.colorStatus = '0'
		AND ci_products.sizeStatus = '0'
		$queryDefault
		AND (
			$categoryLocals	
		)
		GROUP BY ci_styles.styleID
SQL;

	return $db->rawQuery($query);
}


function getStyleFilter($categoryLocals, $categoryDefault = "")
{
	global $db;

	$categoryLocals = array_map(function ($categoryLocal) {
		return " FIND_IN_SET('{$categoryLocal['categoryID']}', ci_styles.categories) ";
	}, $categoryLocals);

	$categoryLocals = implode(' OR ', $categoryLocals);

	//Start - Must FIX filters before we put SL6 LIVE, I ran into a lot of issues on live this weekend when trying to use filters - RM - 01/11/2022
	$queryDefault = "";
	if (!empty($categoryDefault)) {
		if (is_array($categoryDefault)) {
			foreach ($categoryDefault['main_category'] as $main_category) {
				$queryDefault .= customCategoryQuery($main_category);
			}

			foreach ($categoryDefault['categories'] as $category) {
				$queryDefault .= $category;
			}

			foreach ($categoryDefault['sizes'] as $size) {
				$queryDefault .= $size;
			}

			foreach ($categoryDefault['brands'] as $brand) {
				$queryDefault .= "AND ci_styles.brandslug = '$brand'";
			}

			foreach ($categoryDefault['pid'] as $pid) {
				$pricerange = explode("|", $pid);
				if (count($pricerange) > 1) {
					$queryDefault .= " AND (pPrice BETWEEN " . $pricerange[0] . " AND " . $pricerange[1] . ") ";
				} else {
					$queryDefault .= " AND (pPrice = " . $pricerange[0] . ") ";
				}
			}

			foreach ($categoryDefault['filterq'] as $filterq) {
				$queryDefault .= customFilterQuery($filterq);
			}
		} else {
			//$queryDefault = "AND FIND_IN_SET($categoryDefault, ci_styles.categories)";
			$queryDefault .= customCategoryQuery($categoryDefault);
		}
	}
	//End - Must FIX filters before we put SL6 LIVE, I ran into a lot of issues on live this weekend when trying to use filters - RM - 01/11/2022

	$query = <<<SQL
		SELECT
			ci_styles.styleID,
			ci_styles.categories
		FROM ci_styles
		INNER JOIN ci_products ON ci_products.styleID = ci_styles.styleID
		WHERE ci_products.qty > 0
		AND ci_styles.isExistProduct = 1
		AND ci_styles.bestsellerrank <> 0
		AND ci_styles.pPrice >= 1
		AND ci_products.isDs = 0 -- Start - Must FIX filters before we put SL6 LIVE, I ran into a lot of issues on live this weekend when trying to use filters - RM - 01/03/2021
		AND ci_products.colorStatus = '0'
		AND ci_products.sizeStatus = '0'
		$queryDefault
		AND (
			$categoryLocals	
		)
		GROUP BY ci_styles.styleID
SQL;

	return $db->rawQuery($query);
}

function customCategoryQuery($categoryId)
{

	if ($categoryId == 59) {
		$stwhere = " AND (FIND_IN_SET($categoryId, ci_styles.categories) or FIND_IN_SET(9, ci_styles.categories))";
	} else if ($categoryId == 52) {
		$stwhere = " AND (FIND_IN_SET($categoryId, ci_styles.categories) or FIND_IN_SET(18, ci_styles.categories))";
	} else if ($categoryId == 49) {
		$stwhere = " AND (FIND_IN_SET($categoryId, ci_styles.categories) or FIND_IN_SET(25, ci_styles.categories))";
	} else if ($categoryId == 22) {
		$stwhere = " AND (FIND_IN_SET($categoryId, ci_styles.categories) or FIND_IN_SET(102, ci_styles.categories))";
	} else {
		$stwhere = " AND FIND_IN_SET($categoryId, ci_styles.categories)";
	}

	return $stwhere;
}

function customFilterQuery($filterq)
{

	$q = $filterq;
	$qchkSearchCategoryExit = chkSearchCategoryExit($q);
	if ($qchkSearchCategoryExit) {

		$catId = clean($qchkSearchCategoryExit);

		if ($catId == 59) {
			$wherConditions .= " AND (FIND_IN_SET($catId, categories) or FIND_IN_SET(9, categories))";
		} else if ($catId == 52) {
			$wherConditions .= " AND (FIND_IN_SET($catId, categories) or FIND_IN_SET(18, categories))";
		} else if ($catId == 49) {
			$wherConditions .= " AND (FIND_IN_SET($catId, categories) or FIND_IN_SET(25, categories))";
		} else if ($catId == 22) {
			$wherConditions .= " AND (FIND_IN_SET($catId, categories) or FIND_IN_SET(102, categories))";
		} else {
			$wherConditions .= " AND FIND_IN_SET($catId, categories)";
		}
	} else {

		$q = clean($q);
		$wherConditions .= " AND (";
		$wherConditions .= "  ci_styles.`brandName` like '%" . str_replace("'", '', $q) . "%'";
		$wherConditions .= " or ci_styles.`styleName` like '%" . str_replace("'", '', $q) . "%'";
		$wherConditions .= " or `title` like '%" . str_replace("'", '', $q) . "%'";
		$wherConditions .= " or `aka` like '%" . str_replace("'", '', $q) . "%'";
		$wherConditions .= " or ci_styles.`customTitle` like '%" . str_replace("'", '', $q) . "%'";
		$wherConditions .= " or ci_styles.`pColors` like '%" . str_replace("'", '', $q) . "%'";
		$wherConditions .= ")";
	}

	return $wherConditions;
}

function getBrandFilter($brands, $categoryDefault = "")
{
	global $db;

	$brands = array_map(function ($brand) {
		return addslashes($brand['brandslug']);
	}, $brands);

	$brands = "AND brandslug IN ('" . implode("', '", $brands) . "')";

	$queryDefault = "";
	if (!empty($categoryDefault)) {
		if (is_array($categoryDefault)) {
			foreach ($categoryDefault['main_category'] as $main_category) {
				$queryDefault .= customCategoryQuery($main_category);
			}

			foreach ($categoryDefault['categories'] as $category) {
				$queryDefault .= $category;
			}

			foreach ($categoryDefault['sizes'] as $size) {
				$queryDefault .= $size;
			}

			foreach ($categoryDefault['brands'] as $brand) {
				$queryDefault .= "AND ci_styles.brandslug = '$brand'";
			}

			foreach ($categoryDefault['pid'] as $pid) {
				$pricerange = explode("|", $pid);
				if (count($pricerange) > 1) {
					$queryDefault .= " AND (pPrice BETWEEN " . $pricerange[0] . " AND " . $pricerange[1] . ") ";
				} else {
					$queryDefault .= " AND (pPrice = " . $pricerange[0] . ") ";
				}
			}

			foreach ($categoryDefault['filterq'] as $filterq) {
				$queryDefault .= customFilterQuery($filterq);
			}
		} else {
			//$queryDefault = "AND FIND_IN_SET($categoryDefault, ci_styles.categories)";
			$queryDefault .= customCategoryQuery($categoryDefault);
		}
	}

	$query = <<<SQL
		SELECT
			ci_styles.styleID,
			ci_styles.brandslug
		FROM ci_styles
		INNER JOIN ci_products ON ci_products.styleID = ci_styles.styleID
		WHERE ci_products.qty > 0
		AND ci_styles.isExistProduct = 1
		AND ci_styles.bestsellerrank <> 0
		AND ci_styles.pPrice >= 1
		AND ci_products.isDs = 0 
		AND ci_products.colorStatus = '0'
		AND ci_products.sizeStatus = '0'
		$queryDefault
		$brands
		GROUP BY ci_styles.styleID
SQL;

	return $db->rawQuery($query);
}


function getFitFilter($categoryLocals, $categoryDefault = "")
{
	global $db;

	$categoryLocals = array_filter($categoryLocals, function ($categoryLocal) {
		return !empty($categoryLocal['categoryID']);
	});

	$categoryLocals = array_map(function ($categoryLocal) {
		return " FIND_IN_SET('{$categoryLocal['categoryID']}', ci_styles.categories) ";
	}, $categoryLocals);

	$categoryLocals = implode(' OR ', $categoryLocals);

	//Start - Must FIX filters before we put SL6 LIVE, I ran into a lot of issues on live this weekend when trying to use filters - RM - 01/11/2022
	$queryDefault = "";
	if (!empty($categoryDefault)) {
		if (is_array($categoryDefault)) {

			foreach ($categoryDefault['main_category'] as $main_category) {
				$queryDefault .= customCategoryQuery($main_category);
			}

			foreach ($categoryDefault['categories'] as $category) {
				$queryDefault .= $category;
			}

			foreach ($categoryDefault['sizes'] as $size) {
				$queryDefault .= $size;
			}

			foreach ($categoryDefault['brands'] as $brand) {
				$queryDefault .= "AND ci_styles.brandslug = '$brand'";
			}

			foreach ($categoryDefault['pid'] as $pid) {
				$pricerange = explode("|", $pid);
				if (count($pricerange) > 1) {
					$queryDefault .= " AND (pPrice BETWEEN " . $pricerange[0] . " AND " . $pricerange[1] . ") ";
				} else {
					$queryDefault .= " AND (pPrice = " . $pricerange[0] . ") ";
				}
			}

			foreach ($categoryDefault['filterq'] as $filterq) {
				$queryDefault .= customFilterQuery($filterq);
			}
		} else {
			//$queryDefault = "AND FIND_IN_SET($categoryDefault, ci_styles.categories)";
			$queryDefault .= customCategoryQuery($categoryDefault);
		}
	}
	//End - Must FIX filters before we put SL6 LIVE, I ran into a lot of issues on live this weekend when trying to use filters - RM - 01/11/2022

	$query = <<<SQL
		SELECT
			ci_styles.styleID,
			ci_styles.categories
		FROM ci_styles
		INNER JOIN ci_products ON ci_products.styleID = ci_styles.styleID
		WHERE ci_products.qty > 0
		AND ci_styles.isExistProduct = 1
		AND ci_styles.bestsellerrank <> 0
		AND ci_styles.pPrice >= 1
		AND ci_products.isDs = 0 -- Start - Must FIX filters before we put SL6 LIVE, I ran into a lot of issues on live this weekend when trying to use filters - RM - 01/03/2021
		AND ci_products.colorStatus = '0'
		AND ci_products.sizeStatus = '0'
		$queryDefault
		AND (
			$categoryLocals	
		)
		GROUP BY ci_styles.styleID
SQL;

	return $db->rawQuery($query);
}

function dynamicFooterCategory($category)
{
	global $db;

	$html = "";

	$categories = $db->rawQuery("SELECT * from ci_footer_links where category = " . $category . " order by id");

	//Start - Footer make it sortable - RM - 01/17/2023
	if ($category == 5) {
		$categories = $db->rawQuery("SELECT * from ci_footer_links where category = " . $category . " order by position asc");
	}
	//End - Footer make it sortable - RM - 01/17/2023

	//Start - Footer Fixes - RM - 05/23/2022
	if ($category == 4 || $category == 3) {
		return (!empty($categories)) ? $categories : '';
	}
	$pre_url = $category == 1 || $category == 2 ? base_url_site : '';

	foreach ($categories as $category) {
		//$html .= '<li class="footer__list-item"><a class="footer__list-link" href="' . base_url_site . $category['slug'] . '">' . $category['title'] . '</a></li>';
		$html .= '<li class="footer__list-item"><a class="footer__list-link" href="' . $pre_url . $category['slug'] . '">' . $category['title'] . '</a></li>'; //Start - Footer layout adjustment mockup  - RM - 11/23/2022
	}
	//End - Footer Fixes - RM - 05/23/2022

	return $html;
}

function sellerPermitRegex($negative_word)
{
	global $db;

	$negative_words = $db->rawQuery("SELECT word from ci_negativewords WHERE INSTR('" . $negative_word . "', `word`) > 0 ");

	if (!empty($negative_words)) {
		return $negative_words;
	} else {
		return false;
	}
}

function getAllCountBrands($brands, $where1 = false)
{
	global $db;
	$sTotal = 0;
	$whereConditions = $where1;

	if ($where1 != false) {

		$whereConditions .= " and brandslug IN('" . $brands . "')";

		//$sql = "SELECT COUNT(ci_styles.styleID) as styleNum, brandslug FROM `ci_styles` INNER JOIN `ci_products` ON `ci_products`.`styleID` = `ci_styles`.`styleID` where 1 $whereConditions and pPrice!='0.00' and isExistProduct=1 GROUP BY brandslug";
		$sql = "SELECT count(ci_styles.styleID) as styleNum, brandslug FROM `ci_styles` WHERE 1 $whereConditions and pPrice!='0.00' and isExistProduct=1 GROUP BY ci_styles.brandslug";

		$results = $db->rawQuery($sql);

		if (count($results) > 0) {
			foreach ($results as $row) {
				$data[] = $row;
			}
			return $data;
		}

		return false;
	} else {
		return false;
	}
}

function getShippoDetails($tracking_number)
{
	global $db;

	$tracking = $db->rawQueryOne("SELECT poNumber, shippingCarrier FROM `ci_orders` where trackingNumber=? ", array($tracking_number));

	if (count($tracking) > 0) {
		if ($tracking['shippingCarrier'] == "USPS") {
			$carrier = "usps";
		} elseif ($tracking['shippingCarrier'] == "UPS-Surface" || $tracking['shippingCarrier'] == "UPS-Surepost" || $tracking['shippingCarrier'] == "UPS") {
			$carrier = "ups";
		} elseif ($tracking['shippingCarrier'] == "FedEx") {
			$carrier = "fedex";
		} elseif ($tracking['shippingCarrier'] == "OnTrac") {
			$carrier = "ontrac";
		} else { //Start - Tracking page adjustments - RM - 04/28/2022
			return false;
		} //End - Tracking page adjustments - RM - 04/28/2022
	} else {
		return false;
		$carrier = "shippo";
	}

	$auth = 'Authorization: ShippoToken ' . getenv('SHIPPO_API');

	$host = "https://api.goshippo.com/tracks/";
	$ch = curl_init();
	$headers = [
		$auth,
		'Content-Type: application/json'
	];
	$postData = [
		'carrier' => $carrier,
		'tracking_number' => $tracking_number
	];
	curl_setopt($ch, CURLOPT_URL, $host);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$result = curl_exec($ch);
	$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

	return json_decode($result);
}

function extractShippoShipmentDates($trackingData)
{
	$shippedDate = null;
	$outForDeliveryDate = null;
	$deliveredDate = null;
	$estimatedDate = isset($trackingData['eta']) ? $trackingData['eta'] : null;

	if (isset($trackingData['tracking_history']) && is_array($trackingData['tracking_history'])) {
		foreach ($trackingData['tracking_history'] as $event) {
			if (isset($event['status'], $event['status_date'])) {
				if ($event['status'] === 'TRANSIT') {
					if (isset($event['substatus']['code']) && $event['substatus']['code'] === 'out_for_delivery') {
						$outForDeliveryDate = $event['status_date'];

						if ($event['substatus']['text'] == 'Package is out for delivery.') {
							$outForDeliveryDate = $event['status_date'];
						}
					} else {
						$shippedDate = $event['status_date'];
					}
				} elseif ($event['status'] === 'DELIVERED') {
					$deliveredDate = $event['status_date'];
				}
			}
		}
	}

	return [
		'carrier' => $trackingData['carrier'],
		'tracking_number' => $trackingData['tracking_number'],
		'shippedDate' => $shippedDate,
		'outForDeliveryDate' => $outForDeliveryDate,
		'deliveredDate' => $deliveredDate,
		'estimatedDate' => $estimatedDate,
	];
}

function getRefNumberTrack($tracking_number)
{
	global $db;

	$tracking = $db->rawQueryOne("SELECT poNumber FROM `ci_orders` where trackingNumber=? ", array($tracking_number));

	if (count($tracking) > 0) {

		$tracking['poNumber'] = str_replace('BULK-', '', $tracking['poNumber']);
		$order = $db->rawQueryOne("SELECT invoiceNo FROM `ci_customer_orders` where orderID=? ", array($tracking['poNumber']));

		if (count($order) > 0) {
			return $order['invoiceNo'];
		} else {
			return false;
		}
	} else {
		return false;
	}
}

function getProdCategoryDesc($slug)
{
	global $db;

	$activePage = trim($slug, '/');

	$sql = "select description from ci_product_categories where slug =?";

	$results = $db->rawQueryOne($sql, [$activePage]);

	if (!empty($results) && count($results) > 0) {
		return $results;
	} else {
		return false;
	}
}

function cartUnexpectedlyCleared()
{
	global $db;

	// refresh session currentOrder
	validateCart();

	// If cart is not empty, do nothing
	if (totalCartItems() > 0) {
		return false;
	}

	if (empty($_COOKIE['RefID']))
		return false;

	$carts = $db->rawQuery('SELECT * FROM ci_abdoncart_shadow WHERE refId = ? AND phpSession = ? AND status = 0 AND created_at > (NOW() - INTERVAL 6 HOUR)', [$_COOKIE['RefID'], session_id()]);

	return !empty($carts);
}

function recoverCartItems()
{
	global $db;

	// refresh session currentOrder
	validateCart();

	// If cart is not empty, do nothing
	if (totalCartItems() > 0) {
		return null;
	}

	if (empty($_COOKIE['RefID']))
		return null;

	$carts = $db->rawQuery('SELECT * FROM ci_abdoncart_shadow WHERE refId = ? AND status = 0 AND created_at > (NOW() - INTERVAL 6 HOUR)', [$_COOKIE['RefID']]);

	if (empty($carts))
		return null;

	$carts = array_map(function ($cart) {
		$cart['creation_date'] = $cart['created_at'];

		unset($cart['created_at']);
		unset($cart['abd_id']);
		unset($cart['status']);
		unset($cart['hasSentReminder']);
		unset($cart['updated_at']);
		unset($cart['phpSession']);

		return $cart;
	}, $carts);

	$identification = ['id' => null, 'column' => null];

	if (isset($_COOKIE["csid"]) && !empty($_COOKIE["csid"])) {
		$identification['id'] = $_COOKIE['csid'];
		$identification['column'] = 'abd_cokiesid';
	} elseif (isset($_SESSION['uid']) && !empty($_SESSION['uid'])) {
		$identification['id'] = $_SESSION['uid'];
		$identification['column'] = 'abd_cid';
	}

	if (empty($identification['id'])) {
		if (!empty($carts[0]['abd_cokiesid'])) {
			// restore cookie id
			setcookie('csid', $carts[0]['abd_cokiesid'], time() + 3600 * 24 * 7);
			setcookie('csid', $carts[0]['abd_cokiesid'], time() + 3600 * 24 * 7, '/');
		} elseif (!empty($carts[0]['abd_cid'])) {
			// restore session id
			$_SESSION["uid"] = $carts[0]['abd_cid'];
		}
	} else {
		$carts = array_map(function ($cart) use ($identification) {
			$cart['abd_cid'] = '';
			$cart['abd_cokiesid'] = '';
			$cart[$identification['column']] = $identification['id'];

			return $cart;
		}, $carts);
	}

	// repopulate ci_abdoncart

	$db->insertMulti('ci_abdoncart', $carts);

	return true;
}

function loadCannedMessage($styleid, $position, $defaultColor) //Start - Canned/Custom message is not showin when you click other color - RM - 12/12/2022
{
	global $db;
	$sql = "select ci_style_messages.size, ci_style_messages.position, ci_style_messages.color, ci_canned_messages.message, ci_style_messages.url, ci_style_messages.tab from ci_style_messages INNER JOIN ci_canned_messages ON ci_style_messages.cannedmessage = ci_canned_messages.id where type=1 AND styleid=? AND position=?";

	//Start - Canned/Custom message is not showin when you click other color - RM - 12/12/2022
	$sql .= " AND ((ci_style_messages.colorShow = ?) OR (ci_style_messages.colorShow = NULL OR ci_style_messages.colorShow = 'ALL'))";
	$results = $db->rawQueryOne($sql, [$styleid, $position, $defaultColor]);
	//End - Canned/Custom message is not showin when you click other color - RM - 12/12/2022

	if ($results) {
		return $results;
	} else {
		return [];
	}
}

function loadCustomMessage($styleid, $position, $defaultColor) //Start - Canned/Custom message is not showin when you click other color - RM - 12/12/2022
{
	global $db;
	$sql = "select * from ci_style_messages where type=0 AND styleid=? AND position=?";

	//Start - Canned/Custom message is not showin when you click other color - RM - 12/12/2022
	$sql .= " AND ((ci_style_messages.colorShow = ?) OR (ci_style_messages.colorShow = NULL OR ci_style_messages.colorShow = 'ALL'))";
	$results = $db->rawQueryOne($sql, [$styleid, $position, $defaultColor]);
	//End - Canned/Custom message is not showin when you click other color - RM - 12/12/2022

	if ($results) {
		return $results;
	} else {
		return [];
	}
}

function getTranslatedPaymentResponse($error)
{
	global $db;

	$result = $db->rawQueryOne('SELECT * FROM ci_payment_response WHERE code = ?', [$error->errorCode]);

	if (empty($result))
		return $error->errorText;

	if (empty($result['translated']))
		return $result['message'];

	return $result['translated'];
}

function getTranslatedPaymentResponsePaypal($error)
{
	global $db;

	$result = $db->rawQueryOne('SELECT * FROM ci_payment_response WHERE code = ? and message = ?', [$error->errorCode, $error->errorMsg]);

	if (empty($result))
		return $error->errorText;

	if (empty($result['translated']))
		return $result['message'];

	return $result['translated'];
}

// Start - Category mini blog options to display - CL - 482022
function truncateHtml($text, $length = 100, $ending = '...', $exact = true, $considerHtml = true)
{
	if ($considerHtml) {
		// if the plain text is shorter than the maximum length, return the whole text
		if (strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
			return $text;
		}
		// splits all html-tags to scanable lines
		preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);
		$total_length = strlen($ending);
		$open_tags = array();
		$truncate = '';
		foreach ($lines as $line_matchings) {
			// if there is any html-tag in this line, handle it and add it (uncounted) to the output
			if (!empty($line_matchings[1])) {
				// if it's an "empty element" with or without xhtml-conform closing slash
				if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $line_matchings[1])) {
					// do nothing
					// if tag is a closing tag
				} else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
					// delete tag from $open_tags list
					$pos = array_search($tag_matchings[1], $open_tags);
					if ($pos !== false) {
						unset($open_tags[$pos]);
					}
					// if tag is an opening tag
				} else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line_matchings[1], $tag_matchings)) {
					// add tag to the beginning of $open_tags list
					array_unshift($open_tags, strtolower($tag_matchings[1]));
				}
				// add html-tag to $truncate'd text
				$truncate .= $line_matchings[1];
			}
			// calculate the length of the plain text part of the line; handle entities as one character
			$content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', ' ', $line_matchings[2]));
			if ($total_length + $content_length > $length) {
				// the number of characters which are left
				$left = $length - $total_length;
				$entities_length = 0;
				// search for html entities
				if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', $line_matchings[2], $entities, PREG_OFFSET_CAPTURE)) {
					// calculate the real length of all entities in the legal range
					foreach ($entities[0] as $entity) {
						if ($entity[1] + 1 - $entities_length <= $left) {
							$left--;
							$entities_length += strlen($entity[0]);
						} else {
							// no more characters left
							break;
						}
					}
				}
				$truncate .= substr($line_matchings[2], 0, $left + $entities_length);
				// maximum lenght is reached, so get off the loop
				break;
			} else {
				$truncate .= $line_matchings[2];
				$total_length += $content_length;
			}
			// if the maximum length is reached, get off the loop
			if ($total_length >= $length) {
				break;
			}
		}
	} else {
		if (strlen($text) <= $length) {
			return $text;
		} else {
			$truncate = substr($text, 0, $length - strlen($ending));
		}
	}
	// if the words shouldn't be cut in the middle...
	if (!$exact) {
		// ...search the last occurance of a space...
		$spacepos = strrpos($truncate, ' ');
		if (isset($spacepos)) {
			// ...and cut the text in this position
			$truncate = substr($truncate, 0, $spacepos);
		}
	}
	// add the defined ending to the text
	$truncate .= $ending;
	if ($considerHtml) {
		// close all unclosed html-tags
		foreach ($open_tags as $tag) {
			$truncate .= '</' . $tag . '>';
		}
	}
	return $truncate;
}
// End - Category mini blog options to display - CL - 482022

function getFaqsByBrandSlug($slug)
{
	global $db;
	$sql = "select faqs, faqtitle, faqshow, faqsOnOff from ci_brand_seo where brandslug=?"; //Start - Faq Field Adjustments - RM - 05/23/2022
	$results = $db->rawQueryOne($sql, [$slug]);

	if (!empty($results)) {

		$data = [];
		$data['faqs'] = $results['faqs'];
		$data['faqtitle'] = $results['faqtitle'];
		$data['faqshow'] = $results['faqshow'];
		$data['faqsOnOff'] = $results['faqsOnOff']; //Start - Faq Field Adjustments - RM - 05/23/2022

		return $data;
	} else {
		return [];
	}
}

function getFaqsByCategorySlug($slug)
{
	global $db;
	$sql = "select faqs, faqtitle, faqshow, faqsOnOff from ci_category_meta where slug=? AND is_active = 1"; //Start - Faq Field Adjustments - RM - 05/23/2022
	$results = $db->rawQueryOne($sql, [$slug]);

	if (!empty($results)) {

		$data = [];
		$data['faqs'] = $results['faqs'];
		$data['faqtitle'] = $results['faqtitle'];
		$data['faqshow'] = $results['faqshow'];
		$data['faqsOnOff'] = $results['faqsOnOff']; //Start - Faq Field Adjustments - RM - 05/23/2022

		return $data;
	} else {
		return [];
	}
}

function getFaqsByCustomPageSlug($slug)
{
	global $db;
	$sql = "select faqs, faqtitle, faqshow, faqsOnOff from ci_custom_pages where custompagelink=?"; //Start - Faq Field Adjustments - RM - 05/23/2022
	$results = $db->rawQueryOne($sql, [$slug]);

	if (!empty($results)) {

		$data = [];
		$data['faqs'] = $results['faqs'];
		$data['faqtitle'] = $results['faqtitle'];
		$data['faqshow'] = $results['faqshow'];
		$data['faqsOnOff'] = $results['faqsOnOff']; //Start - Faq Field Adjustments - RM - 05/23/2022

		return $data;
	} else {
		return [];
	}
}

function headerAds()
{
	global $db;
	$sql = "select * from ci_headerads where status <> 1 order by position asc"; //Start - Header Ads Feedbacks - RM - 06/02/2022
	$results = $db->rawQuery($sql);

	if ($results) {
		return $results;
	} else {
		return '';
	}
}


// Start -  Update products image path for the email templates - CL - 2/15/2022 - Have FE prep all our Alpha Pics for model view in every color. - CL - 3232022
function newProductImagePath($image, $type = 'bulk-blank-shirts', $provider = null, $configs = [])
{
	global $imageManager;
	return $imageManager->productImagePath($image, $type, $provider, $configs);
}
// End -  Update products image path for the email templates - CL - 2/15/2022 - Have FE prep all our Alpha Pics for model view in every color - CL - 3232022
function menuProductImagePath($image, $category = 't-shirt', $size = 'size-35')
{
	$size = $size !== '' ? '/' . $size : '';

	return base_url_site . "includes/menu-items/images/$category$size/" . $image;
}

function menuColorImagePath($image)
{
	return base_url_site . 'includes/menu-items/images/colors/' . $image;
}

function productImageSize($type = 'bulk-blank-shirts')
{
	$size = PRODUCT_IMAGES_CONFIG[$type];
	return [
		"width" => $size['width'],
		"height" => $size['height']
	];
}

function loadProductMessage($styleid, $defautColor = "") //Start - Canned/Custom message is not showin when you click other color - RM - 12/08/2022
{
	global $db;

	$sql = "select 
		ci_style_messages.size, 
		ci_style_messages.position, 
		ci_style_messages.color, 
		ci_style_messages.type, 
		ci_style_messages.url, 
		ci_style_messages.tab,
		ci_style_messages.ishide, 
		ci_style_messages.custommessage, 
		ci_canned_messages.message as cannedmessage
		from ci_style_messages LEFT JOIN 
		ci_canned_messages ON ci_style_messages.cannedmessage = ci_canned_messages.id 
		where styleid=? AND ishide != 1";

	//Start - Canned/Custom message is not showin when you click other color - RM - 12/08/2022	
	if (!empty($defautColor)) {
		$sql .= " AND ((ci_style_messages.colorShow = ?) OR (ci_style_messages.colorShow = NULL OR ci_style_messages.colorShow = 'ALL'))";
		$results = $db->rawQuery($sql, [$styleid, $defautColor]);
	} else {
		$results = $db->rawQuery($sql, [$styleid]);
	}
	//End - Canned/Custom message is not showin when you click other color - RM - 12/08/2022

	if ($results) {
		return $results;
	} else {
		return [];
	}
}



// Reference: https://developers.google.com/analytics/devguides/collection/ga4/reference/events
function getStyleGoogleCategory($styleCategories)
{
	#region Category IDs
	$outerwear = 15;
	$jackets = 47;
	$pants = 37;
	$infants_toddlers = 12;
	$headwear = 11;
	$leggings = 133;
	$sweatpants = 106;
	$shorts = 43;
	$bottoms = 384;
	$backpacks = 111;
	$beanies = 120;
	$bags = 102;
	$blankets = 3;
	#endregion Category IDs

	$categories = [
		"Apparel & Accessories > Clothing > Baby & Toddler Clothing > Baby & Toddler Tops" => [$infants_toddlers],
		"Apparel & Accessories > Clothing Accessories > Headwear" => [$headwear, $beanies],
		"Apparel & Accessories > Clothing Accessories > Shorts" => [$shorts],
		"Apparel & Accessories > Clothing > Outerwear" => [$outerwear, $jackets],
		"Apparel & Accessories > Clothing > Pants" => [$leggings, $pants, $sweatpants, $bottoms],
		"Luggage & Bags > Backpacks" => [$backpacks],
		"Luggage & Bags > Shopping Totes" => [$bags],
		"Home & Garden > Lawn & Garden > Outdoor Living > Outdoor Blankets" => [$blankets]
	];
	$defaultCategory = "Apparel & Accessories > Clothing > Shirts & Tops";
	foreach ($categories as $googleCategory => $categoryIds) {
		if (!empty(array_intersect($categoryIds, $styleCategories))) {
			$defaultCategory = $googleCategory;

			break;
		}
	}

	return $defaultCategory;
}


function getCartItemsAsGA4($skus = [])
{
	$_currentOrders = [];
	if (empty($skus)) {
		$skus = array_column($_SESSION['currentOrder'], 'pid');
		if (!empty($_SESSION['currentOrder'])) {
			$_currentOrders = array_reduce($_SESSION['currentOrder'], function ($_items, $_item) {
				$_items[$_item['pid']] = [
					'qty' => $_item['qty'],
					'oid' => $_item['oid'],
				];

				return $_items;
			}, []);
		}
	} else {
		$_currentOrders = array_reduce($skus, function ($_items, $sku) {
			$_items[$sku] = [
				'qty' => 0,
				'oid' => !empty($_SESSION['currentOrder']) ? $_SESSION['currentOrder'][0]['oid'] : mt_rand(10000, 99999)
			];

			return $_items;
		}, []);
	}


	return array_map(function ($item) use ($_currentOrders) {
		$sess = $_currentOrders[$item['sku']];


		$googleCategory = getStyleGoogleCategory(explode(',', trim($item['categories'], ',')));
		$categoryShards = explode(' > ', $googleCategory);
		$index = 1;
		$categories = array_reduce($categoryShards, function ($_categories, $_category) use (&$index) {
			$name = 'item_category' . ($index == 1 ? '' : $index);

			$_categories[$name] = $_category;

			$index++;

			return $_categories;
		}, []);

		return array_merge([
			'item_id' => $item['gtin'],
			'item_name' => $item['customTitle'],
			'currency' => 'USD',
			'item_brand' => $item['brandName'],
			'item_variant' => $item['colorName'] . ' - ' . $item['sizeName'],
			'price' => $item['customerPrice'],
			'quantity' => $sess['qty'],
			'item_list_id' => $sess['oid']
		], $categories);
	}, ftechPData($skus));
}

function getAdditionalMedia($styleID, $colorName)
{

	global $db;
	$sql = "select * from ci_product_media where styleId=? AND colorName=?";
	$results = $db->rawQuery($sql, [$styleID, $colorName]);

	if (!empty($results)) {
		$data = $results;
		return $data;
	} else {
		return [];
	}
}

function getMediaPosition($styleID, $colorName)
{

	global $db;
	$sql = "select * from ci_product_media_data where styleId=? AND colorName=?";
	$results = $db->rawQuery($sql, [$styleID, $colorName]);

	if (!empty($results)) {
		$data = $results;
		return $data;
	} else {
		return [];
	}
}

function getLandingPageImage($styleID)
{

	global $db;
	$sql = "select ci_product_media_data.mediaId, ci_product_media_data.colorName, colorFrontImage, colorSideImage, colorBackImage, alphaFrontImage, alphaSideImage, alphaBackImage from ci_product_media_data INNER JOIN ci_products ON ci_products.styleId = ci_product_media_data.styleId AND ci_products.colorName = ci_product_media_data.colorName where isLandingImage=1 and ci_product_media_data.styleId=?";

	$results = $db->rawQueryOne($sql, [$styleID]);

	if (!empty($results)) {
		return $results;
	} else {
		return [];
	}
}

function getCustomModelImage($styleID)
{

	global $db;
	$sql = "select mediaId, colorName from ci_product_media_data where isLandingImage=1 and styleId=?";
	$results = $db->rawQueryOne($sql, [$styleID]);

	if (!empty($results)) {
		return $results;
	} else {
		return [];
	}
}

function getCustomModelImageStyle($styleID, $colorName)
{

	global $db;
	$sql = "select styleID, colorName, colorFrontImage, colorSideImage, colorBackImage, alphaFrontImage, alphaSideImage, alphaBackImage from ci_products where styleID = ? and colorName = ?";
	$results = $db->rawQueryOne($sql, [$styleID, $colorName]);

	if (!empty($results)) {
		return $results;
	} else {
		return [];
	}
}

function getMediaData($mediaId)
{

	global $db;
	$sql = "select image, video, youtubeUrl from ci_product_media where id = ?";
	$results = $db->rawQueryOne($sql, [$mediaId]);
	if (!empty($results)) {
		return $results;
	} else {
		return [];
	}
}

function getAllMainImage()
{
	global $db;
	$sql = "select styleId, colorName, mediaId, isMainImage from ci_product_media_data where isMainImage = 1";
	$results = $db->rawQuery($sql);

	$mainImages = [];
	if (!empty($results)) {

		foreach ($results as $row) {

			$query_string = "select styleID, colorName, colorFrontImage, colorSideImage, colorBackImage, alphaFrontImage, alphaSideImage, alphaBackImage from ci_products where styleID = ? and colorName = ?";
			$query = $db->rawQueryOne($query_string, [$row['styleId'], $row['colorName']]);
			$product = $query;

			if (!empty($product) && isset($product[$row['mediaId']])) {
				$mainImages[$row['styleId']]['image'] = str_replace("Images/Color/", "", $product[$row['mediaId']]);
				$mainImages[$row['styleId']]['type'] = (strpos($row['mediaId'], 'alpha') !== false) ? 1 : 0;
			} else {

				$mediaId = str_replace("OtherMedia", "", $row['mediaId']);
				$query_string = "select image, mediaType from ci_product_media where id = ?";
				$query = $db->rawQueryOne($query_string, [$mediaId]);
				$media = $query;

				$mainImages[$row['styleId']]['image'] = $media['image'];
				$mainImages[$row['styleId']]['type'] = 0;
			}
		}
		return $mainImages;
	} else {
		return [];
	}
}

function getCustomMsg($code)
{
	global $db;
	$query_string = "select message from ci_custom_messages where code = ?";
	$query = $db->rawQueryOne($query_string, [$code]);
	return (isset($query['message']) && !empty($query['message'])) ? $query['message'] : '';
}

// Start - Swiper task and checklist - CL - 8162022
function setBannerSource($isExcluded, $image, $isMobile = false)
{
	$source = base_url_site . 'images/homebanners/' . $image;
	$attribute = !$isExcluded ? ($isMobile ? 'data-srcset' : 'data-src') : ($isMobile ? 'srcset ' : 'src');
	return $attribute . '=' . $source;
}
// End - Swiper task and checklist - CL - 8162022

function customerPastItems($order = "", $start = "0", $limit = "20")
{
	global $db;

	$orderBy = "styl.bestsellerrank";
	$orderByInner = "";

	if ($order == "neworder") {
		$orderBy = "MAX(op.opid) desc";
		$orderByInner = "ORDER BY MAX(ci_order_products.opid) desc";
	} else if ($order == "oldorder") {
		$orderBy = "MAX(op.opid)";
		$orderByInner = "ORDER BY MAX(ci_order_products.opid)";
	} else if ($order == "mostorder") {
		$orderBy = "styl.bestsellerrank";
		$orderByInner = "";
	}

	$past_item_query = "SELECT
				    styl.slug,
				    styl.customeseo,
				    styl.slugCategory,
				    styl.styleImage,
					styl.styleName,
				    styl.brandslug,
				    styl.customTitle,
				    styl.brandName,
				    styl.styleID,
				    styl.brandImage,
				    styl.title,
				    styl.pPrice,
				    styl.pColors,
				    styl.pTotalColors,
				    styl.pmodelImage,
				    styl.styleImageStatus,
				    styl.bestsellerrank,
				    styl.ribbonText,
				    styl.ribbonPosition,
				    styl.ribbonShadow,
				    styl.ribbonStyle,
				    styl.ribbonColor,
				    styl.ribbonTextColor,
				    styl.isCustomRibbon,
				    styl.customRibbon,
						styl.cartGroupID,
				    ci_products.colorName,
    				ci_products.sizeName,
    				ci_products.qty as currentStock,
				    ci_customer_orders.customerOrderID,
				    -- op.gtin,
				    ci_products.gtin,
				    op.sku,
				    ci_products.color1,
				    ci_products.color2,
				    ci_products.customerPrice as itemPrice,
				    op.qty as itemQty,
				    CASE WHEN SUBSTRING_INDEX(styl.customTitle, ' ', 1) = styl.brandName THEN styl.styleName ELSE SUBSTRING_INDEX(customTitle, ' ', 1) END AS itemStyleName
				FROM
				    ci_order_products op
				INNER JOIN (
					SELECT
						ci_order_products.styleID
					FROM ci_order_products
					INNER JOIN ci_customer_orders ON ci_customer_orders.customerOrderID = ci_order_products.orderId
					-- INNER JOIN ci_products ON ci_products.gtin = ci_order_products.gtin
					INNER JOIN ci_products ON ci_products.sku = ci_order_products.sku
					WHERE ci_customer_orders.customerId = '" . $_SESSION['uid'] . "'
					GROUP BY ci_order_products.styleID
					" . $orderByInner . "
					LIMIT $start, $limit
				) AS co ON co.styleID = op.styleID
				INNER JOIN ci_styles styl ON styl.styleID = op.styleID
				INNER JOIN ci_customer_orders ON ci_customer_orders.customerOrderID = op.orderId
				-- INNER JOIN ci_products ON ci_products.gtin = op.gtin
				INNER JOIN ci_products ON ci_products.sku = op.sku
				WHERE ci_customer_orders.customerId = '" . $_SESSION['uid'] . "'
				AND styl.isExistProduct=1 
				AND ci_products.isDS = 0 
				AND styl.pPrice >= 1 
				-- AND ci_products.qty > 0 Start - Buy it again adjustments - RM - 11/21/2022
				AND ci_products.colorStatus = '0' 
				AND ci_products.sizeStatus = '0'
				AND ci_products.doNotDisplay  = '0'
				GROUP BY ci_products.styleID, ci_products.colorName, ci_products.sizeName
				ORDER BY " . $orderBy . "
				";

	$past_items_results = $db->rawQuery($past_item_query);

	if (count($past_items_results) <= 0) {
		return 0;
	}

	$results = array_reduce($past_items_results, function ($styles, $item) {
		if (!isset($styles[$item['styleID']]))
			$styles[$item['styleID']] = [];

		$styles[$item['styleID']][] = $item;
		return $styles;
	}, []);

	return $results;
}

function customerPastItemsCount()
{
	global $db;

	$past_item_query = "SELECT
						ci_order_products.styleID
					FROM ci_order_products
					INNER JOIN ci_customer_orders ON ci_customer_orders.customerOrderID = ci_order_products.orderId
					-- INNER JOIN ci_products ON ci_products.gtin = ci_order_products.gtin
					INNER JOIN ci_products ON ci_products.sku = ci_order_products.sku
					WHERE ci_customer_orders.customerId = '" . $_SESSION['uid'] . "'
					GROUP BY ci_order_products.styleID";

	$past_items_results = $db->rawQuery($past_item_query);

	return count($past_items_results);
}

/*Start - Buy It Again Feature - Cl - 1182022 */
function formatToMoney($value, $format = true)
{
	return '$' . ($format ? number_format($value, 2) : $value);
}

function getShippingGroups()
{
	global $db;

	static $shippingGroups = null;

	if (is_null($shippingGroups)) {
		$result = $db->rawQuery('SELECT id, name, description, hoverDescription, clickDescription, logo FROM ci_shipping_groups');
		$shippingGroups = array_reduce($result, function ($groups, $item) {
			$groups[$item['id']] = $item;
			return $groups;
		}, []);
	}

	return $shippingGroups;
}

function getShippingGroup($id, $params = null)
{
	$shippingGroup = getShippingGroups()[$id];

	if (empty($shippingGroup))
		return null;

	if (!empty($params))
		return $shippingGroup[$params];
	return $shippingGroup;
}

function template($filePath, $variables = array(), $print = true)
{
	$output = NULL;
	if (file_exists($filePath)) {
		// Extract the variables to a local namespace
		extract($variables);

		// Start output buffering
		ob_start();

		// Include the template file
		include $filePath;

		// End buffering and return its contents
		$output = ob_get_clean();
	}
	if ($print) {
		print $output;
	}
	return $output;
}
/*End - Buy It Again Feature - Cl - 1182022 */

function getFeaturedColors($styleId, $limit = 6)
{
	global $db;

	$query = <<<SQL
		SELECT
			colorFrontImage,
			colorCode,
			isColorFeatured,
			color1,
			color2,
			colorName
		FROM ci_products
		WHERE styleID = ?
		AND isColorFeatured = 1
		AND isDS = 0
		AND doNotDisplay = 0
		AND (isDiscontinued IS NULL OR isDiscontinued = 0)
		AND colorStatus = 0
		AND sizeStatus = 0
		AND qty > 10
		GROUP BY colorName
		-- LIMIT ?
SQL;

	return $db->rawQuery($query, [$styleId]);
}

// Start - feedback display on pages - CL - 12232022
function frontendSettings($columns)
{
	global $db;

	$condition = "= '$columns'";
	if (is_array($columns)) {
		$select = implode("', '", $columns);
		$condition = "IN ('$select')";
	}

	$results = $db->rawQuery("SELECT column_name, column_data FROM ci_frontend_settings WHERE column_name $condition");

	return array_reduce($results, function ($config, $item) {
		$config[$item['column_name']] = $item['column_data'];
		return $config;
	}, []);
}
// End - feedback display on pages - CL - 12232022

function renderCardProductImage($config)
{
	// to be extracted $finalImage, $product, $lazyLoad, $swiperLazy, $alt
	extract($config);
	// to be extracted $width, $height
	extract(productImageSize($type));

	$colorBackImageSource = isset($colorBackImage) ? $colorBackImage : '';
	// Hovering over the image on product card should show the product's back image | WL 5/30/2024

	$imageSource = "src";
	$className = "";
	$htmlLoading = $lazyLoad ? 'loading="lazy"' : '';
	$htmlError = 'onerror=this.src="' . base_url_site . 'images/no-image-found.jpg"';


	if ($swiperLazy) {
		$imageSource = "data-src";
		$className = "swiper-lazy";
		$htmlLoading = "";
	}
	// Start - Bulkapparel missing image alt - CL - 8142024
	$striped_alt = 'preview image of ' . stripslashes($alt);
	$striped_title = stripslashes($title);

	return '<img
        ' . $imageSource . '="' . $finalImage . '"
        class="' . $className . '"
        alt="' . $striped_alt . '"
        title="' . $striped_title . '" 
        width="' . $width . '"
        height="' . $height . '"
        filename="' . $finalImage . '"
        data-backimage="' . $colorBackImageSource . '"
        ' . $htmlError . '
        ' . $htmlLoading . '
    />';
	// End - Bulkapparel missing image alt - CL - 8142024
}
;

// Start -  I want to add another use for Buy it again. *Not a rush but if FE not busy they can work on this - CL - 2172023
function getBuyAgainItems($page = 1, $itemsPerPage = 9)
{

	global $db;
	$userId = $_SESSION['uid'];

	$query = "SELECT 
	style.styleID, 
	style.brandName, 
	style.slug, 
	style.styleName, 
	style.customTitle, 
	style.pPrice, 
	style.styleImage, 
	style.pModelImage, 
	style.pTotalColors,
	style.slugCategory,
	style.cartGroupId,
	COUNT(*) AS bought_times 
	FROM ci_order_products op 
	INNER JOIN (
		SELECT
			ci_order_products.styleID
		FROM ci_order_products
		INNER JOIN ci_customer_orders ON ci_customer_orders.customerOrderID = ci_order_products.orderId
		INNER JOIN ci_products ON ci_products.sku = ci_order_products.sku
		WHERE ci_customer_orders.customerId = '" . $_SESSION['uid'] . "'
		GROUP BY ci_order_products.styleID
	) AS co ON co.styleID = op.styleID
	INNER JOIN ci_customer_orders co ON co.customerOrderID = op.orderId 
	INNER JOIN ci_styles style ON style.styleID = op.styleID
	INNER JOIN ci_products ON ci_products.sku = op.sku
	WHERE co.customerId = ?
	AND style.isExistProduct=1
	AND style.pPrice >= 1
	AND ci_products.isDS = 0 
	AND ci_products.colorStatus = '0' 
	AND ci_products.sizeStatus = '0'
	AND ci_products.doNotDisplay = '0'
	GROUP BY op.styleID
	ORDER BY bought_times DESC
	LIMIT ?
	OFFSET ?";

	$offset = ($page - 1) * ($itemsPerPage);
	$items = $db->rawQuery($query, [$userId, $itemsPerPage, $offset]);

	$totalCount = $db->rawQueryOne("SELECT COUNT(DISTINCT op.styleID) as count FROM ci_order_products op
	INNER JOIN ci_customer_orders co ON co.customerOrderID = op.orderId
	INNER JOIN ci_styles style ON style.styleID = op.styleID
	INNER JOIN ci_products ON ci_products.sku = op.sku
	WHERE co.customerId = ?
	AND style.isExistProduct=1
	AND style.pPrice >= 1
	AND ci_products.isDS = 0 
	AND ci_products.colorStatus = '0' 
	AND ci_products.sizeStatus = '0'
	AND ci_products.doNotDisplay  = '0'
	", [$userId])['count'];

	$lastPage = ceil($totalCount / $itemsPerPage);

	if ($page == 1) {
		$toFillCount = 9;

		// START - I want to add another use for Buy it again. *Not a rush but if FE not busy they can work on this [FEEDBACK] - JA - 03052024
		// if(!empty($items) && count($items) <= $toFillCount) {
		// 	$recommendedItems = getCartRecommendedItems(array_map(function($item) {
		// 		return $item['styleID'];
		// 	},$items));


		// 	$items = array_merge($items, array_splice($recommendedItems, 0, ($toFillCount - count($items))));
		// } 
		// END - I want to add another use for Buy it again. *Not a rush but if FE not busy they can work on this [FEEDBACK] - JA - 03052024
	}

	return [
		"data" => $items,
		"meta" => [
			"total" => $totalCount,
			"isLastPage" => $page == $lastPage,
			"page" => $page,
			"lastPage" => $lastPage,
			"userId" => $userId
		]
	];
}

function getSpecificBuyAgainItem($styleId)
{
	global $db;

	$query = "
	SELECT 
	style.slug,
	style.customeseo,
	style.slugCategory,
	style.styleImage,
	style.styleName,
	style.brandslug,
	style.customTitle,
	style.brandName,
	style.styleID,
	style.brandImage,
	style.title,
	style.pPrice,
	style.pColors,
	style.pTotalColors,
	style.pmodelImage,
	style.styleImageStatus,
	style.bestsellerrank,
	style.cartGroupID,
	product.colorName,
	product.sizeName,
	product.qty as currentStock,
	co.customerOrderID,
	product.gtin,
	op.sku,
	product.color1,
	product.color2,
	op.pPrice as itemPrice,
	op.qty as itemQty,
	CASE WHEN SUBSTRING_INDEX(style.customTitle, ' ', 1) = style.brandName THEN style.styleName ELSE SUBSTRING_INDEX(customTitle, ' ', 1) END AS itemStyleName
	FROM ci_order_products op 
	INNER JOIN ci_customer_orders co ON co.customerOrderID = op.orderId 
	INNER JOIN ci_styles style ON style.styleID = op.styleID
	INNER JOIN ci_products product ON product.sku = op.sku
	WHERE 
	co.customerId = ? 
	AND op.styleID = ? 
	AND product.colorStatus = '0'
	AND product.sizeStatus = '0'
	AND product.doNotDisplay = '0'
	AND product.isDS = 0 
	AND style.isExistProduct=1 
	AND style.pPrice >= 1 
	GROUP BY product.sku
	ORDER BY style.bestsellerrank
	";

	return $db->rawQuery($query, [$_SESSION['uid'], $styleId]);
}

function cardBuyAgainProductImage($product, $size = "bulk-blank-shirts")
{

	$finalImage = $product['styleImage'];

	if ($product['styleImage'] == "") {
		$finalImage = $product['pModelImage'];
	}

	$sizes = productImageSize($size);
	$src = newProductImagePath($finalImage, $size, $product['cartGroupId']);

	return [
		"src" => $src,
		"height" => $sizes['height'],
		"width" => $sizes['width'],
	];
}
// End -  I want to add another use for Buy it again. *Not a rush but if FE not busy they can work on this - CL - 2172023

function getEmailInvoice($hash)
{
	global $db;

	$cols = array("logid", "orderno");

	$db->where("hash", $hash);

	$data = $db->getOne("ci_email_invoice", null, $cols);

	return $data;
}

function getTransactionLog($orderno, $logid)
{
	global $db;

	$query = "SELECT
						ci_transaction_logs.id,
						ci_transaction_logs.paymentStatus,
						ci_transaction_logs.isPaid,
						ci_customer_orders.orderDate,
						ci_customer_orders.fname,
						ci_customer_orders.totalAmount,
						ci_transaction_logs.amount,
						ci_transaction_logs.orderno,
						ci_transaction_logs.createdBy,
						ci_transaction_logs.type
					FROM ci_transaction_logs
					INNER JOIN ci_customer_orders ON ci_customer_orders.invoiceNo = ci_transaction_logs.orderno
					WHERE ci_transaction_logs.id = ?";

	$data = $db->rawQueryOne($query, array($logid));

	return $data;
}

function getBillingDetails($orderno)
{
	global $db;
	$billing = $db->rawQueryOne("select * from ci_address where addressType=1  and ordId = ?", array($orderno));
	if (!empty($billing))
		return $billing;
	else
		return [];
}

function updateTransactionLogs($logid, $data)
{
	global $db;
	$db->where('id', $logid);
	$update = $db->update("ci_transaction_logs", $data);
}

function insertTransactionLogs($data)
{
	global $db;
	$insert = $db->insert("ci_transaction_logs", $data);
}

function insertTransactionDetails($data)
{
	global $db;
	$insert = $db->insert("ci_invoice_transaction_details", $data);
}

/**
 * Replace all characters in the string with an asterisk.
 *
 * @param string $string
 * @param integer $undone
 * @param string $replacement
 * @return string
 */
function obfuscateString($string, $undone = 0, $replacement = '*')
{
	$length = strlen($string);

	$pieces = array_map(function ($item) use ($replacement) {
		return $replacement;
	}, range(1, $length - $undone));

	return implode('', $pieces) . ($undone > 0 ? substr($string, -1 * $undone) : '');
}

function utf8ize($mixed)
{
	if (is_array($mixed)) {
		foreach ($mixed as $key => $value) {
			$mixed[$key] = utf8ize($value);
		}
	} else if (is_string($mixed)) {
		return utf8_encode($mixed);
	}
	return $mixed;
}

function retrieveCredentials($name)
{
	return array_map(function ($name) {
		return getenv($name);
	}, getEnvVariableNames($name, false));
}

function logFailedEmail($email, $to, $name, $subject, $message, $summary, $error, $data = '')
{
	global $db;

	$userId = $_SESSION["cid"];
	if (isset($_SESSION["uid"]) && !empty($_SESSION["uid"]))
		$userId = $_SESSION["uid"];

	$orderNumber = '';
	if (isset($_SESSION['currentOrder']) && !empty($_SESSION['currentOrder']) && !empty($_SESSION['currentOrder'][0]['oid']))
		$orderNumber = $_SESSION['currentOrder'][0]['oid'];

	$request = $_REQUEST;
	if (!empty($request) && !empty($request['cardno']))
		$request['cardno'] = obfuscateString($request['cardno'], 4);

	if (!empty($request) && !empty($request['ccode']))
		$request['ccode'] = obfuscateString($request['ccode']);

	$a = $db->insert('ci_failed_emails', array_merge(
		compact('email', 'to', 'name', 'subject', 'summary', 'error', 'data'),
		[
			// 'message' => htmlentities($message), // START - Send failed email notification by batch - JA - 01252024
			'source' => json_encode(debug_backtrace()),
			'cookies' => json_encode($_COOKIE),
			'sessions' => json_encode($_SESSION),
			'requests' => json_encode($request),
			'ip_address' => get_ip_address(),
			'user_agent' => $_SERVER['HTTP_USER_AGENT'],
			'customer_no' => $userId ?? '',
			'oid' => $orderNumber,
			'ref_id' => $_COOKIE['RefID'],
			'date_time' => date('Y-m-d H:i:s'),
		]
	));

	// Start - Send failed email notification by batch - AP - 01/17/2024
	// 	$emailProviders = [
	// 		retrieveCredentials('support', false),
	// 		retrieveCredentials('orders', false),
	// 		retrieveCredentials('tracking', false),
	// 		retrieveCredentials('signup', false),
	// 		retrieveCredentials('return', false),
	// 	];

	// 	$recipients = [
	// 		['email' => 'rob1@shirtchamp.com', 'name' => 'Rob'],
	// 		['email' => 'miko@webdev200.com', 'name' => 'Miko'],
	// 		['email' => 'aldrin@webdev200.com', 'name' => 'Aldrin'],
	// 	];

	// 	$errorHtml = <<<HTML
	// 	<div style="margin-top: 16px; margin-bottom: 16px;">
	// 		<h3>Summary</h4>
	// 		<p>{$summary}</p>
	// 	</div>
	// 	<div style="margin-top: 16px; margin-bottom: 16px;">
	// 		<h3>Error</h4>
	// 		<p>{$error}</p>
	// 	</div>
	// HTML;

	// 	foreach ($recipients as $recipient) {
	// 		foreach ($emailProviders as $emailProvider) {
	// 			list($username, $password, $from) = $emailProvider;

	// 			$hasSent = sendFailedEmail($recipient['email'], 'Failed to send email: ' . $subject, $errorHtml . $message, $username, $password, $from);

	// 			if ($hasSent)
	// 				break;
	// 		}
	// 	}
	// End - Send failed email notification by batch - AP - 01/17/2024
}

function uniqidReal($length = 18)
{
	if (function_exists("random_bytes")) {
		$bytes = random_bytes(ceil($length / 2));
	} elseif (function_exists("openssl_random_pseudo_bytes")) {
		$bytes = openssl_random_pseudo_bytes(ceil($length / 2));
	} else {
		throw new Exception("no cryptographically secure random function available");
	}
	return substr(bin2hex($bytes), 0, $length);
}

function startActivity($activity, $fileName = null, $orderId = '', $logType = 1, $userId = 0)
{
	global $db;

	$id = uniqidReal();

	if (empty($fileName) && !empty(debug_backtrace())) {
		$fullPath = debug_backtrace()[0]['file'];

		$fileName = str_replace('/var/www/html/', '', $fullPath);
	}

	$data = [
		'orderId' => $orderId,
		'contentlog' => "{$activity} START",
		'logDate' => date('Y-m-d'),
		'logTime' => date('H:i:s'),
		'logtype' => $logType,
		'userid' => $userId,
		'DateTimeLog' => date('Y-m-d H:i:s'),
		'filename' => $fileName,
		'identifier' => $id
	];

	$db->insert('ci_activitylog', $data);

	return $id;
}

function stopActivity($identifier, $activity = null)
{
	global $db;

	$db->where('identifier', $identifier);
	$data = $db->getOne('ci_activitylog');

	unset($data['id']);

	$data['contentlog'] = substr($data['contentlog'], 0, strlen($data['contentlog']) - 5) . 'END' . (!empty($activity) ? ' ' . $activity : '');
	$data['logDate'] = date('Y-m-d');
	$data['logTime'] = date('H:i:s');
	$data['DateTimeLog'] = date('Y-m-d H:i:s');

	$db->insert('ci_activitylog', $data);
}

function useVendor()
{
	include('/var/www/html/includes/vendors/autoload.php');
}

function imageProviderByCartGroup($cartGroupId)
{
	$provider = '';

	switch ($cartGroupId) {
		// Alphabroder Products = 2 or 7
		case 2:
		case 7:
			$provider = 'alpha';
			break;

		// Sanmar Products = 3
		case 3:
			$provider = 'sanmar';
			break;

		// SNS or default Products = 1, 6 or empty
		case 1:
		case 6:
		default:
			$provider = 'sns';
			break;
	}

	return $provider;
}

function toLatin1($str)
{
	return iconv("UTF-8", "ISO-8859-1//TRANSLIT", $str);
}

function sendFailedEmail($to, $subject, $message, $username, $password, $fromEmail, $fromName = 'BulkApparel', $host = null, $port = null, $mailer = null, $encryption = null)
{
	// include_once('/var/www/html/includes/PHPMailer.php');

	$host = $host ?? getenv('MAIL_HOST') ?? 'smtp.gmail.com';
	$port = $port ?? MAIL_PORT ?? '587';
	$mailer = $mailer ?? MAIL_MAILER ?? 'smtp';
	$encryption = $encryption ?? MAIL_ENCRYPTION ?? 'tls';

	try {
		$mail = new PHPMailer(true);
		$mail->IsSMTP();
		// $mail->SMTPDebug = 0;
		$mail->SMTPAuth = TRUE;
		$mail->SMTPSecure = $encryption;
		$mail->Port = $port;
		$mail->Username = $username;
		$mail->Password = $password;
		$mail->Host = $host;
		$mail->Mailer = $mailer;
		$mail->SetFrom($fromEmail, $fromName);
		$mail->AddAddress($to);
		$mail->Subject = $subject;
		$mail->WordWrap = 600;
		$mail->MsgHTML($message);
		$mail->IsHTML(true);

		return $mail->Send('Failed to send mail report.', false);
	} catch (Exception $e) {
	}

	return false;
}

function getCustompagesWithBanners($page = 1, $itemPerPage = 64, $_offset = 0) //helpful links landing page adjustment | increase from 30 - 40 WL 5/1/2024 
{
	global $db;

	$offset = $_offset + (($page - 1) * $itemPerPage);
	$condition = "
				FROM ci_custom_pages AS pages
        LEFT JOIN  ci_custompage_sections AS banner ON banner.custompageid = pages.custompageid 
        WHERE banner.type = 6 AND pages.custompagestatus = 1 AND banner.show = 1 AND banner.imagedesktop IS NOT NULL AND banner.imagemobile IS NOT NULL";

	$sql = "SELECT 
        pages.custompageid,
        pages.custompagetitle,
        pages.custompagelink,
        pages.custompagestatus,
        banner.id, 
        banner.show,
        banner.imagedesktop,
        banner.imagedesktop_link,
        banner.imagemobile,
        banner.imagemobile_link, 
        banner.type,
				banner.custompageid,
				banner.image_title,
				banner.image_alt
        $condition
				GROUP BY banner.custompageid
				ORDER BY pages.custompageid DESC, banner.id ASC
        LIMIT ?
        OFFSET ?";

	$results = $db->rawQuery($sql, [$itemPerPage, $offset]);

	$banner_path = '/var/www/html/images/homebanners/';
	$missing_mobile = 'banner-not-found-mobile.jpg';
	$missing_desktop = 'banner-not-found-desktop.jpg';
	$final_results = [];

	foreach ($results as $item) {
		$final_results[] = array_merge($item, [
			"imagedesktop_link" => $item['custompagelink'],
			"imagemobile_link" => $item['custompagelink'],
			"imagemobile" => file_exists($banner_path . $item['imagemobile']) ? $item['imagemobile'] : $missing_mobile,
			"imagedesktop" => file_exists($banner_path . $item['imagedesktop']) ? $item['imagedesktop'] : $missing_desktop
		]);
	}

	$totalItem = $db->rawQuery("SELECT 
		COUNT(DISTINCT banner.custompageid) total
		$condition");
	$totalItem = $totalItem[0]['total'];

	$totalPages = ceil(($totalItem - $_offset) / $itemPerPage);

	return [
		'page' => $page,
		'data' => $final_results,
		"total_item" => $totalItem,
		"total_pages" => $totalPages,
		'has_next' => $page < $totalPages,
	];
}

function checkFavorite($styleId, $userId)
{
	global $db;

	$favorite = $db->rawQueryOne("select * from ci_favorites where styleID=? AND userID=?", array($styleId, $userId));
	if (!empty($favorite)) {
		return 1;
	} else {
		return 0;
	}
}

// Start - Customer user dashboard missing tracking number on order history - CL - 2162024
function get_tracking_url($tracking_number)
{

	if (empty($tracking_number))
		return false;
	if (!is_string($tracking_number) && !is_int($tracking_number))
		return false;

	$tracking_urls = [
		//GSO  
		[
			'type' => 'https://www.gso.com/Trackshipment?TrackingNumbers=' . $tracking_number,
			'reg' => '/\b((G)\d{2,20})\b/i'
		],

		//UPS - UNITED PARCEL SERVICE
		[
			'type' => 'http://wwwapps.ups.com/WebTracking/processInputRequest?TypeOfInquiryNumber=T&InquiryNumber1=' . $tracking_number,
			'reg' => '/\b(1Z ?[0-9A-Z]{3} ?[0-9A-Z]{3} ?[0-9A-Z]{2} ?[0-9A-Z]{4} ?[0-9A-Z]{3} ?[0-9A-Z]|T\d{3} ?\d{4} ?\d{3})\b/i'
		],

		//USPS - UNITED STATES POSTAL SERVICE - FORMAT 1
		[
			'type' => 'https://tools.usps.com/go/TrackConfirmAction?qtc_tLabels1=' . $tracking_number,
			'reg' => '/\b((420 ?\d{5} ?)?(91|92|93|94|01|03|04|70|23|13)\d{2} ?\d{4} ?\d{4} ?\d{4} ?\d{4}( ?\d{2,6})?)\b/i'
		],

		//USPS - UNITED STATES POSTAL SERVICE - FORMAT 2
		[
			'type' => 'https://tools.usps.com/go/TrackConfirmAction?qtc_tLabels1=' . $tracking_number,
			'reg' => '/\b((M|P[A-Z]?|D[C-Z]|LK|E[A-C]|V[A-Z]|R[A-Z]|CP|CJ|LC|LJ|CX) ?\d{3} ?\d{3} ?\d{3} ?[A-Z]?[A-Z]?)\b/i'
		],

		//USPS - UNITED STATES POSTAL SERVICE - FORMAT 3
		[
			'type' => 'https://tools.usps.com/go/TrackConfirmAction?qtc_tLabels1=' . $tracking_number,
			'reg' => '/\b(82 ?\d{3} ?\d{3} ?\d{2})\b/i'
		],

		//FEDEX - FEDERAL EXPRESS
		[

			'type' => 'https://www.fedex.com/fedextrack/?trknbr=' . $tracking_number,
			'reg' => '/\b(((96\d\d|6\d)\d{3} ?\d{4}|96\d{2}|\d{4}) ?\d{4} ?\d{4}( ?\d{3})?)\b/i'
		],
		//ONTRAC
		[
			'type' => 'http://www.ontrac.com/trackres.asp?tracking_number=' . $tracking_number,
			'reg' => '/\b((C|D)\d{14})\b/i'
		],

	];


	//TEST EACH POSSIBLE COMBINATION
	foreach ($tracking_urls as $item) {
		$match = array();
		preg_match($item['reg'], $tracking_number, $match);
		if (count($match)) {
			return $item['type'];
		}
	}


	// TRIM LEADING ZEROES AND TRY AGAIN
	// https://github.com/darkain/php-tracking-urls/issues/4
	if (substr($tracking_number, 0, 1) === '0') {
		return get_tracking_url(ltrim($tracking_number, '0'));
	}


	//NO MATCH FOUND, RETURN FALSE
	return false;
}
// Start - Customer user dashboard missing tracking number on order history - CL - 2162024


function getcatIdbySlugMulti($catslugs)
{
	global $db;

	$params = explode(" ", $catslugs);

	$catIds = [];
	foreach ($params as $param) {
		$param = [$param, $param];
		$actualPrice = $db->rawQueryOne("SELECT categoryID FROM ci_category WHERE slug= ? or cslug=? limit 1", $param);
		array_push($catIds, $actualPrice['categoryID']);
	}

	return $catIds;
}

function singularizeFilter($pluralize)
{

	$output = array();

	foreach (explode(' ', $pluralize) as $word) {
		$output[] = rtrim($word, 's');
	}

	$pluralize = implode(' ', $output);

	return $pluralize;
}

function toShowContentByDevice($device, $flex = false)
{
	switch ($device) {
		case 1:
			return $flex ? 'flex-pc-tablet-only' : 'desktop-tablet--only';
		case 2:
			return $flex ? 'flex-mob-only' : 'mobile--only';
		default:
			return '';
	}
}

function encryptOrderNo($orderNumber)
{

	// Data to be encrypted
	$data = $orderNumber;

	// Encrypt the data using base64 encoding
	$encrypted = rtrim(strtr(base64_encode($data), '+/', '-_'), '=');

	// URL with encrypted parameter
	return urlencode($encrypted);
}

function decodeOrderNo($orderNumber)
{

	$encoded_data = $orderNumber;
	$decoded = base64_decode(urldecode($encoded_data));

	// URL with encrypted parameter
	return mb_convert_encoding($decoded, 'UTF-8', 'UTF-8');
}

function getHoverImageSettings($page, $slug = "")
{
	global $db;

	$columnname = '';

	if ($page == "homepage") {
		$columnname = 'hoverhome';
	} elseif ($page == "categorypage") {
		$columnname = 'hovercategory';
	} elseif ($page == "brandpage") {
		$columnname = 'hoverbrand';
	} elseif ($page == "custompage") {
		$columnname = 'hovercustompage';
	}


	$setting = $db->rawQueryOne("select columndata from ci_admin_settings where columnname=? ", array($columnname));

	$global = (!empty($setting)) ? $setting['columndata'] : '';

	if ($setting['columndata'] <= 0 && $page == "categorypage") {
		$category = $db->rawQueryOne("select isHoverImage from ci_category_meta where slug=? ", array($slug));
		$global = (!empty($category)) ? $category['isHoverImage'] : '';
	}

	if ($setting['columndata'] <= 0 && $page == "brandpage") {
		$brand = $db->rawQueryOne("select isHoverImage from ci_brand_seo where brandslug=? ", array($slug));
		$global = (!empty($brand)) ? $brand['isHoverImage'] : '';
	}

	if ($setting['columndata'] <= 0 && $page == "custompage") {
		$custompage = $db->rawQueryOne("select isHoverImage from ci_custom_pages where custompagelink=? ", array($slug));
		$global = (!empty($custompage)) ? $custompage['isHoverImage'] : '';
	}

	return $global;
}

function globalMessages($page)
{
	global $db;

	$pageSelection = ['index' => 'is_index', 'category' => 'is_category', 'brands' => 'is_brands', 'pdetails' => 'is_pdetails', 'cart' => 'is_cart', 'custompages' => 'is_custompages'];
	$where = $pageSelection[$page];
	$whreConcat = 'AND ' . $where . ' = 1';

	$query = <<<SQL
		SELECT * FROM ci_global_messages WHERE status = 1 $whreConcat
SQL;

	$messages = $db->rawQuery($query);

	$html = "";

	foreach ($messages as $message) {
		if (!empty($message) && !empty($message['content'])) {
			$style = ($message['fonttype'] == "bold") ? "font-weight:bold;" : "font-style: italic;";

			$display = "";
			if ($message['display'] == 1) {
				$display = "desktop-tablet--only";
			} else if ($message['display'] == 2) {
				$display = "mobile--only";
			}

			$html .= "<div class='" . $display . "' style='width:100%'><p style='padding: 0 12px;margin-bottom: 2px;width:100%;clear:both;text-align:" . $message['alignment'] . ";background:" . $message['highlight'] . ";color:" . $message['fontcolor'] . ";font-size:" . $message['fontsize'] . "px;" . $style . "'>" . $message['content'] . "</p></div>";
		}
	}

	return $html;
}

function globalMessageSidebar()
{
	global $db;

	$query = <<<SQL
		SELECT * FROM ci_global_message_sidebar WHERE status = 1
SQL;

	$message = $db->rawQueryOne($query);

	$html = "";

	if (!empty($message)) {

		if ($message['type'] == "image") {
			$host = $_SERVER['HTTP_HOST'];
			$base_url_site = "https://" . $host . '/';
			$html = '<div class="siderbar--only" style="width:100%"><img src="' . $base_url_site . 'images/homebanners/' . $message['image'] . '" style="width:100%"></div>';
		} else {
			if (!empty($message['content'])) {
				$style = ($message['fonttype'] == "bold") ? "font-weight:bold;" : "font-style: italic;";
				$html .= "<div class='siderbar--only' style='width:100%'><p style='padding: 0 12px;margin-bottom: 2px;width:100%;clear:both;text-align:" . $message['alignment'] . ";background:" . $message['highlight'] . ";color:" . $message['fontcolor'] . ";font-size:" . $message['fontsize'] . "px;" . $style . "'>" . $message['content'] . "</p></div>";
			}
		}
	}

	return $html;
}

//Start - Customer Dashboard possible resale issue with people who upload their file, the number disappears. - new checkout - RM - 07/18/2024
function updateUserResaleNo($userid, $resalenumber)
{
	global $db;

	if (isset($userid) && !empty($userid)) {
		$db->where('id', $userid);
		$db->update('ci_customer', ['resalenumber' => $resalenumber]);
	}
}
//End - Customer Dashboard possible resale issue with people who upload their file, the number disappears. - new checkout - RM - 07/18/2024

//Start - Multiple address options dashboard and checkout page - new checkout - RM - 07/18/2024
function get_default_addressses()
{
	global $db;

	$customerId = $_SESSION['uid'];

	$sql = "select * from ci_customer_address where customerId=? and isSelected=1";

	$results = $db->rawQuery($sql, [$customerId]);

	if (count($results) > 0) {
		return $results;
	} else {
		return '';
	}
}
//End - Multiple address options dashboard and checkout page - new checkout - RM - 07/18/2024

function newProductImageRelativePath($path)
{
	return str_replace(base_url_site, '/var/www/html/', $path);
}

function cleanProductImageFilename($filename)
{
	return str_replace(['Images/Color/', 'Images/Style/'], '', $filename);
}

function isProductImageExist($path)
{
	return file_exists(newProductImageRelativePath($path)) && is_file(newProductImageRelativePath($path));
}

// Start - Standard the Brands images folder  - CL - 8282024
function brandImagePath($image, $size = 'large', $relative = false, $withBaseUrl = true)
{
	$filename = str_replace(['Images/Brand/'], '', $image);

	$_config = BRAND_IMAGES_CONFIG[$size];
	$ext = $_config['ext'];
	$version = '?v=' . BRAND_IMAGES_VERSION;

	if (isset($ext)) {
		$filename = str_replace(['.jpg', '.png', '.webp'], $ext, $filename);
	}

	return ($relative ? '/var/www/html/' : ($withBaseUrl ? APP_IMAGE_URL : '/')) . $_config['path'] . '/' . $filename . ($relative ? '' : $version);
}
// End - Standard the Brands images folder - CL - 8282024
// Start - Live pagespeed improvement - CL - 10102024
function imageCheckerAndReturnPath($path)
{
	// return file_exists('/var/www/html/' . str_replace(base_url_site, '', $path)) ? $path : null; // New Item Card Design and Add-To-Cart Quick Popup - SF - 7/22/2025
	return $path;
}

function preloadProductMainImage($image)
{

	$previewMobilePrefix = 'fashion-wear-m';
	$previewDesktopLargePrefix = 'fashion-wear-lg';
	$previewDesktopPrefix = 'fashion-wear';

	// // Start - Integrate SanMar API - CL - 9112024
	// if ($cartGroupId == 2) { //Start - alpha adjustments - RM - 02/08/2024
	// 	$previewMobilePrefix = 'alpha-blank-shirts-wholesale-m';
	// 	$previewDesktopLargePrefix = 'alpha-blank-shirts-wholesale-lg';
	// 	$previewDesktopPrefix = 'alpha-blank-shirts-wholesale';
	// } else if ($cartGroupId == 3) {
	// 	$previewMobilePrefix = 'sanmar-blank-shirts-wholesale-m';
	// 	$previewDesktopLargePrefix = 'sanmar-blank-shirts-wholesale-lg';
	// 	$previewDesktopPrefix = 'sanmar-blank-shirts-wholesale';
	// }

	if (!empty($path = imageCheckerAndReturnPath(newProductImagePath($image, $previewDesktopLargePrefix)))) {
		$previewDesktopSrc = $path;
	} else {
		$previewDesktopSrc = imageCheckerAndReturnPath(newProductImagePath($image, $previewDesktopPrefix));
	}
	;

	if (!empty($path = imageCheckerAndReturnPath(newProductImagePath($image, $previewMobilePrefix))))
		$previewMobileSrc = $path;


	return [
		'desktop' => $previewDesktopSrc,
		'mobile' => $previewMobileSrc
	];
}
// End - Live pagespeed improvement - CL - 10102024

function getProductComparableAndCompanion($styleId, $comparableGroup, $companionGroup, $limit = 20)
{
	global $db;

	$query = <<<SQL
		WITH styles_temp AS (
			SELECT
				slug,
				slugCategory,
				styleImage,
				customTitle,
				ci_styles.styleID,
				ci_styles.brandImage,
				ci_styles.brandName,
				title,
				pPrice,
				pColors,
				pTotalColors,
				styleImageStatus,
				pmodelImage,
				companionGroup,
				comparableGroup,
				ci_styles.cartGroupID,
				ci_styles.vendor
			FROM ci_styles
			INNER JOIN ci_products ON ci_products.styleID = ci_styles.styleID
				AND ci_products.colorStatus = 0
				AND ci_products.sizeStatus = 0
				AND ci_products.isDS = 0
				AND ci_products.qty > 0
			WHERE ci_styles.styleID <> ?
			AND ci_styles.isExistProduct = 1
			AND ci_styles.brandstatus = 0
			AND ci_styles.stylestatus = 0
			AND ci_styles.pPrice >= 1
			AND (ci_styles.comparableGroup = ? OR ci_styles.companionGroup = ?)
			GROUP BY ci_styles.styleID
		)
		SELECT * FROM (
			SELECT * FROM styles_temp
			WHERE comparableGroup = ?
			
			UNION ALL
			
			SELECT * FROM styles_temp
			WHERE companionGroup = ?
		) AS a
		ORDER BY (comparableGroup = ?) DESC, (companionGroup = ?) DESC
		LIMIT 0, ?
SQL;

	return $db->rawQuery($query, [$styleId, $comparableGroup, $companionGroup, $comparableGroup, $companionGroup, $comparableGroup, $companionGroup, $limit]);
}

function getComparableProducts($styleID, $baseCategory, $comparableGroup, $limit = 4, $excludeStyleIds = [])
{
	global $db;

	$comparableProducts = [];

	$categoryWhere = '';
	if (!empty($category))
		$categoryWhere = "AND ci_styles.baseCategory = '$baseCategory'";

	$excludeStyleIdsQuery = '';
	if (!empty($excludeStyleIds)) {
		$excludeStyleIdsString = implode("', '", $excludeStyleIds);

		$excludeStyleIdsQuery = "AND ci_styles.styleID NOT IN ('$excludeStyleIdsString')";
	}

	if (!empty($comparableGroup)) {
		$query = <<<SQL
            SELECT
                slug,
                slugCategory,
                styleImage,
                customTitle,
                ci_styles.styleID,
                ci_styles.brandImage,
                ci_styles.brandName,
                title,
                pPrice,
                pColors,
                pTotalColors,
                styleImageStatus,
                pmodelImage,
                CASE WHEN ci_shipping_groups.id IS NOT NULL THEN ci_shipping_groups.id ELSE 1 END AS cartGroupID
            FROM ci_styles
            INNER JOIN ci_products ON ci_products.styleID = ci_styles.styleID
			LEFT JOIN ci_shipping_groups ON ci_shipping_groups.id = ci_products.cartGroupID
				AND ci_shipping_groups.enabled = (1)
            WHERE comparableGroup = ?
            AND ci_styles.styleID <> ?
            AND pPrice >= 1
            AND isExistProduct = 1
			AND brandstatus = 0
			AND stylestatus = 0
            AND ci_products.qty > 0
            AND isDS = 0
            AND ci_products.colorStatus = '0'
            AND ci_products.sizeStatus = '0'
			-- AND EXISTS (
			-- 	SELECT 1 FROM ci_shipping_groups
			-- 	WHERE ci_shipping_groups.id = ci_products.cartGroupID
			-- 	AND ci_shipping_groups.enabled = (1)
			-- )
			$excludeStyleIdsQuery
            GROUP BY ci_styles.styleID
            ORDER BY bestsellerrank ASC
            LIMIT 0, ?
SQL;
		$comparableProducts = $db->rawQuery($query, [$comparableGroup, $styleID, $limit]);

		if (count($comparableProducts) < $limit) {
			$comparableStyleIds = array_column($comparableProducts, 'styleID');
			$styleIds = array_merge($excludeStyleIds, $comparableStyleIds);

			$excludeStyleIdsQuery = '';
			if (!empty($styleIds)) {
				$styleIdsString = implode("', '", $styleIds);

				$excludeStyleIdsQuery = "AND ci_styles.styleID NOT IN ('$styleIdsString')";
			}

			$query = <<<SQL
                SELECT
                    slug,
                    slugCategory,
                    styleImage,
                    customTitle,
                    ci_styles.styleID,
                    ci_styles.brandImage,
                    ci_styles.brandName,
                    title,
                    pPrice,
                    pColors,
                    pTotalColors,
                    styleImageStatus,
                    pmodelImage,
                    CASE WHEN ci_shipping_groups.id IS NOT NULL THEN ci_shipping_groups.id ELSE 1 END AS cartGroupID
                FROM ci_styles
                INNER JOIN ci_products ON ci_products.styleID = ci_styles.styleID
                    AND ci_styles.styleID <> ?
                    AND pPrice >= 1
                    AND isExistProduct = 1
                    AND ci_products.qty > 0
                    AND isDS = 0
                    AND ci_products.colorStatus = '0'
                    AND ci_products.sizeStatus = '0'
                    -- AND bestsellerrank < 200
				LEFT JOIN ci_shipping_groups ON ci_shipping_groups.id = ci_styles.cartGroupID -- AND ci_shipping_groups.enabled = (1) -- Start - Option to turn on or off groups - AP - 11/07/2022
					AND ci_shipping_groups.enabled = (1)
				WHERE 1
				-- AND EXISTS (
				-- 	SELECT 1 FROM ci_shipping_groups
				-- 	WHERE ci_shipping_groups.id = ci_products.cartGroupID
				-- 	AND ci_shipping_groups.enabled = (1)
				-- )
				$excludeStyleIdsQuery
                $categoryWhere
                GROUP BY ci_styles.styleID
				ORDER BY bestsellerrank ASC
                LIMIT 0, ?
SQL;
			$comparableProducts = array_merge(
				$comparableProducts,
				$db->rawQuery($query, [$styleID, $limit - count($comparableProducts)])
			);
		}
	}

	if (empty($comparableProducts) || count($comparableProducts) < $limit) {
		$excludeStyleIdsQuery = '';
		if (!empty($excludeStyleIds)) {
			$styleIdsString = implode("', '", $excludeStyleIds);

			$excludeStyleIdsQuery = "AND ci_styles.styleID NOT IN ('$styleIdsString')";
		}

		$query = <<<SQL
            SELECT
                slug,
                slugCategory,
                styleImage,
                customTitle,
                ci_styles.styleID,
                ci_styles.brandImage,
                ci_styles.brandName,
                title,
                pPrice,
                pColors,
                pTotalColors,
                styleImageStatus,
                pmodelImage,
                CASE WHEN ci_shipping_groups.id IS NOT NULL THEN ci_shipping_groups.id ELSE 1 END AS cartGroupID
            FROM ci_styles
            INNER JOIN ci_products ON ci_products.styleID = ci_styles.styleID
                AND ci_styles.styleID <> ?
                AND pPrice >= 1
                AND isExistProduct = 1
                AND ci_products.qty > 0
                AND isDS = 0
                AND ci_products.colorStatus = '0'
                AND ci_products.sizeStatus = '0'
                -- AND bestsellerrank < 200
			LEFT JOIN ci_shipping_groups ON ci_shipping_groups.id = p.cartGroupID -- AND ci_shipping_groups.enabled = (1) -- Start - Option to turn on or off groups - AP - 11/07/2022
				AND ci_shipping_groups.enabled = (1)
            WHERE 1
			-- AND EXISTS (
			-- 	SELECT 1 FROM ci_shipping_groups
			-- 	WHERE ci_shipping_groups.id = ci_products.cartGroupID
			-- 	AND ci_shipping_groups.enabled = (1)
			-- )
			$excludeStyleIdsQuery
            $categoryWhere
            GROUP BY ci_styles.styleID
			ORDER BY bestsellerrank ASC
            LIMIT 0, ?
SQL;

		$comparableProducts = array_merge(
			$comparableProducts,
			$db->rawQuery($query, [$styleID, $limit - count($comparableProducts)])
		);
	}

	return $comparableProducts;
}


function getCompanionProducts($styleID, $baseCategory, $companionGroup, $limit = 4, $excludeStyleIds = [])
{
	global $db;

	$companionProducts = [];

	$categoryWhere = '';
	if (!empty($category))
		$categoryWhere = "AND ci_styles.baseCategory = '$baseCategory'";

	$excludeStyleIdsQuery = '';
	if (!empty($excludeStyleIds)) {
		$excludeStyleIdsString = implode("', '", $excludeStyleIds);

		$excludeStyleIdsQuery = "AND ci_styles.styleID NOT IN ('$excludeStyleIdsString')";
	}

	if (!empty($companionGroup)) {
		$query = <<<SQL
            SELECT
                slug,
                customTitle,
                slugCategory,
                styleImage,
                ci_styles.styleID,
                ci_styles.brandImage,
                ci_styles.brandName,
                title,
                pPrice,
                pColors,
                pTotalColors,
                styleImageStatus,
                pmodelImage,
                SUM(ci_products.qty) as qtyTotal,
                -- ci_styles.cartGroupID
				CASE WHEN ci_shipping_groups.id IS NOT NULL THEN ci_shipping_groups.id ELSE 1 END AS cartGroupID
            FROM ci_styles
            INNER JOIN ci_products ON ci_products.styleID = ci_styles.styleID
			LEFT JOIN ci_shipping_groups ON ci_shipping_groups.id = ci_products.cartGroupID
				AND ci_shipping_groups.enabled = (1)
            WHERE companionGroup = ?
            AND ci_styles.styleID <> ?
            AND pPrice >= 1
            AND isExistProduct = 1
            AND ci_products.qty > 0
            AND isDS = 0
            AND ci_products.colorStatus = '0'
            AND ci_products.sizeStatus = '0'
			AND brandstatus = 0
			AND stylestatus = 0
            $excludeStyleIdsQuery
            GROUP BY ci_styles.styleID
            HAVING qtyTotal > 0
            ORDER BY bestsellerrank ASC
            LIMIT 0, ?
SQL;

		$companionProducts = $db->rawQuery($query, [$companionGroup, $styleID, $limit]);

		//         if (count($companionProducts) < $limit) {
		//             $companionStyleIds = array_column($companionProducts, 'styleID');
		//             $styleIds = array_merge($excludeStyleIds, $companionStyleIds);

		// 			$excludeStyleIdsQuery = '';
		// 			if (!empty($styleIds)) {
		//             	$styleIdsString = implode("', '", $styleIds);

		//                 $excludeStyleIdsQuery = "AND ci_styles.styleID NOT IN ('$styleIdsString')";
		// 			}

		//             $query = <<<SQL
		//                 SELECT
		//                     slug,
		//                     slugCategory,
		//                     styleImage,
		//                     customTitle,
		//                     ci_styles.styleID,
		//                     ci_styles.brandImage,
		//                     ci_styles.brandName,
		//                     title,
		//                     pPrice,
		//                     pColors,
		//                     pTotalColors,
		//                     styleImageStatus,
		//                     pmodelImage,
		//                     SUM(ci_products.qty) as qtyTotal,
		//                     ci_styles.cartGroupID
		//                 FROM ci_styles
		//                 INNER JOIN ci_products ON ci_products.styleID = ci_styles.styleID
		//                     AND ci_styles.styleID <> ?
		//                     AND pPrice >= 1
		//                     AND isExistProduct = 1
		//                     AND ci_products.qty > 0
		//                     AND isDS = 0
		//                     AND ci_products.colorStatus = '0'
		//                     AND ci_products.sizeStatus = '0'
		//                     -- AND bestsellerrank < 200
		// 				WHERE 1
		// 				AND EXISTS (
		// 					SELECT 1 FROM ci_shipping_groups
		// 					WHERE ci_shipping_groups.id = ci_products.cartGroupID
		// 					AND ci_shipping_groups.enabled = (1)
		// 				)
		// 				$excludeStyleIdsQuery
		//                 $categoryWhere
		//                 GROUP BY ci_styles.styleID
		//                 HAVING qtyTotal > 0
		//             	ORDER BY bestsellerrank ASC
		//                 LIMIT 0, ?
		// SQL;

		//             $companionProducts = array_merge(
		//                 $companionProducts,
		//                 $db->rawQuery($query, [$styleID, $limit - count($companionProducts)])
		//             );
		//         }
	}

	//     if (empty($companionProducts) || count($companionProducts) < $limit) {

	// 		$excludeStyleIdsQuery = '';
	// 		if (!empty($excludeStyleIds)) {
	//         	$styleIdsString = implode("', '", $excludeStyleIds);

	// 			$excludeStyleIdsQuery = "AND ci_styles.styleID NOT IN ('$styleIdsString')";
	// 		}

	//         $query = <<<SQL
	//             SELECT
	//                 slug,
	//                 slugCategory,
	//                 styleImage,
	//                 customTitle,
	//                 ci_styles.styleID,
	//                 ci_styles.brandImage,
	//                 ci_styles.brandName,
	//                 title,
	//                 pPrice,
	//                 pColors,
	//                 pTotalColors,
	//                 styleImageStatus,
	//                 pmodelImage,
	//                 SUM(ci_products.qty) as qtyTotal,
	//                 ci_styles.cartGroupID
	//             FROM ci_styles
	//             INNER JOIN ci_products ON ci_products.styleID = ci_styles.styleID
	//                 AND ci_styles.styleID <> ?
	//                 AND pPrice >= 1
	//                 AND isExistProduct = 1
	//                 AND ci_products.qty > 0
	//                 AND isDS = 0
	//                 AND ci_products.colorStatus = '0'
	//                 AND ci_products.sizeStatus = '0'
	//                 -- AND bestsellerrank < 200
	// 			WHERE 1
	// 			AND EXISTS (
	// 				SELECT 1 FROM ci_shipping_groups
	// 				WHERE ci_shipping_groups.id = ci_products.cartGroupID
	// 				AND ci_shipping_groups.enabled = (1)
	// 			)
	// 			$excludeStyleIdsQuery
	//             $categoryWhere
	//             GROUP BY ci_styles.styleID
	//             HAVING qtyTotal > 0
	// 			ORDER BY bestsellerrank ASC
	//             LIMIT 0, ?
	// SQL;

	//         $companionProducts = array_merge(
	//             $companionProducts,
	//             $db->rawQuery($query, [$styleID, $limit - count($companionProducts)])
	//         );
	//     }

	return $companionProducts;
}

function computeQuote($productQty, $frontQty, $backQty, $styleID, $zipcode, $colorname)
{
	global $db;

	$query = <<<SQL
SELECT * FROM ci_quote_pricelist WHERE color_quantity IN (?,?) ORDER BY from_qty desc limit 2
SQL;

	$params = array($frontQty, $backQty);
	$maximum_qty = $db->rawQuery($query, $params);

	if ((float) $productQty >= (float) $maximum_qty[0]['from_qty']) {

		$front_color_rate = array_filter($maximum_qty, function ($item) use ($frontQty) {
			return $item['color_quantity'] == $frontQty;
		});

		$back_color_rate = array_filter($maximum_qty, function ($item) use ($backQty) {
			return $item['color_quantity'] == $backQty;
		});

		$front_color['front_color_rate'] = array_column($front_color_rate, 'front_color_rate')[0];
		$back_color['back_color_rate'] = array_column($back_color_rate, 'back_color_rate')[0];
	} else {
		$query = <<<SQL
	SELECT * FROM ci_quote_pricelist WHERE ? BETWEEN from_qty AND to_qty AND color_quantity = ? AND to_qty != ''
SQL;

		$params = array($productQty, $frontQty);

		$front_color = $db->rawQueryOne($query, $params);

		$query = <<<SQL
	SELECT * FROM ci_quote_pricelist WHERE ? BETWEEN from_qty AND to_qty AND color_quantity = ? AND to_qty != ''
SQL;

		$params = array($productQty, $backQty);

		$back_color = $db->rawQueryOne($query, $params);
	}


	//Product Price
	$query = <<<SQL
SELECT * FROM ci_products WHERE styleID = ? AND colorName = ? AND customerPrice != 0 ORDER BY sizeOrder asc
SQL;
	$params = array($styleID, $colorname);
	$product = $db->rawQueryOne($query, $params);
	$productPrice = $product['customerPrice'];
	//Product Price

	//Multiplier
	$query = <<<SQL
	SELECT multiplier FROM ci_quote_text
SQL;
	$dataMul = $db->rawQueryOne($query);
	$multiplier = $dataMul['multiplier'];
	$front_color['front_color_rate'] = $front_color['front_color_rate'] * $multiplier;
	$back_color['back_color_rate'] = $back_color['back_color_rate'] * $multiplier;
	$front_color['front_color_rate'] = round($front_color['front_color_rate'], 2);
	$back_color['back_color_rate'] = round($back_color['back_color_rate'], 2);
	//Multiplier

	//EST
	$est = '';
	//EST

	$data['front_rate'] = $front_color['front_color_rate'];
	$data['back_rate'] = $back_color['back_color_rate'];
	$data['front_total_price'] = $front_color['front_color_rate'] * $productQty;
	$data['back_total_price'] = $back_color['back_color_rate'] * $productQty;

	$data['productPrice'] = $productPrice;
	$data['productPriceTotal'] = $productPrice * $productQty;

	$data['est'] = $est;

	$data['total'] = ($front_color['front_color_rate'] * $productQty) + ($back_color['back_color_rate'] * $productQty) + ($productPrice * $productQty);

	return $data;
}

/**
 * Retrieves the primary image path based on priority for different product images.
 *
 * Parameters:
 * - $params (array): An associative array of parameters.
 *      - 'frontImage' (string): Filename for the front image (required).
 *      - 'sideImage' (string): Filename for the side image (required).
 *      - 'backImage' (string): Filename for the back image (required).
 *      - 'styleImage' (string): Filename for the style image (required).
 *      - 'cartGroupID' (int): Group ID to determine if alpha images are used. Use 2 for alpha images (default is 1).
 *      - 'size' (string): Image size (e.g., 'thumbnail', 'medium', etc.). Default is 'thumbnail'.
 *      - 'alphaFrontImage' (string, optional): Filename for the alpha front image. Only used if cartGroupID is 2.
 *      - 'alphaSideImage' (string, optional): Filename for the alpha side image. Only used if cartGroupID is 2.
 *      - 'alphaBackImage' (string, optional): Filename for the alpha back image. Only used if cartGroupID is 2.
 *
 * Returns:
 * - string: The file path for the first valid image found in the priority order.
 *           Order of priority: front image > side image > back image > style image.
 *
 * Usage:
 * $primaryImage = getPrimaryImage([
 *     'frontImage' => $val['colorFrontImage'],
 *     'sideImage' => $val['colorSideImage'],
 *     'backImage' => $val['colorBackImage'],
 *     'styleImage' => $val['styleImage'],
 *     'cartGroupID' => $val['cartGroupID'],
 *     'size' => 'thumbnail',  // optional, defaults to 'thumbnail'
 *     'alphaFrontImage' => $val['alphaFrontImage'],  // optional
 *     'alphaSideImage' => $val['alphaSideImage'],    // optional
 *     'alphaBackImage' => $val['alphaBackImage']     // optional
 * ]);
 */
function getPrimaryImage($params)
{	
	global $imageManager;
	$mImage1 = "";

	// Check and assign required parameters
	$frontImage = $params['frontImage'] ?? '';
	$sideImage = $params['sideImage'] ?? '';
	$backImage = $params['backImage'] ?? '';
	$styleImage = $params['styleImage'] ?? '';
	$cartGroupID = $params['cartGroupID'] ?? 1; // default to 1 if not provided
	$size = $params['size'] ?? 'thumbnail'; // default to 'thumbnail' if not provided

	// Optional alpha images
	$alphaFrontImage = $params['alphaFrontImage'] ?? null;
	$alphaSideImage = $params['alphaSideImage'] ?? null;
	$alphaBackImage = $params['alphaBackImage'] ?? null;

	// Determine filenames based on cartGroupID
	$frontFilename = $cartGroupID == 2 ? ($alphaFrontImage ?? $frontImage) : $frontImage;
	$sideFilename = $cartGroupID == 2 ? ($alphaSideImage ?? $sideImage) : $sideImage;
	$backFilename = $cartGroupID == 2 ? ($alphaBackImage ?? $backImage) : $backImage;
	$styleFilename = $styleImage;
	$return = $params['return'] ?? 'image'; // image or object

	// Generate image paths with the specified size
	$colorFrontImagePath = newProductImagePath($frontFilename, $size, $cartGroupID);
	$colorSideImagePath = newProductImagePath($sideFilename, $size, $cartGroupID);
	$colorBackImagePath = newProductImagePath($backFilename, $size, $cartGroupID);
	$styleImagePath = newProductImagePath($styleFilename, $size, $cartGroupID);

	// Start - for abandoned carts. We should also send an email a few hours after they abandon - CL - 2102026 - 737am
	// Check each image path in order of priority and return the first valid one
	if ($isFrontExist = $imageManager->isImageExist($frontFilename, $size, $cartGroupID)) {
		$mImage1 = $colorFrontImagePath;
	} else if ($isSideExist = $imageManager->isImageExist($sideFilename, $size, $cartGroupID)) {
		$mImage1 = $colorSideImagePath;
	} else if ($isBackExist = $imageManager->isImageExist($backFilename, $size, $cartGroupID)) {
		$mImage1 = $colorBackImagePath;
	} else {
		$mImage1 = $styleImagePath;
	}
	// End - for abandoned carts. We should also send an email a few hours after they abandon - CL - 2102026 - 737am

	return $return === 'object' ? [
		'isFrontExist' => $isFrontExist,
		'isSideExist' => $isSideExist,
		'isBackExist' => $isBackExist,
		"frontFilename" => $frontFilename,
		"sideFilename" => $sideFilename,
		"backFilename" => $backFilename,
		"styleFilename" => $styleFilename,
		'frontPath' => $colorFrontImagePath,
		'sidePath' => $colorSideImagePath,
		'backPath' => $colorBackImagePath,
		'stylePath' => $styleImagePath,
		'finalImage' => $mImage1,
	] : $mImage1;
}

function __getSnsWarehouses()
{
	return [
		'IL',
		'PA',
		'KS',
		'TX',
		'GA',
		'NV',
		'FL',
		'OH',
		'CC',  //Start - add SNS new warehouses - RM - 03/03/2025
		'CN',
		'FO',
		'MA',
		'PH',
		'TD' //End - add SNS new warehouses - RM - 03/03/2025
	];
}

// implement disabled enabled what to say - SF - 12/16/2025
function getAIReviewSummary($stid)
{
	global $db;

	$query = "
    SELECT ai_review_summary
    FROM ci_styles
    WHERE styleID = ?
      AND ai_review_summary_status = 1
    LIMIT 1
  ";

	$row = $db->rawQueryOne($query, [$stid]);

	return (!empty($row) && isset($row['ai_review_summary'])) ? $row['ai_review_summary'] : null;
}
// implement disabled enabled what to say - SF - 12/16/2025

function loadRatingImages($stid)
{

	global $db;

	$query = <<<SQL
		SELECT ci_rating_images.id, filename as path, '' as alt 
		FROM ci_rating_images 
		INNER JOIN ci_rating ON ci_rating_images.ratingId = ci_rating.id 
		WHERE styleID = ? AND ci_rating.status = 0 AND ci_rating.creview != '' 
		ORDER BY reviewdate DESC
SQL;

	$images = $db->rawQuery($query, [$stid]);

	return $images;
}

function getRatingImagesByRatingId($revid)
{
	global $db;

	$query = <<<SQL
		SELECT filename
		FROM ci_rating_images 
		WHERE ratingId = ?
SQL;

	$images = $db->rawQuery($query, [$revid]);

	$filenames = array_map(function ($image) {
		return $image['filename'];
	}, $images);

	return $filenames;
}

function getDeviceOS($userAgent = null)
{
	if (!$userAgent) {
		$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
	}

	$userAgent = strtolower($userAgent);

	if (strpos($userAgent, 'android') !== false) {
		return 'Android';
	}

	if (preg_match('/iphone|ipad|ipod/', $userAgent)) {
		return 'iOS';
	}

	return 'Other';
}

function isWebView($userAgent = null)
{
	if (!$userAgent) {
		$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
	}

	// Normalize UA
	$userAgent = strtolower($userAgent);

	// Common indicators of WebViews
	$webviewIndicators = [
		'wv',                       // Android WebView
		'webview',                 // Generic
		'fbav',                    // Facebook in-app browser
		'fb_iab',                  // Facebook In-App Browser
		'instagram',              // Instagram WebView
		'line',                    // LINE browser
		'snapchat',                // Snapchat
		'okhttp',                  // Android apps often use this
		'micromessenger',          // WeChat
	];

	foreach ($webviewIndicators as $indicator) {
		if (strpos($userAgent, $indicator) !== false) {
			return true;
		}
	}

	// iOS Safari detection
	$isIOS = preg_match('/iphone|ipod|ipad/', $userAgent);
	$isSafari = strpos($userAgent, 'safari') !== false;
	$isChrome = strpos($userAgent, 'crios') !== false;

	// iOS WebViews typically don’t contain “safari” in the UA
	if ($isIOS && !$isSafari && !$isChrome) {
		return true;
	}

	return false;
}

//Start - Gangsheet Integration - RM - 07/14/2025
function dtfImageTemplate($designId, $name, $page = '')
{

	$gangsheetUrl = getenv('GANGSHEET_PREVIEW_URL');
	$imgixUrl = getenv('IMGIX_URL');

	if (strpos($designId, 'upload-') !== false) {

		$size = "";
		if ($page == "cart") {
			$size = '?w=80&h=100';
		} elseif ($page == "checkout") {
			$size = '?w=56&h=70';
		}

		return $imgixUrl . $name . $size;
	} else {
		$cleanName = preg_replace('/\.png$/i', '', $name);
		return $gangsheetUrl . $cleanName . '/thumbnail.png';
	}
}
function gangSheetAvailability()
{

	$availability = adminSettings('gangsheetavailability');
	return (isset($availability['gangsheetavailability'])) ? $availability['gangsheetavailability'] : 0;
}
//End - Gangsheet Integration - RM - 07/14/2025
function getStylesByColorFamily($colorFamily)
{
	global $db;
	$colors = $db->rawQuery('SELECT DISTINCT styleID from ci_products where colorFamily = ? AND qty > 0 AND isDS = 0 AND colorStatus = 0 AND sizeStatus = 0', array($colorFamily));
	return array_column($colors, 'styleID');
}

function getShopperApprovedTotalRev($default = "total_reviews")
{
	global $db;
	$shopper = $db->rawQueryOne("SELECT total_reviews, 5_star from ci_shopperapprovedreviewaggregates");
	return $shopper[$default];
}

?>