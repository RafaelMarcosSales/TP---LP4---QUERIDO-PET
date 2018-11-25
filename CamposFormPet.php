    <div class="form-group">
      <label for="ID">ID </label>
<?php if(isset($id) && $id > 0){?>
    <input type="number" class="form-control" name="ID" value="<?= $id ?>" disabled />
<?php } else {?>
    <input type="number" class="form-control" name="ID" value="<?= $id ?>" required />
<?php }?>
    </div>
  <div class="form-group">
      <label for="NM" >Nome </label>
        <input type="text"  class=" form-control" name="NM" value="<?= $nm ?>" required/>
   </div>

<div class="form-group">
      <label for="RA">Raça </label>
        <input type="text" class="form-control"name="RA" value="<?= $ra ?>" required/>
</div>

   <div class="form-group">
      <label for="PE">Peso </label>
        <input type="text" class="form-control" name="PE" value="<?= $pe ?>" required/>
     </div>

    <div class="form-group">
      <label for="IDA">Idade </label>
        <input type="number" class="form-control" name="IDA" min="0" max="20" value="<?= $ida ?>" required/>
    </div>

     <div class="form-group">
      <label for="SE">Sexo </label>
        <input type="text" class="form-control" name="SE" value="<?= $se ?>" required/>
       </div>
    <?php if($do < 1){?>
     <div class="form-group">
     	<?php
            if(!isset($con))include("conexao.php");
            if(!isset($con)) $con = abreConexao();
            $query = mysqli_query($con, "select id, nome from dono");
        ?> 
      <label for="DO">Dono </label>
        <input list="donos" class="form-control" name="DO" required/>
        <datalist id="donos">
            <?php
            while($prod = mysqli_fetch_array($query))
            {
                echo "<option value=".$prod['nome']." >".$prod['id']."</option>"; 
            }
            ?>
        </datalist>
            <?php mysqli_close($con); ?>
       </div>
    <?php }?>