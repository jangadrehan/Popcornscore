<!DOCTYPE html>
<html>
<?php include("common/header.php");?>
    <body class="theme-blue">

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<?php include("common/sidebar.php");?>

<?php
include('../db_connection.php');

// Get user ID
$user_id = $_GET['id'] ?? null;
if (!$user_id) {
    die("No User ID provided.");
}

// Fetch user details
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    die("User not found.");
}
?>

<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Edit User</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="allusers.php">All Users</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
        </div>
        <div class="card">
            <div class="body">
                <!-- User Edit Form -->
                <form action="edit_userprocess.php?id=<?= $user_id ?>" method="POST" enctype="multipart/form-data" class="col-md-12">
                    
                    <div class="form-group form-float">
                        <div class="form-line focused">
                            <input class="form-control" name="username" type="text" required 
                                   value="<?= htmlspecialchars($user['username']) ?>" />
                            <label class="form-label">Enter Username</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line focused">
                            <input class="form-control" name="email" type="email" required 
                                   value="<?= htmlspecialchars($user['email']) ?>" />
                            <label class="form-label">Enter Email</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line focused">
                            <input class="form-control" name="password" type="text" 
                                   value="<?= htmlspecialchars($user['password'] ?? '') ?>" />
                            <label class="form-label">Enter Password</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <label>User Role</label>
                        <select name="role" class="form-control" >
                            <option value="user" <?= $user['admin'] == 'user' ? 'selected' : '' ?>>User</option>
                            <option value="admin" <?= $user['admin'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                        </select>
                    </div>

                    <!-- Profile Image Preview -->
                    <div class="form-group">
                        <label>Current Profile Picture</label><br>
                    <?php if (!empty($user['photo']) && file_exists(__DIR__ . '/../' . $user['photo'])): ?>
                            <img src="/popcornscore/<?= $user['photo'] ?>" 
                            alt="Profile Picture" 
                            style="max-width:150px; height:auto; border:1px solid #ccc; margin-bottom:10px;">
                    <?php else: ?>
                    <p>No profile picture available.</p>
                <?php endif; ?>

                    </div>

                    <div class="form-group form-float">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="photo" placeholder="Add Poster"  id="customFile" required>
                            <label class="custom-file-label" for="customFile">Choose Profile Photo</label>
                        </div>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Update User</button>
                </form> 
            </div>
        </div>
    </div>
</section>

<!-- Scripts -->
<script src="../public/backend/bundles/libscripts.bundle.js"></script>
<script src="../public/backend/bundles/vendorscripts.bundle.js"></script>
<script src="../public/backend/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="../public/backend/bundles/flotscripts.bundle.js"></script>
<script src="../public/backend/bundles/morrisscripts.bundle.js"></script>
<script src="../public/backend/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="../public/backend/bundles/jvectormapscripts.bundle.js"></script>
<script src="../public/backend/bundles/mainscripts.bundle.js"></script>
<script src="../public/backend/js/pages/index.js"></script>
<script src="../public/backend/js/pages/charts/sparkline.js"></script>
<script src="../public/backend/js/pages/maps/jvectormap.js"></script>
<script src="../public/backend/js/pages/charts/jquery-knob.js"></script>
</body>
</html>
