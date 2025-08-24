<div class="grid grid-cols-2 gap-2">
    <div>
        <x-forms.dropdown/>
    </div>
    <div class="grid grid-cols-2 gap-0">
        <x-forms.dropdown/>
        <div class="border border-amber-50 overflow-auto">
                <x-forms.field type="text"
                               labelClass="text-center"
                               name="db_table_name"
                               placeholder="Database Name"
                               labelText="Database Name"
                />
                <x-forms.field type="text"
                               labelClass="text-center"
                               name="db_column_name"
                               placeholder="Column Name"
                               labelText="Column Name"
                />
                <x-forms.field type="text"
                               labelClass="text-center"
                               name="expression_type"
                               placeholder="type"
                               labelText="type"
                />
                <x-forms.field type="text"
                               labelClass="text-center"
                               name="expression_length"
                               placeholder="length"
                               labelText="length"
                />
                <x-forms.field type="date"
                               labelClass="text-center"
                               name="expression_date"
                               placeholder="date"
                               labelText="date"
                />
        </div>
        <button type="submit">Submit</button>
    </div>
</div>
