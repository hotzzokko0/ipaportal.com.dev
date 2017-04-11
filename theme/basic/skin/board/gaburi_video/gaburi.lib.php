<?php
if (!defined('_GNUBOARD_')) exit;

/*************************************************************************
**
**  ����� ����� �Լ� ����
**
**  Code by Gaburi
**  cwh727@gmail.com
**  Last updated 2015.08.20
**
**  ���� �ڵ�� ���� ������ �°� �����ϼŵ� �˴ϴ�.
**  �ٸ�, ����� �������ڿ� ���� ���Ƿ� ��ó�� ��� ǥ���Ͽ� �ֽø� �����ϰڽ��ϴ�.
**
*************************************************************************/


/////////////////////////////////////////////////////////////////////
// �Խ��� ����� ���߾ �����ϼ���

// ������ ��� ������ ����
$movie_width = "100%";
$movie_height = "641";

// ������ ������ ����
/*$thumb_width = "160";
$thumb_height = "90";*/
$thumb_width = "270";
$thumb_height = "160";
/////////////////////////////////////////////////////////////////////

// ��Ʃ�� ������ �ּҿ��� ������ ID�� �����ϴ� �Լ�
function get_youtubeid($url) {
    $id = str_replace("https://youtu.be/", "", $url);
    $id = str_replace("http://youtu.be/", "", $id);
    $id = str_replace("https://www.youtube.com/watch?v=", "", $id);
    $id = str_replace("http://www.youtube.com/watch?v=", "", $id);
    
    return $id;
}

function get_vimeoid($url) {
    $id = str_replace("https://vimeo.com/channels/staffpicks/", "", $url);
    $id = str_replace("https://vimeo.com/channels/staffpicks/", "", $id);
    $id = str_replace("https://vimeo.com/", "", $id);
    $id = str_replace("http://vimeo.com/", "", $id);

    return $id;
}

function get_vimeoThumb($id) {
    $apiurl = "http://vimeo.com/api/v2/video/".$id.".xml";
    $response = file_get_contents($apiurl);
    $xml = simplexml_load_string($response);

    $thumbUrl = $xml->video->thumbnail_medium;

    return $thumbUrl;
}

?>