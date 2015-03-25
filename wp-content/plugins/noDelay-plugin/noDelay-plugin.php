<?php
/*
 *  Plugin Name: noDelay-plugin
 *  Description: Sends ID to the saved URL everytime a post/page/comment is created.
 *  Version: 1.0
 *  Author: Priyanka
 *  License: GPL2
 *
*/
/****This action runs when a new post is published ****/
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 1);

function post_published_notification( $ID, $post) {
  $permalink = get_permalink( $ID );
  $pfx_date = get_the_date('d/m/Y');
  $file = '/var/www/wordpress/wp-content/plugins/notify-publish/append.txt';
  list($data, $data1) = explode("?", $permalink);
  $noDelay_url = get_option('nodelay_url');
  $url = $noDelay_url['text_string'];
  $noDelay_authtoken = get_option('nodelay_authtoken');
  $auth_token = $noDelay_authtoken['text_string'];
  $handle = curl_init();
  curl_setopt($handle, CURLOPT_URL, $url);
  curl_setopt($handle, CURLOPT_POST, 1);
  curl_setopt($handle, CURLOPT_POSTFIELDS, "url=" . $data1);
  curl_setopt($handle, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt_array($handle, array(
    CURLOPT_HTTPHEADER  => array('authentication token:' . $auth_token),
    CURLOPT_RETURNTRANSFER  =>true,
    CURLOPT_VERBOSE     => 1
  ));
  $response = curl_exec($handle);
  curl_close($handle);
  $response_xml = json_decode($response);
  print_r($response_xml);
}

add_action('publish_post', 'post_published_notification', 10, 2);

/****This action runs when a new page is published ****/

function page_published_notification( $ID, $page) {
  $permalink = get_permalink( $ID );
  $file = '/var/www/wordpress/wp-content/plugins/notify-publish/append.txt';
  list($data, $data1) = explode("?", $permalink);
  $noDelay_url = get_option('nodelay_url');
  $url = $noDelay_url['text_string'];
  $noDelay_authtoken = get_option('nodelay_authtoken');
  $auth_token = $noDelay_authtoken['text_string'];
  $handle = curl_init();
  curl_setopt($handle, CURLOPT_URL, $url); 
  curl_setopt($handle, CURLOPT_POSTFIELDS, "url=" . $data1);
  curl_setopt($handle, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt_array($handle, array(
    CURLOPT_HTTPHEADER  => array('authentication token:' . $auth_token),
    CURLOPT_RETURNTRANSFER  =>true,
    CURLOPT_VERBOSE     => 1
  ));
  $response = curl_exec($handle);
  curl_close($handle);
  $response_xml = json_decode($response);
  print_r($response_xml);      
}

add_action( 'publish_page', 'page_published_notification', 10, 2);

/****This action runs when a new comment is added ***/

function comment_posted( $comment_id) {
  $permalink = get_comment_link( $comment_id); 
  $file = '/var/www/wordpress/wp-content/plugins/notify-publish/append.txt';
  list($data, $data1) = explode("#", $permalink);
  $noDelay_url = get_option('nodelay_url');
  $url = $noDelay_url['text_string'];
  $noDelay_authtoken = get_option('nodelay_authtoken');
  $auth_token = $noDelay_authtoken['text_string'];
  $handle = curl_init();
  curl_setopt($handle, CURLOPT_URL, $url);
  curl_setopt($handle, CURLOPT_POST, 1);
  curl_setopt($handle, CURLOPT_POSTFIELDS, "url=" . $data1);
  curl_setopt($handle, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt_array($handle, array(
    CURLOPT_HTTPHEADER  => array('authentication token:' . $auth_token),
    CURLOPT_RETURNTRANSFER  =>true,
    CURLOPT_VERBOSE     => 1
  ));
  $response = curl_exec($handle);
  curl_close($handle);
  $response_xml = json_decode($response);
  print_r($response_xml);
}

add_action( 'comment_post', 'comment_posted');

include(__DIR__ . '/settings.php');