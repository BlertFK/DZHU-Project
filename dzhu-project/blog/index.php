<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KnowHive - Home</title>
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
        include_once '../header/header.php' ;
    ?>
    <!-- Featured Blog -->
    <section class="featured-blog">
      <div class="featured-image">
        <img
          src="./image/image-1.png"
          alt="Featured Blog Image"
        />
      </div>
      <div class="featured-content">
        <h2>How to Build Modern Websites</h2>
        <p>
          Learn the key techniques and tools used to build modern, responsive,
          and interactive websites in 2024. From HTML to advanced JavaScript
          frameworks.
        </p>
        <a href="#" class="read-more">Read More</a>
      </div>
    </section>

    <!-- Blog Grid -->
    <section class="blog-grid">
      <h2>Recent Articles</h2>
      <div class="grid-container">
        <!-- Blog Post 1 -->
        <div class="blog-card">
          <img src="./image/image-2.jpg" alt="Blog 1" />
          <h3>Getting Started with CSS Grid</h3>
          <p>
            CSS Grid is revolutionizing web layouts. Here's a step-by-step guide
            to mastering it.
          </p>
          <a href="#" class="read-more">Read More</a>
        </div>
        <!-- Blog Post 2 -->
        <div class="blog-card">
          <img src="./image/image-3.jpg" alt="Blog 2" />
          <h3>10 JavaScript Frameworks to Learn</h3>
          <p>
            Stay ahead with this list of must-know JavaScript frameworks for
            developers.
          </p>
          <a href="#" class="read-more">Read More</a>
        </div>
        <!-- Blog Post 3 -->
        <div class="blog-card">
          <img src="./image/image-4.png" alt="Blog 3" />
          <h3>Responsive Design Tips</h3>
          <p>
            Discover the secrets to creating mobile-friendly and responsive
            websites.
          </p>
          <a href="#" class="read-more">Read More</a>
        </div>
      </div>
    </section>

    
    <?php
        include_once '../header/footer.php' ;
    ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
</html>
