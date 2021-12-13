<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Product') }}
        </h2>
        
   

    <!-- iCheck -->
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Edit Product</h3>
        </div>
        <div class="box-body">
           

            <form action="{{route('product.update',$pro->id)}}" method="post">
                {!! csrf_field() !!}

                <div class="form-group">
                    <p class="card-inside-title">Product Name:</p>
                    <div class="form-line">
                        <input class="form-control form-control-inline input-medium" name="name" size="16"
                               type="text"
                               value="{{$pro['name']}}"/>
                    </div>
                </div>

                <div class="form-group">
                    <p class="card-inside-title">Code:</p>
                    <div class="form-line">
                        <input class="form-control form-control-inline input-medium" name="qty" size="16" type="text"
                               placeholder="Product Name" value="{{$pro['qty']}}"/>
                    </div>
                </div>

                <div class="form-group">
                    <p class="card-inside-title">desc:</p>
                    <div class="form-line">
                        <input class="form-control form-control-inline input-medium" name="desc" size="16" type="text"
                               placeholder="Product Name" value="{{$pro['desc']}}"/>
                    </div>
                </div>

                <div class="form-group">
                    <p class="card-inside-title">Minimum Sum:</p>
                    <div class="form-line">
                        <input
                            class="form-control form-control-inline input-medium"
                            name="price"
                            type="number"
                            placeholder="Minimum Sum" value="{{$pro['price']}}"
                        />
                    </div>
                </div>             

            </div>
                <div class="box-footer">

                    <button type="submit" class="btn btn-info waves-effect">
          <span>Submit
            <i class="fa fa-check"></i>
          </span>
                    </button>
                </div>

        </div>
    
    <!-- #END# Basic Table -->
    </form>


    <!-- /.row -->
</x-slot>
</x-app-layout>
