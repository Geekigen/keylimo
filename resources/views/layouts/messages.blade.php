@extends('layouts.app')
@section('content')
<div class="row ">
<div class="container  col-lg-6 col-md-6">
    @foreach ($messages as $message )
    <table  class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:80%">Message</th>
                <th style="width:20%"></th>
            </tr>
        </thead>
        <tbody>
    <tr>
       
        
        <td>  <h4 class="nomargin">{{ $message->message}}</h4></td>
       
        <td>
    
         <a href="/message/{{$message->id}}">View Message</a>
          </td>
    </tr>
    </tbody>
    </table>
    
    @endforeach
</div>
<div class="container col-lg-6 col-md-6">
    <h4 style="color:rgb(10, 6, 235)">Sent messages</h4>
    @foreach ($sentmessages as $message )
<table  class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">{{__('Message')}}</th>
            <th style="width:10%">{{__('Edit message')}}</th>
            <th style="width:8%">{{__('Delete')}}</th>
            <th style="width:22%" class="text-center">{{__('View')}} {{__('Message')}}</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
<tr>
   
    
    <td>  <h4 class="nomargin">{{ $message->message}}</h4></td>
    <td><a href="message/{{ $message->id }}/edit">{{__('Edit')}}</a></td>
    <td>

        <form action ="/message/{{ $message->id }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger" value="Delete"><i class="fas fa-trash-alt"></i></button>
               </form>
      </td>
    <td>

     <a href="/message/{{$message->id}}">{{__('View')}} {{__('Message')}}</a>
      </td>
</tr>
</tbody>
</table>

@endforeach
</div>
</div>
    

@endsection