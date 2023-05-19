<tr>
    <th scope="col">{{ $good->id }}</th>
    <td scope="col">{{ $good->name }}</td>
    <td scope="col">{{ $good->url }}</td>
    <td scope="col" class="text-center">{{ $good->isDraft() }}</td>
    <td scope="col" class="text-center d-flex">
        <a href="{{ route('goods.edit', ['good' => $good]) }}" class="btn btn-sm btn-info float-left mr-1" style="margin-right: 10px;" ><i class="bi bi-pencil-square"></i></a>
        <form action="{{ route('goods.destroy', ['good' => $good]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Подтвердите удаление товара {{$good->name}}' )">
                <i class="bi bi-x-square"></i>
            </button>
        </form>
    </td>
</tr>