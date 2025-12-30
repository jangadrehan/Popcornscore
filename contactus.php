<?php session_start();
include('common/header.php'); 
include('common/navbar.php');
include('db_connection.php');

    if (!isset($_SESSION['user_id'])){
			echo "<script>window.location.href='login.php'</script>";
		}
$user_id = $_SESSION['user_id'];
    
// Fetch movie details
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$users = $result->fetch_assoc();
?>
<br>
<br>
<!-- ======= Contact Us Section ======= -->
<section id="contact" class="section-padding">
  <div class="container">
    <div class="section-title-header text-center">
      <h1 class="section-title">Contact Us</h1>
      <p>We’d love to hear from you. Reach out to us anytime!</p>
    </div>
    
    <div class="row">
      <!-- Contact Form -->
      <div class="col-lg-7 col-md-12">
        <form action="auth_procces/contactus_process.php" method="POST" class="p-4 bg-light rounded shadow">
          <div class="form-group mb-3">
            <label for="name">Username</label>
            <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($users['username']) ?>" required>
          </div>
          <div class="form-group mb-3">
            <label for="email">Your Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($users['email']) ?>" required>
          </div>
          <div class="form-group mb-3">
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" class="form-control">
          </div>
          <div class="form-group mb-3">
            <label for="message">Message</label>
            <textarea name="message" id="message" rows="5" class="form-control" required></textarea>
          </div>
          <button type="submit" class="btn btn-dark btn-block btn-waveeffect">Send Message</button>
        </form>
      </div>

      <!-- Contact Info -->
      <div class="col-lg-5 col-md-12 mt-4 mt-lg-0">
        <div class="p-4 bg-dark text-white rounded shadow">
          <h3>Get in Touch</h3>
          <p>If you have any questions, feedback, or partnership inquiries, feel free to reach out.</p>
          <ul class="list-unstyled">
            <li><strong>Email:</strong> jangadrehan@gamil.com</li>
            <li><strong>Phone:</strong> +91 98765 43210</li>
            <li><strong>Address:</strong> Mumbai, India</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Contact Section -->

<?php 
include('common/footer.php');
?>
