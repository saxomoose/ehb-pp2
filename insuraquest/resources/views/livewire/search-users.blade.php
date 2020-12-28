<div>
    {{-- rendert insuraquest/app/HTTP/Livewire/SearchUsers.php --}}
    <label class="block" for="searchtext">
        <span class="text-gray-700">Search User: </span>
        <input class="form-input mt-1 block w-full" wire:model="search" placeholder="Filter by name, mail, type..."
            name="searchtext" value="{{ old('searchtext')}}">
    </label>
    <hr>
    <div class="mt-2 px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">

        @foreach($users as $user)
        <div class="row no-gutters">
            <div class="col-3">
                <h5>{{ $user->name }}</h5>
                <h6>{{$user->firstname}}</h6>
                <h6>{{$user->email}}</h6>
            </div>
            <div class="col-9">

                <a <?php if($user->type == "guest") echo 'class="btn btn-outline-secondary active"'; ?>
                    class="btn btn-outline-secondary" id="guest"
                    href="{{ Route('admin.type', ['id'=>$user->id, 'newtype'=>"guest"])}}" role="button">guest</a>

                <a <?php if($user->type == "user") echo 'class="btn btn-outline-primary active"'; ?>
                    class="btn btn-outline-primary" id="user"
                    href="{{ Route('admin.type', ['id'=>$user->id, 'newtype'=>"user"])}}" role="button">User</a>

                <a <?php if($user->type == "librarian") echo 'class="btn btn-success active"'; ?>
                    class="btn btn-outline-success" id="librarian"
                    href="{{ Route('admin.type', ['id'=>$user->id, 'newtype'=>"librarian"])}}"
                    role="button">Librarian</a>

                <a <?php if($user->type == "admin") echo 'class="btn btn-outline-warning active"'; ?>
                    class="btn btn-outline-warning" id="admin"
                    href="{{ Route('admin.type', ['id'=>$user->id, 'newtype'=>"admin"])}}" role="button">Admin</a>

                <a class="btn btn-danger btn-sm" style="margin: 10px"
                    href="{{ Route('admin.deleteuser', ['id'=>$user->id])}}" role="button">Delete user</a>
            </div>
        </div>

        <hr>
        @endforeach
        {{ $users->links() }}
    </div>
</div>
