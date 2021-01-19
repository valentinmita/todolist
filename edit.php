<?php


include 'db.inc.php';


if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $query = "SELECT * FROM todo WHERE id = $id ";
    $result = mysqli_query($connection, $query);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>to do list</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="bg-light min-vh-100 text-center d-flex flex-column justify-content-center">
        <div class="card  ">
            <h1 class="nav justify-content-center"><a href="index.php">todo app with php</a></h1>
            <h3 class=" nav justify-content-center">add a new to do</h3>
            <?php while ($row = mysqli_fetch_array($result)) {
                $name = $row['t_name']; ?>
                <form action="" method="POST">
                    <input type="text" class="md-form form-group mb-3 w-75 text-center" placeholder="todo name" name="name" id="name" value="<?php echo $name; ?>">
                    <button type="submit" name="update" class="btn btn-primary"> update
                    </button>
                </form>
            <?php } ?>
        </div>
    </div>
</body>

<footer>
    <div class=" container mt-5 text-center">
        <div class="mx-auto" style="width: 300px">
            <button type="button" class="btn btn-light btn-lg">
                <a class="logo" href="https://www.facebook.com/valentin.mita/">
                    <i class="fab fa fa-facebook"></i>
                </a>
            </button>
            <button type="button" class="btn btn-light btn-lg m-2">
                <a class="logo" href="https://www.instagram.com/valentinmita/">
                    <i class="fab fa fa-instagram"></i>
                </a>
            </button>
            <button type="button" class="btn btn-light btn-lg">
                <a class="logo" href="https://github.com/valentinmita">
                    <i class="fab fa fa-github"></i>
                </a>
            </button>
            <button type="button" class="btn btn-light btn-lg">
                <a class="logo" href="https://www.linkedin.com/in/valentinmita/">
                    <i class="fab fa fa-linkedin"></i>
                </a>
            </button>
        </div>

        <h1 class="mx-auto text-center" style="max-width: 600px">
            Made by Valentin Mita for
            <button class="btn btn-success"> start2Impact
        </h1>
    </div>
</footer>


<?php
if (isset($_POST["update"])) {
    mysqli_query($connection, "UPDATE todo SET t_name ='$_POST[name]' where id =$id");
?>
    <script type="text/javascript">
        window.location = "index.php";
    </script>
<?php } ?>

</html>