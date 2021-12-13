<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
     style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Add About Us Content</h4>
                <button type="button" class="close" data-bs-dismiss="modal" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                   
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" value="{{old('name')}}" name="name" class="form-control"
                               placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="title">Gender</label>
                        
                                <select class="form-control" id="gen" name="gender" type="gen" required>
                                    <option selected disabled>Select Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                    
                                </select>
                        </div>
                   
                    <div class="form-group">
                        <label for="title">Phone</label>
                        <input type="text" value="{{old('title')}}" name="phone" class="form-control"
                               placeholder="Enter phone no.">
                    </div>

                    <div class="form-group">
                        <label for="title">Email</label>
                        <input type="email" value="{{old('email')}}" name="email" class="form-control"
                               placeholder="Enter email">
                    </div>

                    

                    <div class="form-group">
                        <label for="title">Nationality</label>
                        <input type="text" value="{{old('nationality')}}" name="nationality" class="form-control"
                               placeholder="Enter nation" required>
                    </div>

                    <div class="form-group">
                        <label for="title">DOB</label>
                        <input type="date" value="{{old('nationality')}}" name="dob" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="title">Mode of contact</label>
                        
                                <select class="form-control" id="gen" name="mode" type="gen" required>
                                    <option selected disabled>Select mode</option>
                                    <option>Phone</option>
                                    <option>Email</option>
                                    <option>none</option>
                                    
                                </select>
                        </div>

                   
                    <div style="clear: both">
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
@section('footer_js')
    <script>
        var loadFile = function (event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
