@extends('backend.templates.gird')
@section('tables')
<table id="simple-table" class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th class="center">
        <label class="pos-rel">
          <input type="checkbox" class="ace" />
          <span class="lbl"></span>
        </label>
      </th>

      <th>ID</th>
      <th>Tên người dùng</th>
      <th>Email</th>
      <th>Ngày sinh</th>
      <th>Địa chỉ</th>

      <th>Hình ảnh</th>
      <th>
        <i class="ace-icon fa fa-clock-o bigger-110"></i>
        Ngày tạo
      </th>
      <th>Trạng thái</th>
      <th>Thao tác</th>
      
    </tr>
  </thead>

  <tbody>
    @if($data['list'])
      @foreach($data['list'] as $record)
        <tr>
        <td class="center">
          <label class="pos-rel">
            <input type="checkbox" value="{{$record->id}}" class="ace" />
            <span class="lbl"></span>
          </label>
        </td>
        <td>
          {{$record->id}}
        </td>
        <td>
          {{$record->name}}
        </td>
        <td>{{$record->email}}</td>
        <td>{{$record->birth_day}}</td>
          <td>{{$record->address}}</td>
        <td class="hidden-480">
          <span style="display:block;width:40px;height:20px;background:#fff;border:solid 1px #ccc"></span>
        </td>
        <td>{{$record->created_at}}</td>

        <td class="hidden-480">
          @if($record->status)
          <span class="label label-sm label-success">Hoạt động</span>
          @else
          <span class="label label-sm label-warning">Không hoạt động</span>
          @endif
        </td>

        <td>
          <div class="hidden-sm hidden-xs btn-group">
            <a href="/backend/customers/edit/{{$record->id}}">
              <button class="btn btn-xs btn-info">
                <i class="ace-icon fa fa-pencil bigger-120"></i>
              </button>
            </a>
            <a href="javascript:void(0)" onclick="deleteRecord({{$record->id}},'customers')" >
            <button class="btn btn-xs btn-danger">
              <i class="ace-icon fa fa-trash-o bigger-120"></i>
            </button>
            </a>
          </div>
        </td>
      </tr>
      @endforeach
    @endif
    
  </tbody>
</table>									
@stop