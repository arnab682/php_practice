            <div class="col-md-6">
                <div class="wow fadeInUp" data-wow-delay="0.5s">
                    <h3 style="text-align: center;"><b>Create Account</b></h3><hr>
                    <form action="{{ url('/employers/register') }}" method="post" enctype="multipart/form-data">@csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="companyName" id="companyName" placeholder="Your Name">
                                    <label for="companyName">Company Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="year_of_establishment" id="year_of_establishment" placeholder="Your Name">
                                    <label for="year_of_establishment">Year of Establishment</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="company_size" id="company_size" placeholder="Your Name">
                                    <label for="company_size">Company Size</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Your Name">
                                    <label for="address">Company Address</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="company_type" id="company_type" placeholder="Your Name">
                                    <label for="company_type">Company Type</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="url" id="url" placeholder="Your Name">
                                    <label for="url">Website URL</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="short_description" placeholder="Leave a message here" id="short_description" style="height: 150px"></textarea>
                                    <label for="short_description">Business Description</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="license_no" id="license_no" placeholder="Your Name">
                                    <label for="license_no">Business/ Trade License No</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control"  name="number" id="number" placeholder="Your Name">
                                    <label for="number">Company Phone Number</label>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="emailEmployer" id="emailEmployer" placeholder="Your Email">
                                    <label for="emailEmployer">Your Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="passwordEmployer" id="passwordEmployer" placeholder="Your Password">
                                    <label for="passwordEmployer">Your Password</label>
                                </div>
                            </div>

                            <!-- <div class="col-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password" placeholder="Your Password">
                                    <label for="password">Confirm Password</label>
                                </div>
                            </div> -->
                            
                            <div class="col-12">
                                <button id="save-btn" class="btn btn-primary w-100 py-3" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

