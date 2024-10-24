<form role="search" method="get" id="searchform"
    class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="form-group blog-search">
        <div class="form-control-wrapper form-search">
            <input type="text" class="form-control" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search..."/>
        </div>
    </div>
</form>