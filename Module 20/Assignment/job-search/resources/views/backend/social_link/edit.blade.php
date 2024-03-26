<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Social Link</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Twitter *</label>
                                <input type="text" class="form-control" id="twitter">
                                <input class="d-none" id="updateID">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Facebook *</label>
                                <input type="text" class="form-control" id="facebook">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Youtube *</label>
                                <input type="text" class="form-control" id="youtube">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Linkedin *</label>
                                <input type="text" class="form-control" id="linkedin">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="Update()" id="update-btn" class="btn bg-gradient-success" >Update</button>
            </div>
        </div>
    </div>
</div>


<script>


   async function FillUpUpdateForm(id){
       try {
           document.getElementById('updateID').value=id;
           showLoader();
           let res=await axios.post("/superadmin/social-link/edit",{id:id},HeaderToken())
           hideLoader();
           document.getElementById('twitter').value=res.data['rows']['twitter'];
           document.getElementById('facebook').value=res.data['rows']['facebook'];
           document.getElementById('youtube').value=res.data['rows']['youtube'];
           document.getElementById('linkedin').value=res.data['rows']['linkedin'];
       }catch (e) {
           unauthorized(e.response.status)
       }
    }




    async function Update() {

       try {

           let twitter = document.getElementById('twitter').value;
           let facebook = document.getElementById('facebook').value;
           let youtube = document.getElementById('youtube').value;
           let linkedin = document.getElementById('linkedin').value;
           let updateID = document.getElementById('updateID').value;

           document.getElementById('update-modal-close').click();
           showLoader();
           let res = await axios.post("/superadmin/social-link/update",{twitter:twitter,facebook:facebook,youtube:youtube,linkedin:linkedin,id:updateID},HeaderToken())
           hideLoader();

           if(res.data['status']==="success"){
               document.getElementById("update-form").reset();
               successToast(res.data['message'])
               await getList();
           }
           else{
               errorToast(res.data['message'])
           }

       }catch (e) {
           unauthorized(e.response.status)
       }
    }



</script>