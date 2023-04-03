<?php
  $_SESSION['page'][] = $_GET['products'];
  
  if(isset($_GET['add_to_cart'])){

    $json = file_get_contents('database/cart.txt');

    $f_array = json_decode($json, true);

    $f_array[] = $_GET['products'];

    $n_array = json_encode($f_array);

    $jb = file_put_contents('database/cart.txt', $n_array);
    // echo '<pre>'; print_r($jb); echo '</pre>';
    header("Location: ?page=product&products=".$_GET['products']);
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
          <a href="?page=product&products=<?php echo $_GET['products'];?>&add_to_cart">
          <button class="btn btn-secondary btn-sm" type="button">Add to Cart</button>
            </a>
            <a href="?page=checkout&products=<?php echo $_GET['products'];?>">
          <button class="btn btn-primary btn-sm" type="button">Buy Now</button>
            </a>
            
      </div>

       
      </div>
            
     </div>
</div>
</div>    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js">
</script>
</html>



