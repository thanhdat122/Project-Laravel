@extends('backend.master.master')

@section('title', 'Danh mục')

@section('content')

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li  class="active">Import and Export data to Excel</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">TEST</h1>
			</div>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-md-12">
				
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<input  type="file" name="file" class="form-control">
					{!! showErrors($errors,'file') !!}
                    <br>
                    <button class="btn btn-success" >Import Data</button>
					<a class="btn btn-warning" href="{{ route('export') }}">Export Data</a>
					<a href="{{route('test.create')}}" class="btn btn-primary">Add Data</a>
					<a onclick="return confirm('Bạn có chắc chắn muốn xóa tat ca du lieu?');" href="{{route('deleteAll')}}" class="btn btn-danger">Delete All</a>
				</form>
				
				<table class="table table-bordered" style="margin-top:20px;">

					<thead>
						<tr class="bg-primary">
							<th>ID</th>
							<th>Nam</th>
							<th>Email</th>
							<th width='18%'>Tùy chọn</th>
						</tr>
					</thead>
					<tbody>
						@foreach($tests as $key => $test)
							<tr>
								<td>{{ $tests->firstItem() + $key }}</td>
								<td>{{$test->name}}</td>
								<td>{{$test->email}}</td>
								<td>

									<a onclick="return confirm('Bạn có chắc chắn muốn xóa dong này?');" href="{{route('test.delete', ['id' => $test->id])}}"  class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
								</td>
							</tr>
						@endforeach

					</tbody>
				</table>
			</div>
			<!--/.col-->


		</div>
		<!--/.row-->
	</div>
	<!--/.main-->
@endsection

