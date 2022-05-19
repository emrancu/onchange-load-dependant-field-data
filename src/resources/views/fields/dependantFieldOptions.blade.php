<!-- onchange dependant Field Options -->
@php

    $field['id'] = $field['id'] ?? (string)'field_'.uniqid();
    $field['hint'] = $field['hint'] ?? '' ;
    $field['placeholder'] = $field['placeholder'] ?? '-' ;
    $field['method'] = $field['source_method'] ?? 'post' ;

@endphp

@include('crud::fields.inc.wrapper_start')

<label>{!! $field['label'] !!} </label>

<select
    class="form-control select2 os-dependant-field"
    id="{{ $field['id'] }}"
    name="{{ $field['name'] }}"
    @include('crud::fields.inc.attributes')
>
    <option value=""> {{ $field['placeholder'] }} </option>
</select>

<script>
    setTimeout(function () {

        var fieldID = "{{ $field['id'] }}";
        var placeholder = "{{ $field['placeholder'] }}";
        var dependencyFieldName = "{{ $field['dependency_name'] }}";

        $('#' + fieldID).select2({
            theme: 'bootstrap',
            multiple: false,
            placeholder: placeholder,
            allowClear: true,
        });

        function resetOptions(options) {
            $('#' + fieldID).html(options)
        }

        $("select[name='" + dependencyFieldName + "']").change(function () {

            let value = $(this).val();

            if (!value) {
                return resetOptions('')
            }

            let url = "{{$field['source']}}";
            let data = {};
            data[dependencyFieldName] = value

            $.ajax({
                url: url,
                data: data,
                method: "{{ $field['method'] }}"
            }).done(function (data) {

                let options = ' <option value=""> ' + placeholder + '</option>';

                data.forEach(item => {
                    options += '<option value="' + item.id + '">' + item.{{$field['attribute']}} + ' </option>'
                });

                resetOptions(options);
            });

        })

    }, 500);

</script>


{{-- HINT --}}
@if ($field['hint'])
    <p class="help-block">{!! $field['hint'] !!}</p>
@endif

@include('crud::fields.inc.wrapper_end')

@if ($crud->fieldTypeNotLoaded($field))
    @php
        $crud->markFieldTypeAsLoaded($field);
    @endphp

    {{-- FIELD EXTRA CSS  --}}
    {{-- push things in the after_styles section --}}
    @push('crud_fields_styles')
        <!-- no styles -->
    @endpush

    {{-- FIELD EXTRA JS --}}
    {{-- push things in the after_scripts section --}}
    @push('crud_fields_scripts')
        <!-- no script -->
    @endpush
@endif



