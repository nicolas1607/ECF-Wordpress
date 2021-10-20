<?php get_header(); ?>

<div class="container">
    <?php if (have_posts()) { ?>
        <h1>
            <?php if (is_category()) {
                single_cat_title('Catégorie: ');
            } else {
                echo 'Autre';
            } ?>
        </h1>
        <div class="blog-grid">
            <?php while (have_posts()) {
                the_post(); ?>
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
                    <p class="card-excerpt"><?php echo get_the_excerpt(); ?></p>
                    <a href="<?php the_permalink(); ?>" class="card-link">Lire l'article</a>
                </article>
            <?php } ?>
        </div>
    <?php } ?>
    <nav class="pagination">
        <?php the_posts_pagination(); ?>
    </nav>
</div>

<?php get_footer(); ?>