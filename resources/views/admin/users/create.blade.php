@extends('admin.layouts.body')

@section('content')
    <div class="main rounded-1 text-bg-light col-8 d-flex flex-column flex-shrink-0" style="">
        <form class="p-5" action="{{ route('admin.user.store') }}" method="POST">
          @csrf
            <h3 class="mb-3">Добавление пользователя</h3>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email пользователя</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{ old('email') }}">
              @error('email')
                <div class="text-danger">Это поле заполнено неверно</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Пароль</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="password">
              @error('password')
                <div class="text-danger">Это поле заполнено неверно</div>
              @enderror
            </div>
            <div>
              <label for="exampleInputPassword1" class="form-label">Устройства, доступные пользователю</label>
              
              <div class="form-group mb-3">
                <select class="select2-multiple form-control" name="device_ids[]" multiple="multiple"
                  id="select2Multiple">
                  @foreach ($devices as $device)
                  <option value="{{ $device->id }}" {{ is_array(old('device_ids'))&&in_array($device->id, old('device_ids'))?'selected':'' }} >{{ $device->id.' - '.$device->title }}</option>
                  @endforeach              
                </select>
              </div>
            @error('devices_id')
                <div class="text-danger">Это поле заполнено неверно</div>
              @enderror
          </div>
            <input type="submit" class="btn btn-dark" value="Отправить">
          </form>
    </div>
@endsection
