<?php
include 'connection.php';

$pId = $_GET["pid"];

$res = Database::search("SELECT * FROM `products` WHERE `p_id` = '" . $pId . "'");
$catOptions = "";
$brandOptions = "";

if($res->num_rows> 0){
    $data = $res->fetch_assoc();

    $crs = Database::search("SELECT * FROM `catogerys`");
        while ($cdata = $crs->fetch_assoc()) {
            // Check if the current occupation matches the team member's occupation
            $selected = ($data["catogerys_cat_id"] == $cdata["cat_id"]) ? 'selected' : '';
            $catOptions .= "<option value='{$cdata["cat_id"]}' {$selected}>{$cdata["catogery_name"]}</option>";
        }

        $brs = Database::search("SELECT * FROM `brand`");
        while ($bdata = $brs->fetch_assoc()) {
            // Check if the current occupation matches the team member's occupation
            $selected = ($data["brand_br_id"] == $bdata["br_id"]) ? 'selected' : '';
            $brandOptions .= "<option value='{$bdata["br_id"]}' {$selected}>{$bdata["brand_name"]}</option>";
        }

    
    ?><div class="row">
    <!-- modal form begin -->


    <div class="mb-2">
      <label for="" class="form-label">Product Title :</label>
      <input type="text" id="p_tiU" class="form-control form-control-sm" value = "<?php echo $data['p_title']; ?>">
    </div>
    <div class="mb-2">
      <div class="row">
        <div class="col-12">
          <label for="" class="form-label">Product Catogery :</label>
          <div id="newCatDiv">
            <select name="" id="p_catU" class="form-control form-control-sm">
            <?php echo $catOptions; // Echo all catogery options 
            ?>



            </select>

          </div>


        </div>
       
      </div>


    </div>

    <div class="mb-2">
      <div class="row">
        <div class="col-12">
          <label for="" class="form-label">Product Brand :</label>
          <div id="newBrandDiv">
            <select name="" id="p_brandU" class="form-control form-control-sm">
            <?php echo $brandOptions; // Echo all Brand options 
            ?>




            </select>
          </div>

        </div>
       
      </div>


    </div>

    <div class="mb-2">
      <label for="" class="form-label">Product Qty :</label>
      <input type="number" id="p_qtyU" min="1" class="form-control form-control-sm" value="<?php echo $data['qty']; ?>">
    </div>

    <div class="mb-2">
      <label for="" class="form-label">Price Per Product :</label>
      <div class="input-group">
        <span class="input-group-text">Rs.</span>
        <input type="text" id="p_priceU" class="form-control form-control-sm" placeholder="Ex : Rs. 2300" value="<?php echo $data['price']; ?>" disabled>
      </div>

    </div>

    <div class="mb-2">

      <label for="" class="form-label">Delevery Cost :</label>
      <div class="input-group">
        <span class="input-group-text">Rs.</span>
        <input type="text" id="d_costU" class="form-control form-control-sm" value="<?php echo $data['d_fees']; ?>" placeholder="Ex : Rs. 300">
      </div>

    </div>

    <div class="mb-2">
      <label for="" class="form-label">Product Discription :</label>
      <textarea id="p_disU" class="form-control form-control-sm" name="" id="" cols="12" rows="5"><?php echo $data['p_dis']; ?></textarea>
    </div>

    <div class="mb-2">


      <label for="" class="form-label">Image Privew :</label><br>
      <div class="img-preview" id="propImagePU">
        <img src="<?php echo $data['p_img']; ?>" class="img-fluid rounded-3" id="" alt="Responsive image">


      </div>

    </div>
    <div class="mb-2">
      <label for="" class="form-label">Product Image :</label> <br>
      <input type="file" id="propImageSU" class="form-control-sm mb-2 " onchange="loadFileU();"><br>

    </div>



  </div>
    
    
    <?php


    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    


}else{
    echo "No products found";
}






?>