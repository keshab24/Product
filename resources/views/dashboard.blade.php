<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Product') }}
        </h2>
        
    </x-slot>

    <div class="box">
       
        <div class="box-body">
            @include('layouts.alert')

            @if(Auth::user()->role_id ==2)
                <div class="justify-content-end list-group list-group-horizontal ">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal" data-toggle="modal"
                            data-target="#addModal">
                           
                        Add Product
                        
                    </button>
                    @include('product.add')
                </div>
           @endif
            <br>
            <div class="blank-page">
                <table class="table" id="datatable">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                  
                </table>
            </div>

        </div>
        <!-- /.box-body -->
    </div>

</x-app-layout>