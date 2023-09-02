<div>
    <div class="flex flex-row itemx-center justify-between">
        <div class="text-3xl mb-4">Random User</div>
        <button wire:click="toxml">To XML</button>
    </div>
    <div>
    {{-- {{json_encode($users[0])}} --}}
    </div>
    <div>
        <table class="table-auto" width="100%">
            <thead class="bg-slate-600 text-white my-1">
                <tr>
                    <td>Title</td>
                    <td>First</td>
                    <td>Last</td>
                    <td>Phone</td>
                    <td>Email</td>
                    <td>Country</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <td>{{$user->name->title}}</td>
                        <td>{{$user->name->first}}</td>
                        <td>{{$user->name->last}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->location->country}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
