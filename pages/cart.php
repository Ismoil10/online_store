

      <div class="container">
     <div class="row mt-5">

     <div class="col-3" style="margin-right: 60%">
            <a href="index.php/main">
            <button type="button" class="btn btn-dark">main</button>
            </a>
            </div>
      <div class="col-7" align="center">
           <?php
                $content = file_get_contents('database/cart.txt');
                $order = json_decode($content, TRUE);
                 //echo '<pre>'; print_r($order); echo '</pre>';   
                  
          ?>

            <?php      
           if(isset($_GET['delete'])){
            unset($order[$_GET['delete']]);
            $json = json_encode($order);
            file_put_contents('database/cart.txt', $json);
            header("Location: ?page=cart");  
            }
            ?>
            <h3><b>Cart:</b></h3>
               <?php foreach($order as $key => $item):?>
            <div class="card">
            <div class="row-a">
            <div class="col-2" style="margin-left: 5px; float: left">
            <div id="imgTagWrapperId" class="imgTagWrapper" style="width: 100px; height: 100px">
            <img src="<?php echo $products[$item]['img'];?>" alt="" style="height: 100px">
            </div>  
          </div>
            
          <div class="col-6" style="margin-right: 10px; float: right">
            <p><b><?php echo $products[$item]['title'];?></b></p>              
            <div class="col-3" style="margin-right: -60%">
            <a href="?page=cart&delete=<?php echo $key; ?>">
            <button type="button" class="btn btn-secondary">delete</button>
            </a>
            </div>
            <?php echo $products[$item]['price'];?>
          </div>  
          </div>
           </div>
           
           <?php endforeach; ?>
          </div>
         
      <div class="col-5">
           
      </div>
     
       
      </div>
  
     </div>
</div>
</div>    
</body>
<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js">
</script>
</html>