@extends('Backend.layouts.app')

@section('content')
	<table class="table">
		<thead>
			<tr>
				<th>Username</th>
			</tr>
		</thead>
		<tbody>
			@foreach($employees as $employee )
		</tbody>
	</table>
@endsection