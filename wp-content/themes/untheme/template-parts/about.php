<?php
$logo_id = carbon_get_post_meta(get_the_ID(), 'crb_second_logo');
$logo_url = wp_get_attachment_image_url($logo_id, 'full');

$bg_id = carbon_get_post_meta(get_the_ID(), 'crb_second_bg');
$bg_url = wp_get_attachment_image_url($bg_id, 'full');

$heading = carbon_get_post_meta(get_the_ID(), 'crb_second_head');

?>

<?php
if ($text = carbon_get_the_post_meta('crb_second_text')) {
?>
  <section class="section-about">

    <?php if ($bg_url): ?>
     
        <img class="section-background" src="<?php echo $bg_url ?>" alt="" />
      
    <?php endif; ?>

    <div class="fixed-container">
      <?php if ($logo_url): ?>
        <div class="about-logo fromOpacity">
          <img class="about-logo__img" src="<?php echo $logo_url ?>" alt="Marketing Pro">
        </div>
      <?php endif; ?>

      <?php if ($heading): ?>
        <h2 class="title">
          <?php echo $heading ?>
        </h2>
      <?php endif; ?>


      <p class="about-text">
        <?php echo $text ?>
      </p>

    </div>
  </section>
<?php
}
?>