
  <?php
  error_reporting(0);
    $user_array = file_get_contents('manager/users.txt');
    $users = json_decode($user_array, true);
    $user = $users[$_SESSION["user_id"]]; 

      if (isset($_GET['acceptorder'])) {
      echo "<script> alert('Order has been accepted!');</script>";
    }
       if(isset($_GET['logout'])){
        session_destroy();
        header("Location: index.php");
    }
  ?>

  <?php
    /*    $begin = file_get_contents('manager/products.txt');
        $and = json_decode($begin, true);
        //echo '<pre>'; print_r($and); echo '</pre>';
        
        if(isset($_GET['search'])){
          
          foreach($and as $jb => $jp){
              
            if(strpos($jp['title'], $_GET['search']) == true){
                $p_temp[$jb] = $jp;
              }
          }
          $and = $p_temp;
        } */
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body>
     <div class="container">
      <div class="row mt-2">

            <div class="col-1" >
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Amazon_logo.svg/1024px-Amazon_logo.svg.png?20220213013322" class="svg" width="90px" height="27px">
            </div>

            <div class="col-1">
            <a id="nav-global-location-popover-link" class="nav-a nav-a-2 a-popover-trigger a-declarative nav-progressive-attribute" tabindex="0">
                <div class="nav-sprite nav-progressive-attribute" id="nav-packard-glow-loc-icon"></div>
                <div id="glow-ingress-block">
                  <span class="nav-line-1 nav-progressive-content" id="glow-ingress-line1">
                   Deliver to
                  </span>
                  <span class="nav-line-2 nav-progressive-content" id="glow-ingress-line2">
                   Uzbekistan
                </span>
              </div>
              </a>
            <span class="nav-line-1 nav-progressive-content" id="glow-ingress-line1">
                </span>         
            </div>

            <div class="col-5">
              <form>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 
                1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 
                0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 
                6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
                </span>
                <input type="text" class="form-control" value="<?php echo $_GET['search'];?>" name="search" 
                placeholder="Computer Accessories & Peripherals" 
                aria-label="Username" aria-describedby="basic-addon1">
                </div>
              </form>
            </div>
            <div class="col-1">
              <h6><small><?php echo 'Hello, '.$user["login"];?></small></h6>

            </div>

            <div class="col-1" >
              Language
            </div>

            <div class="col-1">
            <a href="?logout">
                 <button type="button" class="btn btn-info">Sign in</button>
              </a>
            </div>

            <div class="col-1">
              <a href="?page=order">
                <button type="button" class="btn btn-warning">Orders</button>
                </a>  
            </div>
            <?php 
            
            $c_array = file_get_contents('database/cart.txt');
            $d_array = json_decode($c_array, true);
            
            ?>
            <div class="col-1">
              <a href="?page=cart">
              <button type="button" class="btn btn-warning">Cart(<?php echo count($d_array)?>)</button>
              </a>
            </div>
        </div>  
     </div>
  
     <div class="container">
     <div class="row">
        <div class="col-1">
          All  
        </div>

        <div class="col-1"> 
          Today's deals 
        </div>

        <div class="col-1">
          Customer Service  
        </div>

        <div class="col-1"> 
          Registry 
        </div>

        <div class="col-1"> 
          Gift Cards 
        </div>

        <div class="col-1">
          Sell  
        </div>
     </div>
</div>

  <div class="container">

 <?php /* 
  <div class="row">
    <form method="POST">
        <input type="text" name="login">
        <input type="text" name="password">
        <button type="submit">Send</button>
    </form>
  <?php
      if($_POST['login']=='Ismoil' AND $_POST['password']=='12345'){
        echo 'Successful!';
      }else{
        echo "Invalid login or password";
      }
  ?>
  */ ?>
  </div>
  </div>

  <?php
 $new_array = file_get_contents('database/product.txt');
 $products = json_decode($new_array, true);

/*  $products = [
  "Pencil" => [
    "img" => 'https://m.media-amazon.com/images/I/21SPDoiRuGL._AC_UL320_.jpg',
    "title" => 'Apple Pencil (2nd Generation), White',
    "price" => '$129',
    "num" => '3',
    "wid" => '15px',
    "het" => '223px',
    "inform" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
    when an unknown printer took a galley of type and scrambled it to make a type specimen book."    
  ],
  "microSD" => [
    "img" => 'https://m.media-amazon.com/images/I/61jhzv9AQRL._AC_UL320_.jpg',
    "title" => 'SanDisk 128GB Ultra microSD',
    "price" => '$22',
    "num" => '2',
    "wid" => '223px',
    "het" => '162px',
    "inform" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
    when an unknown printer took a galley of type and scrambled it to make a type specimen book."
  ],
  "KeyBoard" => [
    "img" => 'https://m.media-amazon.com/images/I/61S0sV1a57L._AC_UL320_.jpg',
    "title" => 'Logitech MK345 Wireless Combo',
    "price" => '$202',
    "num" => '4',
    "wid" => '223px',
    "het" => '158px',
    "inform" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
    when an unknown printer took a galley of type and scrambled it to make a type specimen book."      
  ],
  "USB" => [
    "img" => 'https://m.media-amazon.com/images/I/71xWh67sBNL._AC_UL320_.jpg',
    "title" => 'Syntech USB C to USB Adapter Pack',
    "price" => '$10',
    "num" => '1',
    "wid" => '197px',
    "het" => '223px',
    "inform" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
    when an unknown printer took a galley of type and scrambled it to make a type specimen book."      
  ]
  ] */
?>
<?php
if(isset($_GET['search'])){
          
          foreach($products as $jb => $jp){
              
            if(strpos(' '.$jp['title'], $_GET['search']) == true){
                $p_temp[$jb] = $jp;
              }
          }
          $products = $p_temp;
        }
?>
<?php
 $new_js = json_encode($products);
 $start = file_put_contents('manager/products.txt', $new_js);
 ?>

