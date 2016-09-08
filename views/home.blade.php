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
                    </div>

                    <div class="panel-body clearfix">
                        @if ($image = get_the_post_thumbnail(get_the_ID(), 'thumbnail', ['class' => 'img-thumbnail']))
                            <div class="pull-left" style="margin-right: 20px">
                                <a href="{{ get_permalink() }}">{!! $image !!}</a>
                            </div>
                        @endif

                        {{ the_excerpt() }}

                        @if ($tags = get_the_tags())
                            <hr>

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

                            (<a href="{{ get_comments_link() }}">{{ comments_number() }}</a>)
                        </div>
                    </div>
                </div>
            </article>
        @endwhile

        {!! viewpress_pagination() !!}
    @endif

@stop
