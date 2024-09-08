<?php

if (!(isset($_SESSION['client'])) {
    header("Location: index.php?page=client/auth/login");
    exit;
}

$page = "Edit";
include_once 'partials/client-header.php';
?>
<div class="container h-100">
    <div class="row h-100">
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
            <div class="d-table-cell align-middle">

                <div class="text-center mt-4">
                    <h1 class="h2">Welcome back</h1>
                    <p class="lead">
                        Sign in to your account to continue
                    </p>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="m-sm-4">
                            <div class="text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Andrew Jones" class="img-fluid rounded-circle" width="132" height="132">
                            </div>
                            <form>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input type="text" name="first_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" name="last_name" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="id_type">Id Type</label>
                                    <select name="id_type" class="form-control form-control-border">
                                            <option value="">--Please choose an option--</option>
                                            <option value="national_id"> National ID </option>
                                            <option value="passport"> Passport </option>
                                            <option value="military_id"> Military ID </option>
                                    </select>
                                    <?php if (isset($_GET['id_type_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['id_type_err']; ?></p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <label for="id">Id Number</label>
                                    <input type="text" name="id_number" class="form-control form-control-border" required>
                                    <?php if (isset($_GET['id_no_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['id_no_err']; ?></p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <label for="tel">Tel</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="tel" placeholder="Include country code" class="form-control form-control-border" required>
                                        <?php if (isset($_GET['tel_err'])): ?>
                                            <p class="text-danger"><?php echo $_GET['tel_err']; ?></p>
                                        <?php endif;?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="residential_address">Residential Address</label>
                                    <input type="text" name="residential_address" class="form-control form-control-border" required>
                                    <?php if (isset($_GET['residential_address_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['residential_address_err']; ?></p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <label for="work_address">Work Address</label>
                                    <input type="text" name="work_address" class="form-control form-control-border">
                                    <?php if (isset($_GET['work_address_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['work_address_err']; ?></p>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">
                                    <label for="date_of_birth">Date of Birth</label>
                                    <div class="input-group date" id="birthdate" data-target-input="nearest">
                                        <input type="text" name="date_of_birth" class="form-control datetimepicker-input" data-target="#birthdate"/>
                                        <div class="input-group-append" data-target="#birthdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <?php if (isset($_GET['date_of_birth_err'])): ?>
                                        <p class="text-danger"><?php echo $_GET['date_of_birth_err']; ?></p>
                                    <?php endif;?>

                                </div>

                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-lg btn-primary">Sign in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>