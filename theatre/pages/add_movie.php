<?php
// Enable error reporting (very useful for hosting/debugging)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include header
include('header.php');

// Safely include form.php
if (!file_exists('../../form.php')) {
    echo "<div style='color:red'>Error: form.php file not found.</div>";
    exit;
}
include('../../form.php');
$frm = new formBuilder;
?>

<link rel="stylesheet" href="../../validation/dist/css/bootstrapValidator.css"/>
<script type="text/javascript" src="../../validation/dist/js/bootstrapValidator.js"></script>

<!-- Content Wrapper -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>Add Movie</h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Add Movie</li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-body">
        <?php include('../../msgbox.php'); ?>
        <form action="process_add_movie.php" method="post" enctype="multipart/form-data" id="form1">
          <div class="form-group">
            <label class="control-label">Movie Name</label>
            <input type="text" name="name" class="form-control"/>
            <?php $frm->validate("name", ["required", "label" => "Movie Name"]); ?>
          </div>

          <div class="form-group">
            <label class="control-label">Cast</label>
            <input type="text" name="cast" class="form-control"/>
            <?php $frm->validate("cast", ["required", "label" => "Cast", "regexp" => "text"]); ?>
          </div>

          <div class="form-group">
            <label class="control-label">Description</label>
            <textarea name="desc" class="form-control"></textarea>
            <?php $frm->validate("desc", ["required", "label" => "Description"]); ?>
          </div>

          <div class="form-group">
            <label class="control-label">Release Date</label>
            <input type="date" name="rdate" class="form-control"/>
            <?php $frm->validate("rdate", ["required", "label" => "Release Date"]); ?>
          </div>

          <div class="form-group">
            <label class="control-label">Image</label>
            <input type="file" name="image" class="form-control"/>
            <?php $frm->validate("image", ["required", "label" => "Image"]); ?>
          </div>

          <div class="form-group">
            <label class="control-label">Trailer YouTube Link</label>
            <input type="text" name="video" class="form-control"/>
            <?php $frm->validate("video", ["label" => "Trailer", "max" => "500"]); ?>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-success">Add Movie</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>

<?php include('footer.php'); ?>

<script>
<?php $frm->applyvalidations("form1"); ?>
</script>
