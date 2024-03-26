<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create Category</h6>
                </div>
                <div class="modal-body">
                    <form id="save-form" > 
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Title *</label>
                                <input type="text" class="form-control" id="title">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Short Description *</label>
                                <textarea class="form-control" placeholder="Leave a message here"  id="short_description" style="height: 60px"></textarea>
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Image *</label>
                                <input type="file" class="form-control" id="image" accept="image/*" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" >
                                <img src="" id="blah"  style="width:60px;height:60px; border: 1px solid black" />
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Save()" id="save-btn" class="btn bg-gradient-success" >Save</button>
                </div>
            </div>
    </div>
</div>

<script>
    const config = {
    headers: {
        'Content-Type': 'multipart/form-data'
    }
}
</script>

<script>
    async function Save() {
        try {
            let title = document.getElementById('title').value;
            let short_description = document.getElementById('short_description').value;
            let image = document.getElementById('image').files[0]; //?? null; //['name'];
            //console.log(imagefile);
             let data = new FormData();

             image !== null ? data.append('image', image) : null
             data.append('title', title)
             data.append('short_description', short_description)
             document.getElementById('modal-close').click();
             showLoader();
              //console.log(data);
              const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
              }
              showLoader();
            let res = await axios.post("{{url('/superadmin/banner')}}", data, config)
           

            //let res = await axios.post("/banner",{title:title, short_description:short_description, image:image},HeaderToken())
            hideLoader();
//console.log(res);
            if(res.data['status']==="success"){
                successToast(res.data['message']);
                document.getElementById("save-form").reset();
                await getList();
            }
            else{
                errorToast(res.data['message'])
            }

        }catch (e) {
            hideLoader();
            unauthorized(e.response.status)
        }
    }
</script>
