<?php

global $wp_query;

return view('home', [
    'wp_query' => $wp_query,
]);
