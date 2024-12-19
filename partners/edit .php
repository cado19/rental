<?php
// THIS FILE DISPLAYS A FORM TO EDIT PARTNER'S DETAILS

// head to login screen if user is not signed in.
include_once 'config/session_script.php';

// head to home screen if user is not admin.
include_once 'config/user_auth_script.php';

$page = "Edit Partner";

// Navbar Links. We set these link in the navbar programatically.
$home_link = "index.php?page=partners/all";
$home_link_name = "All Partners";

$new_link = "index.php?page=partners/new";
$new_link_name = "New Partner";

// Breadcrumb variables for programatically setting breadcrumbs in content_start.php
$breadcrumb = "Partners";
$breadcrumb_active = "Edit Partner";

// fetch id from url and use to fetch client record from database
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$partner = get_partner($id);
	$log->info('Foo: ', $partner);
} else {
	$error = "An error occured";
	header("Location: index.php?page=partners/all&msg=$error");
}

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


                            <form action="index.php?page=partners/update" method="post" autocomplete="off">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" placeholder="eg: Kenya Rentals LTD" class="form-control form-control-border" value="<?php edit_input_value($partner, 'name');?>" required>
                                    <?php if (isset($_GET['name_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['name_err']; ?></p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="<?php edit_input_value($partner, 'email');?>" class="form-control form-control-border"  required>
                                    <?php if (isset($_GET['email_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['email_err']; ?></p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <label for="tel">Tel</label>
                                    <input type="tel" name="tel" id="phone"  value="<?php edit_input_value($partner, 'phone_no');?>" class="form-control form-control-border" required>
                                    <?php if (isset($_GET['tel_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['tel_err']; ?></p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <label for="email">Address</label>
                                    <input type="text" name="address" value="<?php edit_input_value($partner, 'address');?>" class="form-control form-control-border"  required>
                                    <?php if (isset($_GET['email_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['email_err']; ?></p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <label for="email">Certificate Number</label>
                                    <input type="text" name="certificate_no" value="<?php edit_input_value($partner, 'certificate_no');?>" class="form-control form-control-border"  required>
                                    <?php if (isset($_GET['email_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['email_err']; ?></p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <label for="email">KRA PIN Number</label>
                                    <input type="text" name="kra_pin" value="<?php edit_input_value($partner, 'kra_pin');?>" class="form-control form-control-border"  required>
                                    <?php if (isset($_GET['email_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['email_err']; ?></p>
                                    <?php endif;?>
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-dark">Update Partner</button>
                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once "partials/footer.php";?>