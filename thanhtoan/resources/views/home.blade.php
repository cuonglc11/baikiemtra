@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <table class="table">
                        <thead>
                          <tr>
                            <th>Email</th>
                            <th>Ngày  Giao Dịch</th>
                            <th>Số tiền</th>
                             <th>Số lãi</th>
                          </tr>
                        </thead>
                       @foreach ($datas as $value)
                              <tr>
                                <td>{{$value->email}}</td>
                                <td>{{$value->time_date}}</td>
                                <td>{{$value->price}}</td>
                                 <td>{{$value->interest}}</td>
                                
                              </tr>
                              @endforeach
                        </table>
                         <a href="{{url('edit/'.Auth::user()->id)}}">thay đổi thông tin </a>
                </div>

             
       
                   
                  <!--   @can('is-admin')
                    <a href="{{route('admin')}}">Admin</a>
                     
                    @endcan
 -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
