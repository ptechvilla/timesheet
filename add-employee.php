<!doctype html>
<html lang="en">

<?php
$valid_ext = array("jpg", "jpeg", "png", "gif");
$validSize = 2 * 1024 * 1024;
require_once('includes/header_css.php');
require_once('function/function.php');
$pdo = getPDOObject();
//check_session();
$skill_str = "";
if (isset($_POST["btn"])) {
    extract($_POST);
    // echo '<pre>';
    // print_r($_POST); 
    // die("i am here");
    $password = $_POST['pass'];
    $pass1 = password_hash($password, PASSWORD_BCRYPT);
    $skill_str = implode(",", $_POST['Skills']);

    if (isset($_FILES['image']['name'])) {
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $target_path = "assets/images/" . $fileName;
        if (!in_array($fileExt, $valid_ext)) {
            die("invalid file");
        }
        if ($fileSize > $validSize) {
            die("Not allowed file size is greator than 2*1024*1024");
        } else {
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
                die("Error in file upload");
            }
        }
    }


/** New comment added *git*/

    $sql = "insert into candidate (fname,lname,email,phone,password,country,state,city,zip,address,landmark,position,dob,doj,highest_qual,skills,image,gender) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$fname, $lname, $email, $phone, $pass1, $country, $state, $city, $zip, $address, $landmark, $position, $dob, $doj, $highqual, $skill_str, $image, $gender]);
    if ($stmt) {
        echo '<script>
                   alert("record inserted successfully");
               </script>';
    } else {
        echo '<script>
                   alert("some thing went wrong");
               </script>';
    }
}












?>

<head>
    <title>Admin Panel</title>

