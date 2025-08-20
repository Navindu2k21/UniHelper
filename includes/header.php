<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
/* @mainColor: #48cfad; */
/* @mainHover: #37bc9b; */
/* @secondaryColor: #3a3a3a; */
/* @secondaryHover: #333; */

body {
  /* font-family: "Roboto";
  font-size: 14px; */

  &::before {
    content: '';
    position: fixed;
    z-index: -1;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }
}

nav {
  position: fixed;  /* Make it fixed at the top */
  width: 100%;  /* Full width for the navbar */
  height: 100px;
  top: 0;  /* Align to the top of the page */
  left: 0;  /* Align to the left of the page */
  z-index: 10;  /* Ensure it stays on top of other elements */
  background-color: rgba(0, 0, 0, 0.4);

  & ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;

    & li {
      position: relative;
      display: inline-block;
      /* margin-right: -4px; */
      text-align: center;

      &:first-child a {
        /* width: 49px; */
        /* padding: 15px 0; */
      }

      &:last-child {
        margin: 0;
      }

      & a {
        display: block;
        padding: 15px 20px;
        color: #fff;
        /* font-size: 14px; */
        text-decoration: none;
        transition: 0.2s linear;

        &:hover {
          /* Optional: add hover effect */
        }
      }

      /* Show dropdown on hover */
      &:hover > ul {
        display: block;
      }

      & ul {
        position: absolute;
        top: 100%;
        left: 0;
        width: 240px;
        display: none;  /* Initially hide the dropdown */
        /* background-color: #fff; */
        /* box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);  Optional: adds shadow to dropdown */

        & li {
          display: block;
          width: 100%;
          margin: 0;
          text-align: left;

          & a {
            display: block;
            /* padding: 10px 15px; */
            /* font-size: 14px; */

            &:hover {
              /* background-color: @secondaryHover; */
            }
          }
        }
      }
    }
  }
}

    </style>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Initially hide all submenus
            $('.menu li ul').hide();

            // Show submenu when hovering or clicking on the parent item
            $(".menu > li").hover(function() {
                // On mouse enter
                $(this).children("ul").stop(true, true).slideDown(200);
            }, function() {
                // On mouse leave
                $(this).children("ul").stop(true, true).slideUp(200);
            });

            // Optional: Click functionality to toggle submenu
            $(".menu > li > a").click(function() {
                var $subMenu = $(this).next("ul");
                if ($subMenu.length) {
                    $subMenu.stop(true, true).slideToggle(200);
                    return false; // Prevent navigation
                }
            });
        });
    </script>
</head>
<body>
  <img src="<?php echo $backwardseperator; ?>images/logo.png" width="5%" height="5%" margin='3px;'>
    <br><br>
<nav>
    <br>
  <ul class="menu">
    <li>
      <a href="<?php echo $backwardseperator; ?>index.php">
        <i class="fa fa-home"></i>
      </a>
    </li>
    <li class="sub-menu">
      <a href="#">
        Administration
        <i class="fa fa-angle-down"></i>
      </a>
      <ul>
        <li>
          <a href="<?php echo $backwardseperator; ?>administration/addsubjects/addsubjects.php">Add Subjects</a>
        </li>
        <li>
          <a href="<?php echo $backwardseperator; ?>administration/lecturelinks/lecturelinks.php">Add Lecture Links</a>
        </li>
      </ul>
    </li>
    <li>
      <a href="<?php echo $backwardseperator; ?>administration/dailyplan/dailyplan.php">Daily Plan</a>
    </li>
    <li>
      <a href="<?php echo $backwardseperator; ?>administration/monthlyprogress/monthlyprogress.php">Monthly Progress</a>
    </li>
    <li class="sub-menu">
      <a href="#">
        Lecture
        <i class="fa fa-angle-down"></i>
      </a>
      <ul>
        <li>
          <a href="<?php echo $backwardseperator; ?>administration/timetable/timetable.php">Time Table</a>
        </li>
        <li>
          <a href="<?php echo $backwardseperator; ?>administration/joinlecture/joinlecture.php">Join Lecture</a>
        </li>
      </ul>
    </li>
  </ul>
</nav>


</body>
</html>
