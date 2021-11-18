<?php $con = mysqli_connect('localhost','root','','rms'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <?php include "header.php";?>

    <?php
    $roll = $_GET['id'];
    $query = mysqli_query($con,"select * from results where roll='$roll'");
    $data = mysqli_fetch_array($query);
    ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <table class="table table-bordered">
                    <tr>
                        <th colspan="4" class="text-center">Personal Details</th>
                    </tr>
                    <tr>
                        <th colspan="2">Name</th>
                        <td colspan="2"><?php echo $data['name'];?></td>
                    </tr>
                    <tr>
                        <th colspan="2">Email</th>
                        <td colspan="2"><?php echo $data['email'];?></td>
                    </tr>
                    <tr>
                        <th colspan="2">Contact</th>
                        <td colspan="2"><?php echo $data['contact'];?></td>
                    </tr>
                    <tr>
                        <th>Subject</th>
                        <th>Total Marks</th>
                        <th>Pass Marks</th>
                        <th>Obtain Marks</th>
                    </tr>
                    <tr>
                        <th>Maths</th>
                        <th>100</th>
                        <th>30</th>
                        <td><?php echo $data['maths'];?></td>
                    </tr>
                    <tr>
                        <th>Science</th>
                        <th>100</th>
                        <th>30</th>
                        <td><?php echo $data['science'];?></td>
                    </tr>
                    <tr>
                        <th>SSt</th>
                        <th>100</th>
                        <th>30</th>
                        <td><?php echo $data['sst'];?></td>
                    </tr>
                    <tr>
                        <th>Hindi</th>
                        <th>100</th>
                        <th>30</th>
                        <td><?php echo $data['hindi'];?></td>
                    </tr>
                    
                    <tr>
                        <th>English</th>
                        <th>100</th>
                        <th>30</th>
                        <td><?php echo $data['english'];?></td>
                    </tr>
                    
                    <tr>
                        <th colspan="4" class="text-center">Result Details</th>
                    </tr>
                    
                    <tr>
                        <th colspan="2">Total Marks</th>
                        <td colspan="2">
                            <?php echo $total = $data['maths'] + $data['science'] + $data['sst'] + $data['hindi'] + $data['english'];?>
                        </td>
                    </tr>
                    
                    <tr>
                        <th colspan="2">Division</th>
                        <td colspan="2"></td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</body>
</html>