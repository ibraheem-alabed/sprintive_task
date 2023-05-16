<?php
require './header.php' ?>






<!-- ------------------------------------------------------------- -->
<div class="container w-75" style="background-color: #343a40f7;">
  <?php if (!empty($_SESSION) && isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
<div class='alert alert-danger' role='alert'>
<?= $_SESSION['error'] ?>
</div>
<?php endif?>


</div>
<div>
  <form id="asd" class="mb-4 d-flex justify-content-between input-form" style="background-color: rgb(51 58 65);width:55rem;">

    <input type="hidden" id="user_id" name="user_id" value="<?= $data->user ?>">

    <div class="input-group flex-nowrap me-2">

      <select id="items_id" class="form-select" aria-label="Default select example" name="items_id">

        <option selected>Select One Of The Items</option>
        <?php foreach ($data->items as $item) {
        if($item->quantity>0){

          //  $name=array();

          // if(!in_array($item->name,$name) && $item->quantity > 0 ){


          //     $name[]= $item->item_name;
        ?>

          <option value="<?= $item->id ?>"><?= $item->name ?></option>
            
        <?php }} ?>



      </select>

    </div>



    <div class="input-group flex-nowrap ms-2">

      <input id="quantity" type="number" class="form-control" placeholder="Enter the quantity" aria-describedby="addon-wrapping" min="0" name="quantity">

    </div>



    <button id="will" class="btn btn-dark ms-2">Add</button>



  </form>
</div>

<hr>
<div id="transaction_data">


  



<table class="table table-success table-striped">
  <thead>
    <tr>
      <th scope="col">Title/Name</th>
      <th scope="col">File Type</th>
      <th scope="col">Date Added</th>
      <th scope="col">Manage</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
  </tbody>
</table>



</div>
<?php require './footer.php' ?>
