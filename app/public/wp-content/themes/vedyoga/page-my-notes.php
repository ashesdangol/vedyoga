<?php
  if (!is_user_logged_in()) {
    wp_redirect(esc_url(site_url('/')));
    exit;
  }

  get_header();

    while (have_posts()) {
      the_post();
?>
    <div class="page-wrapper ">
      <!-- Page Banner -->
      <?php
        pageBanner();
       ?>

      <div class="page-section metabox--relative side-paddings--double">
        <ul id="my-notes">
          test
          <?php
            $userNote = new WP_Query(array(
              'post_type' => 'note',
              'post_per_page' => 1,
              'author'=> get_current_user_id()
            ));
            while ($userNote->have_posts()) {
              $userNote->the_post();?>
              <li data-id='<?php the_ID(); ?>'>
                <input readonly class="note-title-field" type="text" name="" value="<?php echo esc_attr(get_the_title()); ?>">
                <span class="edit-note"><i class="fa fa-pencil" aria-hidden="true"> Edit </i></span>
                <span class="delete-note"><i class="fa fa-trash-o" aria-hidden="true"> Delete </i></span>
                <span class="update-note hidden-btn"><i class="fa fa-arrow-right" aria-hidden="true"> Save </i></span>
                <textarea readonly class="note-body-field" name="name" rows="8" cols="80"> <?php echo esc_attr(get_the_content()); ?></textarea>
              </li>
            <?php
            }
           ?>

        </ul>
      </div>

    </div>

  <?php
    }
  get_footer();
?>
