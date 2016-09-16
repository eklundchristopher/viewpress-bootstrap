{{--
By default, the WordPress Search widget has no title, so we'll need to compensate
by adding the opening Bootstrap v4 card-block, which otherwise is provided by
the after_title widget attribute. If however, you decide to add a title to
your search widget, you should also remove the card-block tag below.
--}}

<div class="card-block">

    <form role="search" method="get" id="searchform" class="searchform" action="{{ esc_url(home_url('/')) }}">
        <div>
            <label class="screen-reader-text" for="s">Search for:</label>
            <input type="text" value="{{ get_search_query() }}" name="s" id="s" />
            <input type="submit" id="searchsubmit" value="Search" />
        </div>
    </form>
