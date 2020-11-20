
<div>
    <input wire:model="search" type="text" placeholder="Search/Filter users..."/>
<hr>
<hr>
    <ul>
        @foreach($users as $user)
        <hr>
            <li>{{ $user->name }}</li>
            <li>{{ $user->email }}</li>
        @endforeach
    </ul>

</div>
