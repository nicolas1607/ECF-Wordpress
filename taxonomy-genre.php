<?php get_header(); ?>

<div class="container">
    <h1>Catégorie : <?php echo get_queried_object()->name; ?></h1>
    <div class="blog-grid">
        <?php if (have_posts()) {
            while (have_posts()) {
                the_post(); ?>
                <article class="card">
                    <img src="<?php echo get_field('recipe_thumbnail') ?>" class="card-illustration">
                    <ul class="card-terms-list">
                        <?php foreach (get_field('recipe_category') as $cat) {
                            $res = get_the_category_by_ID($cat); ?>
                            <li class="card-terms-item">
                                <a href="<?php echo get_term_link($res, 'genre'); ?>" class="card-terms-link"><?php echo $res; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                    <h3 class="card-title"><?php the_title(); ?></h3>
                    <ul class="card-meta-list">
                        <li class="card-meta-item"><?php echo get_field('recipe_timer'); ?></li>
                        <li class="card-meta-item"><?php echo get_field('recipe_portions') . ' portions'; ?></li>
                    </ul>
                    <a href="<?php the_permalink(); ?>" class="card-link">Voir la recette</a>
                </article>
        <?php }
        } ?>
    </div>
    <nav class="pagination">
        <?php the_posts_pagination(); ?>
    </nav>
</div>

<?php get_footer(); ?>