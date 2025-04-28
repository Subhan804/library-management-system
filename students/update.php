<?php
include '../header.php';
$student_id = $_GET['id'];
$conn = mysqli_connect("localhost","root","","lms") or die("Connection failed");
$sql = "SELECT * FROM students WHERE id = $student_id";

$result = mysqli_query($conn, $sql) or die("Query failed");
$row = mysqli_fetch_assoc($result);

?>

<div class="container">
    <h3 class="text-center mb-4 text-primary">➕ Update Student</h3>

    <form action="updateData.php" method="POST" class="w-50 mx-auto border p-4 shadow-sm bg-light rounded">
        <input type="hidden" name="id" value="<?php echo $row['id']?>">
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" value="<?php echo $row['name']?>"  class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Roll Number</label>
            <input type="number" name="roll_number"  value="<?php echo $row['roll_number']?>"  class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Class</label>
            <input type="text" name="class"  value="<?php echo $row['class']?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email"  value="<?php echo $row['email']?>" class="form-control" required>
        </div>

        <button type="submit" name="submit" class="btn btn-primary w-100">Update</button>
    </form>
</div>

</div>
</body>

</html>