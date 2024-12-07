<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo $home_link; ?>" class="nav-link"><?php echo $home_link_name; ?></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo $new_link; ?>" class="nav-link"><?php echo $new_link_name ?> </a>
      </li>

      <!-- Show blacklisted, recent only if in customers index page  -->
      <?php if ($page == "Customers"): ?>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo $blacklist_link; ?>" class="nav-link"><?php echo $blacklist_link_name; ?> </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo $recent_customer_link; ?>" class="nav-link"><?php echo $recent_customer_link_name; ?> </a>
        </li>

      <?php endif;?>

      <!-- Show blacklisted, recent only if in customers index page  -->
      <?php if ($page == "Bookings"): ?>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo $organisation_booking_link; ?>" class="nav-link"><?php echo $organisation_booking_link_name; ?> </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo $new_organisation_booking_link; ?>" class="nav-link"><?php echo $new_organisation_booking_link_name; ?> </a>
        </li>

      <?php endif;?>

      

      <!-- Show partner vehicle only if in fleet index page  -->
      <?php if ($page == "Vehicles"): ?>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo $partner_vehicle_link; ?>" class="nav-link"><?php echo $partner_vehicle_link_name; ?> </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo $new_partner_vehicle_link; ?>" class="nav-link"><?php echo $new_partner_vehicle_link_name; ?> </a>
        </li>
      <?php endif;?>



    </ul>
</nav>




