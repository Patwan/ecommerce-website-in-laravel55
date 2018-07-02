@extends('admin.master')
@section('title', 'Users')

@section('content')
<script>
$(document).ready(function(){
    @foreach($data as $user)
    $("#selectDiv{{$user->id}}").hide();
    $("#showSelectDiv{{$user->id}}").click(function(){
      $("#selectDiv{{$user->id}}").show();
    });
    $("#loginStatus{{ $user->id}}").change(function(){
        var status = $('#loginStatus{{ $user->id }}').val();
        var userId = $('#userId{{ $user->id }}').val();

        //alert(userId);
        //alert(status);

        if (status == ""){
            alert('Please select an option');
        }
        else{
            $.ajax({
                url: '{{ url("/admin/banUser") }}',
                data: 'status=' + status + '&userId=' + userId,
                type: 'get',
                success: function(response){
                    console.log(response);
                }
            });
        }
    })
    @endforeach
});  
</script>

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                         
                            <div class="content">
                            <h2>Users</h2>
                            <p>Etiam et tellus sem. Etiam blandit sollicitudin lectus vitae faucibus. Donec et massa fringilla.</p>
                                <div class="footer">
                                <p>hasellus non imperdiet sem, vel posuere tellus</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            
                            <div class="content">
                                <table style="width: 100%" class="table table-hover table-striped">
                                    <tr>
                                        <th> Name </th>
                                        <th> Email </th>
                                        <th> Status</th>
                                        <th> Role </th>
                                        <th> Login </th>
                                    </tr>
                                    @foreach($data as $user)
                                        <tr>
                                            <td> {{ $user->name }} </td> 
                                            <td> {{ $user->email }} </td> 
                                            <td>
                                                @if($user->status == 0)
                                                    <b style="color: green"> Enabled </b>
                                                @else
                                                    <b style="color: red"> Banned </b>
                                                @endif
                                                <br>
                                                <button id="showSelectDiv{{ $user->id}}" class="btn btn-primary btn-fill"> Change Status </button>
                                                <div id="selectDiv{{ $user->id }}">
                                                    <input type="hidden" id="userId{{ $user->id }}" value="{{ $user->id }}">
                                                    <select id="loginStatus{{ $user->id }}">
                                                        <option value=""> Select an option </option>
                                                        <option value="0"> enable </option>
                                                        <option value="1"> ban </option>
                                                    </select>
                                                </div>
                                            </td> 
                                            <td> {{ $user->role }} </td> 
                                            <td> <a href="" class="btn btn-success btn-fill"> Action </a></td>
                                        </tr> 
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>


@endsection