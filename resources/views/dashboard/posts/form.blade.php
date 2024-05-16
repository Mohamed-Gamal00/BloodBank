@csrf
{{-- title --}}
<div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('name', $post->title) }}" id="exampleInputEmail1"
        aria-describedby="emailHelp" placeholder="Enter name">

    @error('title')
        <div>
            <p class="text-danger">
                {{ $errors->first('title') }}
            </p>
        </div>
    @enderror
</div>

{{-- category --}}
<div class="form-group">
    <label for="categories">Category</label>
    <select name="category_id" id="category" class="form-control from-select">
        <option value=""></option>

        @foreach ($categories as $category)
            {{-- <option value="{{ $category->id }}" @selected(old('parent_id',$category->parent_id)== $parent->id)>{{ $category->name }}</option> --}}
            <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id) == $category->id)>{{ $category->name }}</option>
        @endforeach
    </select>

    @error('category_id')
        <div>
            <p class="text-danger">
                {{ $errors->first('category_id') }}
            </p>
        </div>
    @enderror

</div>
{{-- image --}}
<div class="form-group">
    <label for="exampleInputEmail1">Image</label>
    <div class="custom-file">
        <input class="custom-file-input" name="image" id="customFile" type="file" onchange="previewImage(this)">
        <label class="custom-file-label" for="customFile" id="customFileLabel">Choose file</label>
    </div>
    <div class="mt-1" id="imagePreview">

        @if ($post->image)
            <img style="object-fit: cover" src="{{ asset("storage/$post->image") }}" width="60" height="60" alt="img">
        @endif
    </div>

    @error('image')
        <div>
            <p class="text-danger">
                {{ $errors->first('image') }}
            </p>
        </div>
    @enderror
</div>
<script>
    function previewImage(input) {
        var file = input.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            var imgPreview = document.getElementById('imagePreview');
            imgPreview.innerHTML = '<img src="' + e.target.result + '" width="60" height="60" alt="preview">';
        }
        reader.readAsDataURL(file);
    }
</script>


{{-- content --}}
<div class="form-group">
    <div class="form-floating">
        <label for="floatingTextarea2">content</label>
        <textarea class="form-control" name="content" placeholder="Leave a comment here" id="floatingTextarea2"
            style="height: 100px">
        {{ $post->content }}
        </textarea>
    </div>

    @error('content')
        <div>
            <p class="text-danger">
                {{ $errors->first('content') }}
            </p>
        </div>
    @enderror
</div>




<button type="submit" class="btn btn-primary">Submit</button>
