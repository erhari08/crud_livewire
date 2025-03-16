<div>

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


            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $key=>$post)

            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$post->photo}}</td>
                <td>{{$post->name}}</td>
                <td>{{$post->email}}</td>
                <td>{{$post->address}}</td>
                <td>{{$post->city}}</td>
                <td>{{$post->state}}</td>
                <td>{{$post->zip}}</td>
            </tr>
                
            @endforeach
           
           
        </tbody>
    </table>
</div>
