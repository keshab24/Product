
<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Personal') }}
        </h2>
        
    

    <div class="box">
       
        <div class="box-body">
            @include('layouts.alert')

           
                <div class="justify-content-end list-group list-group-horizontal ">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal" data-toggle="modal"
                            data-target="#addModal">
                           
                        Add personal info
                        
                    </button>
                    @include('personal.add')
                </div>
          
            <br>
            <div class="blank-page">
                
                <table class="table" id="datatable">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">gender</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nationality</th>
                        <th scope="col">DOB</th>

                        <th scope="col">Actions</th>
                        <th scope="col">Education</th>
                    </tr>
                    </thead>
                    <tbody>
                       
                        @foreach($about as $why)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                           
                            <td>
                                {{$why['name']}}
                            </td>
                            <td>{{$why['gender']}}</td>
                            <td>{{$why['phone']}}</td>
                            <td>{{$why['email']}}</td>
                            
                            
                            <td>{{$why['nationality']}}</td>
                            <td>{{$why['dob']}}</td>

                              <td>  <form
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
                            
                            @foreach($edu->where('info_id',$why['id']) as $ed)
                            <ul>
                                <li>
                            {{$ed['educational_inst']}} Level:{{$ed['level']}} {{$ed['percentage']}}%
                                </li>
                            </ul>
                                 @endforeach

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#feedModal" data-toggle="modal"
                                        data-target="#feedModal">
                                      
                                    Add Education
                                    
                                </button>
                                @include('product.feedback')
                            
                               
                        </td>
        
                        </tr>
                    @endforeach

                 

            
                </table>
            </div>

        </div>
        <!-- /.box-body -->
    </div>
</x-slot>

</x-app-layout>
