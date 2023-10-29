<form action="functions/insertPorducts.php" method="POST" enctype="multipart/form-data">



    <div class="form-group">
        <label for="name" style="font-weight: bold;">Product Name :</label>
        <input type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
        <label for="price" style="font-weight: bold;">Price :</label>
        <input type="unmber" class="form-control" name="price">
    </div>
    <div class="form-group">
        <label for="count" style="font-weight: bold;">count :</label>
        <input type="unmber" class="form-control" name="count">
    </div>
    <div class="form-group">
        <label for="image" style="font-weight: bold;">image :</label>
        <input type="file"  name="image">
    </div>
    <div class="form-group">
        <label for="categroy" style="font-weight: bold;">category :</label>
        <select name="category" id="" class="form-control" >
        <?php 
            $selectCat = "SELECT * FROM category";
            $catQuery = $connect ->query($selectCat);
            while ( $catRow = $catQuery->fetch_assoc()):
            ?>
            <option value="<?= $catRow['id']?>"><?= $catRow['name']?></option>
            <?php endwhile ?>
        </select>
    </div>
    <div class="form-group">
        <label for="brand" style="font-weight: bold;">brand :</label>
        <select name="brand" id="" class="form-control" >
            <?php 
            $selectBrand = "SELECT * FROM brand";
            $brandQuery = $connect->query($selectBrand);
            while ( $brandRow = $brandQuery->fetch_assoc()):
            ?>
            <option value="<?= $brandRow['id']?>"><?= $brandRow['name'] ?></option>
            <?php endwhile ?>
        </select>
    </div>
    <div class="form-group">
        <label for="des" style="font-weight: bold;">description :</label>
        <textarea name="des" style="height: 100px;" class="form-control"></textarea>
    
    </div>
    <button type="submit" class="btn btn-success form-control">Add Product</button>
    
    
    </form>