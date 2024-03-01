
@extends('layouts.app')

@section('title')
    Silverbricksbd
@endsection


@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-10 center-screen">
            <div class="card animated fadeIn w-100 p-3">
                <div class="card-body">
                    <h4>Sign Up</h4>
                    <hr/>
                    <div class="container-fluid m-0 p-0">
                        <div class="row m-0 p-0">
                            
                            <div class="col-md-4 p-2">
                                <label>Name</label>
                                <input id="name" placeholder="Full Name" class="form-control" type="text" autocomplete="new-name"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Email Address</label>
                                <input id="email" placeholder="User Email" class="form-control" type="email" autocomplete="new-email"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Password</label>
                                <input id="password" placeholder="User Password" class="form-control" type="password" autocomplete="new-password"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Confirm Password</label>
                                <input id="password_confirmation" placeholder="Password Confirmation" class="form-control" type="password" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="row m-0 p-0">
                            <div class="col-md-4 p-2">
                                <button onclick="onRegistration()" class="btn mt-3 w-100  bg-gradient-primary">Complete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

  async function onRegistration() {



    let postBody={
        "name":document.getElementById('name').value,
        "email":document.getElementById('email').value,
        "password":document.getElementById('password').value,
        "password_confirmation":document.getElementById('password_confirmation').value,
    }

    try {

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

        }catch (e) {
            errorToast(res.data['message'])
        }

  }


</script>
