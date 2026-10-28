<?php 

include '../config/database.php';

$message="";

$id = $_GET['id'];

$queryfetch = "select * from students where id= {$id} ";

$run = mysqli_query($conn, $queryfetch);

$data = mysqli_fetch_assoc($run);


if(isset($_POST['update'])){
    $eno = $_POST['eid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $dob = $_POST['DOB'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $course = $_POST['course'];
    $ad = $_POST['ad'];

    $query = "update students set Enrollment= '$eno', First_name='$fname', Last_Name='$lname', Gender='$gender', DOB='$dob', Email='$email', Phone='$phone', Address='$address', City='$city', Course='$course', Admission_Date='$ad' where Id= {$id} ";

    $res = mysqli_query($conn, $query);

    if($res){
        echo "Student Updated Successfully";
    }
    else{
        echo "Error: " . mysqli_error($conn);
    }

    header("Location: ../admin/dashboard.php");
}
include '../includes/header.php';
?>

    <div class="content">
    <div class="page-heading">
        <h1>Update Student</h1>
        <p>Change student information below.</p>
    </div>

    <?php if($message != "") { ?>
        <div class="success-message">
            <?php echo $message; ?>
        </div>
    <?php } ?>

    <div class="form-container">
        <form method="POST">
            <div class="form-grid">
                <div class="form-group">
                    <label>Enrollment ID</label>
                    <input type="text" name="eid" class="form-control" value="<?php echo $data['Enrollment']; ?>" required>
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="fname" class="form-control" value="<?php echo $data['First_Name']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="lname" class="form-control" value="<?php echo $data['Last_Name']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <select name="gender"  class="form-control" required>
                        <option value="">Select Gender</option>
                        <option value="Male" <?php if($data['Gender'] == 'Male') echo 'selected'; ?>>Male</option>
                        <option value="Female" <?php if($data['Gender'] == 'Female') echo 'selected'; ?>>Female</option>
                        <option value="Other" <?php if($data['Gender'] == 'Other') echo 'selected'; ?>>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="date" name="DOB" class="form-control" value="<?php echo $data['DOB']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $data['Email']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="phone" class="form-control" value="<?php echo $data['Phone']; ?>" required>
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" name="city" class="form-control" value="<?php echo $data['City']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Course</label>
                    <input type="text" name="course" class="form-control" value="<?php echo $data['Course']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Admission Date</label>
                    <input type="date" name="ad" class="form-control" value="<?php echo $data['Admission_Date']; ?>" required>
                </div>
                <div class="form-group full">
                    <label>Address</label>
                    <textarea name="address" class="form-control" rows="4" required><?php echo $data['Address']; ?></textarea>
                </div>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
<?php include '../includes/footer.php'; ?>
