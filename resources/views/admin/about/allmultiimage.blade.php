@extends('admin.admin_master')

@section('content')
<table id="datatable" class="table table-bordered dt-responsive nowrap"
style="border-collapse: collapse; border-spacing: 0; width: 100%;">
<thead>
    <th scope="col">SL</th>
        <th scope="col">image</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
         @php($i = 1)
         @foreach ($allimage as $item)

         <tr>

        <td>{{ $i++ }}</td>
        <td><img src="{{ asset($item->multi_img) }}" height="100px" width="100px" alt="">
        </td>
        <td>
            <a href="{{ route('edit_multiimage',$item->id) }}" class="btn btn-primary sm" title="Edit photo"><i class="fas fa-edit"></i></a>
            <a href="{{ route('delete_multiimage',$item->id) }}" class="btn btn-danger sm" title="delete photo" id="delete"><i class="fa fa-trash"></i></a>
        </td>
      </tr>

      @endforeach

    </tbody>
  </table>
@endsection

