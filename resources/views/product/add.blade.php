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
                        <p><label for="file" style="cursor: pointer;">Upload Image</label></p>
                        <p><input type="file" class="form-control" accept="image/*" name="image" id="file"
                                  onchange="loadFile(event)" required></p>
                        <p><img id="output" width="200"/></p>
                        <p class="help-block">File Must Be In '.png' Image Format. Insert Image of 3 X 2</p>
                    </div>
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" value="{{old('name')}}" name="name" class="form-control"
                               placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="title">Price</label>
                        <input type="number" value="{{old('title')}}" name="price" class="form-control"
                               placeholder="Enter price">
                    </div>
                    <div class="form-group">
                        <label for="title">Quantity(Stock)</label>
                        <input type="number" value="{{old('title')}}" name="qty" class="form-control"
                               placeholder="Enter quantity">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" value="{{old('description')}}" class="form-control" cols="5" rows="10"></textarea>
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
