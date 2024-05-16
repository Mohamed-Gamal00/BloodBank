@csrf
<div class="form-group">
    <label for="exampleInputEmail1">City Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $city->name) }}" id="exampleInputEmail1"
        aria-describedby="emailHelp" placeholder="Enter name">

    @error('name')
        <div>
            <p class="text-danger">
                {{ $errors->first('name') }}
            </p>
        </div>
    @enderror
</div>

<div class="form-group">
    <label for="governorate">Governorate</label>
    <select name="governorate_id" id="governorate" class="form-control from-select">
        <option value=""></option>

        @foreach ($governorates as $governorate)
            {{-- <option value="{{ $governorate->id }}" @selected(old('parent_id',$category->parent_id)== $parent->id)>{{ $governorate->name }}</option> --}}
            <option value="{{ $governorate->id }}" @selected(old('governorate_id',$city->governorate_id) == $governorate->id )>{{ $governorate->name }}</option>
        @endforeach
    </select>

    @error('governorate_id')
        <div>
            <p class="text-danger">
                {{ $errors->first('governorate_id') }}
            </p>
        </div>
    @enderror

</div>
<button type="submit" class="btn btn-primary">Submit</button>
