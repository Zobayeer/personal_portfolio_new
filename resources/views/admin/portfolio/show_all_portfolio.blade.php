@extends('admin.admin_master')

@section('content')
<table id="datatable" class="table table-bordered dt-responsive nowrap"
style="border-collapse: collapse; border-spacing: 0; width: 100%;">
<thead>
    <th scope="col">SL</th>
        <th scope="col">Portfolio Name</th>
        <th scope="col">Portfolio Title</th>
        <th scope="col">Portfolio Description</th>
        <th scope="col">Portfolio Image</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
            @php( $i = 1)
            @foreach($portfolio as $item)
         <tr>

        <td>{{ $i++ }}</td>
        <td>{{ $item->portfolio_name }}</td>
        <td>{{ $item->portfolio_title }}</td>
        <td>{{str_limit($item->portfolio_desc, $limit = 20, $end = '...')}}</td>
        <td><img src="{{ asset($item->portfolio_image) }}" height="100px" width="100px" alt="">
        </td>
        <td>
            <a href="" class="btn btn-primary sm" title="Edit photo"><i class="fas fa-edit"></i></a>
            <a href="" class="btn btn-danger sm" title="delete photo" id="delete"><i class="fa fa-trash"></i></a>
        </td>
      </tr>
      @endforeach


    </tbody>
  </table>
@endsection
