<div>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif
    <form class="row g-3">
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Name</label>
            <input wire:model='name' type="text" class="form-control" id="inputEmail41111" placeholder="Enter Title" >
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Email</label>
          <input  wire:model="email"type="email" class="form-control" id="inputEmail4">
          @error('email')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
      
        <div class="col-12">
          <label for="inputAddress" class="form-label">Address</label>
          <input wire:model="address" type="text" class="form-control" id="inputAddress" placeholder="">
          @error('address')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
      
        <div class="col-md-6">
          <label for="inputCity" class="form-label">City</label>
          <input wire:model="city" type="text" class="form-control" id="inputCity">
          @error('city')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="col-md-4">
          <label for="inputState" class="form-label">State</label>
          <select  wire:model="state" id="inputState" class="form-select">
            <option selected>Choose...</option>
            <option value="pondy">Pondy</option>
          </select>
          @error('state')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="col-md-2">
          <label for="inputZip" class="form-label">Zip</label>
          <input wire:model='zip' type="text" class="form-control" id="inputZip">
          @error('zip')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Photo upload</label>
            <input type="file" class="form-control" wire:model="image">

            @error('image')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
       
        <div class="col-12">
            <button wire:click.prevent="store()" class="btn btn-success mt-3">Save</button>
        </div>
      </form>


  <table class="table">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Photo</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Address</th>
              <th scope="col">City</th>
              <th scope="col">State</th>
              <th scope="col">Zip</th>
              <th scope="col">Settings</th>



          </tr>
      </thead>
      <tbody>
          @foreach ($posts as $key=>$post)

          <tr>
            <th scope="row">{{$key+1}}</th>
           
            <td> <img src="{{ asset('storage/'.$post->image) }} " class="img-fluid card-img-top" /></td>
            <td>{{$post->name}}</td>
            <td>{{$post->email}}</td>
            <td>{{$post->address}}</td>
            <td>{{$post->city}}</td>
            <td>{{$post->state}}</td>
            <td>{{$post->zip}}</td>
            <td>
              <button type="button" class="btn btn-secondary" wire:click="delete({{$post->id}})">Delete</button>
            </td>

        </tr>
              
          @endforeach
         
         
      </tbody>
  </table>
</div>




