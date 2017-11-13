<?php
	
$widget = $vars["entity"];

$news_image = $widget->news_image;
$news_text = $widget->news_text;
$news_link = $widget->news_link;

$rss = $widget->rss;

$news_body = "";
if($news_image){
	$news_body .= elgg_view("output/img", array("src" => $news_image));
}

if($news_text){
	$news_body .= "<div class='pleio-widgets-rss-news-text'><div>" . elgg_view("output/text", array("value" => $news_text)) . "</div></div>";
}

if($news_body){
	echo "<div class='pleio-widgets-rss-news-header'>";
	if($news_link){
		echo elgg_view("output/url", array("text" => $news_body , "href" => $news_link));
	} else {
		echo $news_body;
	}
	echo "</div>";
}

$all_items = [];
if(!empty($rss)){
	
	$feed = new SimplePie(html_entity_decode($rss), WIDGETS_RSS_CACHE_LOCATION, WIDGETS_RSS_CACHE_DURATION);
	$num_posts_in_feed = $feed->get_item_quantity(3);
	if($num_posts_in_feed){
		foreach ($feed->get_items(0, $num_posts_in_feed) as $item){
			$key = $item->get_date('U');
			while(array_key_exists($key, $all_feeds)){
				$key++;
			}
			$all_items[$key] = $item;
		}
	}
}

if(empty($all_items)){
	return;
}

krsort($all_items);
$all_items = array_slice($all_items, 0, 3);
echo "<div class='elgg-output'>";
echo "<ul>";
foreach($all_items as $item){
	echo "<li><a href='" . $item->get_permalink() . "'>" . $item->get_title() . "</a></li>";
}
echo "</ul>";
echo "</div>";