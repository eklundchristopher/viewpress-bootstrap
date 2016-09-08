@through('EklundChristopher\ViewPressBootstrap\PostsController@single')

@extends('layout')

@section('content')

    @if (have_posts())
        @while (have_posts())
            <?php the_post(); ?>

            <article data-id="{{ get_the_ID() }}">
                <div class="card card-viewpress">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ get_the_title() }}
                        </h3>
                    </div>

                    <div class="card-block">
                        @if ($image = get_the_post_thumbnail(get_the_ID(), null, ['class' => 'img-fluid']))
                            <a href="{{ get_the_post_thumbnail_url() }}" target="_blank">{!! $image !!}</a>
                        @endif

                        <br>

                        <div class="text-justify">
                            {{ the_content() }}
                        </div>

                        @if ($tags = get_the_tags())
                            <br>

                            @foreach ($tags as $tag)
                                <a href="{{ get_tag_link($tag->term_id) }}" class="btn btn-sm btn-viewpress term term-{{ $tag->term_id }}">
                                    {{ $tag->name }}
                                </a>
                            @endforeach
                        @endif
                    </div>

                    <div class="card-footer clearfix">
                        <time datetime="{{ get_the_date() }} {{ get_the_time() }}">
                            {{ get_the_date() }}
                        </time>

                        <div class="pull-sm-right">
                            Published by <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}">{{ get_the_author() }}</a>

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
                            <div class="card card-viewpress">
                                <a name="comment-{{ $comment->comment_ID }}"></a>

                                <div class="card-block">
                                    {{ get_comment_text($comment->comment_ID) }}
                                </div>

                                <div class="card-footer text-muted">
                                    <strong>{{ get_comment_author($comment->comment_ID) }}</strong>

                                    {{ __('commented on the', 'viewpress-bootstrap') }}

                                    {{ get_comment_date('', $comment->comment_ID) }}
                                </div>
                            </div>
                        </article>
                    @endforeach
                </section>
            @endif
        @endwhile
    @endif

@stop
