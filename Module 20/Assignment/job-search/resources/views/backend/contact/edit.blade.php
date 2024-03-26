<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Your Address *</label>
                                <textarea class="form-control" placeholder="Leave a message here" id="contactAddress" style="height: 60px"></textarea>
                                <input class="d-none" id="updateID">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Your Email *</label>
                                <input type="text" class="form-control" id="contactEmail">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Your Phone Number *</label>
                                <input type="text" class="form-control" id="contactPhone">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Google Map Location *</label>
                                <textarea class="form-control" placeholder="Leave a message here"  id="contactGML" style="height: 100px"></textarea>

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
           let res=await axios.post("/superadmin/contact/edit",{id:id},HeaderToken())
           hideLoader();
           document.getElementById('contactAddress').value=res.data['rows']['address'];
           document.getElementById('contactEmail').value=res.data['rows']['email'];
           document.getElementById('contactPhone').value=res.data['rows']['phone'];
           document.getElementById('contactGML').value=res.data['rows']['google_map'];
       }catch (e) {
           unauthorized(e.response.status)
       }
    }




    async function Update() {

       try {

           let contactAddress = document.getElementById('contactAddress').value;
           let contactEmail = document.getElementById('contactEmail').value;
           let contactPhone = document.getElementById('contactPhone').value;
           let contactGML = document.getElementById('contactGML').value;
           let updateID = document.getElementById('updateID').value;

           document.getElementById('update-modal-close').click();
           showLoader();
           let res = await axios.post("/superadmin/contact/update",{address:contactAddress,email:contactEmail,phone:contactPhone,google_map:contactGML,id:updateID},HeaderToken())
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