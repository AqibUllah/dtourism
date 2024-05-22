@props(['disabled' => false ,'name' => '','options' => [], 'selected' => null ,'required' => false])

<div>
    <select {{ $disabled ? 'disabled' : '' }} {{ $required ? 'required' : '' }} id="{{ $name }}" name="{{ $name }}" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
        <option value="">select an item</option>
        @foreach($options as $value => $display)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>{{ $display }}</option>
        @endforeach
    </select>
</div>
