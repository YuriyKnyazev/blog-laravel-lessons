<x-admin.layout title="Tags">
    <x-admin.table
        :collection="$tags"
        :names="['id', 'name']"
        edit
    />
</x-admin.layout>
