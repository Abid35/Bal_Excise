@extends('layouts.dash')

@section('content')

<style>
    .table {
   display: block !important;
}

.main {
 width: 80%;
 align-content: center;
 align-items: center;
 float: right;
}
@media (max-width: 992px) {
    .main {
 width: 100%;
 
 float: none;
}
}
.strong {
    font-weight: bold;
    color: black;
}

.has-search .form-control {
    padding-left: 2.375rem;
}

.has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 1.75rem;
    padding-right: 15%;
    text-align: center;
    pointer-events: none;
    color: #aaa;
}
.headings {
    border-bottom: solid 2px black;
}
td {
    padding-left: 3rem;
}

.over {
    overflow: hidden;
}
</style>

<div class="container main over">
    
    <div class="row">
        <div class="col-md-4 ">
            <h2 class="strong"> Well Come User </h2>
        </div> 
        <div class="col-md-1">
        </div>
        <div class="col-md-1">
        </div>
        <div class="col-md-3" style="margin-top: 1%">
            <div class="form-group has-search">
                <span class="fa fa-search form-control-feedback"></span>
                <input type="text" class="form-control" placeholder="Search">
              </div>            
        </div>   
        <div class="col-md-3" style="margin-top: 1%">
            {{-- <a href="#" type="button" class="btn  btn-dark">Old record</a>         --}}
            {{-- <a href="{{url('/add_Transfer')}}" type="button" class="btn  btn-dark">Add New</a>         --}}
        </div>    
       

    </div>   
    <div class="row">
    <div class="col-sm-12" style="width: 100%; font-size:15px; margin-top:1%">  
    
    </div>
    </div>
</div>


@endsection