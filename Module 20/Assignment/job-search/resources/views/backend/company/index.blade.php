@extends('backend.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12">
			<div class="card px-5 py-5">
				<div class="row justify-content-between ">
					<div class="align-items-center col">
						<h4>Company</h4>
					</div>
					<div class="align-items-center col">
						<button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0 bg-gradient-primary">Create</button>
					</div>
				</div>
				<hr class="bg-secondary"/>
				<div class="table-responsive">
				<table class="table" id="tableData">
					<thead>
					<tr class="bg-light">
						<th>No</th>
						<th>Company Name</th>
						<th>Company Email</th>
						<th>license_no</th>
						<th>year_of_establishment</th>
						<th>address</th>
						<th>company_size</th>
						<th>company_type</th>
						<th>number</th>
						<!-- <th>Action</th> -->
					</tr>
					</thead>
					<tbody id="tableList">

					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>

<script>

getList();

async function getList() {

   try {
       showLoader();
       let res=await axios.get("/list-company",HeaderToken());
       hideLoader();

       let tableList=$("#tableList");
       let tableData=$("#tableData");

       tableData.DataTable().destroy();
       tableList.empty();

       res.data['rows'].forEach(function (item,index) {
           let row=`<tr>
                    <td>${index+1}</td>
                    <td>${item['name']}</td>
                    <td>${item['email']}</td>
                    <td>${item['license_no']}</td>
                    <td>${item['year_of_establishment']}</td>
                    <td>${item['address']}</td>
                    <td>${item['company_size']}</td>
                    <td>${item['company_type']}</td>
                    <td>${item['number']}</td>
                    
                 </tr>`
           tableList.append(row)
       })

       $('.editBtn').on('click', async function () {
           let id= $(this).data('id');
           await FillUpUpdateForm(id)
           $("#update-modal").modal('show');
       })

       $('.deleteBtn').on('click',function () {
           let id= $(this).data('id');
           $("#delete-modal").modal('show');
           $("#deleteID").val(id);
       })

       new DataTable('#tableData',{
           order:[[0,'desc']],
           lengthMenu:[5,10,15,20,30]
       });

   }catch (e) {
       unauthorized(e.response.status)
   }

}


</script>

@include('backend.category.create')
@include('backend.category.edit')
@include('backend.category.delete')

@endsection
