@extends('layouts.app')

@section('content')

 <table class="table">
    <thead>
      <tr>
        <th>Email</th>
        <th>Ngày  Giao Dịch</th>
        <th>Số tiền</th>
      </tr>
    </thead>
    <tbody>
    	@foreach ($dataUser as $value)
      <tr>
        <td>{{$value->email}}</td>
        <td>{{$value->time_date}}</td>
        <td>{{$value->price}}</td>
      </tr>
       @endforeach
       <a href="{{url('edit/'.$mkSet)}}">thay đổi thông tin </a>
     

    </tbody>
  </table>

@endsection