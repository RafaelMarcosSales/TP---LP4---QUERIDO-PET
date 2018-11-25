<div class="form-group">
    <label for="ID">ID</label>
<?php if(isset($id) && $id > 0){
    echo "<input type='number' class='form-control' name='ID' value='".$id."' disabled />";
} else {
    echo "<input type='number' class='form-control' name='ID' value='".$id."' required />";
}?>
</div>
 <div class="form-group">
      <label for="NM">Nome</label>
        <input type="text" class="form-control" name="NM" value="<?php echo($nm)?>" required />
  </div>

 <div class="form-group">
      <label for="CPF">CPF</label>
        <input type="text" class="form-control" name="CPF" value="<?php echo($cpf)?>" required />
</div>

<div class="form-group">
      <label for="ED">Endereço</label>
        <input type="text" class="form-control" name="ED" value="<?php echo($ed)?>" required />
</div>

<div class="form-group">
      <label for="TE">Telefone</label>
        <input type="text" class="form-control" name="TE" value="<?php echo($te)?>" required />
</div>

<div class="form-group">
      <label for="TE">Celular</label>
        <input type="text" class="form-control" name="CE" value="<?php echo($ce)?>" required />
</div>
       
    