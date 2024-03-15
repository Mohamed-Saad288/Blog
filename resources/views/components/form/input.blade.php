@props(['name','type' => 'text' , 'attributes'])
<x-form.field>
  <x-form.label name='{{$name}}' />
    <input
        class="border border-gray-400  p-2 w-full"
        type="{{$type}}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{old($name)}}"
        {{$attributes}}
        required>
     <x-form.erorr name='{{$name}}'/>
</x-form.field>

