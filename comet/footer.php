<footer id="footer-widgets">
  <div class="container">
    <div class="go-top"><a href="#top"><i class="ti-arrow-up"></i></a></div>
    <div class="col-md-6 ov-h">
    <?php dynamic_sidebar('footer-first'); ?>
    </div>
    <div class="col-md-4 col-md-offset-2">
      <div class="col-md-12">
        <?php dynamic_sidebar('footer-last'); ?>
      </div>
    </div>
  </div>
</footer>
<footer id="footer">
  <div class="container">
    <div class="footer-wrap">
      <div class="col-md-4">
        <div class="copy-text">
          <p><i class="icon-heart red mr-15"></i><?php $options = get_option('comet'); echo $options['footer-text-1']; ?></p>
        </div>
      </div>
      <div class="col-md-4">
        <ul class="list-inline">
          <li><a href="#">About</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
      <?php $icons = $options['footer-social-icon']; ?>
      <div class="col-md-4">
        <div class="footer-social">
          <ul>
            <?php foreach( $icons as $icon ) : ?>
            <li><a target="_blank" href="<?php echo $icon['social-link']; ?>"><i class="<?php echo $icon['social-icon']; ?>"></i></a></li>            
          <?php endforeach; ?>

          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>


</html>
