<?php 

include '../config/database.php';

$message="";


if(isset($_POST['add'])){
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

    $query = "insert into students(Enrollment,First_name,Last_Name,Gender,DOB,Email,Phone,Address,City,Course,Admission_Date) values('$eno','$fname','$lname','$gender','$dob','$email','$phone','$address','$city','$course','$ad')";

    $res = mysqli_query($conn, $query);

    if($res){
        echo "Student Added Successfully";
    }
    else{
        echo "Error: " . mysqli_error($conn);
    }
}
include '../includes/header.php';
?>

    <div class="content">
    <div class="page-heading">
        <h1>Add New Student</h1>
        <p>Enter student information below.</p>
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
                    <input type="text" name="eid" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="fname" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="lname" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <select name="gender" class="form-control" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="date" name="DOB" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="phone" class="form-control"required>
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" name="city" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Course</label>
                    <input type="text" name="course" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Admission Date</label>
                    <input type="date" name="ad" class="form-control" required>
                </div>
                <div class="form-group full">
                    <label>Address</label>
                    <textarea name="address" class="form-control" rows="4" required></textarea>
                </div>
            </div>
            <button type="submit" name="add" class="btn btn-primary">Add Student</button>
        </form>
    </div>
</div>
<?php include '../includes/footer.php'; ?>
