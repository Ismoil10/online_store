
<div>
      <div class="container">
     <div class="row mt-5">
      <div class="col-2">
          <b>Computer Accessories & Peripherals</b>
          <ul style="list-style-type: none; line-height: 20px;">
            <li>Audio & Video Accessories</li>
            <li>Blank Media</li>
            <li>Cable Security Devices</li>
            <li>Cables & Accessories</li>
            <li>Cleaning & Repair</li>
            <li>Computer Cable Adapters</li>
            <li>Game Hardware</li>
            <li>Hard Drive Accessories</li>
            <li>Input Devices</li>
            <li>Keyboards, Mice & Accessories</li>
          </ul>
      </div>
      
      <div class="col-9">
        <div class="row">
          <div class="col-6" style="text-align: center;">
            <b><h5>RESULTS</h5></b>
            </div>
            <div class="col-6" align="right">
              <form method="GET">
            <button class="btn btn-secondary" type="submit" name="filter_min">Minimum</button>
            <button class="btn btn-secondary" type="submit" name="filter_max">Maximium</button>
            <button class="btn btn-secondary" type="submit" name="high_to_low">High to Low</button>
            <button class="btn btn-secondary" type="submit" name="low_to_high">Low to High</button>
            </form>           
          </div>
        </div>

    <?php    
      if(isset($_GET['high_to_low'])) {
          foreach($products as $key => $value){
            $h_array[$key] = $value['num'];
          }  
     arsort($h_array);
          foreach($h_array as $key => $value){
            $a_array[$key] = $products[$key];
          }
          $products = $a_array;
   }

   if(isset($_GET['low_to_high'])) {
    foreach($products as $key => $value){
        $h_array[$key] = $value['num'];
    }  
        asort($h_array);
        foreach($h_array as $key => $value){
        $a_array[$key] = $products[$key];
    }
    $products = $a_array;
}
    
    if(isset($_GET['filter_min'])) {

      $min = $products['Pencil']['num'];
    foreach($products as $key => $item) {

    if  ($item['num'] < $min) {
        $min = $item['num'];
        $min_key = $key; 
        
      }
    }      
      $temp_array = $products[$min_key];

      $products = [$temp_array];
 }

 
 if(isset($_GET['filter_max'])) {

  $max = $products['Pencil']['num'];
foreach($products as $funkey => $tem) {

if  ($tem['num'] > $max) {
    $max = $tem['num'];
    $max_key = $funkey; 
    
  }
}      
  $temp_array = $products[$max_key];

  $products = [$temp_array];
}

?>

          <div class="row mt-3">

                <?php foreach($products as $key => $item):?>
              <div class="col-3">
                <a href="?page=product&products=<?php echo $key?>">
                  <div class="card">
                  <div align="center">
                    <img class="s-image" src="<?php echo $item['img'];?>" alt=""  width="<?php echo $item['wid'];?>px" height="<?php echo $item['het'];?>px">
                  </div>
                     <h6><?php echo $item['title'];?></h6>
                     <h5><?php echo $item['price'];?></h5> 
                  </div>
                  </a>  
              </div>
              <?php endforeach; ?>
          </div>
      </div>
  
     </div>
</div>


