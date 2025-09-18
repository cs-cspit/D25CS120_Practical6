<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = htmlspecialchars($_POST['fullname']);
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $mobile = htmlspecialchars($_POST['mobile']);
    $dob = htmlspecialchars($_POST['dob']);
    $password = htmlspecialchars($_POST['password']);

    // Handle uploaded photo
    $photoPath = "";
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        $targetDir = "uploads/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true); // create folder if not exists
        }
        $photoPath = $targetDir . basename($_FILES["photo"]["name"]);
        move_uploaded_file($_FILES["photo"]["tmp_name"], $photoPath);
    }
} else {
    echo "No data received.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registration Confirmation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="card shadow p-4">
    <h2 class="text-center mb-4">✅ Registration Details</h2>
    <ul class="list-group">
      <li class="list-group-item"><strong>Full Name:</strong> <?= $fullname ?></li>
      <li class="list-group-item"><strong>Username:</strong> <?= $username ?></li>
      <li class="list-group-item"><strong>Email:</strong> <?= $email ?></li>
      <li class="list-group-item"><strong>Mobile:</strong> <?= $mobile ?></li>
      <li class="list-group-item"><strong>Date of Birth:</strong> <?= $dob ?></li>
      <li class="list-group-item"><strong>Password:</strong> <?= $password ?></li>
      <li class="list-group-item">
        <strong>Uploaded Photo:</strong><br>
        <?php if ($photoPath): ?>
          <img src="<?= $photoPath ?>" alt="User Photo" class="img-thumbnail mt-2" style="max-width:150px;">
        <?php else: ?>
          No photo uploaded.
        <?php endif; ?>
      </li>
    </ul>
    <div class="text-center mt-4">
      <a href="..\register.html" class="btn btn-primary">Go Back</a>
    </div>
  </div>
</div>

</body>
</html>
