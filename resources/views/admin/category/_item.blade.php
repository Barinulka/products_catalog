<tr>
    <th scope="col">{{ $category->id }}</th>
    <td scope="col">{{ $category->name }}</td>
    <td scope="col">{{ $category->url }}</td>
    <td scope="col" class="text-center">{{ $category->isDraft() }}</td>
    <td scope="col" class="text-center d-flex">
        <a href="{{ route('categories.edit', ['category' => $category]) }}" class="btn btn-sm btn-info float-left mr-1" style="margin-right: 10px;" ><i class="bi bi-pencil-square"></i></a>
        {{-- <a href="#" class="delete-item" data-action="{{ route('categories.destroy', ['category' => $category->id]) }}" style="color: red;">Уд.</a>  --}}
        <form action="{{ route('categories.destroy', ['category' => $category]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Подтвердите удаление категории {{$category->name}}' )">
                <i class="bi bi-x-square"></i>
            </button>
        </form>
    </td>
</tr>