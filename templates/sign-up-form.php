<?php include '../config/init.php'; ?>
<?php include 'header-sign-up.php'; ?>

    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-75">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-info text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2">Sign up</h2>
                                <p class="text-white mb-5">Please enter your information!</p>

                                <form method="post" action="../sign-up.php">
                                    <div class="form-outline form-white mb-4">
                                        <input type="email" id="typeEmailX" class="form-control form-control-lg" name="email"/>
                                        <label class="form-label" for="typeEmailX">Email</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" id="typePasswordX" class="form-control form-control-lg" name="password"/>
                                        <label class="form-label" for="typePasswordX">Password</label>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="password" id="typeConfirmPasswordX" class="form-control form-control-lg" name="confirm_password"/>
                                        <label class="form-label" for="typeConfirmPasswordX">Confirm Password</label>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="text" id="typeNicknameX" class="form-control form-control-lg" name="nickname"/>
                                        <label class="form-label" for="typeNicknameX">Nickname</label>
                                    </div>
                                    <input class="btn btn-outline-light btn-lg px-5" type="submit" name="submit" value="Sign up">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include 'footer.php'; ?>