<?php get_header(); ?>

<section class="error">
    <div class="container">
        <h1><?php echo get_field('error_title', 'option'); ?></h1>
        <p><?php echo get_field('error_content', 'option'); ?></p>
    </div>
</section>
<?php get_footer(); ?>