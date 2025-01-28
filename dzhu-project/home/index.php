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
 <?php
 include_once '../header/header.php' ;
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
              eiusmod tempor incididunt ut labore et dolore magna aliqua.</span
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
              eiusmod tempor incididunt ut</span
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
              eiusmod tempor incididunt ut labore et dolore magna aliqua.</span
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

    <!-- introduction -->
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

    <!-- card for courses -->
    <div class="course-container">
      <div class="card">
        <div class="card-header">
          <img
            src="https://c0.wallpaperflare.com/preview/483/210/436/car-green-4x4-jeep.jpg"
            alt="rover"
          />
        </div>
        <div class="card-body">
          <span class="tag tag-teal">Technology</span>
          <h4>Web Development</h4>
          <p>Start your programming lessons now</p>
          <div class="user">
            <img
              src="https://yt3.ggpht.com/a/AGF-l7-0J1G0Ue0mcZMw-99kMeVuBmRxiPjyvIYONg=s900-c-k-c0xffffffff-no-rj-mo"
              alt="user"
            />
            <div class="user-info">
              <h5>July Dec</h5>
              <small>HTML & CSS</small>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <img
            src="https://www.newsbtc.com/wp-content/uploads/2020/06/mesut-kaya-LcCdl__-kO0-unsplash-scaled.jpg"
            alt="ballons"
          />
        </div>
        <div class="card-body">
          <span class="tag tag-purple">Javascript</span>
          <h4>Learn the best Javascript Framework now</h4>
          <p>
            Do you know that React JS developers are the most paid developers
            now ?
          </p>
          <div class="user">
            <img
              src="https://lh3.googleusercontent.com/ogw/ADGmqu8sn9zF15pW59JIYiLgx3PQ3EyZLFp5Zqao906l=s32-c-mo"
              alt="user"
            />
            <div class="user-info">
              <h5>Eyup Ucmaz</h5>
              <small>React JS</small>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <img
            src="https://images6.alphacoders.com/312/thumb-1920-312773.jpg"
            alt="city"
          />
        </div>
        <div class="card-body">
          <span class="tag tag-pink">Design</span>
          <h4>10 Rules of Dashboard Design</h4>
          <p>Dashboard Design Guidelines</p>
          <div class="user">
            <img
              src="https://people.com/thmb/gzHtG_UnZBsUuHVJx9xjB5yAfIQ=/4000x0/filters:no_upscale():max_bytes(150000):strip_icc():focal(399x0:401x2)/people-headshot-nick-maslow-f21ef38676504bc89a091ec9a5c95e4b.jpg"
              alt="user"
            />
            <div class="user-info">
              <h5>Carrie Brewer</h5>
              <small>Figma</small>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
 include_once '../header/footer.php' ;
 ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../script.js"></script>