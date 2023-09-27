@include('admin.head')


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Blog Section</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Blog</a></li>
          <li class="breadcrumb-item active">Pages</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    
<div class="card">
    <h5 class="card-header">Edit Post</h5>
    <div class="card-body">
      <form method="post" action="{{route('post.update',$post->id)}}" enctype="multipart/form-data" >
        @csrf 
        @method('PATCH')
        <div class="mb-3">
          <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{$post->title}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="mb-3 d-none">
          <label for="quote" class="col-form-label">Quote</label>
          <textarea class="form-control" id="quote" name="quote">{{$post->quote}}</textarea>
          @error('quote')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="mb-3">
          <label for="summary" class="col-form-label">Summary <span class="text-danger">*</span></label>
          <textarea class="form-control" id="summary" name="summary">{{$post->summary}}</textarea>
          @error('summary')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="mb-3 d-none">
          <label for="description" class="col-form-label">Description</label>
          <textarea class="form-control" id="description" name="description">{{$post->description}}</textarea>
          @error('description')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="mb-3">
          <label for="post_cat_id">Blog Category <span class="text-danger">*</span></label>
          <select name="post_cat_id" class="form-control">
              <option value="">--Select any category--</option>
              @foreach($categories as $key=>$data)
                  <option value='{{$data->id}}' {{(($data->id==$post->post_cat_id)? 'selected' : '')}}>{{$data->title}}</option>
              @endforeach
          </select>
        </div>
       
        <div class="mb-3">
          <label for="added_by">Author</label>
          <select name="added_by" class="form-control">
              <option value="">--Select any one--</option>
              @foreach($users as $key=>$data)
                <option value='{{$data->id}}' {{(($post->added_by==$data->id)? 'selected' : '')}}>{{$data->name}}</option>
              @endforeach
          </select>
        </div>
      
         <div class="mb-3">
          <label for="formFileMultiple" class="form-label">Photo</label>
          <input class="form-control" type="file" name="photo" id="formFileMultiple" value="{{$post->photo}}" multiple="">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>

          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
          
          
          <div class="mb-3">
          <label for="slug" class="col-form-label">slug <span class="text-danger">*</span></label>
          <input id="slug" type="text" name="slug" placeholder="Enter Slug"  value="{{$post->slug}}" class="form-control">
          @error('slug')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
          <div class="row mb-3">
           <label for="inputEmail3" class="col-form-label">Meta keywords</label>
                                        <div >
                                          <input type="text" name="meta_keywords" class="form-control" value="{{$post->meta_keywords}}" id="inputText">
                                        </div>
                                  </div>
                                   <div class="row mb-3">
                                    <label for="inputEmail3" class="col-form-label">Meta description</label>
                                        
                                        <div >
                                          <input type="text" name="meta_description" class="form-control" value="{{$post->meta_description}}" id="inputText">
                                        </div>
                                  </div>
    
        
        <div class="mb-3">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="active" {{(($post->status=='active')? 'selected' : '')}}>Active</option>
            <option value="inactive" {{(($post->status=='inactive')? 'selected' : '')}}>Inactive</option>
        </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="mb-3 mb-3">
           <button class="btn btn-success" type="submit">Update</button>
        </div>
      </form>
    </div>
</div>

@include('admin.footer')



<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>

    $(document).ready(function() {
    $('#summary').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });

    $(document).ready(function() {
      $('#quote').summernote({
        placeholder: "Write short Quote.....",
          tabsize: 2,
          height: 100
      });
    });
    $(document).ready(function() {
      $('#description').summernote({
        placeholder: "Write detail description.....",
          tabsize: 2,
          height: 150
      });
    });
</script>
