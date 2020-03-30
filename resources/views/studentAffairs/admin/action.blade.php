<div style="display:inline-flex">
    <a class="edit" href="{{route('admins.edit', $id)}}" style="padding: 0 5px">
    <i class="fas fa-user-edit"></i>
</a>
<form action="{{route('admins.destroy', $id)}}" method="POST">
    @csrf
    @method('DELETE')
   
        <button class="delete" onclick="confirms()" class="" style="background: none;border: none;color: red; display:inline-flex">
            <i class="fas fa-trash-alt" ></i>
        </button>
</form>
</div>