
@include('admin.header')

@include('admin.sidebar')
<link href={{ url("summernote/summernote-lite.css") }} rel="stylesheet" />

<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <form action="">
                    <div class="col-md-12">
                        <h2>{{ $page_title }} </h2>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped table-border">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Category</th>
                                    <th>Image Title</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($rows)
                                    @foreach ($rows as $row)
                                    <tr>
                                        <td>{{ $row->title }}</td>
                                        <td>{{ $row->content }}</td>
                                        <td>{{ $row->category }}</td>
                                        <td><img src="{{ url('uploads/'.$row->image) }}" style='width:150px;'></td>
                                        <td>{{ $row->created_at }}</td>
                                        <td>

                                        </td>


                                    </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>


        </div>




</div>
     <!-- /. PAGE INNER  -->
    </div>
 <!-- /. PAGE WRAPPER  -->
</div>

@include('admin.footer')
<script src={{url("summernote/summernote-lite.js")}}></script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
