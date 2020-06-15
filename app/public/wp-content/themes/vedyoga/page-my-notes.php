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
        <div class="create-note">
          <h2 class="header__title--one">Create New Note</h2>
          <input class="new-note-title" type="text" name="" value="" placeholder="Title">
          <textarea class="new-note-body" name="name" rows="8" cols="80" placeholder="Your note here.."></textarea>
          <span class="submit-note">Create Note</span>
          <span class="note-limit-message">Note limit reached: delete an existing note to make room for a new one</span>

        </div>
        <ul id="my-notes">
          <?php
            $userNote = new WP_Query(array(
              'post_type' => 'note',
              'post_per_page' => 1,
              'author'=> get_current_user_id()
            ));
            while ($userNote->have_posts()) {
              $userNote->the_post();?>
              <li data-id='<?php the_ID(); ?>'>
                <input readonly class="note-title-field" type="text" name="" value="<?php echo str_replace('Private:', '', esc_attr(get_the_title())); ?>">
                <span class="edit-note"><i class="fa fa-pencil" aria-hidden="true"> Edit </i></span>
                <span class="delete-note"><i class="fa fa-trash-o" aria-hidden="true"> Delete </i></span>
                <span class="update-note hidden-btn"><i class="fa fa-arrow-right" aria-hidden="true"> Save </i></span>
                <textarea readonly class="note-body-field" name="name" rows="8" cols="80"> <?php echo esc_textarea(get_the_content()); ?></textarea>
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
