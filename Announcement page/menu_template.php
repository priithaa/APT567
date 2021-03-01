<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Announcements</title>
  
  <!-- bootstrap 5 css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
  <!-- BOX ICONS CSS-->
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
  <!-- custom css -->
  <link rel="stylesheet" href="style.css" />
</head>

<body>

    <!-- bootstrap js -->
    <script >
        var menu_btn = document.querySelector("#menu-btn");
        var sidebar = document.querySelector("#sidebar");
        var container = document.querySelector(".my-container");

        menu_btn.addEventListener("click", () => {
            sidebar.classList.toggle("active-nav");
            container.classList.toggle("active-cont");
        });

    </script>

  <!-- Side-Nav -->
  <div class="side-navbar active-nav d-flex justify-content-between flex-wrap flex-column" id="sidebar">
        <ul class="nav flex-column text-white w-100">
            <a href="#" class="nav-link h3 text-white my-2">
                Menu Board </br>CS302
            </a>
            <li class="nav-link">
              <a href = "">
                <i class="bx bx-book-reader"></i>
                <span class="mx-2">Overview</span>
              </a>
            </li>
            <li class="nav-link">
              <a href="">
                <i class="bx bx-book-content"></i>
                <span class="mx-2">Syllabus</span>
              </a>
            </li>
            <li class="nav-link">
              <a href="">
                <i class="bx bx-conversation"></i>
                <span class="mx-2">Announcements</span>
              </a>
            </li>
            <li class="nav-link">
              <a href="">
                <i class="bx bx-file"></i>
                <span class="mx-2">Assignments</span>
              </a>
            </li>
            <li class="nav-link">
              <a href="">
                <i class="bx bx-medal"></i>
                <span class="mx-2">Grades</span>
              </a>
            </li>
            <li class="nav-link">
              <a href="">
                <i class='bx bx-library' ></i>
                <span class="mx-2">Resources</span>
              </a>
            </li>
        </ul>

        <span href="#" class="nav-link h4 w-100 mb-5">
            <a href=""><i class="bx bxl-instagram-alt text-white"></i></a>
            <a href=""><i class="bx bxl-twitter px-2 text-white"></i></a>
            <a href=""><i class="bx bxl-facebook text-white"></i></a>
        </span>
  </div>

  <!-- Main Wrapper -->
  <div class="p-2 my-container active-cont">

    <!-- Top Nav -->
    <nav class="navbar top-navbar navbar-light bg-light px-5">
      <a class="btn border-0" id="menu-btn"><i class="bx bx-menu"></i></a>
      <h3 class="text-dark p-3"> CS302 > Data Communication and Networks  </h3>
      <div>
        <button type="button" class="btn btn-light" > Dashboard </button>
        <button type="button" class="btn btn-light" > LogOut </button>
      </div>
    </nav>
    <!--End Top Nav -->

    <!--main content begins-->
    <div class="row">
      
      

    