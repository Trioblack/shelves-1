<?php if ($_POST['adminEditProduct'] === 'stumbled'): ?>
<div class="container">
  <h1>Whoops.</h1>
  <p>
    Seems like you come to this page from nowhere. Please go back to the <a href="/admin/product">products list page</a> and select the one you're editing again.
  </p>
</div>
<?php else: ?>
<div class="container">
  <h1>Edit Product</h1>
  <form id="adminEditProduct" action="?adminEditProduct" method="POST" enctype="multipart/form-data">
    <input type="text" name="name" value="<?= Helpers::orEmpty($_POST['name'], $data['name']) ?>" placeholder="Name" class="form-input-block">
    <div class="form-input-halfblock-container">
      <div class="form-input-halfblock">
        <input type="number" name="price" value="<?= Helpers::orEmpty($_POST['price'], $data['price']) ?>" placeholder="Price" class="form-input-block">
      </div>
      <div class="form-input-halfblock">
        <input type="text" name="priceUnit" value="<?= Helpers::orEmpty($_POST['priceUnit'], $data['priceUnit']) ?>" placeholder="Price Unit (optional)" class="form-input-block">
      </div>
    </div>
    <label for="quantity">Quantity</label><input type="number" name="quantity" value="<?= empty(Helpers::orEmpty($_POST['quantity'], $data['quantity'])) ? '100' : Helpers::orEmpty($_POST['quantity'], $data['quantity']) ?>" placeholder="Stock (Quantity)" min="0" class="form-input-block">
    <label for="category">Category:</label>
    <select name="category" class="form-input-block">
      <?php foreach ($data['categories'] as $category): ?>
        <option value="<?= $category->catID ?>" <?= $category->catID != Helpers::orEmpty($_POST['category'], $data['category']) ?: 'selected' ?>><?= $category->catName ?></option>
      <?php endforeach ?>
    </select>
    <label for="subcategory">Subcategory:</label>
    <select name="subcategory" class="form-input-block admin-product-subcategory">
      <option value="0-0">None</option>
      <?php foreach ($data['categories'] as $category): ?>
        <optgroup label="<?= $category->catName ?>">
          <?php foreach ($data['subcategories'] as $subcategory): ?>
            <?php if ($subcategory->catID == $category->catID): ?>
              <option value="<?= $category->catID . '-' . $subcategory->subCatID ?>" <?= $category->catID . '-' . $subcategory->subCatID != Helpers::orEmpty($_POST['subcategory'], $data['subcategory']) ?: 'selected' ?>><?= $subcategory->subCatName ?></option>
            <?php endif ?>
          <?php endforeach ?>
        </optgroup>
      <?php endforeach ?>
    </select>
    <label for="image">Upload Image</label>
    <input type="file" name="image" value="" placeholder="Upload Image">
    <textarea name="description" rows="8" cols="40" placeholder="Description (optional)" class="form-input-block" resize="no"><?= Helpers::orEmpty($_POST['description'], $data['desc']) ?></textarea>
    <input type="submit" name="" value="Edit Product" class="form-button form-input-block">
  </form>
</div>
<?php endif; ?>
