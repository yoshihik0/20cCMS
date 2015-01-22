<?php
//動作環境：PHP ver5.3以上、allow_url_fopenがOnのサーバー

//初期設定

//Markdownを使う場合は、
//https://github.com/erusev/parsedown から、
//Parsedown.phpをダウンロードして
//このファイルと同じフォルダに置き、
//以下の3行の行頭の「//」を削除する。
//include('Parsedown.php');
//$Parsedown = new Parsedown();
//$markdown = 1;

//dropBoxのPublicフォルダのURL（ftpのフォルダでも可）
$dropBox = 'https://dl.dropboxusercontent.com/u/190329/cms/';

//はじめに表示するページ（ページを指定しない時に表示するページ）
$defaultPage = 'p1';

//項目の区切りを示す記号
$split = '$$$';

//Markdownを使った項目を示す記号
$markdownFlag = '[md]';

//設定ここまで



//ページIDの取得
$id = $_GET[id];
if(empty($_GET[id])){
    $id = $defaultPage;
}

//ファイルの読み込み、項目ごとに配列$dataArrayに分割
$file = file_get_contents($dropBox.'common.txt');
$file = $file.file_get_contents($dropBox.$id.'.txt');
$dataArray = explode($split, $file);

//連想配列$cmsに挿入
$cms = [];
for($i = 0; $i <= count($dataArray) - 1; $i++){

    $tag = (strstr($dataArray[$i], "\n", $before_needle = true));
    $content = strstr($dataArray[$i], "\n");

    //Markdownの展開
    if(isset($markdown) && strstr($content, $markdownFlag)){
        $content = str_replace($markdownFlag, '', $content);
        $content = $Parsedown->text($content);
    }
    $cms[$tag] = $content;
}
?>
