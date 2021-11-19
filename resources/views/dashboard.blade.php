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
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>

                        <th scope="col">Actions</th>
                        <th scope="col">Feedbacks</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(Auth::user()->role_id ==3)
                        @foreach($about->where('ready',1) as $why)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>
                                <div class="col-md">
                                    <div class="gallery-img">
                                        <a target="_blank" href="{{$why['image']}}"
                                           class="swipebox" title="Image Title">
                                            <img class="img-responsive"
                                                 src="{{asset('product/').'/'.$why['image']}}" width="70px" height="auto" alt="">
                                            <span class="zoom-icon"> </span> </a>
        
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{$why['name']}}
                            </td>
                            <td>{{$why['desc']}}</td>
                            <td>{{$why['price']}}</td>
                            <td>{{$why['qty']}}</td>
                            <td>
                                <form
                                                action="{{ route('product.status') }}"
                                                method="POST"
                                            >
                                                @csrf
                                                @method('PATCH')
        
                                                <input type="hidden" name="id" value="{{ $why['id'] }}">
        
                                                <div class="custom-control custom-switch">
                                                    <input
                                                        type="checkbox"
                                                        class="custom-control-input"
                                                        id="activeInactive{{$why['id']}}"
                                                        @if($why['publish'] == 1) checked @endif
                                                        onchange="this.form.submit()"
                                                    >
                                                    <label
                                                        class="custom-control-label"
                                                        for="activeInactive{{$why['id']}}">
                                                        {{ $why['publish'] == 1 ? 'Published' : 'publish' }}
                                                    </label>
                                                </div>
                                            </form>
                            </td>
                            <div class="modal fade" id="editModal{{$why['id']}}" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel"
                                 aria-hidden="true" style="display: none;">
                                
                            </div>
                        </td>
                        <td>
                            
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal" data-toggle="modal"
                                        data-target="#addModal">
                                       
                                    Add feedback
                                    
                                </button>
                                @include('product.feedback')
                            
                        </td>
        
                        </tr>
                    @endforeach

                        @else
                        @foreach($about as $why)

                            <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>
                        <div class="col-md">
                            <div class="gallery-img">
                                <a target="_blank" href="{{$why['image']}}"
                                   class="swipebox" title="Image Title">
                                    <img class="img-responsive"
                                         src="{{asset('product/').'/'.$why['image']}}" width="70px" height="auto" alt="">
                                    <span class="zoom-icon"> </span> </a>

                            </div>
                        </div>
                    </td>
                    <td>
                        {{$why['name']}}
                    </td>
                    <td>{{$why['desc']}}</td>
                    <td>{{$why['price']}}</td>
                    <td>{{$why['qty']}}</td>
                    <td>
                        <form
                                        action="{{ route('product.status') }}"
                                        method="POST"
                                    >
                                        @csrf
                                        @method('PATCH')

                                        <input type="hidden" name="id" value="{{ $why['id'] }}">

                                        <div class="custom-control custom-switch">
                                            <input
                                                type="checkbox"
                                                class="custom-control-input"
                                                id="activeInactive{{$why['id']}}"
                                                @if($why['ready'] == 1) checked @endif
                                                onchange="this.form.submit()"
                                            >
                                            <label
                                                class="custom-control-label"
                                                for="activeInactive{{$why['id']}}">
                                                {{ $why['ready'] == 1 ? 'Sent To SEO' : 'Send' }}
                                            </label>
                                        </div>
                                    </form>
                    </td>
                   
                    <td>{{$why['feedback']}}</td>
                   

                </tr>
            @endforeach
@endif
                 

            
                </table>
            </div>

        </div>
        <!-- /.box-body -->
    </div>

</x-app-layout>