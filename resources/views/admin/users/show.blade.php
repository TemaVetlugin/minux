@extends('admin.layouts.body')

@section('content')
    <div class="main p-3 rounded-1 text-bg-light col-8 d-flex flex-column flex-shrink-0" style="">
        <h2 class="m-3">{{ $user->email }} <a href="{{ route('admin.user.edit', $user->id) }}" class="mx-3"><i class="fa-solid fa-pen"></i></a></h2>
        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">ID</th>
                    <td>{{ $user['id'] }}</td>    
                </tr>
                <tr>
                    <th scope="row">email</th>
                    <td>{{ $user['email'] }}</td>    
                </tr>
            </tbody>
          </table>
          
    </div>
@endsection
