<?php get_header(); ?>

  <div class="container-fluid no-pad">
    <h1>Full width video section</h1>
  </div>

  <div class="container" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
    <section id="content-area">
      <div class="row">
        <div class="col-sm-8">
          <!-- content area -->
          <h1>Content Area</h1>
        </div>
        <div class="col-sm-4">
          <!-- sidebar widget -->
          <?php get_sidebar(); ?>
        </div>
      </div>
    </section>

  </div><!-- /container -->

<?php get_footer(); ?>
