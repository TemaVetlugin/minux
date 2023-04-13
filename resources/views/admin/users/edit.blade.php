@extends('admin.layouts.body')

@section('content')
    <div class="main rounded-1 text-bg-light col-8 d-flex flex-column flex-shrink-0" style="">
        <form class="p-5" action="{{ route('admin.user.update', $user->id) }}" method="POST">
          @csrf
          @method('PATCH')
            <h3 class="mb-3">Редактирование пользователя</h3>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email пользователя</label>
              <input type="email" value="{{ $user['email'] }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            
            </div>
            @error('password')
            <div class="text-danger">Это поле заполнено неверно</div>
          @enderror
          <div class="form-group mb-3">
            <select class="select2-multiple form-control" name="device_ids[]" multiple="multiple"
              id="select2Multiple">
              @foreach ($devices as $device)
              <option value="{{ $device->id }}" {{ is_array($user->devices->pluck('id')->toArray())&&in_array($device->id, $user->devices->pluck('id')->toArray())?'selected':'' }} >{{ $device->id.' - '.$device->title }}</option>
              @endforeach              
            </select>
          </div>
        @error('devices_id')
            <div class="text-danger">Это поле заполнено неверно</div>
          @enderror
            <input type="submit" class="btn btn-dark" value="Отправить">
          </form>
    </div>
@endsection
