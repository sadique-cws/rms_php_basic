<?php $con = mysqli_connect('localhost','root','','rms'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>result management system </title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    
    <?php include "header.php";?>

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <form action="index.php" method="post">
                            <div class="mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">contact</label>
                                <input type="text" name="contact" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">email</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="">maths</label>
                                    <input type="text" name="maths" class="form-control">
                                </div>
                                <div class="mb-3 col">
                                    <label for="">science</label>
                                    <input type="text" name="science" class="form-control">
                                </div>
                                <div class="mb-3 col">
                                    <label for="">sst</label>
                                    <input type="text" name="sst" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                            <div class="mb-3 col">
                                    <label for="">hindi</label>
                                    <input type="text" name="hindi" class="form-control">
                                </div>
                                <div class="mb-3 col">
                                    <label for="">english</label>
                                    <input type="text" name="english" class="form-control">
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="submit" value="Create" name="create" class="btn btn-success w-100">
                            </div>
                        </form>

                        <?php
                            if(isset($_POST['create'])){
                                $name = $_POST['name'];
                                $contact = $_POST['contact'];
                                $email = $_POST['email'];
                                $maths = $_POST['maths'];
                                $science = $_POST['science'];
                                $sst = $_POST['sst'];
                                $hindi = $_POST['hindi'];
                                $english = $_POST['english'];

                                $query = mysqli_query($con,"insert into results (name,contact, email, maths, science, sst, hindi,english) value ('$name','$contact','$email','$maths','$science','$sst','$hindi','$english')");

                                if($query){
                                    echo "<script> window.open('index.php','_self')</script>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Roll</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Maths</th>
                            <th>Sci</th>
                            <th>Sst</th>
                            <th>Hindi</th>
                            <th>Eng</th>
                            <th>Total Marks</th>
                            <th>action</th>
                        </tr>
                        <tbody>
                            <?php 
                                $query = mysqli_query($con,"select * from results");
                                while($row = mysqli_fetch_array($query)){
                                    $roll = $row['roll'];
                                    $email = $row['email'];
                                    $contact = $row['contact'];
                                    $maths = $row['maths'];
                                    $science = $row['science'];
                                    $sst = $row['sst'];
                                    $hindi = $row['hindi'];
                                    $english = $row['english'];
                                    $name = $row['name'];

                                    $total = $maths + $science + $sst + $english + $hindi;
                                    
                                    echo "
                                    <tr>
                                        <td>$roll</td>
                                        <td>$name</td>
                                        <td>$contact</td>
                                        <td>$email</td>
                                        <td>$maths</td>
                                        <td>$science</td>
                                        <td>$sst</td>
                                        <td>$hindi</td>
                                        <td>$english</td>
                                        <td>$total</td>
                                        <td><a href='delete.php' class='btn btn-danger btn-sm'>X</a>
                                        <a href='result.php?id=$roll' class='btn btn-success btn-sm'>view result</a></td>
                                    </tr>";
                                }


                            ?>
                        </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>

</body>
</html>