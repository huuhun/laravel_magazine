
@include('admin.header')
<link href={{ url("assets/summernote/summernote-lite.min.css") }} rel="stylesheet" />


@include('admin.sidebar')

<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
             <h2>{{ $page_title }} </h2>
            </div>
        </div>
         <!-- /. ROW  -->
          <hr />

         <!-- /. ROW  -->
</div>
     <!-- /. PAGE INNER  -->
    </div>
 <!-- /. PAGE WRAPPER  -->
</div>

@include('admin.footer')
