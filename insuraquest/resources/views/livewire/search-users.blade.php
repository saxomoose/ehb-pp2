
<div>
    <input  style="width: 100%" wire:model="search" type="text" placeholder="Search- Filter users by name or mail..."/>
<hr>
<hr>
    <ul style="padding-left: 2%">

        @foreach($users as $user)
            <div class="row no-gutters">
                <div class="col">
                    <h5>Gebruiker: {{ $user->name }}</h5>
                    <h6>{{$user->email}}</h6>
                    <p>Type: {{ $user->type }}</p>
                </div>
                <div class="col">
                         <p>Wijzig type naar:
                        @unless($user->type == "admin")
                        <a class="btn btn-dark btn-sm"
                            href="{{ Route('admin.type', ['id'=>$user->id, 'newtype'=>"admin"])}}"
                            role="button">admin</a>

                            @endunless
                        @unless($user->type == "librarian")
                         <a class="btn btn-warning btn-sm"
                            href="{{ Route('admin.type', ['id'=>$user->id, 'newtype'=>"librarian"])}}"
                            role="button">librarian</a>

                            @endunless
                        @unless($user->type == "user")
                        <a class="btn btn-primary btn-sm"
                            href="{{ Route('admin.type', ['id'=>$user->id, 'newtype'=>"user"])}}"
                            role="button">user</a>

                            @endunless
                      @unless($user->type == "guest")
                        <a class="btn btn-secondary btn-sm"
                            href="{{ Route('admin.type', ['id'=>$user->id, 'newtype'=>"guest"])}}"
                            role="button">guest</a>

                            @endunless
                         </p> <a class="btn btn-danger btn-sm"
                         href="{{ Route('admin.deleteuser', ['id'=>$user->id])}}"
                         role="button">Delete user</a>
                </div>
            </div>
            <hr>
    @endforeach
    {{ $users->links() }}

</div>
