<?php

include_once 'header.php';

global $nameEmpty, $emailEmpty, $mobileEmpty, $detailsEmpty, $success, $failed;

if (isset($_POST['registration'])) {

    $item->name =
        ucwords($_POST['name']);
    $item->email =
        $_POST['email'];
    $item->mobile =
        $_POST['mobile'];
    $item->details =
        $_POST['details'];
    $item->created = date('Y-m-d H:i:s');

    if (!empty($item->name) && !empty($item->email) && !empty($item->mobile) && !empty($item->details)) {

        $item->getEmail();

        if ($item->id == null) {
            if ($item->createUser()) {
                $success = '<div class="alert alert-success mt-3" role="alert">User created successfully.</div>';
                //Reset if created
                $item->name = '';
                $item->email = '';
                $item->mobile = '';
                $item->details = '';
            } else {
                $failed = '<div class="alert alert-danger mt-3" role="alert">User could not be created.</div>';
            }
        } else {
            $failed = '<div class="alert alert-danger mt-3" role="alert">Email already is in use.</div>';
        }
    } else {
        if (empty($item->name)) {
            $nameEmpty = '<div class="alert alert-danger">full name is required</div>';
        }
        if (empty($item->email)) {
            $emailEmpty = '<div class="alert alert-danger">Email address is required</div>';
        }
        if (empty($item->mobile)) {
            $mobileEmpty = '<div class="alert alert-danger">Mobile no is required</div>';
        }
        if (empty($item->details)) {
            $detailsEmpty = '<div class="alert alert-danger">Details is required</div>';
        }
    }
}


?>

<div class="container mt-5" style="max-width: 500px">


    <form action="" method="post">
        <h3 class="text-center mb-5">User data Registration</h3>
        <div class="form-group">
            <label>Full name</label>
            <input placeholder="User full name" value="<?php echo $item->name; ?>" type="text" class="form-control" name="name" />
            <?php echo $nameEmpty ?>
        </div>


        <div class="form-group">
            <label>Email</label>
            <input placeholder="User email" value="<?php echo $item->email; ?>" type="email" class="form-control" name="email" />
            <?php echo $emailEmpty ?>
        </div>

        <div class="form-group">
            <label>Mobile</label>
            <input placeholder="User mobile" value="<?php echo $item->mobile; ?>" type="text" class="form-control" name="mobile" />
            <?php echo $mobileEmpty ?>
        </div>

        <div class="form-group">
            <label>Details</label>
            <textarea placeholder="Please type other details" type="text" class="form-control" name="details"><?php echo $item->details; ?></textarea>
            <?php echo $detailsEmpty ?>
        </div>

        <button type="submit" name="registration" class="btn btn-primary btn-lg btn-block" Onclick="return done(this.form);">
            Register
        </button>
        <?php echo $success . $failed ?>
    </form>
</div>


<?php

include_once 'footer.php';
