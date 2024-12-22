@extends('layouts.admin')
@section('content')
                            <div class="container-fluid px-4">
                        <div class="my-3">    
                        <h1 class="mt-4 d-inline">Items</h1>
                        <a href="{{route('backend.items.create')}}" class="btn btn-primary float-end">Create Payments</a>
                        </div>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Payments</li>
                            </ol>
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Payment Lists
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Name</th>
                                                <th>Logo</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Name</th>
                                                <th>Logo</th>
                                                <th>#</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @php
                                                $i=1;
                                            @endphp
                                            @foreach($payments as $payment)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$payment->name}}</td>
                                                    <td><img src="{{$payment->logo}}" alt="" width="100"></td>
                                                    <td>
                                                        <a href="" class="btn btn-sm btn-warning">Edit</a>
                                                        <button type="button" class="btn btn-sm btn-danger delete" data-id="{{$payment->id}}">Delete</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                    {{$payments->links()}}

                                </div>
                            </div>
                        </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('tbody').on('click','.delete',function(){
                //alert('hello');
                let id = $(this).data('id');
                $('#deleteForm').attr('action',`items/${id}`);
                //console.log(id);
                $('#deleteModal').modal('show');
            })
        })
    </script>
@endsection