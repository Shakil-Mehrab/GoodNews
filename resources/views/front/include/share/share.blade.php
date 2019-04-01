<div class="panel panel-default">
    <div class="panel panel-heading">Share Listing <em>{{$new->heading}}</em></div>
    <div class="panel-body">
        @include('admin.includes.message')
        <p>Share to Up to 5 people</p>
        <form method="POST" action="{{route('news.share.store',$new->id)}}">
            @csrf
           @foreach(range(0,4) as $n)
            <div class="form-group{{$errors->has('emails.'.$n) ? ' has-error' : ''}}">
                <label for="emails.{{$n}}" class="hidden">Email</label>
                <input type="text" name="emails[]" id="emails.{{$n}}" class="form-control" placeholder="someone@somewhere.com" value="{{ old('emails.'.$n) }}">  
                   @if ($errors->has('emails.'.$n))
                        <span class="help-block">
                            <strong>{{ $errors->first('emails.'.$n) }}</strong>
                        </span>
                    @endif            
            </div>
           @endforeach
            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                <label for="message">Message(Optional)</label>
                <textarea type="text" name="message" id="message"  class="form-control" col="30" rows="8">{{ old('message') }}</textarea>
                @if ($errors->has('message'))
                        <span class="help-block">
                            <strong>{{ $errors->first('message') }}</strong>
                        </span>
                    @endif     
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Send</button>       
            </div>
        </form>
    </div>
</div>


