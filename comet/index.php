<?php
  get_header();
  $options = get_option( 'comet' );
?>
    <section class="page-title parallax">
      <div data-parallax="scroll" data-image-src="<?php echo $options['opt-background-1']['url'];  ?>" class="parallax-bg"></div>
      <div class="parallax-overlay">
        <div class="centrize">
          <div class="v-center">
            <div class="container">
              <div class="title center">
                <h1 class="upper"><?php echo $options['header-text-1']; ?><span class="red-dot"></span></h1>
                <h4><?php echo $options['header-text-2']; ?></h4>
                <hr>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container">
        <div class="col-md-8">
          <div class="blog-posts">
            <?php while(have_posts()) : the_post(); ?>
              <?php get_template_part('template-parts/content', get_post_format()); ?>
            <?php endwhile; ?>
          </div>

          <?php
            the_posts_pagination([
              'prev_text' => '<i class="ti-arrow-left"></i>',
              'next_text' => '<i class="ti-arrow-right"></i>',
              'screen_reader_text' => ' '
            ]);
          ?>
        </div>
        <?php get_sidebar(); ?>
      </div>
    </section>
  <?php get_footer(); ?>
