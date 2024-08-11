<?php 
    // THIS FILE CONTAINS THE FORM FOR CREATING A NEW CUSTOMER 

    //page name. We set this inn the content start and also in the page title programatically
    $page = "New Client";

    // Navbar Links. We set these link in the navbar programatically.
    $home_link = "index.php?page=customers/all";
    $home_link_name = "All Clients";

    $new_link = "index.php?page=customers/new";
    $new_link_name = "New Client";

    // Breadcrumb variables for programatically setting breadcrumbs in content_start.php
    $breadcrumb = "Clients";
    $breadcrumb_active= "New Client";

    include_once 'partials/header.php';
    include_once 'partials/content_start.php'; 
    $account_id = $_SESSION['account']['id'];
?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <form action="index.php?page=customers/create" method="post" autocomplete="off">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" name="first_name" placeholder="eg: Michelle" class="form-control form-control-border" required>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" name="last_name" placeholder="eg: Ngele" class="form-control form-control-border" required>
                                    </div>
                                </div>


                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control form-control-border" required>
                            </div>

                            <div class="form-group">
                                <label for="id_type">Id Type</label>
                                <select name="id_type" class="form-control form-control-border">
                                        <option value="">--Please choose an option--</option>
                                        <option value="national_id"> National ID </option>
                                        <option value="passport"> Passport </option>
                                        <option value="military_id"> Military ID </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id">Id Number</label>
                                <input type="text" name="id_number" class="form-control form-control-border" required>
                            </div>

                            <div class="form-group">
                                <label for="tel">Tel</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">+254</span>
                                    </div>
                                    <input type="text" name="tel" placeholder="without '0'" class="form-control form-control-border" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="residential_address">Residential Address</label>
                                <input type="text" name="residential_address" class="form-control form-control-border" required>
                            </div>

                            <div class="form-group">
                                <label for="work_address">Work Address</label>
                                <input type="text" name="work_address" class="form-control form-control-border">
                            </div>

                            <div class="form-group">
                                <label for="date_of_birth">Date of Birth</label>
                                <input type="text" name="date_of_birth" id="start_date_picker" class="form-control form-control-border" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-dark">Add User</button>
                            </div>
                        </form>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

