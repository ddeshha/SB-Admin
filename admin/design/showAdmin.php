<a class="btn btn-success d-flex justify-content-center align-items-center vh-0.5" href="?action=addAdmin">Add Admin</a>

<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Password</th>
        <th scope="col">Adrress</th>
        <th scope="col">Phone</th>
        <th scope="col">Email</th>
        <th scope="col">Privligs</th>
        <th scope="col">Gender</th>
        <th scope="col">Controls</th>
      </tr>
    </thead>
    <tbody>

      <?php 
      $getAdmins = "SELECT * FROM administration";

      $query = $connect->query($getAdmins);
      $i = 1;
      foreach ($query as $row) :
        
      ?>
      <tr>
        <th scope="row"><?= $i++?></th>
        <td><?= $row['name']; ?></td>
        <td><?= $row['password']; ?></td>
        <td><?= $row['adress']; ?></td>
        <td><?= $row['phone']; ?></td>
        <td><?= $row['email']; ?></td>
        <td><?php
        
        $prID = $row['pr'];

        $selectPr = "SELECT * FROM pr WHERE id = $prID";
        $query = $connect->query($selectPr);
        $pr = $query->fetch_assoc();

        echo $pr['name'];
        
        ?></td>
        <td><?php
        
        $genderID = $row['gender'];

        $selectGender = "SELECT * FROM gender WHERE id = $genderID";
        $query = $connect->query($selectGender);
        $Gender = $query->fetch_assoc();

        echo $Gender['name'];
        
        ?></td>
        <td>
        <!-- <a class="btn btn-danger" href="">Delete</a> -->
             <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you want to delete admin?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <atype="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-id="<?= $row['id'] ?>">Yes</a>
      </div>
    </div>
  </div>
</div>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>