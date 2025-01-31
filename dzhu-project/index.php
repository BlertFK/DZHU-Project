<?php
include_once '../db/db.php'; 

// Fetch courses along with the user names who created them
$query = "SELECT courses.*, users.username AS created_by_name 
          FROM courses
          JOIN users ON courses.created_by = users.id
          WHERE courses.status = 'active'";
$stmt = $pdo->prepare($query);
$stmt->execute();
$courses = $stmt->fetchAll(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>KnowHive - Courses</title>
  <link rel="stylesheet" href="./style.css" />
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
  <?php
    include_once '../header/header.php';
  ?>

  <div class="course-container">
    <?php foreach ($courses as $course): ?>
      <div class="card">
        <div class="card-header">
          <img src="../<?php echo $course['image_url'] ? $course['image_url'] : 'default.jpg'; ?>" alt="<?php echo $course['title']; ?>" />
        </div>
        <div class="card-body">
          <span
            style="display: inline-block; background-color: <?php echo getCategoryColor($course['category']); ?>; color: white; padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.75rem;">
            <?php echo htmlspecialchars($course['category']); ?>
          </span>
          <a class="title-course" href="./course-detail.php?id=<?php echo $course['id']; ?>">
            <h4><?php echo htmlspecialchars($course['title']); ?></h4>
          </a>

          <p><?php echo htmlspecialchars($course['description']); ?></p>
          <div class="user">
            <img
              src="https://randomuser.me/api/portraits/men/81.jpg" 
              alt="user"
            />
            <div class="user-info">
              <h5><?php echo htmlspecialchars($course['created_by_name']); ?></h5> <!-- Display user name -->
              <small><?php echo htmlspecialchars($course['category']); ?></small>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <?php
    include_once '../header/footer.php';
  ?>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="script.js"></script>
</body>
</html>

<?php
function getCategoryColor($category) {
    $colors = [
        'Technology' => '#38b2ac',
        'Javascript' => '#9f7aea',
        'Design' => '#ec4899',
        'Data Science' => '#48bb78',
        'Cloud Computing' => '#3b82f6',
        'Marketing' => '#ed8936',
        'Analytics' => '#f87171',
        'Leadership' => '#fbbf24',
        'Python' => '#3b82f6',
        'Productivity' => '#ef4444',
        'Management' => '#dc2626',
        'Finance' => '#8b5cf6',
    ];

    return isset($colors[$category]) ? $colors[$category] : '#000000';
}
?>
