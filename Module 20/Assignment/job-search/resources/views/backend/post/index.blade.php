@extends('backend.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12">
			<div class="card px-5 py-5">
				<div class="row justify-content-between ">
					<div class="align-items-center col">
						<h4>Job Post</h4>
					</div>
					
				</div>
				<hr class="bg-secondary"/>
				<div class="table-responsive">
				<table class="table" id="tableData">
					<thead>
					<tr class="bg-light">
						<th>No</th>
						<th>Job Title</th>
						<th>Category</th>
						<th>Job Type</th>
						<th>Salary Range</th>
						<th>Location</th>
						<th>Created By</th>
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
       let res=await axios.get("/superadmin/list-post",HeaderToken());
       hideLoader();

       let tableList=$("#tableList");
       let tableData=$("#tableData");

       tableData.DataTable().destroy();
       tableList.empty();

       res.data['rows'].forEach(function (item,index) {
           let row=`<tr>
                    <td>${index+1}</td>
                    <td>${item['job_title']}</td>
                    <td>${item['category']['name']}</td>
                    <td>${item['job_type']}</td>
                    <td>${item['salary_range']}</td>
                    <td>${item['job_location']}</td>
                    <td>${item['profile']['name']}</td>
                 </tr>`
           tableList.append(row)
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

// include('backend.category.create')
// include('backend.category.edit')
// include('backend.category.delete')

@endsection
