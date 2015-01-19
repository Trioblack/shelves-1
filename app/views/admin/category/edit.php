<?php
if (isset($_POST['adminEditCategory'])) {
  if ($_POST['adminEditCategory'] === true) {
    Helpers::makeAlert('adminCategory', "Successfully edited the category.");
  }
  elseif ($_POST['adminEditCategory'] === false) {
    Helpers::makeAlert('adminCategory', "There's something wrong with editing the category. Please try again.");
  }
}
?>

<?php if ($_POST['adminEditCategory'] === 'stumbled'): ?>
  <div class="container">
    <h1>Whoops.</h1>
    <p>
      Seems like you come to this page from nowhere. Please go back to the <a href="/admin/category">category list page</a> and select the one you're editing again.
    </p>
  </div>
<?php else: ?>
  <div class="container">
    <h1>Edit Category</h1>
    <form id="" action="?adminEditCategory" method="POST" enctype="multipart/form-data">
      <label for="name">Category Name:</label>
      <input type="text" name="name" value="<?= Helpers::orEmpty($_POST['name'], $data['name']) ?>" placeholder="Name" class="form-input-block">
      <input type="submit" name="" value="Edit Category" class="form-button form-input-block">
    </form>
  </div>
<?php endif; ?>
