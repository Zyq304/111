<?php

/**
 * @description: json
 * @param {array} $json
 */
function json($json = [])
{
	@header('Content-Type: application/json');
	unset($_SESSION['code']);
	exit(json_encode($json));
}

function getCommentTitle($id)
{
    global $DB;

    $row = $DB->get_row("SELECT * FROM `comment` WHERE id = ".$id);


    $row2 = $DB->get_row("SELECT * FROM `post` WHERE id = ".$row['post_id']);

    if($row2){
        return $row2['title'];
    }
    return "";


}

function getCategoryName($id)
{
    global $DB;
    $row = $DB->get_row("SELECT * FROM `category` WHERE id = ".$id);


    if($row){
        return $row['title'];
    }
    return "";
}
function getBoardName($id)
{
    global $DB;
    $row = $DB->get_row("SELECT * FROM `board` WHERE id = ".$id);


    if($row){
        return $row['title'];
    }
    return "";
}

function getUserName($id)
{
    global $DB;
    $row = $DB->get_row("SELECT * FROM `user` WHERE id = ".$id);


    if($row){
        return $row['name'];
    }
    return "";
}

function getUserAvatar($id)
{
    global $DB;
    $row = $DB->get_row("SELECT * FROM `user` WHERE id = ".$id);


    if($row['photo']){
        return $row['photo'];
    }
    return "assets/img/avatar.png";
}

function getBlock($id)
{
    global $DB;
    $row = $DB->get_row("SELECT * FROM `block` WHERE id = ".$id);


    if($row){
        return $row['content'];
    }
    return "";
}

/**
 * @description: IP
 * @return {string} IP
 */
function getip()
{
	if (getenv('HTTP_CLIENT_IP')) {
		$ip = getenv('HTTP_CLIENT_IP');
	}
	if (getenv('HTTP_X_REAL_IP')) {
		$ip = getenv('HTTP_X_REAL_IP');
	} elseif (getenv('HTTP_X_FORWARDED_FOR')) {
		$ip = reset(explode(',', getenv('HTTP_X_FORWARDED_FOR')));
	} elseif ($_SERVER['REMOTE_ADDR']) {
		$ip = $_SERVER['REMOTE_ADDR'];
	} else {
		$ip = '0.0.0.0';
	}

	return $ip;
}


function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
    $theValue = addslashes($theValue) ;

    switch ($theType) {
        case "text":
            $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
            break;
        case "long":
            $theValue = ($theValue != ""||$theValue==0) ? doubleval($theValue) : "NULL";
            break;
        case "int":
            $theValue = ($theValue != ""||$theValue==0) ? intval($theValue) : "NULL";
            break;
        case "double":
            $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
            break;
        case "date":
            $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
            break;
        case "defined":
            $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
            break;
        default:
            $theValue = ($theValue != "") ? $theValue: "NULL";
            break;
    }
    return $theValue;
}


function CroppedThumbnail($imgSrc,$thumbnail_width,$thumbnail_height,$rt,$del=1) { //$imgSrc is a FILE - Returns an image resource.
    //getting the image dimensions

    include_once ('image.class.php');
    $image = new Image();
    $rt2 = $image->thumb($imgSrc,$thumbnail_width,$thumbnail_height,1);

    $rt3=explode("/",$rt2['path']);

    $tst=$rt3[count($rt3)-1];

    if($del){
        @unlink($imgSrc);
    }

    return $tst;



}


/**
 * Comment
 */
function getCommentlist($post_id,$parent_id = 0,&$result = array()){
    global $DB;
    $arr = $DB->getAll("SELECT * FROM `comment` WHERE status=1 and post_id=".$post_id." and parent_id = ".$parent_id." order by create_time desc");

    if(empty($arr)){
        return array();
    }
    foreach ($arr as $cm) {
        $thisArr=&$result[];
        $cm["children"] = getCommentlist($post_id,$cm["id"],$thisArr);
        $thisArr = $cm;
    }
    return $result;
}

function getJW($address){

    $apiKey = API_KEY;



    $url = "https://maps.googleapis.com/maps/api/geocode/json?key={$apiKey}&address=" . urlencode($address);


    $response = file_get_contents($url);
    $result = json_decode($response, true);

    if ($result['status'] == 'OK') {
        $latitude = $result['results'][0]['geometry']['location']['lat'];
        $longitude = $result['results'][0]['geometry']['location']['lng'];

        return [$longitude,$latitude];


    } else {
        return ['',''];
    }

}

