<?php get_header(); ?>

<article class="post">
    <header class="post-header">
        <div class="container">
            <figure class="post-header-illustration">
                <img src="<?php echo get_field('article_image'); ?>" alt="La pêche parfaite est-elle un abricot ?" class="post-header-img">
            </figure>
            <div class="post-header-content">
                <h1 class="post-title"><?php the_title(); ?></h1>
                <ul class="post-meta-list">
                    <li class="post-meta-item date">Article publié le <?php echo get_the_date(); ?></li>
                    <li class="post-meta-item quantity">
                        <?php foreach (the_category() as $cat) { ?>
                            <a href="<?php echo get_category_link($cat); ?>"><?php $cat; ?></a>
                        <?php } ?>
                    </li>
                </ul>
            </div>

        </div>
    </header>
    <section class="post-content">
        <div class="container container-narrow">
            <p><?php the_content(); ?></p>
        </div>
    </section>
</article>

<?php get_footer(); ?>