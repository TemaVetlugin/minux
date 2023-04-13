@extends('admin.layouts.body')

@section('content')
    <div class="main p-3 rounded-1 text-bg-light col-8 d-flex flex-column flex-shrink-0" style="">
        <h2 class="m-3">{{ $device->title }} <a href="{{ route('admin.device.edit', $device->id) }}" class="mx-3"><i class="fa-solid fa-pen"></i></a></h2>
        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">ID</th>
                    <td>{{ $device['id'] }}</td>    
                </tr>
                <tr>
                    <th scope="row">title</th>
                    <td>{{ $device['title'] }}</td>    
                </tr>
            </tbody>
          </table>
          
    </div>
@endsection
