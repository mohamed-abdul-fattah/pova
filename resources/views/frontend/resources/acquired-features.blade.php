<div class="form-group feature">
    @if (!$feature->feature->required)
        <i class="fa fa-times-circle delete-feature" aria-hidden="true"></i>
    @endif
    @if ($feature->feature->type !== 'boolean')
        <label class="form-label">{{nameLocale($feature->feature, app()->getLocale())}}</label>
    @endif
    {{-- text input --}}
    @if ($feature->feature->type === 'string' || $feature->feature->type === 'email')
        <input type="text" name="features[{{$feature->feature->id}}]"
            placeholder="{{nameLocale($feature->feature, app()->getLocale())}}"
            value="{{$feature->value()}}" class="form-control"
            @if ($feature->feature->required) required @endif>
    {{-- text area --}}
    @elseif ($feature->feature->type === 'text')
        <textarea name="features[{{$feature->feature->id}}]" rows="4"
            @if ($feature->feature->required) required @endif
            class="form-control" placeholder="{{nameLocale($feature->feature, app()->getLocale())}}">{{$feature->value()}}</textarea>
    {{-- checkboxes --}}
    @elseif ($feature->feature->type === 'boolean')
        <input type="checkbox" name="features[{{$feature->feature->id}}]"
            value="1"
            @if ($feature->feature->required) required @endif
            @if ($feature->value())
                    checked
            @endif>
        {{nameLocale($feature->feature, app()->getLocale())}}
    {{-- numbers --}}
    @elseif ($feature->feature->type === 'number')
        <input type="number" name="features[{{$feature->feature->id}}]"
            placeholder="{{nameLocale($feature->feature, app()->getLocale())}}"
            value="{{$feature->value()}}" class="form-control"
            @if ($feature->feature->required) required @endif>
    {{-- selections --}}
    @elseif ($feature->feature->type === 'selection')
        <select class="form-control" name="features[{{$feature->feature->id}}]"
            @if ($feature->feature->required) required @endif>
            @php
                $selections = explode(',', $feature->feature->selections);
            @endphp
            <option selected disabled>{{nameLocale($feature->feature, app()->getLocale())}}</option>
            @foreach ($selections as $key => $selection)
                <option value="{{$selection}}"
                @if ($feature->value() === $selection)
                    selected
                @endif
                >{{$selection}}</option>
            @endforeach
        </select>
    @endif
</div>
