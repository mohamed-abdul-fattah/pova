{{-- Acquired features --}}
@foreach ($resource->acquiredFeatures as $key => $feature)
    <div class="form-group">
        @if ($feature->feature->type !== 'boolean')
            <label class="form-label">{{nameLocale($feature->feature, app()->getLocale())}}</label>
        @endif
        {{-- text input --}}
        @if ($feature->feature->type === 'string' || $feature->feature->type === 'email')
            <input type="text" name="features[{{$feature->feature->id}}]"
                placeholder="{{nameLocale($feature->feature, app()->getLocale())}}"
                value="{{$feature->value()}}" class="form-control">
        {{-- text area --}}
        @elseif ($feature->feature->type === 'text')
            <textarea name="features[{{$feature->feature->id}}]" rows="4"
                class="form-control" placeholder="{{nameLocale($feature->feature, app()->getLocale())}}">{{$feature->value()}}</textarea>
        {{-- checkboxes --}}
        @elseif ($feature->feature->type === 'boolean')
            <input type="checkbox" name="features[{{$feature->feature->id}}]"
                value="{{$feature->value()}}">
            {{nameLocale($feature->feature, app()->getLocale())}}
        {{-- numbers --}}
        @elseif ($feature->feature->type === 'number')
            <input type="number" name="features[{{$feature->feature->id}}]"
                placeholder="{{nameLocale($feature->feature, app()->getLocale())}}"
                value="{{$feature->value()}}" class="form-control">
        {{-- selections --}}
        @elseif ($feature->feature->type === 'selection')
            <select class="form-control" name="features[{{$feature->feature->id}}]">
                @php
                    $selections = explode(',', $feature->feature->selections);
                @endphp
                <option disabled>{{nameLocale($feature->feature, app()->getLocale())}}</option>
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
@endforeach
{{-- End acquired features --}}
{{-- Not acquired features --}}

{{-- End not acquired features --}}
