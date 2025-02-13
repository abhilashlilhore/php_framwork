<!-- Three columns of text below the carousel -->
<div class="row">
    <div class="col-lg-12">
        <h1>Register</h1>


        <div class="row">
            <?php $form = \app\core\form\Form::formStart('/', 'post') ?>


            <div class="col-lg-6">
                <?php echo $form->field($model, 'firstname') ?>
            </div>
            <div class="col-lg-6">

                <?php echo $form->field($model, 'lastname') ?>
            </div>
            <div class="col-lg-6">
                <?php echo $form->field($model, 'email') ?>
            </div>
            <div class="col-lg-6">
                <?php echo $form->field($model, 'password')->passwordField() ?>
            </div>
            <div class="col-lg-6">
                <?php echo $form->field($model, 'confirmpassword')->passwordField() ?>
            </div>
            <div class="col-lg-6">
                <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
            </div>


            <?php echo \app\core\form\Form::formEnd() ?>
        </div>

    </div>
   
    <br><br>
    <br><br>
    <div class="col-lg-4 mt-12" style="margin-top:40px;">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
        </svg>
        <h2 class="fw-normal">Heading</h2>
        <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
        <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
        </svg>
        <h2 class="fw-normal">Heading</h2>
        <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
        <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
        </svg>
        <h2 class="fw-normal">Heading</h2>
        <p>And lastly this, the third column of representative placeholder content.</p>
        <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
    </div><!-- /.col-lg-4 -->
</div><!-- /.row -->


<!-- START THE FEATURETTES -->