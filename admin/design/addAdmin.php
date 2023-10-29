<form action="functions/insertAdmin.php" method="POST">



    <div class="form-group">
        <label for="name" style="font-weight: bold;"> Name :</label>
        <input type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
        <label for="password" style="font-weight: bold;"> Password :</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="form-group">
        <label for="Adress" style="font-weight: bold;">Adress :</label>
        <input type="unmber" class="form-control" name="adress">
    </div>
    <div class="form-group">
        <label for="Phone" style="font-weight: bold;">Phone :</label>
        <input type="number" class="form-control" name="phone">
    </div>
    <div class="form-group">
        <label for="email" style="font-weight: bold;">Email :</label>
        <input type="email"  name="email" id="email">
    </div>
    <div class="form-group">
        <label for="Privligs" style="font-weight: bold;">Privligs :</label>
        <select name="pr" id="" class="form-control">
        <?php
            $selectPr = "SELECT * FROM pr";
            $showPr = $connect->query($selectPr);
            while ($reslutPr = $showPr->fetch_assoc()):
                ?>
            <option value="<?= $reslutPr["id"] ?>"> <?= $reslutPr["name"]?></option>
                <?php
            endwhile;
            ?>
        </select >
    </div>
    <div class="form-group">
        <label for="gender" style="font-weight: bold;">Gender :</label>
        <select name="gender" id="" class="form-control">
        <?php
            $selectGender = "SELECT * FROM gender";
            $showGender = $connect->query($selectGender);
            while ($reslutGender = $showGender->fetch_assoc()):
                ?>
            <option value="<?= $reslutGender["id"] ?>"> <?= $reslutGender["name"]?></option>
                <?php
            endwhile;
            ?>
        </select>
    </div>
    
    <button type="submit" class="btn btn-success form-control">Add Admin</button>
    
    
    </form>