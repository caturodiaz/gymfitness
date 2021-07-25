

    <footer class="site-footer container">
        <hr>

        <div class="footer-content">
            <?php 
                $args = array(
                    'theme_location' => 'main-menu',
                    'container' => 'nav',
                    'container_class' => 'main-menu'
                );
                wp_nav_menu($args);
            ?>

            <p class="copyright">Todos los derechos reservados. <?php echo get_bloginfo('name') . ' ' . date('Y') . ' '; ?> &copy;</p>
        </div>
    </footer>

    <?php wp_footer(); ?>

    </body>
</html>