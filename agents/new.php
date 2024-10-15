<?php
    // THIS PAGE SHOWS A FORM TO CREATE INDIVIDUAL AGENT

    // head to login screen if user is not signed in.
    include_once 'config/session_script.php';

    // head to home screen if user is not admin.
    include_once 'config/user_auth_script.php';

    $page = "New Agent";

    // Navbar Links. We set these link in the navbar programatically.
    $home_link      = "index.php?page=agents/all";
    $home_link_name = "All Agents";

    $new_link      = "index.php?page=agents/new";
    $new_link_name = "New Agent";

    // Breadcrumb variables for programatically setting breadcrumbs in content_start.php
    $breadcrumb        = "Agents";
    $breadcrumb_active = "New Agent";

    include_once 'partials/header.php';
    include_once 'partials/content_start.php';

    $countries = countries();

    $account_id = $_SESSION['account']['id'];
?>

<main>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            <form action="index.php?page=agents/create" method="post" autocomplete="off">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control form-control-border" placeholder="Michael Maina">
                                    <?php if (isset($_GET['name_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['name_err']; ?></p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control form-control-border">
                                    <?php if (isset($_GET['email_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['email_err']; ?></p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <select name="country" class="form-control form-control-border">

                                            <option value="">--Please choose an option--</option>
                                            <?php foreach ($countries as $country): ?>
                                                <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
                                            <?php endforeach;?>

                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="tel">Tel</label>
                                    <input type="tel" name="tel" id="phone" class="form-control form-control-border">
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-dark">Add Agent</button>
                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once "partials/footer.php";?>