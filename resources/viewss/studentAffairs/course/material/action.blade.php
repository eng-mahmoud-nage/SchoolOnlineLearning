<div style="display:inline-flex">
<a class="" href="{{route('material.edit', $id)}}" style="padding: 0 5px">
    <i class="fas fa-user-edit"></i>
</a>
<form action="{{route('material.destroy', $id)}}" method="POST">
    @csrf
    @method('DELETE')
   
        <button onclick="return confirms('are you sure?')" class="" style="background: none;border: none;color: red; display:inline-flex">
            <i class="fas fa-trash-alt" ></i>
        </button>
</form>
</div>