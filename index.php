<?php
include "db.inc.php";

$query = 'SELECT * FROM todo ORDER BY id desc';
$result = mysqli_query($connection, $query);
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
    <div class="container bg-light">
        <div class="container m-2">
            <div class="m-2">
                <h1 class="nav justify-content-center"><a href="index.php">
                        Check-list
                        <i class="fab fa fa-list"></i>
                    </a></h1>

            </div>
            <h3 class="nav justify-content-center m-2">add a new to do</h3>
            <!--form to add task -->
            <form class="text-center m-2" action="index.php" method="POST" id="form1">
                <input type="text" class="md-form form-group mb-3 w-75 text-center" name="todo" placeholder="todo name">
                <button class="btn btn-primary " name="add" form="form1" type="submit">add
                    <i class="fab fa fa-plus-square"></i>
                </button>
            </form>
            <br />

            <?php include "search.php"; ?>
            <!--form to search -->
            <form class="text-center" action="" method="POST" id="form2">
                <input class="text-center" type="text" name="valuetoSearch" placeholder="search">
                <button class="btn btn-info" type="submit" name="search" form="form2" value="filter">filter
                    <i class="fab fa fa-filter"></i>
                </button>
            </form>
            <br />

            <?php include "category.php"; ?>

            <!--form category -->
            <form action="" class="text-center" id="form3" method="POST">
                <select onchange="this.form.submit()" name="select" id="">
                    <option class="dropdown-item" value="">choose section</option>
                    <option class="dropdown-item" value="all">all</option>
                    <option class="dropdown-item" value="complete">complete</option>
                    <option class="dropdown-item" value="incomplete">incomplete</option>
                </select>
            </form>
        </div>


        <!--if no task show the image -->
        <div class="show-todo-section">
            <?php if (mysqli_num_rows($result) <= 0) { ?>
                <img src="css/checklist-1402461_1920.png" width="100%" />
            <?php } ?>


            <?php include "add.php"; ?>
            <!-- add new task -->
            <?php while ($row = mysqli_fetch_array($result)) { ?>
                <div class="card m-2">
                    <div class="card-body">
                        <?php if ($row['checkbox']) { ?>
                            <input type="checkbox" class="check-box" data-todo-id="<?php echo $row['id']; ?>" checked />
                            <h2 class="checked"><?php echo $row['t_name'] ?></h2>

                        <?php } else { ?>
                            <input type="checkbox" data-todo-id="<?php echo $row['id']; ?>" class="check-box" />
                            <h2><?php echo $row['t_name'] ?></h2>
                        <?php } ?>
                        <small class="bg-info">Created: <?php echo $row['t_date'] ?></small>

                        <!--button to edit and delete-->
                        <div class="m-2 p-2">
                            <a href=" edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary" role="button" aria-pressed="true">edit
                                <i class="fab fa fa-check"></i>
                            </a>
                            <a href="delete.php?delete_todo=<?php echo $row['id']; ?>" class="btn btn-danger" role="button" aria-pressed="true">delete
                                <i class="fab fa fa-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $(".check-box").on('click', function(e) {
                    const id = $(this).attr('data-todo-id');
                    const h2 = $(this).next();
                    $.post('check.php', {
                            id: id
                        },
                        (data) => {
                            if (data != 'error') {
                                console.log(data);
                                if (data == 1) {
                                    h2.removeClass('checked');
                                    alert('uncomplete');
                                } else {
                                    h2.addClass('checked');
                                    alert('complete');
                                }
                            }
                        }
                    );
                });
            });
        </script>
</body>

<footer>
    <div class="container mt-5 text-center">
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

</html>