<?php

var_dump($_GET);

$options;

if (!empty($_GET['genre'])) {
    $selectedGenre = get_terms([
        'taxonomy' => 'genre',
        'slug' => $_GET['genre']
    ]);

    $options['tax_query'] = [
        [
            'taxonomy' => 'genre',
            'field' => 'term_id',
            'terms' => $selectedGenre[0]->term_id
        ]
    ];
}

if (!empty($_GET['order'])) {
    $selectedOrder = $_GET['order'];
}

$artists = get_posts([
    'post_type' => 'artists',
    'posts_per_page' => -1,
    'order' => $selectedOrder ?? 'ASC',
    $options
]);

var_dump($artists);