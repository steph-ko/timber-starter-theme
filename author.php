<?php

/**
 * The template for displaying Author Archive pages
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

use Timber\{PostQuery, Timber, User};

global $wp_query;

$context          = Timber::context();
$context['posts'] = new PostQuery();
if (isset($wp_query->query_vars['author'])) {
  $author            = new User($wp_query->query_vars['author']);
  $context['author'] = $author;
  $context['title']  = 'Author Archives: ' . $author->name();
}
Timber::render(array('author.twig', 'archive.twig'), $context);
