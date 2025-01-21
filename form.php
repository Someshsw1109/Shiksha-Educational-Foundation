<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shiksha Educational Foundation</title>
    <link rel="stylesheet" type="text/css" href="form.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="form-container">
        <form class="form" method="POST" action="form.php">
            <div class="title-div">
                <h1>Shiksha Educational Foundation</h1>
                <p>Registration Form</p>
                <p class="required">*Required</p>
            </div>

            <div class="input-group">
                <label for="name" class="question">Name</label>
                <input type="text" id="name" name="name" placeholder="Your answer" required>
            </div>

            <div class="input-group">
                <label for="class" class="question">Standard/Class</label>
                <input type="text" id="class" name="class" placeholder="Your answer" required>
            </div>

            <div class="input-group">
                <label for="school" class="question">School/College</label>
                <input type="text" id="school" name="school" placeholder="Your answer" required>
            </div>

            <div class="input-group">
                <label for="location" class="question">Location of your School/College</label>
                <input type="text" id="location" name="location" placeholder="Your answer" required>
            </div>

            <div class="input-group">
                <label for="mobile" class="question">Mobile No.</label>
                <input type="tel" id="mobile" name="mobile" placeholder="Your answer" pattern="[0-9]{10}" maxlength="10" required>
            </div>

            <div class="input-group">
                <label class="question">Gender</label>
                <div class="radio-group">
                    <label><input type="radio" name="gender" value="male" onclick="toggleOtherInput(false)"> Male</label>
                    <label><input type="radio" name="gender" value="female" onclick="toggleOtherInput(false)"> Female</label>
                    <label><input type="radio" name="gender" value="other" onclick="toggleOtherInput(true)"> Other</label>
                </div>
                <input type="text" id="other-gender" name="other-gender" placeholder="Your answer" style="display: none;" disabled>
            </div>

            <div class="input-group">
                <label for="address" class="question">Address</label>
                <input type="text" id="address" name="address" placeholder="Your answer" pattern="[a-zA-Z0-9\s,.-]+" title="Please enter a valid address using letters, numbers, spaces, and , . - only" required>
            </div>

            <button type="submit" class="btn" name="submit">Submit</button>

            <div class="last-div">
                <p class="never">Never Submit Passwords through this online forms.</p>
                <p class="term">This Content is Made by Shiksha Educational Foundation - Terms of Service - Privacy Policy</p>
                <h2>@ Shiksha Educational Foundation 2025</h2>
            </div>
        </form>
        <?php
        include 'connection.php';

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $class = $_POST['class'];
            $school = $_POST['school'];
            $mobile = $_POST['mobile'];
            $location = $_POST['location'];
            $address = $_POST['address'];
            $gender = $_POST['gender'];

            // Use prepared statements to prevent SQL injection
            $stmt = $conn->prepare("INSERT INTO `form_tbl`(`name`, `class`, `school`, `location`, `mobile`, `address`, `gender`) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $name, $class, $school, $location, $mobile, $address, $gender);

            if ($stmt->execute()) {
                echo "Form Submitted Successfully";
            } else {
                echo "Data insertion failed: " . $stmt->error;
            }

            $stmt->close();
            $conn->close();
        }
        ?>
    </div>
    
    <script>
        function toggleOtherInput(show) {
            const otherGenderInput = document.getElementById('other-gender');
            otherGenderInput.style.display = show ? 'block' : 'none';
            otherGenderInput.disabled = !show;
        }
    </script>
</body>
</html>