            <div class="col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.5s">
                            <h3 style="text-align: center;"><b>Create Account</b></h3><hr>
                            <form action="{{ url('/candidate/register') }}" method="post" enctype="multipart/form-data">@csrf
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="fullName" placeholder="Your Name">
                                            <label for="nameCandidate">Full Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
                                            <label for="email">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Your Password">
                                            <label for="password">Your Password</label>
                                        </div>
                                    </div>
                                    <!-- <div class="col-6">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="createPassword" placeholder="Your Password">
                                            <label for="password">Confirm Password</label>
                                        </div>
                                    </div> -->
                                    
                                    <div class="col-12">
                                        <button onclick="Save()" id="save-btn" class="btn btn-primary w-100 py-3" type="submit">Sign Up</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->


<script>
    async function Save() {
        try {
            let fullName = document.getElementById('fullName').value;
            let createEmail = document.getElementById('createEmail').value;
            let createPassword = document.getElementById('createPassword').value;
            document.getElementById('modal-close').click();
            showLoader();
            let res = await axios.post("/candidate",{name:fullName,createEmail:createEmail,createPassword:createPassword},HeaderToken())
            hideLoader();

            if(res.data['status']==="success"){
                successToast(res.data['message']);
                document.getElementById("save-form").reset();
            }
            else{
                errorToast(res.data['message'])
            }

        }catch (e) {
            unauthorized(e.response.status)
        }
    }


     async function onRegistration() {



    let postBody={
        "fullName":document.getElementById('fullName').value,
        "email":document.getElementById('email').value,
        "password":document.getElementById('password').value,
    }


        showLoader();
        let res=await axios.post("/register",postBody);
        hideLoader()
        // window.location.href="/dashboard";
        // successToast(res.data['message']);

        if(res.data['status']==="success"){
            window.location.href="/dashboard";
            successToast(res.data['message']);
        }
        else{
            errorToast(res.data['message'])
        }


  }
</script>