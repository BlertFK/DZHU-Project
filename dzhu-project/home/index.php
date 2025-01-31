<?php
include_once '../db/db.php'; 

// Fetch the top 3 courses (modify the query if needed)
$query = "SELECT courses.*, users.username AS instructor_name
          FROM courses
          JOIN users ON courses.created_by = users.id
          ORDER BY courses.created_at DESC LIMIT 3";
$stmt = $pdo->prepare($query);
$stmt->execute();
$courses = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KnowHive - Home</title>
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/slider.css" />
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

    <!-- Slider Section -->
    <div class="swiper-container main-slider loading">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <figure
            class="slide-bgimg"
            style="background-image: url(../images/slider1.jpg)"
          >
            <img src="../images/slider1.jpg" class="entity-img" />
          </figure>
          <div class="content">
            <br /><br />
            <p class="title">Our Products</p>
            <span class="caption"
              >"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt ut labore et dolore magna aliqua."</span
            >
          </div>
        </div>
        <div class="swiper-slide">
          <figure
            class="slide-bgimg"
            style="background-image: url(../images/slider2.jpg)"
          >
            <img src="../images/slider2.jpg" class="entity-img" />
          </figure>
          <div class="content">
            <p class="title">Quality</p>
            <span class="caption"
              >"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt ut"</span
            >
          </div>
        </div>
        <div class="swiper-slide">
          <figure
            class="slide-bgimg"
            style="background-image: url(../images/slider3.jpg)"
          >
            <img src="../images/slider3.jpg" class="entity-img" />
          </figure>
          <div class="content">
            <p class="title">Created</p>
            <span class="caption"
              >"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt ut labore et dolore magna aliqua."</span
            >
          </div>
        </div>
      </div>

      <!-- Add Arrows -->
      <div class="arrows-container">
        <div class="swiper-arrow swiper-arrow-prev">
          <div class="arrow-back"></div>
          <span></span>
          <span></span>
        </div>
        <div class="swiper-arrow swiper-arrow-next">
          <div class="arrow-back"></div>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>

    <!-- Course Categories -->
    <div class="container">
      <h1 class="title-intro">Course Categories</h1>
      <p class="subtitle">
        Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus
        alias autem provident. Odit ab aliquam dolor eius.
      </p>
      <div class="categories">
        <div class="category">
          <div class="icon-container">
            <i class="fas fa-briefcase icon"></i>
          </div>
          <h3 class="title-intro">Business</h3>
          <p class="subtitle">
            Dignissimos asperiores vitae velit veniam totam fuga molestias
            accusamus alias autem provident. Odit ab aliquam dolor eius.
          </p>
        </div>
        <div class="category">
          <div class="icon-container">
            <i class="fas fa-heart icon"></i>
          </div>
          <h3 class="title-intro">Health & Psychology</h3>
          <p class="subtitle">
            Dignissimos asperiores vitae velit veniam totam fuga molestias
            accusamus alias autem provident. Odit ab aliquam dolor eius.
          </p>
        </div>
        <div class="category">
          <div class="icon-container">
            <i class="fas fa-file-invoice-dollar icon"></i>
          </div>
          <h3 class="title-intro">Accounting</h3>
          <p class="subtitle">
            Dignissimos asperiores vitae velit veniam totam fuga molestias
            accusamus alias autem provident. Odit ab aliquam dolor eius.
          </p>
        </div>
        <div class="category">
          <div class="icon-container">
            <i class="fas fa-cogs icon"></i>
          </div>
          <h3 class="title-intro">Science & Technology</h3>
          <p class="subtitle">
            Dignissimos asperiores vitae velit veniam totam fuga molestias
            accusamus alias autem provident. Odit ab aliquam dolor eius.
          </p>
        </div>
        <div class="category">
          <div class="icon-container">
            <i class="fas fa-paint-brush icon"></i>
          </div>
          <h3 class="title-intro">Art & Media</h3>
          <p class="subtitle">
            Dignissimos asperiores vitae velit veniam totam fuga molestias
            accusamus alias autem provident. Odit ab aliquam dolor eius.
          </p>
        </div>
        <div class="category">
          <div class="icon-container">
            <i class="fas fa-home icon"></i>
          </div>
          <h3 class="title-intro">Real Estate</h3>
          <p class="subtitle">
            Dignissimos asperiores vitae velit veniam totam fuga molestias
            accusamus alias autem provident. Odit ab aliquam dolor eius.
          </p>
        </div>
        <div class="category">
          <div class="icon-container">
            <i class="fas fa-comments icon"></i>
          </div>
          <h3 class="title-intro">Language</h3>
          <p class="subtitle">
            Dignissimos asperiores vitae velit veniam totam fuga molestias
            accusamus alias autem provident. Odit ab aliquam dolor eius.
          </p>
        </div>
        <div class="category">
          <div class="icon-container">
            <i class="fas fa-code icon"></i>
          </div>
          <h3 class="title-intro">Web & Programming</h3>
          <p class="subtitle">
            Dignissimos asperiores vitae velit veniam totam fuga molestias
            accusamus alias autem provident. Odit ab aliquam dolor eius.
          </p>
        </div>
      </div>
    </div>

    <!-- Card for Courses -->
    <div class="course-container">
      <?php foreach ($courses as $course): ?>
        <div class="card">
          <div class="card-header">
            <img
              src="https://c0.wallpaperflare.com/preview/483/210/436/car-green-4x4-jeep.jpg"
              alt="course image"
            />
          </div>
          <div class="card-body">
            <span class="tag tag-teal"><?php echo htmlspecialchars($course['category']); ?></span>
            <h4><?php echo htmlspecialchars($course['title']); ?></h4>
            <p><?php echo htmlspecialchars($course['description']); ?></p>
            <div class="user">
              <img
                src="https://randomuser.me/api/portraits/men/81.jpg" 
                alt="instructor"
              />
              <div class="user-info">
                <h5><?php echo htmlspecialchars($course['instructor_name']); ?></h5>
                <small>Instructor</small>
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
    <script src="../script.js"></script>
  </body>
</html>
