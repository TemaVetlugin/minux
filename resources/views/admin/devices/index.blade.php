@extends('admin.layouts.body')

@section('content')
    <div class="main p-3 rounded-1 text-bg-light col-8 d-flex flex-column flex-shrink-0" style="">
        <a href="{{ route('admin.device.create') }}" class="btn btn-dark col-md-3 col-sm-4 mx-3">Добавить</a>
        <h2 class="m-3">Устройства</h2>
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Название</th>
                <th scope="col">Действия</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($devices as $device)
                <tr>
                    <th scope="row">{{ $device['id'] }}</th>
                    <td>{{ $device['title'] }}</td>
                    <td>
                        <a href="{{ route('admin.device.show', $device->id) }}" class="me-3 text-success"><i class="fa-solid fa-eye"></i></a>
                      </td>
                      <td>
                        <a href="{{ route('admin.device.edit', $device->id) }}" class="mx-3"><i class="fa-solid fa-pen"></i></a>
                      </td>
                      <td>
                         <form action="{{ route('admin.device.delete', $device->id) }}" class="mx-3 text-danger" method="post">
                          @csrf
                          @method('delete')
                          <button type="submit" class="border-0 bg-light">
                            <i class="fa-solid fa-xmark  text-danger"></i>
                            
                          </button>
                        </form>
                      </td>
                </tr>
                @endforeach
            </tbody>
          </table>
          
    </div>
@endsection
