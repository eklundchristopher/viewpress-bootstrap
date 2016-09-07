@through('EklundChristopher\ViewPressBootstrap\PostsController@single')

@extends('layout')

@section('content')
    
    @if (have_posts())
        @while (have_posts())
            <?php the_post(); ?>

            <article data-id="{{ get_the_ID() }}">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            <a href="{{ get_permalink() }}">
                                {{ get_the_title() }}
                            </a>
                        </h2>

                        {{ $test or 'test' }}
                    </div>
                </div>
            </article>
        @endwhile
    @endif

@stop
