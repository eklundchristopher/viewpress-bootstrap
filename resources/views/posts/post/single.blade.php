@through('EklundChristopher\ViewPressBootstrap\PostsController@single')
@extends('layout')

@section('content')
    
    @if (have_posts())
        @while (have_posts())
            <?php the_post(); ?>

            <article data-id="{{ get_the_ID() }}">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>{{ get_the_title() }}</h2>
                    </div>

                    <div class="panel-body">
                        @if ($image = get_the_post_thumbnail(get_the_ID(), null, ['class' => 'img-responsive']))
                            <a href="{{ get_the_post_thumbnail_url() }}" target="_blank">{!! $image !!}</a>
                        @endif

                        <br>

                        <big class="text-justify">{{ the_content() }}</big>

                        @if ($tags = get_the_tags())
                            <br>

                            @foreach ($tags as $tag)
                                <a href="{{ get_tag_link($tag->term_id) }}" class="btn btn-xs btn-primary tag tag-{{ $tag->term_id }}">
                                    {{ $tag->name }}
                                </a>
                            @endforeach
                        @endif
                    </div>

                    <div class="panel-footer clearfix">
                        <time datetime="{{ get_the_date() }} {{ get_the_time() }}">
                            {{ get_the_date() }}
                        </time>

                        <div class="pull-right">
                            Published by <a href="{{ get_author_posts_url(get_the_author_ID()) }}">{{ get_the_author() }}</a>

                            @if ($categories = get_the_category())
                                in 
                                {!! 
                                    collect($categories)->map(function ($category) { 
                                        return '<a href="'.get_category_link($category->term_id).'">'.$category->name.'</a>';
                                    })->implode(',') 
                                !!}
                            @endif
                        </div>
                    </div>
                </div>
            </article>

            <br>
            <br>

            @if ($comments = get_comments(['post_id' => get_the_ID()]))
                <section class="comments">
                    <a name="comments"></a>

                    @foreach ($comments as $comment)
                        <article data-id="{{ $comment->comment_ID }}">
                            <div class="panel panel-default">
                                <div class="panel-heading clearfix">
                                    <strong>{{ get_comment_author() }}</strong> said

                                    <div class="pull-right text-muted">
                                        {{ get_comment_date() }}
                                    </div>
                                </div>

                                <div class="panel-body">
                                    {{ get_comment_text() }}
                                </div>
                            </div>
                        </article>
                    @endforeach
                </section>
            @endif
        @endwhile
    @endif

@stop
