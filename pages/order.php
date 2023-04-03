
      <div class="container">
     <div class="row mt-5">


      <div class="col-7" align="center">
           <?php
                $content = file_get_contents('database/order.txt');
                $ord = json_decode($content, TRUE);
                    

          ?>
               <?php foreach($ord as $item):?>
            <div class="card">
            <div class="row-a">
            <div class="col-2" style="margin-left: 5px; float: left">
            <div id="imgTagWrapperId" class="imgTagWrapper" style="width: 100px; height: 100px">
            <img src="<?php echo $products[$item['product_id']]['img'];?>" alt="" style="height: 100px">
            </div>  
          </div>
            <div class="col-6" style="margin-right: 10px; float: right">
            <p><b><?php echo $products[$item['product_id']]['title'];?></b></p>            
            <?php echo $products[$item['product_id']]['price'];?>
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