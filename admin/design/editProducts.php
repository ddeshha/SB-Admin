<?php

$idCat = $_GET['id'];

$select = "SELECT * FROM products WHERE id ='$idCat'";
$query = $connect->query($select);
$product = $query->fetch_assoc();


?>
<form action="functions/doEditProducts.php" method="POST" enctype="multipart/form-data">



    <div class="form-group">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
        <label for="name" style="font-weight: bold;">Product Name :</label>
        <input type="text" class="form-control" name="name" value="<?= $product['name'] ?>">
    </div>
    <div class="form-group">
        <label for="price" style="font-weight: bold;">Price :</label>
        <input type="unmber" class="form-control" name="price" value="<?= $product['price'] ?>">
    </div>
    <div class="form-group">
        <label for="count" style="font-weight: bold;">count :</label>
        <input type="unmber" class="form-control" name="count" value="<?= $product['count'] ?>">
    </div>
    <div class="form-group">
        <label for="image" style="font-weight: bold;">image :</label>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="categroy" style="font-weight: bold;">category :</label>
        <select name="category" id="" class="form-control">
            <?php

            $selectCategory = "SELECT * FROM category";

            $showCategory = $connect->query($selectCategory);

            while ($reslutCategory = $showCategory->fetch_assoc()):
                ?>
                <option value="<?= $reslutCategory["id"] +1 ?>" <?php
                  if ($reslutCategory['id'] == $product["category"])
                      echo "selected";
                  ?>>
                    <?= $reslutCategory["name"] ?>
                </option>
                <?php
            endwhile;
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="brand" style="font-weight: bold;">brand :</label>
        <select name="brand" id="" class="form-control">
            <?php

            $selectBrand = "SELECT * FROM brand";

            $showBrand = $connect->query($selectBrand);

            while ($reslutBrand = $showBrand->fetch_assoc()):
                ?>
                <option value="<?= $reslutBrand["id"] +1 ?>" <?php
                  if ($reslutBrand['id'] == $product["brand"])
                      echo "selected";
                  ?>>
                    <?= $reslutBrand["name"] ?>
                </option>
                <?php
            endwhile;
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="des" style="font-weight: bold;">description :</label>
        <textarea name="description" style="height: 100px;"
            class="form-control"><?= $product['description'] ?></textarea>

    </div>
    <button type="submit" class="btn btn-success form-control">Add Product</button>


</form>