
<?php

     // echo '<pre>'; print_r($_POST); echo '</pre>';
if (isset($_POST['checkout_button'])) {
    $content = file_get_contents('database/order.txt');
      $json = json_decode($content, true);
     
      $json[] = $_POST;

      $array = json_encode($json, true);
      file_put_contents('database/order.txt', $array);
     //echo '<pre>'; print_r($json); echo '</pre>';
  
       header("Location: index?acceptorder");


}
?>
 

      <div class="container">
     <div class="row mt-5">

 
      <div class="col-7" align="center">
          <img src="<?php echo $products[$_GET['products']]["img"];?>" alt="">
      </div>

      <div class="col-5">
            <h4><?php echo $products[$_GET['products']]["title"];?></h4>
          <p>
            <?php echo $products[$_GET['products']]["inform"];?>
          </p>
          <h5><?php echo $products[$_GET['products']]["price"];?></h5>
          <button type="button" class="btn btn-secondary btn-sm">Add to Card</button>
          <button type="button" class="btn btn-primary btn-sm">Buy Now</button>
 
      </div>

          <div class="col-6">
                <form method="POST">

                          <input type="hidden" value="<?php echo $_GET['products'];?>" name="product_id">

                        <label class="form-label">Name</label>
                        <input class="form-control" type="text" name="customer_name">

                        <label class="form-label">Surname</label>
                        <input class="form-control" type="password" name="customer_surname">

                        <label class="form-label">Adress</label>
                        <input class="form-control" type="text" name="customer_adress">
                    
                        <label class="form-label">Phone number</label>
                        <input class="form-control" type="text" name="customer_phone">
                
                        <button class="btn btn-primary mt-2" type="submit" name="checkout_button"> Buy </button>          
                 </form>
                 </div>  
         
      </div>
  
     </div>
</div>
</div>    
</body>
<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js">
</script>
</html>



