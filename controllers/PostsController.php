<?php

namespace EklundChristopher\ViewPressBootstrap;

class PostsController
{
    /**
     * Handle any requests to a single post.
     *
     * @return array|void
     */
    public function single()
    {
        return [
            'custom' => 'Hello World',
        ];
    }

    /**
     * Handle any requests to the posts archive.
     *
     * @return array|void
     */
    public function archive()
    {
        // Do things...
    }
}
