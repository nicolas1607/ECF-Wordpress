<?php
/*
Template Name: Search Page
*/
get_header(); ?>

<div class="container">
    <?php global $wp_query;
    $wp_query->set('posts_per_page', 5);
    $total_results = $wp_query->found_posts;
    if ($total_results == 0) { ?>
        <h1>Aucun résultat associé à "<?php the_search_query(); ?>"</h1>
        <p>Précisez votre recherche ou pensez à faire un tour sur <a href="<?php echo get_home_url(); ?>/blog">notre blog</a>.</p>
    <?php } else { ?>
        <h1>Résultats de la recherche "<?php the_search_query(); ?>"</h1>
        <p>Votre recherche a rertourné <?php echo $total_results; ?> résultats</p>
        <ul class="search-results-list">
            <?php while (have_posts()) {
                the_post(); ?>
                <li class="search-results-item">
                    <h2><?php the_title(); ?></h2>
                    <p><?php the_excerpt(); ?></p>
                    <a href="<?php the_permalink(); ?>">Lire la suite</a>
                </li>
            <?php } ?>
        </ul>
        <nav class="pagination">
            <?php the_posts_pagination(); ?>
        </nav>
    <?php } ?>
</div>

<?php get_footer(); ?>