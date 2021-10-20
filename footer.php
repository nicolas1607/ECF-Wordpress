</main>
<footer class="main-footer">
    <div class="container">
        <div class="copyright"><?php echo 'Copyright © ' . get_field('footer_copyright', 'option') . " " . date('Y'); ?></div>
        <nav class="footer-nav">
            <ul class="menu">
                <li class="menu-item"><a href="<?php echo get_field('footer_redirect_first', 'option')['url']; ?>" class="menu-link"><?php echo get_field('footer_redirect_first', 'option')['title']; ?></a></li>
                <li class="menu-item"><a href="<?php echo get_field('footer_redirect_second', 'option')['url']; ?>" class="menu-link"><?php echo get_field('footer_redirect_second', 'option')['title']; ?></a></li>
            </ul>
        </nav>
        <nav class="social-nav">
            <ul class="menu">
                <li class="menu-item"><a href="<?php echo get_field('footer_network_first', 'option')['url']; ?>" target="_blank" class="menu-link"><?php echo get_field('footer_network_first', 'option')['title']; ?></a></li>
                <li class="menu-item"><a href="<?php echo get_field('footer_network_second', 'option')['url']; ?>" target="_blank" class="menu-link"><?php echo get_field('footer_network_second', 'option')['title']; ?></a></li>
                <li class="menu-item"><a href="<?php echo get_field('footer_network_third', 'option')['url']; ?>" target="_blank" class="menu-link"><?php echo get_field('footer_network_third', 'option')['title']; ?></a></li>
            </ul>
        </nav>
    </div>
</footer>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

</body>

</html>