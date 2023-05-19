<tr>
    <th scope="col">{{ $user->id }}</th>
    <td scope="col">{{ $user->name }}</td>
    <td scope="col">{{ $user->email }}</td>
    <td scope="col" class="text-center d-flex">
        <a href="{{ route('users.edit', ['user' => $user]) }}" class="btn btn-sm btn-info float-left mr-1" style="margin-right: 10px;" ><i class="bi bi-pencil-square"></i></a>
        <form action="{{ route('users.destroy', ['user' => $user]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Подтвердите удаление товара {{$user->name}}' )">
                <i class="bi bi-x-square"></i>
            </button>
        </form>
    </td>
</tr>