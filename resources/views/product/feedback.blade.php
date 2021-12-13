<div class="modal fade" id="feedModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
     style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Add Educational Detail</h4>
                <button type="button" class="close" data-bs-dismiss="modal" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('product.feedback',$why['id'])}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                   
                    @method('PATCH')
                  
                    <div class="form-group">
                        <label for="description">Institute</label>
                        <input type="text" value="{{old('name')}}" name="educational_inst" class="form-control"
                        placeholder="Enter institute">
                    </div>

                    <div class="form-group">
                       
                        <label for="title">Level</label>
                        
                                <select class="form-control" id="gen" name="level" type="gen" required>
                                    <option selected disabled>Select Level</option>
                                    <option>SLC/SEE</option>
                                    <option>+2</option>
                                    <option>Bachelor</option>
                                    <option>Master</option>
                                    
                                </select>
                    </div>

                    <div class="form-group">
                        <label for="description">Percentage/GPA</label>
                        <input type="text" value="{{old('per')}}" name="percentage" class="form-control"
                        placeholder="Enter institute">
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
