<?php

session_start();

if(!isset($_SESSION['user']) || !isset($_SESSION['Id'])){
    header("location: ../login.php");
    exit();
}

include '../config/database.php';
include '../includes/header.php';

$count = mysqli_query($conn, "SELECT COUNT(*) AS total FROM students");
$row = mysqli_fetch_assoc($count);
$total_students = $row['total'];

$search = "";

if (isset($_GET['search'])) 
{
    $search = $_GET['search'];
}

$query = "SELECT * FROM students WHERE Enrollment LIKE '%$search%' OR First_Name LIKE '%$search%' OR Last_Name LIKE '%$search%' OR Email LIKE '%$search%' OR Phone LIKE '%$search%' OR City LIKE '%$search%' OR Course LIKE '%$search%' ORDER BY Id DESC";
$res = mysqli_query($conn, $query);

?>

<div class="content">
    <div class="page-heading">
        <h1>Dashboard</h1>
        <p>Welcome to Student Management System.</p>
    </div>

    <div class="cards">
        <div class="card">
            <div class="card-title">Total Students</div>
            <div class="card-number">
                <?php echo $total_students; ?>
            </div>
        </div>
        <div class="card">
            <div class="card-title">System Status</div>
            <div class="card-number">Active</div>
        </div>
        <div class="card">
            <div class="card-title">Management</div>
            <div class="card-number">Students</div>
        </div>
    </div>

    <div class="page-heading student-list-heading">
        <h1>Student List</h1>
        <p>All registered students.</p>
    </div>
    <form method="GET" class="search-form">
        <input type="text" name="search" placeholder="Search students..." value="<?php echo htmlspecialchars($search); ?>" class="search-input">
        <button type="submit" class="search-btn">Search</button>
        <a href="dashboard.php" class="clear-btn">Clear</a>
    </form>
    <br />
    <div class="table-container">
        <table class="student-table">
            <thead>
                <tr>
                    <th>Enrollment</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Date Of Birth</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Course</th>
                    <th>Admission Date</th>
                    <th colspan="2">Operations</th>
                </tr>
            </thead>

            <tbody>
                <?php 

                    if (mysqli_num_rows($res) > 0) {

                    while ($data = mysqli_fetch_assoc($res)) {
                        ?>
                            <tr>
                                <td><?php echo $data['Enrollment']; ?></td>
                                <td><?php echo$data['First_Name']; ?></td>
                                <td><?php echo$data['Last_Name']; ?></td>
                                <td><?php echo$data['Gender']; ?></td>
                                <td><?php echo$data['DOB']; ?></td>
                                <td><?php echo$data['Email']; ?></td>
                                <td><?php echo$data['Phone']; ?></td>
                                <td><?php echo$data['Address']; ?></td>
                                <td><?php echo$data['City']; ?></td>
                                <td><?php echo$data['Course']; ?></td>
                                <td><?php echo$data['Admission_Date']; ?></td>
                                <td><a href="edit_student.php?id=<?php echo $data['Id']; ?>" class="action-btn edit-btn">Edit</a></td>
                                <td><a href="delete_student.php?id=<?php echo $data['Id']; ?>" class="action-btn delete-btn" onclick="return confirm('Are you sure you want to delete this student?');">Delete</a></td>
                            </tr>
                        <?php
                    }
                } else {
                ?>
                    <tr>
                        <td colspan="13" class="no-data">
                            No students found.
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include '../includes/footer.php'; ?>
