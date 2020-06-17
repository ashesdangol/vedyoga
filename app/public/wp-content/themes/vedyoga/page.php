<?php
  get_header();

    while (have_posts()) {
      the_post();
?>
    <div class="page-wrapper ">
      <!-- Page Banner -->
      <?php
        pageBanner();
       ?>
      <div class="page-section metabox--relative side-paddings">
        <?php
        // $theParent returns id number of a parent page from current page which is a child page
        //if current page does not have parent page or is not a child page, will return 0
        $theParent = wp_get_post_parent_id(get_the_ID());
          if ($theParent) {
        ?>
          <div class="metabox metabox--position-up metabox--with-home-link">
            <p><a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent) ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($theParent)  ?></a>
              <span class="metabox__main"><?php the_title() ?></span>
            </p>
          </div>
        <?php
          }

        $checkParent = get_pages(array(
          'child_of' => get_the_ID()
        ));
        if ($theParent or $checkParent) {
        ?>
        <div class="page-links">
          <h2 class="page-links__title"><a href="<?php echo get_permalink($theParent ); ?>"><?php echo get_the_title($theParent) ?></a></h2>
          <ul class="">
            <?php
              if ($theParent) {
                $findChildrenOf = $theParent;
              }else{
                $findChildrenOf = get_the_ID();
              }

              wp_list_pages(array(
                'title_li'=>NULL,
                'child_of'=> $findChildrenOf
              ));
             ?>
          </ul>
        </div>
        <?php
        }
         ?>

        <div class="generic-content">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>
        </div>
      </div>
      <div class="page-section page-section--beige">
        <div class="side-paddings generic-content">
          <?php the_content(); ?>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>

          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>
        </div>
      </div>
    </div>

  <?php
    }
  get_footer();
?>
