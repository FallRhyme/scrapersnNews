<?php
// Create DOM from URL or file
$html = file_get_contents('https://news.google.com.tw/');

 $pattern = [
        'link' => '/<div class="esc-secondary-article-title-wrapper.*">.*<a.* href="(.*)".*<.*a>/U',
        'title' => '/<div class="esc-secondary-article-title-wrapper.*">.*<span class="titletext">.*<.*span>/U',
    ];//依次为列表页匹配详细页正则，列表页缩略图url正则，文章标题正则，文章内容正则，文章图片地址正则

// Find all link
preg_match_all($pattern['link'],$html,$link);
// Find all title
preg_match_all($pattern['title'],$html,$title);
foreach ($link as $_key => $_value) {
	if($_key>0){
	foreach ($_value as $key => $value) {
	print_r("<a href=".$value.">".$title[0][$key]."</a><br>");
}
}
}

?>