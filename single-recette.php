<?php get_header(); ?>

<article class="recipe">
    <header class="recipe-header">
        <div class="container">
            <?php $postCat = [];
            $postID = [];
            $postID[] = get_post()->ID; ?>
            <div class="recipe-header-img">
                <img src="<?php echo get_field('recipe_thumbnail') ?>" class="card-illustration">
            </div>
            <div class="recipe-header-img">
                <?php $img = get_field('recipe_image');
                echo wp_get_attachment_image($img, 'recipe_image', true, array('class' => 'recipe-illustration')); ?>
            </div>
            <div class="recipe-header-content">
                <h1 class="recipe-title"><?php the_title(); ?></h1>
                <ul class="recipe-meta-list">
                    <li class="recipe-meta-item quantity"><?php echo get_field('recipe_portions') . ' portions'; ?></li>
                    <li class="recipe-meta-item duration"><?php echo get_field('recipe_timer'); ?></li>
                </ul>
                <ul class="recipe-terms-list">
                    <?php $list_cat = '';
                    foreach (get_field('recipe_category') as $cat) {
                        $postCat[] = $cat;
                        $list_cat .= get_term($cat, 'genre')->slug . ', ';
                        $res = get_the_category_by_ID($cat); ?>
                        <li class="recipe-terms-item">
                            <a href="<?php echo get_term_link($cat, 'genre'); ?>" class="recipe-terms-link"><?php echo $res; ?></a>
                        </li>
                    <?php }
                    $list_cat = substr($list_cat, 0, -2);
                    ?>
                </ul>
                <div class="recipe-ingredients-content">
                    <h2>Ingrédients</h2>
                    <ul class="recipe-ingredients-list">
                        <?php if (have_rows('recipe_ingredients')) {
                            while (have_rows('recipe_ingredients')) {
                                the_row(); ?>
                                <li class="recipe-ingredients-item"><?php echo get_sub_field('recipe_ingredient'); ?></li>
                        <?php }
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <section class="recipe-steps">
        <div class="container">
            <h2>Préparation</h2>
            <ol class="recipe-steps-list">
                <?php if (have_rows('recipe_steps')) {
                    while (have_rows('recipe_steps')) {
                        the_row(); ?>
                        <li class="recipe-steps-item"><?php echo get_sub_field('recipe_step'); ?></li>
                <?php }
                } ?>
            </ol>
        </div>
    </section>
    <footer class="related-recipes">
        <div class="container">
            <h2>Vous pourriez aussi aimer ...</h2>
            <div class="blog-grid">
                <?php if (have_rows('recipes_more')) {
                    $i = 0;
                    while (have_rows('recipes_more')) {
                        the_row();
                        $i++;
                        $recipe = get_sub_field('recipe_more');
                        $postID[] = $recipe->ID; ?>
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

                <?php
                $args = array(
                    'post_type'         => 'recette',
                    'posts_per_page'    => 3 - $i,
                    'post__not_in'      => $postID,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'genre',
                            'field' => 'term_id',
                            'terms' => $postCat,
                        )
                    ),
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
        </div>
    </footer>

</article>

<?php get_footer(); ?>