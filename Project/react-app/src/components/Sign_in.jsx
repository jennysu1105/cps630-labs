import React from 'react';

const Sign_in = () => {
    return (
        <div class="container">
            <div class="row mt-5">
                <h3>Sign in to Smart Customer Services</h3>
            </div>
            <div class="row m-5">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-body registration">
                            <form method="POST" action="http://localhost:8000/signIn.php">
                                <div class="form-outline mt-4 mb-4">
                                    <label class="form-label" for="loginID">Login ID</label>
                                    <input type="text" name="loginID" id="loginID" maxlength="32" class="form-control"
                                        required />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="loginPassword">Password</label>
                                    <input type="password" name="loginPassword" id="loginPassword" minlength="8" maxlength="32"
                                        class="form-control" required />
                                </div>
                                <input class="btn btn-primary mt-3 mb-4" type="submit" name='sign_in' value="Sign in" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Sign_in;