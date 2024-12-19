<?php
// head to login screen if user is not signed in.
include_once 'config/session_script.php';

// head to home screen if user is not admin.
include_once 'config/user_auth_script.php';

$page = "New Partner";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=partners/all";
$home_link_name = "All Partners";

$new_link = "index.php?page=partners/new";
$new_link_name = "New Partner";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Partners";
$breadcrumb_active = "New Partner";

include_once 'partials/header.php';
include_once 'partials/content_start.php';

$account_id = $_SESSION['account']['id'];
?>

<main>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            <form action="index.php?page=partners/create" method="post" autocomplete="off">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" placeholder="eg: Kenya Rentals LTD" class="form-control form-control-border"  required>
                                    <?php if (isset($_GET['name_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['name_err']; ?></p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control form-control-border"  required>
                                    <?php if (isset($_GET['email_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['email_err']; ?></p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <label for="tel">Tel</label>
  
                                    <input type="tel" name="tel" id="phone" class="form-control form-control-border" required>
                                    <?php if (isset($_GET['tel_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['tel_err']; ?></p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <label for="email">Address</label>
                                    <input type="text" name="address"  class="form-control form-control-border"  required>
                                    <?php if (isset($_GET['email_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['email_err']; ?></p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <label for="email">Certificate Number</label>
                                    <input type="text" name="certificate_no"  class="form-control form-control-border"  required>
                                    <?php if (isset($_GET['email_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['email_err']; ?></p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <label for="email">KRA PIN Number</label>
                                    <input type="text" name="kra_pin"  class="form-control form-control-border"  required>
                                    <?php if (isset($_GET['email_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['email_err']; ?></p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-dark">Add Partner</button>
                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once "partials/footer.php";?>