@extends('admin.layouts.body')

@section('content')
    <div class="main p-3 rounded-1 text-bg-light col-8 d-flex flex-column flex-shrink-0" style="">
        <a href="{{ route('admin.user.create') }}" class="btn btn-dark col-md-3 col-sm-4 mx-3">Добавить</a>
        <h2 class="m-3">Пользователи</h2>
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">email</th>
                <th scope="col">Действия</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user['id'] }}</th>
                    <td>{{ $user['email'] }}</td>
                    <td>
                        <a href="{{ route('admin.user.show', $user->id) }}" class="me-3 text-success"><i class="fa-solid fa-eye"></i></a>
                      </td>
                      <td>
                        <a href="{{ route('admin.user.edit', $user->id) }}" class="mx-3"><i class="fa-solid fa-pen"></i></a>
                      </td>
                      <td>
                         <form action="{{ route('admin.user.delete', $user->id) }}" class="mx-3 text-danger" method="post">
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
