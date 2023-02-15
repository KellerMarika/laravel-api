{{-- @dump($route)
@dump($element_id)
 --}}

<form  class="delete-form " action="{{ route($route, $element_id) }}" method="POST">
 @csrf()
 @method('DELETE')

 <button class="destroy-btn btn btn-danger">  
  <ion-icon name="close-outline"></ion-icon>
  </button>
</form>

