<x-category-layout>

    <x-slot name="title">
        Categories
    </x-slot>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Categories <a href="{{url('categories/create')}}" class="btn btn-primary">Add Category</a></h4>
                    </div>
                    <div class="card-body">
                       

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Is Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->description}}</td>
                                        <td>
                                            @if ($item->is_active)
                                                Active
                                            @else
                                                In_active
                                            @endif
                                        </td>

                                        <td>
                                           <button class="btn btn-success"><a class="text-decoration-none text-light" href="{{url('categories/'.$item->id.'/edit')}}">Edit</a></button> 
                                           <button class="btn btn-danger"><a class="text-decoration-none text-light" onclick="return confirm('Are you sure ?')" href="{{url('categories/'.$item->id.'/delete')}}">Delete</a></button> 
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-category-layout>