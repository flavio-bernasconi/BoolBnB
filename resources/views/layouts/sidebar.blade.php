    @section('sidebar')
      <div class="sidebar">
        <div class="btn-sidebar">
          @if(Request::url() === 'flat/*')
            <a class="btn-update" href="{{ route('editFlat', $singleFlat ->id)}}">Update Flat</a><br>
            <a class="btn-delete" href="{{ route('deleteFlat', $singleFlat ->id)}}">Delete Flat</a><br>
          @else
              <a class="btn-add" href="{{ route('addFlat')}}">Add Flat</a><br>

              <a class="btn-add" href="{{ route('edit', $user -> id) }}">Edit Profile</a><br>
              <a class="btn-add" href="{{ route('destroy', $user -> id) }}">Delete Profile</a><br>

          @endif
          <a href="{{ URL::previous() }}" class="mb-5">Back</a>
        </div>
      </div>
    @endsection
