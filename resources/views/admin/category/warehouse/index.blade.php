@extends('layouts.admin')
@section('admin.content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Warehouse</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">+Add New</button>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

           <!-- Main content -->
    <section class="content">
        <div class="containe-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Warehouse list</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table class="table table-bordered table-striped table-sm ytable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Warehouse Name</th>
                                    <th>Warehouse Address</th>
                                    <th>Warehouse Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                </div>
            </div>
        </div><!--/. container-fluid -->
    </section>
</div>

{{-- warehouse insert modal --}}

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Warehouse</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('warehouse.store') }}" method="Post" id="add-form">
            @csrf
            <div class="modal-body">

                <div class="form-group">
                    <label for="category_name">Warehouse Name</label>
                    <input type="text" class="form-control" name="warehouse_name" required>
                </div>   
                <div class="form-group">
                    <label for="category_name">Warehouse Address</label>
                    <input type="text" class="form-control"  name="warehouse_address" required>
                </div> 
                <div class="form-group">
                    <label for="category_name">Warehouse Phone</label>
                    <input type="text" class="form-control"  name="warehouse_phone" required>
                </div>   

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="Submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
      </div>
    </div>
  </div>

{{-- edit insert modal --}}

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Warehouse</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div id="modal_body">

            </div>
      </div>
    </div>
  </div>


<!-- ajax -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


  <script>
      //ajax req
      $(function childcategory(){
        let table = $('.ytable').DataTable({

            processing:true,
            serverSide:true,
            ajax:"{{ route('warehouse.index') }}",
            columns:[

                {data:'DT_RowIndex', name:'DT_RowIndex'},
                {data:'warehouse_name', name:'warehouse_name'},
                {data:'warehouse_address', name:'warehouse_address'},
                {data:'warehouse_phone', name:'warehouse_phone'},
                {data:'action', name:'action' , orderable:true, searchable:true},
            ]

        });
      });

      //Edit Script

      $('body').on('click','.edit',function(){

        let id = $(this).data('id');

        $.get('/warehouse/edit/'+id,function(data){

          $('#modal_body').html(data);

        });

      })

  </script>

@endsection  
    
     
