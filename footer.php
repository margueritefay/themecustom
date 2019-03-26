<footer>
  <div class="container">
    <div class="row">
        <p>
          <?php
            if(is_active_sidebar('widgetized-footer')):
              dynamic_sidebar('widgetized-footer');
            else:
           ?>
          Ceci est un footer
        <?php endif; ?>
        </p>

    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
