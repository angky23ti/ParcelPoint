<button {{ $attributes->merge(['class' => 'bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2']) }}>
    {{ $slot }}
</button>
