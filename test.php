<?php
$server="localhost";
$username="root";
$password="";
$databade="crud";
$conn=mysqli_connect($server,$username,$password,$databade);
/*if($conn) {
    die("connection successful");
}
else{
    echo "unsuccessful";
}*/
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>

<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">-->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
        h1{
            color: rebeccapurple;
        }
        .row{
            color: red;
            background-color: blue;
        }
    </style>
</head>
<body>
<h1>Hello, world!</h1>
<div class="container">



    <div class="row">
        <form class="g-3" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"   method="POST">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label" style="color: red;">ID</label>
                <input type="id" class="form-control" id="id">
            </div>

            <div class="col-12">
                <label for="inputAddress" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="inputAddress" placeholder="1234 Main St">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Emain Id</label>
                <input type="email" class="form-control" name="email" id="inputAddress2" placeholder="Apartment, studio, or floor">
            </div>
            <div class="col-md-6">
                <label for="number" class="form-label">age</label>
                <input type="number" class="form-control" name="age" id="number">
            </div>
           <input type="submit" name="submit" value="register">
        </form>
    </div>

</div>

</body>
</html>
<?php
if(isset($_POST['submit'])) {

   echo '<pre>';
//    echo print_r($_POST);
//    exit;

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $age = intval($_POST['age']);

// Formulating the insert query
    $insertquery = "INSERT INTO users (name, email, age) VALUES ('$name', '$email', $age)";
    $query = mysqli_query($conn, $insertquery);

    if ($query) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insertquery . "<br>" . $conn->error;
    }
}
?>