<body>
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
                                <div>Add Candidate

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
                                            <form method="POST">

                                                <div class="container">

                                                    <!-- <a href="list-employee.php">
                                                            <button class="btn btn-info float-right">View</button>

                                                        </a> -->
                                                    <div class="form-group row">

                                                        <div class="form-row ">
                                                            

                                                            <div class="form-group col-md-6">
                                                                <label class="form-label col-lg-12"><b>First Name:</b></label>
                                                                <input type="text" class="form-control col-lg-12" name="fname" placeholder="Enter First Name" autocomplete>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label class="form-label col-lg-12"><b>Last Name:</b></label>
                                                                <input type="text" class="form-control col-lg-12" name="lname" placeholder="Enter Last Name">
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label class="form-label col-lg-12"><b>Email Id:</b></label>
                                                                <input type="email" class="form-control col-lg-12" name="email" placeholder="Enter mail">
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label class="form-label col-lg-12"><b>Password:</b></label>
                                                                <input type="password" class="form-control col-lg-12" name="pass" placeholder="Enter password">
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label class="form-label col-lg-12"><b>Phone:</b></label>
                                                                <input type="text" class="form-control col-lg-12" pattern="[0-9]+" title="only numbers are allowed" minlength="10" maxlength="10" name="phone" placeholder="Enter phone">
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label class="form-label col-lg-12"><b>Country:</b></label>
                                                                <select class="form-control col-lg-12" name="country" id="country">
                                                                    <option value=""> Select country</option>
                                                                    <?php
                                                                    $sql = "select * from countries";
                                                                    $stmt = $pdo->prepare($sql);
                                                                    $stmt->execute();
                                                                    $data = $stmt->fetchAll(pdo::FETCH_ASSOC);
                                                                    foreach ($data as $val) {
                                                                        echo '<option value="' . $val['id'] . '">' . $val['name'] . '</option>';
                                                                    }

                                                                    ?>


                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label class="form-label col-lg-12"><b>State:</b></label>
                                                                <select class="form-control col-lg-12" name="state" id="states">


                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label class="form-label col-lg-12"><b>City:</b></label>
                                                                <select class="form-control col-lg-12" name="city" id="cities">


                                                                </select>
                                                            </div>

                                                           

                                                            <div class="form-group col-md-6">
                                                                <label class="form-label col-lg-12"><b>Address:</b></label>
                                                                <textarea class="form-control col-lg-12" name="address" placeholder="Enter Address"></textarea>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label class="form-label col-lg-12"><b>Landmark:</b></label>
                                                                <textarea class="form-control col-lg-12" name="landmark" placeholder="Enter landmark"></textarea>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label class="form-label col-lg-12"><b>Zip:</b></label>
                                                                <input type="text" class="form-control col-lg-12" name="zip" minlength="6" maxlength="6" placeholder="Enter your pincode">

                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label class="form-label col-lg-12"><b>Position</b></label>
                                                                <select class="form-control col-lg-12" name="position">
                                                                    <option value="">--Please Select--</option>
                                                                    <option value="fresher">Fresher</option>
                                                                    <option value="developer">Junior Developer</option>
                                                                    <option value="team leader">Team Leader</option>
                                                                    <option value="manager">manager</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label class="form-label col-lg-12"><b>DOB:</b></label>
                                                                <input type="date" class="form-control col-lg-12" name="dob">
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label class="form-label col-lg-12"><b>DOJ:</b></label>
                                                                <input type="date" class="form-control col-lg-12" name="doj">
                                                            </div>



                                                            <div class="form-group col-md-6">
                                                                <label class="form-label col-lg-12"><b>Highest Qualification</b></label>
                                                                <select class="form-control col-lg-12" name="highqual">
                                                                    <option value="">--Please Select--</option>
                                                                    <option value="BSC">BSC</option>
                                                                    <option value="BBA">BBA</option>
                                                                    <option value="BCA">BCA</option>
                                                                    <option value="BA">BA</option>
                                                                    <option value="B-FORMA">B-FORMA</option>
                                                                    <option value="MBA">MBA</option>
                                                                    <option value="BTECH">BTECH</option>

                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label class="form-label col-lg-12"><b>images:</b></label>
                                                                <input type="file" class="form-control col-lg-12" name="image">
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label class="form-label col-lg-12"><b>Skills:</b></label>
                                                                <label name="Skills" class="form-label">Skills:</label>
                                                                <input type="checkbox" name="Skills[]" value="JAVA">JAVA &nbsp;
                                                                <input type="checkbox" name="Skills[]" value="HTML">HTML &nbsp;
                                                                <input type="checkbox" name="Skills[]" value="JAVA SCRIPT">JAVA SCRIPT &nbsp;
                                                                <input type="checkbox" name="Skills[]" value="PHP">PHP &nbsp;
                                                                <input type="checkbox" name="Skills[]" value="ANGULAR">ANGULAR &nbsp;
                                                            </div>

                                                           

                                                            <div class="form-group col-md-6">
                                                                <label for="gender" class="form-label"><b>Gender:</b></label>
                                                                <input type="radio" name="gender" value="M">Male
                                                                <input type="radio" name="gender" value="F">Female
                                                            </div>



                                                            <div class="form-group col-md-6">
                                                                <button type="submit" class="btn btn-primary rounded-pill" name="btn">Submit</button>
                                                            </div>



                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
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
<script>
    $(document).ready(function() {

        /** Get state on country Change  */
        $("#country").change(function() {
            //alert("hii");
            cid = $(this).val();
            //alert(cid);
            if (cid) {
                $.ajax({
                    method: 'post',
                    url: 'http://localhost/PHP_Class/timesheet_pro/ajax/ajax.php',
                    data: {
                        'action': 'getState',
                        'countID': cid
                    },
                    success: function(resp) {
                        //alert(resp);
                        $("#states").html(resp);
                    }
                })
            } else {
                alert("Please select country name");
            }

        });
        /** Get City on State Change  */
        $("#states").change(function() {
            sid = $(this).val();
            if (sid) {
                $.ajax({
                    method: 'post',
                    url: 'http://localhost/PHP_Class/timesheet_pro/ajax/ajax.php',
                    data: {
                        'action': 'getCity',
                        'stateID': sid
                    },
                    success: function(resp) {

                        $("#cities").html(resp);
                    }
                })
            } else {
                alert("Please select state name");
            }
        });
    });
</script>