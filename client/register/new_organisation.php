<?php
    $page = "Sign Up";
    include_once 'partials/client-header.php';

    $countries = countries();
?>

<div class="container bootstrap snippets bootdeys">
<div class="row d-flex justify-content-center">
  <div class="col-xs-12 col-sm-9 col-8">
      <div class="panel panel-default">
        <div class="panel-body text-center">
         <img src="assets/kizusi_logo_white.png" class="img-circle profile-avatar" alt="User avatar">
        </div>
        <!-- Tabs -->
        <ul class="nav nav-pills justify-content-center">
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=client/register/new">Individual</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="index.php?page=client/register/new_organisation">Organisation</a>
          </li>
        </ul>
      </div>
      <form action="index.php?page=client/register/create_organisation" method="post" autocomplete="off">
          <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" placeholder="eg: Kenya Rentals LTD" class="form-control form-control-border"  required>
              <?php if (isset($_GET['name_err'])): ?>
                  <p class="text-danger"><?php echo $_GET['name_err']; ?></p>
              <?php endif;?>
          </div>

          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control form-control-border"  >
              <?php if (isset($_GET['email_err'])): ?>
                  <p class="text-danger"><?php echo $_GET['email_err']; ?></p>
              <?php endif;?>
          </div>

          <div class="form-group">
              <label for="contact_name">Company Number</label>
              <input type="text" name="company_no" class="form-control form-control-border">
          </div>

          <div class="form-group">
              <label for="id_type">Country</label>
              <select name="country" class="form-control form-control-border">

                      <option value="">--Please choose an option--</option>
                      <?php forEach ($countries as $country): ?>
                          <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
                      <?php endforeach;?>

              </select>
              <?php if (isset($_GET['counrty_err'])): ?>
                  <p class="text-danger"><?php echo $_GET['counrty_err']; ?></p>
              <?php endif;?>
          </div>

          <div class="form-group">
              <label for="contact_name">Tel</label>
              <input type="tel" name="tel" id="phone" class="form-control form-control-border" required>
              <?php if (isset($_GET['tel_err'])): ?>
                  <p class="text-danger"><?php echo $_GET['tel_err']; ?></p>
              <?php endif;?>
          </div>

          <div class="form-group">
              <label for="contact_name">KRA PIN (Optional)</label>
              <input type="text" name="kra_pin" class="form-control form-control-border">
          </div>  

          <div class="form-group">
              <button type="submit" class="btn btn-outline-dark">Add Organisation</button>
          </div>
      </form>
  </div>
</div>
</div>

<?php include_once 'partials/client-footer.php';?>