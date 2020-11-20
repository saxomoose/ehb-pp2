<div>
    <input wire:model="search" type="text" placeholder="Search/Filter users..."/>

    <ul>
        @foreach($users as $user)
        <br>
            <li>{{ $user->name }}</li>
            <li>{{ $user->email }}</li>
            <br>
        @endforeach
    </ul>
</div>
