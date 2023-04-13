@extends('admin.layouts.body')

@section('content')
    <div class="main rounded-1 text-bg-light col-8 d-flex flex-column flex-shrink-0" style="">
        <form class="p-5" action="{{ route('admin.device.update', $device->id) }}" method="POST">
          @csrf
          @method('PATCH')
            <h3 class="mb-3">Редактирование устройства</h3>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Название устройства</label>
              <input type="text" value="{{ $device['title'] }}" class="form-control" id="exampleInputTitle1" aria-describedby="emailHelp" name="title">
            </div>
            <input type="submit" class="btn btn-dark" value="Отправить">
          </form>
    </div>
@endsection
