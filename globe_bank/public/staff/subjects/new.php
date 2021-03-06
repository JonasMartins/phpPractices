<?php

require_once('../../../private/initialize.php');

if(is_post_request()) {
  // Handle form values sent by new.php
  $subject = [];
  $subject['menu_name'] = $_POST['menu_name'] ?? '';
  $subject['position'] = $_POST['position'] ?? '';
  $subject['visible'] = $_POST['visible'] ?? '';


  $result = insert_subject($subject);
  if($result === true)
    redirect_to(url_for('/staff/subjects/index.php'));
  else {
    $errors = $result;
  }
} else {
  // display blank form
}

$subject_set = find_all_subjects();
$subject_count = pg_num_rows($subject_set) + 1;
pg_free_result($subject_set);

$subject = [];
$subject["position"] = $subject_count;

?>

<?php $page_title = 'Create Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject new">
    <h1>Create Subject</h1>
    <?php echo display_error($errors); ?>
    <form action="<?php echo url_for('/staff/subjects/new.php'); ?>" method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="" /></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <?php
              for($i=1; $i <= $subject_count; $i++) {
                echo "<option value=\"{$i}\"";
                if($subject["position"] == $i) {
                  echo " selected";
                }
                echo ">{$i}</option>";
              }
            ?>
            </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1" />
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Create Subject" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>