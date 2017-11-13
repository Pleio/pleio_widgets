<?php

$widget = $vars["entity"];

// news image
echo "<div>";
echo elgg_echo("pleio_widgets:widgets:rss_news:settings:news:image");
echo elgg_view("input/url", array("name" => "params[news_image]", "value" => $vars["entity"]->news_image));
echo "</div>";

// news text
echo "<div>";
echo elgg_echo("pleio_widgets:widgets:rss_news:settings:news:text");
echo elgg_view("input/plaintext", array("name" => "params[news_text]", "value" => $vars["entity"]->news_text));
echo "</div>";

// news link
echo "<div>";
echo elgg_echo("pleio_widgets:widgets:rss_news:settings:news:link");
echo elgg_view("input/url", array("name" => "params[news_link]", "value" => $vars["entity"]->news_link));
echo "</div>";

// rss
echo "<div>";
echo elgg_echo("pleio_widgets:widgets:rss_news:settings:rss");
echo elgg_view("input/url", array("name" => "params[rss]", "value" => $vars["entity"]->rss));
echo "</div>";
