   
   <?php
            $array = file_get_contents('manager/users.txt');
            $user_array = json_decode($array, true);
            //echo '<pre>'; print_r($user_array); echo '</pre>';            
    ?>
    <?php
        if(isset($_GET['delete'])){
            unset($user_array[$_GET['delete']]);
            $unset = json_encode($user_array);
            file_put_contents('manager/users.txt', $unset);
            header("Location: index.php");
        }
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
    
<div class="container mt-4">
    <div>
        <a href="?logout_admin">
            <button class="btn btn-secondary btn-sm" type="button">Quit</button>
        </a>   
    </div>
    <div class="row mt-3">
        <div class="col-3">
    <form method="POST" class="form-control">
        <label>Name</label>
        <input class="form-control" type="text" name="name" required>
        
        <label>Surname</label>
        <input class="form-control" type="text" name="surname" required>
        
        <label>Phone number</label>
        <input class="form-control" type="text" name="number" required>
        
        <label>Gmail</label>
        <input class="form-control" type="text" name="login" required>        
        
        <label>Password</label>
        <input class="form-control" type="password" name="password" required>
        <button class="btn btn-info mt-3" type="submit" name="add_user">Add</button>
    </form>
    </div>
    </div>
    <?php
        
        if(isset($_POST['add_user'])){
           
            $user_data = file_get_contents('manager/users.txt');
           
            $user_array = json_decode($user_data, true);
           
            $user_array[] = $_POST;
           
            $json = json_encode($user_array);
           
            file_put_contents('manager/users.txt', $json);
            
            header("Location: index.php");
            
        }
    ?>

</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js">
</script>
</html>


