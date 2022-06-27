<!doctype html>
<html lang="en">

<?php

require_once('includes/header_css.php');
require_once('function/function.php');
$pdo = getPDOObject();

$skill_arr = "";

if (isset($_REQUEST['canId'])) {
    $id = $_REQUEST['canId'];


    $sql = " SELECT * from candidate where can_id=? LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    $skill = $data['skills'];
    $skill_arr = explode(',', $skill);

    // echo '<pre>';
    // echo $data['highest_qual'];
    // print_r($data);

    //  die("i am here in line 19");

}


//Query for update
if (isset($_POST['update'])) {
    $date = date("Y-m-d h:i:sa");
    extract($_POST);
    // echo '<pre>';
    // print_r($_POST);
    // die("hhhhkuytu");

    $skills = implode(",", $skill_arr);
    //echo $skills;
    //die();
    $sql = "update candidate set fname=?,lname=?,email=?,phone=?,zip=?,address=?,landmark=?,position=?,dob=?,doj=?,highest_qual=?,Skills=?,gender=?,updated_on=? where can_id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$fname, $lname, $email, $phone, $zip, $address, $landmark, $position, $dob, $doj, $highqual, $skills, $gender, $date, $id]);
    if ($stmt) {
        header("location:list-employee.php");
    }
    echo "Something went wrong";
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
                                <div>Edit Candidate

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

                                                        <div class="form-group col-md-6">
                                                            <label class="form-label col-lg-12"><b>First Name:</b></label>
                                                            <input type="text" class="form-control col-lg-12" name="fname" value="<?= $data['fname']; ?>" placeholder="Enter First Name" autocomplete>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="form-label col-lg-12"><b>Last Name:</b></label>
                                                            <input type="text" class="form-control col-lg-12" name="lname" value="<?= $data['lname']; ?>" placeholder="Enter Last Name">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="form-label col-lg-12"><b>Email Id:</b></label>
                                                            <input type="email" class="form-control col-lg-12" name="email" value="<?= $data['email']; ?>" placeholder="Enter mail">
                                                        </div>



                                                        <div class="form-group col-md-6">
                                                            <label class="form-label col-lg-12"><b>Phone:</b></label>
                                                            <input type="text" class="form-control col-lg-12" name="phone" value="<?= $data['phone']; ?>" placeholder="Enter phone">
                                                        </div>



                                                        <div class="form-group col-md-6">
                                                            <label class="form-label col-lg-12"><b>Country:</b></label>
                                                            <select class="form-control col-lg-12" name="country" id="country">
                                                                <option value=""> Select country</option>
                                                                <option value="getcountry(cid)"></option>
                                                                <?php
                                                                $sql = "select * from countries";
                                                                $stmt = $pdo->prepare($sql);
                                                                $stmt->execute();
                                                                $countdata = $stmt->fetchAll(pdo::FETCH_ASSOC);
                                                                foreach ($countdata as $val) {
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
                                                            <label class="form-label col-lg-12"><b>Zip:</b></label>
                                                            <input type="text" class="form-control col-lg-12" name="zip" minlength="6" maxlength="6" value="<?= $data["zip"]; ?>" placeholder="Enter your pincode">

                                                        </div>



                                                        <div class="form-group col-md-6">
                                                            <label class="form-label col-lg-12"><b>Address:</b></label>
                                                            <input type="text" class="form-control col-lg-12" name="address" value="<?php echo $data["address"]; ?>" placeholder="Enter Address">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="form-label col-lg-12"><b>Landmark:</b></label>
                                                            <input type="text" class="form-control col-lg-12" name="landmark" value="<?= $data['landmark']; ?>" placeholder="Enter landmark">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="form-label col-lg-12"><b>Position</b></label>
                                                            <select class="form-control col-lg-12" name="position">
                                                                <option value="">--Please Select--</option>
                                                                <option value="fresher" <?php if ($data['position'] == 'fresher') {
                                                                                            echo 'selected';
                                                                                        } ?>>Fresher</option>
                                                                <option value="developer" <?php if ($data['position'] == 'developer') {
                                                                                                echo 'selected';
                                                                                            } ?>>Junior Developer</option>
                                                                <option value="team leader" <?php if ($data['position'] == 'team leader') {
                                                                                                echo 'selected';
                                                                                            } ?>>Team Leader</option>
                                                                <option value="manager" <?php if ($data['position'] == 'manager') {
                                                                                            echo 'selected';
                                                                                        } ?>>manager</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label col-lg-12"><b>DOB:</b></label>
                                                            <input type="date" class="form-control col-lg-12" name="dob" value="<?= $data['dob']; ?>">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="form-label col-lg-12"><b>DOJ:</b></label>
                                                            <input type="date" class="form-control col-lg-12" name="doj" max="<?= date('Y-m-d') ?>" value="<?= $data['doj']; ?>">
                                                        </div>



                                                        <div class="form-group col-md-6">
                                                            <label class="form-label col-lg-12"><b>Highest Qualification</b></label>
                                                            <select class="form-control col-lg-12" name="highqual">
                                                                <option value=""></option>
                                                                <option value="BCA" <?php if ($data['highest_qual'] == 'BCA') { echo 'selected'; } ?>>BCA</option>
                                                                <option value="BSC" <?php if ($data['highest_qual'] == 'BCA') { echo 'selected'; } ?>>BSC</option>
                                                                    <option value="BBA" <?php if ($data['highest_qual'] == 'BBA') { echo 'selected'; } ?>>BBA</option>
                                                                   
                                                                    <option value="BA" <?php if ($data['highest_qual'] == 'BA') { echo 'selected'; } ?>>BA</option>
                                                                    <option value="B-FORMA" <?php if ($data['highest_qual'] == 'B-FORMA') { echo 'selected'; } ?>>B-FORMA</option>
                                                                    <option value="MBA" <?php if ($data['highest_qual'] == 'MBA') { echo 'selected'; } ?>>MBA</option>
                                                                    <option value="BTECH" <?php if ($data['highest_qual'] == 'BTECH') { echo 'selected'; } ?>>BTECH</option>

                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="form-label col-lg-12"><b>Skills:</b></label>
                                                            <label name="Skills" class="form-label">Skills:</label>
                                                            <input type="checkbox" name="Skills[]" value="JAVA" <?php if (in_array("JAVA", $skill_arr)) {
                                                                                                                    echo 'checked';
                                                                                                                } ?>>JAVA &nbsp;
                                                            <input type="checkbox" name="Skills[]" value="HTML" <?php if (in_array("HTML", $skill_arr)) {
                                                                                                                    echo 'checked';
                                                                                                                } ?>>HTML &nbsp;
                                                            <input type="checkbox" name="Skills[]" value="JAVA SCRIPT" <?php if (in_array("JAVA SCRIPT", $skill_arr)) {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>>JAVA SCRIPT &nbsp;
                                                            <input type="checkbox" name="Skills[]" value="PHP" <?php if (in_array("PHP", $skill_arr)) {
                                                                                                                    echo 'checked';
                                                                                                                } ?>>PHP &nbsp;
                                                            <input type="checkbox" name="Skills[]" value="ANGULAR" <?php if (in_array("ANGULAR", $skill_arr)) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>>ANGULAR &nbsp;
                                                        </div>



                                                        <div class="form-group col-md-6">
                                                            <label for="gender" class="form-label"><b>Gender:</b></label>
                                                            <input type="radio" name="gender" value="M" <?php if ($data['gender'] == 'M') {
                                                                                                            echo 'checked';
                                                                                                        } ?>>Male
                                                            <input type="radio" name="gender" value="F" <?php if ($data['gender'] == 'F') {
                                                                                                            echo 'checked';
                                                                                                        } ?>>Female
                                                        </div>



                                                        <div class="form-group col-md-6">
                                                            <button type="submit" class="btn btn-primary rounded-pill" name="update">update</button>
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