<?php get_header(); ?>

<section class="about">
    <div class="container">
        <h1><?php echo get_field('intro_title', 'option'); ?></h1>
        <p><?php echo get_field('intro_description', 'option'); ?></p>
        <a href="<?php echo get_field('intro_link', 'option'); ?>" class="btn"><?php echo get_field('intro_button', 'option'); ?></a>
    </div>
</section>
<section class="latest-news">
    <div class="container">
        <?php if (get_field('posts_nb', 'option')) $nb = get_field('posts_nb', 'option');
        else $nb = 3;
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $nb
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) { ?>
            <?php while ($query->have_posts()) { ?>
                <?php $query->the_post(); ?>
                <article class="card">
                    <img class="card-illustration" src="<?php echo get_field('article_image') ?>">
                    <ul class="card-terms-list">
                        <?php $cat = get_the_category();
                        foreach ($cat as $c) { ?>
                            <li class="card-terms-item">
                                <a href="<?php echo get_term_link($c, 'genre'); ?>" class="card-terms-link"><?php echo $c->name; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                    <h2 class="card-title"><?php the_title(); ?></h2>
                    <p class="card-excerpt">
                        <?php $desc = get_field('article_desc');
                        if ($desc) echo $desc . ' [...]';
                        else echo get_the_excerpt(); ?>
                    </p>
                    <a href="<?php the_permalink(); ?>" class="card-link">Lire l'article</a>
                </article>
            <?php } ?>
        <?php }
        wp_reset_postdata(); ?>
    </div>
</section>
<section class="popular-recipes" id="popular-recipes">
    <div class="container">
        <h2>Recettes populaires</h2>
        <a href="<?php echo get_post_type_archive_link('recette'); ?>" class="see-more">Toutes les recettes</a>

        <?php if (have_rows('recipes_recipes', 'option')) {
            $i = 0;
            $postsID = [];
            while (have_rows('recipes_recipes', 'option')) {
                the_row();
                $i++;
                $recipe = get_sub_field('recipes_recipe', 'option');
                $postsID[] = $recipe->ID; ?>
                <article class="card">
                    <?php $imgID = get_post_field('recipe_thumbnail', $recipe); ?>
                    <img src="<?php echo wp_get_attachment_image_src($imgID, 'large')[0]; ?>" class="card-illustration">
                    <ul class="card-terms-list">
                        <?php $cat = get_post_field('recipe_category', $recipe);
                        foreach ($cat as $c) {
                            $res = get_the_category_by_ID($c); ?>
                            <li class="card-terms-item">
                                <a href="<?php echo get_term_link($res, 'genre'); ?>" class="card-terms-link"><?php echo $res; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                    <h3 class="card-title"><?php echo get_post_field('recipe_title', $recipe); ?></h3>
                    <ul class="card-meta-list">
                        <li class="card-meta-item"><?php echo get_post_field('recipe_timer', $recipe); ?></li>
                        <li class="card-meta-item"><?php echo get_post_field('recipe_portions', $recipe) . ' portions'; ?></li>
                    </ul>
                    <a href="<?php echo get_post_permalink(get_post($recipe)); ?>" class="card-link">Voir la recette</a>
                </article>
            <?php } ?>
        <?php } ?>

        <?php $args = array(
            'post_type'         => 'recette',
            'posts_per_page'    => 6 - $i,
            'post__not_in'      => $postsID
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) { ?>
            <?php while ($query->have_posts()) {
                $query->the_post(); ?>
                <article class="card">
                    <img src="<?php echo get_field('recipe_thumbnail') ?>" class="card-illustration">
                    <ul class="card-terms-list">
                        <?php $cat = get_field('recipe_category');
                        foreach ($cat as $c) {
                            $res = get_the_category_by_ID($c) ?>
                            <li class="card-terms-item">
                                <a href="<?php echo get_term_link($c, 'genre'); ?>" class="card-terms-link"><?php echo $res; ?></a>
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
            <?php } ?>
        <?php }
        wp_reset_postdata(); ?>
    </div>
</section>
<section class="subscribe">
    <div class="container">
        <div class="subscribe-content">
            <h2><?php echo get_field('news_title', 'option'); ?></h2>
            <p><?php echo get_field('news_description', 'option'); ?></p>
        </div>
        <div class="subscribe-link">
            <a href="<?php echo get_field('news_link', 'option')['url']; ?>" class="btn btn-secondary"><?php echo get_field('news_button', 'option'); ?></a>
        </div>
    </div>
</section>
<section class="who-am-i">
    <div class="container">
        <figure class="who-am-i-illustration">
            <?php echo wp_get_attachment_image(get_field('presentation_image', 'option'), 'img-presentation', true, array()); ?>
        </figure>
        <div class="who-am-i-content">
            <h2><?php echo get_field('presentation_title', 'option'); ?></h2>
            <p><?php echo get_field('presentation_description', 'option'); ?></p>
            <a href="<?php echo get_field('presentation_link', 'option'); ?>" class="btn"><?php echo get_field('presentation_button', 'option'); ?></a>
        </div>
    </div>
</section>

<?php get_footer(); ?>