  <div class="py-2 px-2">
      <form method="POST" action="{{ $variable }}" >
          @method('DELETE')
          @csrf
          <button class=" hover:font-semibold" type="submit" ><i class="far fa-trash-alt"></i></button>
      </form>
  </div>
