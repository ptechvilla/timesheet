<!doctype html>
<html lang="en">

<?php

require_once('includes/header_css.php');
require_once('function/function.php');
$pdo = getPDOObject();

// Query for delete data
if (isset($_REQUEST['del_id'])) {
    $delId =  $_REQUEST['del_id'];
    //  echo $id;
    //  die("i am here");
    $sql = "delete from candidate where can_id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$delId]);
    if ($stmt) {
        echo '<script>
       alert("record deleted successfully");
       </script>';
        header("location:list-employee.php");
    } else {
    }
}














?>

<head>
    <title>List Employee</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>




<body>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">List Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table>
                        <tr>
                            <th>Name</th>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <th>name</th>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <th>name</th>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <th>name</th>
                            <td><input type="text"></td>
                        </tr>
                        
                    </table>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                </div>
            </div>
        </div>
    </div>





    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        <?php require_once('includes/header.php'); ?>
        <div class="app-main">
            <?php require_once('includes/sidebar.php'); ?>

            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-moon icon-gradient bg-amy-crisp">
                                    </i>
                                </div>
                                <div>List-Employee

                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Candidate id</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>phone</th>
                                                        <th>address</th>
                                                        <th>position</th>
                                                        <th>Action</th>
                                                       
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    $sql = "select can_id,fname,lname,email,phone,address,position from candidate where status='1' and deleted='0' ";
                                                    $stmt = $pdo->prepare($sql);
                                                    $stmt->execute();

                                                    //     echo '<pre>';
                                                    //     print_r($data);
                                                    //     echo '</pre>';
                                                    //    die("last");
                                                    $cntrow = $stmt->rowCount();
                                                    if ($cntrow) {
                                                        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                            <tr>
                                                                <td><?= $data['can_id']; ?></td>
                                                                <td><?= $data['fname'] . "  " . $data['lname']; ?></td>
                                                                <td><?= $data['email']; ?></td>
                                                                <td><?= $data['phone']; ?></td>
                                                                <td><?= $data['address']; ?></td>
                                                                <td><?= $data['position']; ?></td>
                                                                <td>
                                                                    <i data-toggle="modal" data-target="#exampleModal" class="fa fa-eye"></i>&nbsp;/&nbsp;
                                                                    <a href="?del_id=<?= $data['can_id']; ?>"><i class="fa fa-trash"></i></a></i>&nbsp;/&nbsp;
                                                                    <a href="edit-employee.php?canId=<?= $data['can_id']; ?>"><i class="fa fa-edit"></i></a>
                                                                </td>
                                                            </tr>

                                                    <?php
                                                        }
                                                    } else {
                                                        echo '<h4 style="color:red">No record found</h4>';
                                                    }
                                                    ?>


                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="app-drawer-overlay d-none animated fadeIn"></div>
                        <script type="text/javascript" src="assets/scripts/main.cba69814a806ecc7945a.js"></script>

</body>

</html>
<script src="assets/jquery.min.js"></script>