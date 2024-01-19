<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>Hirevac</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">

  <!-- font awesome style -->
  <link href="/css/font-awesome.min.css" rel="stylesheet" />
  <!-- nice select -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />

  <!-- Custom styles for this template -->
  <link href="/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="/css/responsive.css" rel="stylesheet" />

</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="/">
            <span>
              Hirevac
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="/">Home</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div class="container ">
        <div class="row">
          <div class="col-lg-7 col-md-8 mx-auto">
            <div class="detail-box">
              <h1>
                Free Checker
              </h1>
              <p>
                Enter any domain, and we’ll show you the Domain Authority, Page Authority, Trust Flow, Citation Flow, and more.
              </p>
            </div>
          </div>
        </div>
        <div class="find_container">
          <div class="container">
            <div class="row">
              <div class="col">
                <form>
                  <div class="form-row ">
                    <div class="form-group col-lg-9">
                      <input type="text" name="search" class="form-control" id="inputPatientName" placeholder="Domain" value="{{ isset($_GET['search']) ? $_GET['search'] : ''}}">
                    </div>
                    <div class="form-group col-lg-3">
                      <div class="btn-box">
                        <div class="btn btn-danger" id="check-now-btn" style="height: 45px;line-height: 33px;width: 100%;cursor: pointer;">Check Now</div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <table class="table table-hover table-dark" id="table-domain-info">
                  <thead>
                    <tr>
                      <th scope="col">Domain</th>
                      <th scope="col">PA</th>
                      <th scope="col">DA</th>
                      <th scope="col">TF</th>
                      <th scope="col">CF</th>
                      <th scope="col">BL</th>
                      <th scope="col">RD</th>
                      <th scope="col">Age</th>
                      <th scope="col">Score</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(isset($domain))
                    <tr>
                      <td>{{ ($domain->domain == -1) ? '-' : $domain->domain }}</td>
                      <td>{{ ($domain->pa == -1) ? '-' : $domain->pa }}</td>
                      <td>{{ ($domain->da == -1) ? '-' : $domain->da }}</td>
                      <td>{{ ($domain->tf == -1) ? '-' : $domain->tf }}</td>
                      <td>{{ ($domain->cf == -1) ? '-' : $domain->cf }}</td>
                      <td>{{ ($domain->bl == -1) ? '-' : $domain->bl }}</td>
                      <td>{{ ($domain->rd == -1) ? '-' : $domain->rd }}</td>
                      <td>{{ ($domain->age == -1) ? '-' : $domain->age }}</td>
                      <td>{{ ($domain->score == -1) ? '-' : $domain->score }}</td>
                    </tr>
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>
  <!-- category section -->
  <section class="category_section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 col-md-4 col-xl-2 px-0">
          <a href="#" class="box">
            <div class="img-box">
              <img src="/images/c1.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Web Design
              </h5>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-4 col-xl-2 px-0">
          <a href="#" class="box">
            <div class="img-box">
              <img src="/images/c2.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Web Development
              </h5>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-4 col-xl-2 px-0">
          <a href="#" class="box">
            <div class="img-box">
              <img src="/images/c3.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Graphic Design
              </h5>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-4 col-xl-2 px-0">
          <a href="#" class="box">
            <div class="img-box">
              <img src="/images/c4.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Seo marketing
              </h5>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-4 col-xl-2 px-0">
          <a href="#" class="box">
            <div class="img-box">
              <img src="/images/c5.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Accounting
              </h5>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-4 col-xl-2 px-0">
          <a href="#" class="box">
            <div class="img-box">
              <img src="/images/c6.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Content Writing
              </h5>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- end category section -->


  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About Us
              </h2>
            </div>
            <p>
              Normal distribution of letters, as opposed to using 'Content here, content here', making it look like
              readable English. Many desktop publishing packages and web page editors has a more-or-less normal
              distribution of letters, as opposed to using 'Content here, content here', making it look like readable
              English. Many desktop publishing packages and web page editors
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="/images/about-img.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end about section -->

  <!-- info section -->
  <section class="info_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-4 info_links">
          <h4>
            Menu
          </h4>
          <ul>
            <li class="active">
              <a href="/">
                Home
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          <div class="info_social">
            <h4>
              Social Link
            </h4>
            <div class="social_container">
              <div>
                <a href="">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
              </div>
              <div>
                <a href="">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
              </div>
              <div>
                <a href="">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
              </div>
              <div>
                <a href="">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="info_form">
            <h4>
              Newsletter
            </h4>
            <form action="">
              <input type="text" placeholder="Enter Your Email" />
              <button type="submit">
                Subscribe
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end info_section -->


  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Free Html Templates</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="/js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="/js/bootstrap.js"></script>
  <script src="/js/function.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
  <!-- custom js -->
  <script src="/js/custom.js"></script>


</body>

</html>