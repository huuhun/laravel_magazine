@include('admin.header')

@include('admin.sidebar')
<link href={{ url('summernote/summernote-lite.css') }} rel="stylesheet" />

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">

                    <div class="col-md-12">
                        <h2>{{ $page_title }} </h2>
                    </div>

                    <div class="col-md-12">
                        <form method="post" enctype="multipart/form-data">{{-- multipart/form-data to ensure to able to send file thought posting --}}

                            @foreach ($errors->all() as $error )
                                {{ $error }} <br>
                            @endforeach
                            <input type="text" class="form-control" placeholder="Title" name="title"> <br>

                            <label for="title_image">Title Image</label>
                            <input type="file" class="form-control" name="file"><br>

                            <label for="">Category</label> <br>
                            <select name="category_id" id="">
                                <option value="">--Select a Category--</option>
                            </select>

                            <br>
                            <br>

                            @csrf
                            <label for="">Content</label>
                            <textarea name="content" id="summernote"></textarea>

                            <input class="btn btn-primary" type="submit" value="Post">
                        </form>
                    </div>
            </div>


        </div>

    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>

@include('admin.footer')
<script src={{ url('summernote/summernote-lite.js') }}></script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 400
        });
    });
</script>
