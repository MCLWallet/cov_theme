<form id="search-form" class="search-form <?php echo (is_search() ? 'open' : '');  ?>  col-lg-8" action="/" method="get">
  <label for="search">Suche nach: </label>
  <input type="text" name="s" id="search" placeholder="Hier Suchbegriff eingeben und Enter drücken" value="<?php the_search_query(); ?>" />
  <input class="search-icon" type="image" alt="Search" src="<?php bloginfo( 'template_url' ); ?>/assets/img/search.png" />
</form>