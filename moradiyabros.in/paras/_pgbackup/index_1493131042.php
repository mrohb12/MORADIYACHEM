<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>PARAS IMPEX</title>
        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="dashboard.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
        <link rel="stylesheet" href="components/pg.blocks/css/blocks.css">
        <link rel="stylesheet" href="components/pg.blocks/css/plugins.css">
        <link rel="stylesheet" href="components/pg.blocks/css/style-library-1.css">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    </head>
    <body class="text-center">
        <?php $sttot = 0;
$sttot = 0;
$num = 0;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pstock";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sqlstock = "SELECT `design`.`dno` ,`design`.`dname`,`stock`.`stock` from design INNER JOIN stock on design.dno=stock.dno;";
$sqldesign = "SELECT * FROM design";
?>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">PARAS IMPEX</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#">STOCK</a>
                        </li>
                        <li>
                            <a href="#entryout">OUT</a>
                        </li>
                        <li>
                            <a href="#entryout">entry</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="main col-md-4 col-lg-4 col-sm-12 col-xs-12" style="margin-top:30px;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3><label>Select Design</label></h3>
                        </div>
                        <div class="panel-body  pad10">
                            <input type="text" class="form-control input-lg" placeholder="Search...">
                            <hr>
                            <div class="row placeholders  col-md-5 col-lg-5 col-sm-12 col-xs-12 ">
                                <ul class="list-group ">
                                    <?php
                            $resultdesign = $conn->query($sqldesign);
                            if ($resultdesign->num_rows > 0) {
                                // output data of each row
                                while ($rowdesign = $resultdesign->fetch_assoc()) {


                                    echo '  <li class="list-group-item placeholder  ">' . strtoupper($rowdesign["dname"]) . '</li>';
                                }
                            } else {
                                echo "0 results";
                            } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12" style="margin-top:50px;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3><label>
                                    Current Stock
</label></h3>
                        </div>
                        <div class="panel-body">
                            <h2><?php
                        $resultstock = $conn->query($sqlstock);
                        if ($resultstock->num_rows > 0) {
                            while ($rowstock = $resultstock->fetch_assoc()) {
                                $sttot = $sttot + $rowstock["stock"];



                            }
                        }  else {
                                echo "0 results";
                            }


                        echo $sttot;



                        ?> </h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-5 col-xs-12 col-sm-12" style="margin-top:50px;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3><label>Stock Table</label></h3>
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Design Number</th>
                                        <th>Design Name</th>
                                        <th>Stock</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                        $resultstock = $conn->query($sqlstock);
                        if ($resultstock->num_rows > 0) {
                            while ($rowstock = $resultstock->fetch_assoc()) {
$num=$num + 1;
                        echo '<tr>';
                            echo '<td>' .$num;
                                '</td>';
                            echo '<td>' . $rowstock["dno"];
                                '</td>';
                            echo '<td>' . $rowstock["dname"];
                                '</td>';
                            echo '<td>' . $rowstock["stock"];
                                '</td>';
                            echo '</tr>';
                        }
                        }  else {
                            echo "0 results";
                        }
                        $conn->close();
                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-11 col-lg-11 text-center">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        IN ENTRY
</div>
                    <div class="panel-body">
                        <label class="control-label">
                            <h5>ENTER DESIGN ENTRY</h5>
                        </label>
                        <label class="control-label"></label>
                        <form role="form">
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">DESIGN NUMBER</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="exampleInputPassword1">AMOUNT
                                    <br>
                                </label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <button type="submit" class="btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript
================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
        <script type="text/javascript" src="components/pg.blocks/js/plugins.js"></script>
        <script type="text/javascript" src="components/pg.blocks/js/bskit-scripts.js"></script>
        <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
    </body>
</html>
