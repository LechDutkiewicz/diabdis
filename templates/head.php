<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">

  <meta property="og:title" content="<?php the_title(); ?>" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="<?php the_permalink(); ?>" />
  <meta property="og:image" content="<?php echo get_thumbnail_src(); ?>" />

  <?php wp_head(); ?>
</head>
