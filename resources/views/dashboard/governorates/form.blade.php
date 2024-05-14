@csrf
<div class="form-group">
    <label for="exampleInputEmail1">Governorate Name</label>
    <input type="text" name="name" class="form-control" value="{{$governorate->name}}" id="exampleInputEmail1" aria-describedby="emailHelp"
        placeholder="Enter name">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
