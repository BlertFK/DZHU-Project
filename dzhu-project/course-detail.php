<?php
include_once '../db/db.php'; 

// Get the course ID from the URL
$course_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($course_id > 0) {
    // Fetch the course details based on the course ID, including instructor email
    $query = "SELECT courses.*, users.username AS created_by_name, users.email AS created_by_email
              FROM courses
              JOIN users ON courses.created_by = users.id
              WHERE courses.id = :course_id";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['course_id' => $course_id]);
    $course = $stmt->fetch();

    if (!$course) {
        die("Course not found.");
    }
} else {
    die("Invalid course ID.");
}

// Set default values if fields are missing
$overview = isset($course['overview']) ? htmlspecialchars($course['overview']) : 'No overview available.';
$topics = isset($course['topics']) ? explode(',', $course['topics']) : [];
$learning_outcomes = isset($course['learning_outcomes']) ? explode(',', $course['learning_outcomes']) : [];
$level = isset($course['level']) ? htmlspecialchars($course['level']) : 'Not specified';
$prerequisites = isset($course['prerequisites']) ? htmlspecialchars($course['prerequisites']) : 'None';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KnowHive - Course Details</title>
    <link rel="stylesheet" href="./style.css" />
    <link rel="stylesheet" href="./style-detail.css" />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
  </head>
  <body>
    <?php include_once '../header/header.php'; ?>

    <div class="course-details-container">
      <!-- Course Header -->
      <div class="course-header">
        <img src="../<?php echo $course['image_url'] ? $course['image_url'] : 'default.jpg'; ?>" alt="course image" />
        <div class="course-title">
          <h1><?php echo htmlspecialchars($course['title']); ?></h1>
          <p><?php echo htmlspecialchars($course['description']); ?></p>
        </div>
      </div>

      <!-- Course Details -->
      <div class="course-content">
        <h2>Course Overview</h2>
        <p><?php echo $overview; ?></p>

        <h3>Course Topics:</h3>
        <ul>
          <?php
          if (!empty($topics)) {
            foreach ($topics as $topic) {
              echo "<li>" . htmlspecialchars($topic) . "</li>";
            }
          } else {
            echo "<li>No topics available. Please contact the instructor for more information.</li>";
          }
          ?>
        </ul>

        <h3>What You'll Learn:</h3>
        <ul>
          <?php
          if (!empty($learning_outcomes)) {
            foreach ($learning_outcomes as $outcome) {
              echo "<li>" . htmlspecialchars($outcome) . "</li>";
            }
          } else {
            echo "<li>No learning outcomes listed. Please contact the instructor for more details.</li>";
          }
          ?>
        </ul>

        <h3>Instructor Information:</h3>
        <div class="user">
          <img
            src="https://randomuser.me/api/portraits/men/81.jpg"
            alt="instructor"
          />
          <div class="user-info">
            <h5><?php echo htmlspecialchars($course['created_by_name']); ?></h5>
            <small><?php echo htmlspecialchars($course['category'] ?? 'Uncategorized'); ?></small>
          </div>
        </div>

        <h3>Course Details:</h3>
        <p>Duration: <?php echo htmlspecialchars($course['duration']); ?> weeks</p>
        <p>Price: <?php echo htmlspecialchars($course['price']); ?></p>
        <p>Level: <?php echo $level; ?></p>
        <p>Prerequisites: <?php echo $prerequisites; ?></p>

        <div class="enroll-button">
          <a href="#">Enroll Now</a>
        </div>
      </div>
    </div>

    <?php include_once '../header/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js"></script>
    <script src="script.js"></script>
  </body>
</html>
