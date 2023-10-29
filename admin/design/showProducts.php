<a class="btn btn-success" href="?action=addProducts">Add Product</a>

<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Image</th>
        <th scope="col">Count</th>
        <th scope="col">Brand</th>
        <th scope="col">Categoty</th>
        <th scope="col">description</th>
        <th scope="col">Controls</th>
      </tr>
    </thead>
    <tbody>

      <?php 
      $getProducts = "SELECT * FROM products";

      $query = $connect->query($getProducts);

      $i = 1;

      foreach($query as $row) :
      
      ?>
      <tr>
        <th scope="row"><?= $i++?></th>
        <td><?= $row['name']; ?></td>
        <td><?= $row['price']; ?></td>
        <td>
          <img src="img/" style="width: 100px; height: 100px;">
          <?php 
          /**
           * <?= $row['image'] ?>
           */
          ?>
        </td>        
        <td><?= $row['count']; ?></td>
        <td><?php 

        $brandID = $row["brand"];

        $selectBrand = "SELECT * FROM brand WHERE id = $brandID";
        $queryBrand = $connect->query($selectBrand);
        $brand = $queryBrand->fetch_assoc();

        echo $brand["name"];

         ?></td>
        <td><?php 
        
        $catID = $row["category"];

        $selectCategory = "SELECT * FROM category WHERE id = $catID";
       $queryCategory = $connect->query($selectCategory);
      $category = $queryCategory->fetch_assoc();
        
        echo $category["name"];
        
        ?></td>
        <td><?= $row['description']; ?></td>
        <td>
        <a class="btn btn-info" href="?action=editProducts&id=<?= $row['id'] ?>">Edit</a>
        <!-- <a class="btn btn-danger" href="?action=deleteProducts&id=">Delete</a> -->
        <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Porduct</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you want to delete product?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <a class="btn btn-success" href="functions/deleteProducts.php?id=<?=$row['id']?>">Yes</a>
      </div>
    </div>
  </div>
</div>
        </td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>