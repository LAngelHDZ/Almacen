<div class="container mx-4">
    <div class="bg-white rounded-sm shadow-sm ">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Permissions</th>
                <th scope="col">Descripcion</th>
                {{-- <th scope="col">Acciones</th> --}}
              </tr>
            </thead>
            <tbody>
              @foreach ($permission as $data)
              <tr>
                  
                <th scope="row">{{ $data->id }}</th>
                <td>{{ $data->name }}</td>
                <td> <p class="px-2 bg-gray-50 rounded-full font-light">{{ $data->description }}</p></td>
                {{-- <td></td> --}}
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        {{ $permission->links() }}
</div>
