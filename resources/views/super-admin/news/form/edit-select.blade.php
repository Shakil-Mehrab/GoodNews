 @php 
 use App\Model\Category;
 $categories=Category::all();
 @endphp
 <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }} col-md-6">
	<label for="category" class="control-label">Cateogory</label>
	<select id="category" name="category_id" class="form-control">
			<optgroup label="Select One">
				@forelse($categories as $sub)
		       		<option value="{{$sub->id}}" {{$sub->id==$new->category_id?'selected':' '}}>{{$sub->name}}</option>
			</optgroup>
		@empty
			<optgroup label="Select One">
		       <option value="">No Category</option>
			</optgroup>
		@endforelse
	</select>
	 @if ($errors->has('category_id'))
        <span class="help-block">
            <strong>{{ $errors->first('category_id') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('media') ? ' has-error' : '' }} col-md-6">
	<label for="media" class="control-label">Media</label>
	<input id="media" type="text" class="form-control" name="media" placeholder="Media" value="{{$new->media}}" required>

	    @if ($errors->has('media'))
	        <span class="help-block">
	            <strong>{{ $errors->first('media') }}</strong>
	        </span>
	    @endif
</div>