<?php
    // THIS PAGE SHOWS A FORM TO CREATE INDIVIDUAL AGENT

    // head to login screen if user is not signed in.
    include_once 'config/session_script.php';

    // head to home screen if user is not admin.
    include_once 'config/user_auth_script.php';

    $page = "Edit Agent";

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

    if (isset($_GET['id'])) {
        $id      = $_GET['id'];
        $agent = get_agent($id);
        // $log->info('Foo: ', $vehicle);
    } else {
        $msg = "Couldn't fetch fetch agent";
        header("Location: index.php?page=agents/all&err_msg=$msg");
    }

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


                            <form action="index.php?page=agents/update" method="post" autocomplete="off">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control form-control-border" value="<?php edit_input_value($agent, 'name') ?>">
                                    <?php if (isset($_GET['name_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['name_err']; ?></p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control form-control-border" value="<?php edit_input_value($agent, 'email') ?>">
                                    <?php if (isset($_GET['email_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['email_err']; ?></p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <select name="country" class="form-control form-control-border">

                                            <option value="<?php edit_input_value($agent, 'country') ?>"><?php edit_dropdown_value($agent, 'country') ?></option>
                                            <?php foreach ($countries as $country): ?>
                                                <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
                                            <?php endforeach;?>

                                    </select>
                                    <?php if (isset($_GET['country_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['country_err']; ?></p>
                                    <?php endif;?>

                                </div>

                                <div class="form-group">
                                    <label for="tel">Tel</label>
                                    <input type="tel" name="tel" id="phone" class="form-control form-control-border">
                                    <p class="text-primary">Current phone: <?php show_value($agent, 'phone_no') ?> </p>
                                    <?php if (isset($_GET['tel_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['tel_err']; ?></p>
                                    <?php endif;?>
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-dark">Update Agent</button>
                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once "partials/footer.php";?>