@extends('layouts.datatable')



@section('content')

 <style>
 .p-ad-role{
   padding: 10px 27px;
   font-size: 12px;
   color: white;
   background-color:   #ff99cc;
   padding-right: 0.6em;
    padding-left: 0.6em;
    border-radius: 10rem;

 }
 </style>


    <section style="margin-top:80px; margin-bottom:20px;" >
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered" id="adtable" style="width:100%;">
                        <thead>
                            <tr>
                                <th>AD</th>
                                <th>Company Name</th>
                                <th>Primary Text</th>
                                <th>Detail Targeting</th>
                                <th>Category</th>
                                <th>Gender</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($advertisements as $ad)
                            <img src="{{$ad->image}}" alt="">
                            <tr style="background-color: black;">
                                <td> <img src="/images/{{$ad->image}}" height="100px" width="100px" alt=""> </td>
                                <td> <p style="font-weight: bold; text-align:center;"> {{$ad->companyname}}</p> </td>
                                <td> <p>{{$ad->primarytext}}</p> </td>
                             
                                <td>{{$ad->Category['categoryname']}}</td>
                                <td>
                                    @if($ad->role = 'male')
                                     <p class="badge badge-pill badge-primary" style="background-color: #007bff; padding:10px 29px; "> {{$ad->role}}</p>
                                     @elseif($ad->role = 'female')
                                    <p class="badge badge-pill badge-primary" style="background-color: pink; padding:10px 27px; "> {{$ad->role}}</p>
                                    @else 
                                    <p class="badge badge-pill badge-primary" style="background-color: black; padding:10px 27px; "> {{$ad->role}}</p>

                                    @endif
                                   
                                </td>
                            <td> <p class="badge badge-pill badge-primary" style="background-color:  #00b359; padding: 10px 46px">{{$ad->Adtype->name}} </p></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('javascripts')
<script>
  
</script>

<script>
$(document).ready(function() {
    $('#adtable').DataTable();
} );
</script>


@endsection