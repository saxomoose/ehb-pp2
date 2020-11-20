
<div>
    <input  style="width: 100%" wire:model="search" type="text" placeholder="Search- Filter users by name or mail..."/>
<hr>
<hr>
    <ul style="padding-left: 2%">
        @foreach($users as $user)

            <li>{{ $user->name }}</li>
            <li>{{ $user->email }}</li>
            <hr>
        @endforeach
    </ul>
    {{ $users->links() }}

</div>
